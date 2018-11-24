<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Post;
use App\Image;
use App\Comment;
use App\User;
use Auth;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::get();
        return view('welcome',['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   

        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {



        $post_i = 0;

        if (Post::count() == 0) {
            $post_test = new Post;
            $post_test->title = 'test';
            $post_test->body = 'test';
            $post_test->user_id = Auth::user()->id;
            $post_test->save();
            $post_i = Post::latest()->first()->id + 1;
            $post_test->delete();

        }
        else
        {
            $post_i = Post::latest()->first()->id +1;    
        }

        

        $this->validate($request,[
            'title' => 'required',
            'body' => 'required',

        ]);



        $post = new Post;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->user_id = Auth::user()->id;
        $post->save();


        $x = 1;
        
        if($request->hasFile('image'))
        {
            foreach ($request->image as $image) {
                $images = new Image;    
                $image_name = $x. time() .".".$image->getclientoriginalextension();
                $x++;
                $images->post_id = $post_i;
                $images->url = $image_name;
                $image->move(public_path('upload'),$image_name);
                $images->save();            
            }    
                
        }


        return redirect('post');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

     

        $post = Post::find($id);

        $comments = Comment::get()->where('post_id',$id);



        if($post)
        {
            if($comments)
            {
                return view('pages.onepost',['post'=>$post,'comments'=>$comments]);        
            }
            return view('pages.onepost',['post'=>$post]);    
        }
        else
        {
            return view('pages.onepost');
        }

        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
