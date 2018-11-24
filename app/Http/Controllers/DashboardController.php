<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Post;
use App\Comment;
use App\Image;
use DB;

class DashboardController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->user_role <= 2 )
        {
            $posts = Post::get();
        return view('admin.dashboard',['posts'=>$posts]);    
        }
        else
        {
            return redirect('post');
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Auth::user()->user_role <= 2) {
            $post = Post::find($id);
        return view('admin.confirmdelete',['post'=>$post]);    
        }
        else
        {
            return redirect('posts');
        }

        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)   // delete post 
    {
        if (Auth::user()->user_role <= 2) {
            
            $comments = Comment::get();

        if ($comments != null) {

            foreach($comments as $c)
            {
                if ($c->post_id == $id) {
                    $c->delete();
                }
            }    
        }



        $image = DB::table('images')->where('post_id',$id);

        if ($image != null) {
            $image->delete();
        }

        $post = Post::find($id);
        $post->delete();

        



        return redirect('/posts');

        }
        else
        {
            return redirect('posts');
        }
        

        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
