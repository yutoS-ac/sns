<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Post;
use Auth;



class PostsController extends Controller
{
    
    public function index(){
        //$post = Post::with('User')->get();
        $following_id = Auth::user()->follows()->pluck('followed_id');
        $user_id = Auth::id();
        $post = Post::with('user')
        ->whereIn('posts.user_id', $following_id)
        ->orWhere('posts.user_id', $user_id)
        ->orderBy('created_at', 'desc')
        ->get();
        //ddd($post);
        return view('posts.index',['post'=>$post]); 
    }

    public function create(Request $request)
    {
        
        $post = $request->input('post');
        $user_id = Auth::id();
        \DB::table('posts')->insert([
            'user_id'=> $user_id,
            'post' => $post
        ]);
        return redirect('top');

    }

    public function delete($id)
    {
        \DB::table('posts')
            ->where('id', $id)
            ->delete();
        return redirect('top');
    }

 //   public function updateForm($id)
 //   {
 //       $post =\DB::table('posts')
 //           ->where('id', $id)
 //           ->first();
 //       return view('posts.updateForm');
 //   }

    public function update(Request $request)
    {
        // return 'update:' . $id;
        $id = $request->input('postid');
        $post = $request->input('postdata');
        \DB::table('posts')
            ->where('id', $id)
            ->update(['post' => $post]);
        return redirect('top');
    }

}

