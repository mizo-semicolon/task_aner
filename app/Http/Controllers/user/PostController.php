<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\PostRequest;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::paginate(15);
        return view('posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $data=$request->except('image');
        $data['user_id']=auth()->user()->id;
        if($request->image!=''){
            $file= $request->file('image');
            $filename= uniqid().$file->getClientOriginalName();
            $file->move(public_path().'/image/', $filename);
            $data['image']= $filename;
        }
        $post=Post::create($data);
        return redirect()->back()->with('success','post created successfuly');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post=Post::findOrFail($id);
        return view('posts.view',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=Post::where('user_id',auth()->user()->id)
                    ->where('id',$id)
                    ->firstOrFail();
        return view('posts.edit',compact('post'));
            
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        $post=Post::where('user_id',auth()->user()->id)
                    ->where('id',$id)
                    ->firstOrFail();
        $data=$request->except('image');
        
        if($request->image!=''){
            $file= $request->file('image');
            $filename= uniqid().$file->getClientOriginalName();
            $file->move(public_path().'/image/', $filename);
            $data['image']= $filename;
            if($post->image!=''){
                @unlink(public_path().'/image/'.$post->image);
            }
        } 
        $post->update($data);
        return redirect()->back()->with('success','post edited successfuly');           
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::where('user_id',auth()->user()->id)
                    ->where('id',$id)
                    ->firstOrFail();
        if($post->image!=''){
            @unlink(public_path().'/image/'.$post->image);
        }            
        $post->delete();
        return redirect()->back()->with('success','post deleted successfuly'); 
    }

    public function my_posts(){
        $posts=Post::where('user_id',auth()->user()->id)->paginate(15);
        return view('posts.my_posts',compact('posts'));
    }
}
