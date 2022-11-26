<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use Auth;


class UsersController extends Controller
{
    //
    public function profile(Request $request){
        $Auth = Auth::user();
        return view('users.profile',['Auth' => $Auth ]);
    }
    public function index(){
        $user = \DB::table('users')->get(); 
        return view('users.search',['user'=>$user]); 
    }

    public function update(Request $request){
        $validator = Validator::make($request->all(),[
            'name'  => 'required|min:2|max:12',
            'mail'  => 'required|string|email|min:5|max:40',
            'password' => 'min:8|max:20|confirmed|alpha_num|required',
            'password_confirmation' =>'required',
            'bio' => 'max:150',
            'iconimage' => 'image',
        ]);


        // リクエストデータ受取
        $id = Auth::user()->id;
        $form = $request->all();
        $username = $request->input('name');
        $mail = $request->input('mail');
        $password = $request-> input('password');
        $bio = $request -> input('bio');
        $request->file('img');
        // アップロードされたファイルの取得"
        if($request->file('img')){
            $image = $request->file('img');
            $path = $image ->store('public/images');
        }
        $validator->validate();
        if ($validator->fails()) {
            return redirect('/profile')
            ->withErrors($validator)
            ->withInput();
        }
        // フォームトークン削除
        unset($form['_token']);
        // レコードアップデート
        \DB::table('users')
            ->where('id', $id)
            ->update([
                'username' => $username,
                'mail'=> $mail,
                'password'=>Hash::make($password),
                'bio'=>$bio,
            ]);
            //画像を保存できてない。
            if(isset($image)){
                \DB::table('users')
                ->where('id', $id)
                ->update([
                    'images'=>basename($path)
                ]);
            }
        return redirect('/top');
    }
    // public function update(Request $request)
    // {
    //     // return 'update:' . $id;
    //     $id = $request->input('postid');
    //     $post = $request->input('postdata');
    //     \DB::table('posts')
    //         ->where('id', $id)
    //         ->update(['post' => $post]);
 
    //     return redirect('top');
    // }
/*     public function search(Request $request){
        //dd($request);
        $user = \DB::table('users')->get();
        $search = $request->search;
        if ($search != '') {
            foreach($user as $users) {
                $query->where('username', 'like', '%'.$value.'%');
            }
            $users = $query->where('user','like', '%' .''. '%')->get();
            return view('users.search',['user'=>$user]); 
        }else{
        return view('users.search',['user'=>$user]); 
        } */

    /* } */
    public function search(Request $request){
        $user = \DB::table('users')
        ->get(); 
        $keyword = $request->input('search');
        $query = User::query();
        if(!empty($keyword))
        {
        $query->where('username','like','%'.$keyword.'%')->orWhere('username','like','%'.$keyword.'%');
        $user = $query->orderBy('created_at','desc')->paginate(20);
        return view('users.search',['user'=>$user])
        ->with('keyword',$keyword); 
        
    }else{
        return view('users.search',['user'=>$user]); 
        }
    }


    // フォロー
    public function follow(User $user,$id)
    {
        $user = User::find($id);
        $follower = auth()->user();
        // フォローしているか
        $is_following = $follower->isFollowing($user->id);
        if(!$is_following) {
            // フォローしていなければフォローする
            $follower->follow($user->id);
            return back();
        }
    }

    // フォロー解除
    public function unfollow(User $user,$id)
    {
        $user = User::find($id);
        $follower = auth()->user();
        // フォローしているか
        $is_following = $follower->isFollowing($user->id);
        if($is_following) {
            // フォローしていればフォローを解除する
            $follower->unfollow($user->id);
            return back();
        }
    }
    public function userprofile($id){
        $user=\DB::table('users')
        ->where('id',$id)
        ->find($id);
        $post = \DB::table('posts')
        ->where('user_id',$id)
        ->get(); 
        return view('users.userprofile',['post'=>$post])->with('user',$user);

        
    }

}