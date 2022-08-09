@extends('layouts.app')
@section('title','edit post')

@section('content')
<div class="container mx-auto">
  <div class="max-w-xl p-5 mx-auto my-10 bg-white rounded-md shadow-sm">
    <div class="text-center">
      <h1 class="my-3 text-3xl font-semibold text-gray-700">edit post</h1>
      <p class="text-gray-400">edit post by fill the following fields</p>
    </div>
    <div>
      <form method="post" action="{{route('posts.update',$post->id)}}" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      @if ($errors->any())
      <div role="alert" class="mb-6">
            <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                Danger
            </div>
            <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                    @foreach ($errors->all() as $error)
                    <p>{{$error}}</p>
                            @endforeach  
            
            </div>
        </div>
       @endif
       @if(session()->has('success'))
       
       <div class="mb-6 bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
  <div class="flex">
    <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
    <div>
      
      <p class="text-sm">{{session()->get('success')}}</p>
    </div>
  </div>
</div>
       @endif 
        
        <div class="mb-6">
          <label for="name" class="block mb-2 text-sm text-gray-600"
            >title</label
          >
          <input
            type="text"
          
            placeholder="title"
            
            name="title"
            value="{{$post->title}}"
            class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md  focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300"
          />
        </div>
        <div class="mb-6">
          <label for="email" class="block mb-2 text-sm text-gray-600"
            >post</label
          >
          <textarea
            rows="5"
            name="post"
            placeholder="post"
            class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md  focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300"
            
          >{!! $post->post !!}</textarea>
        </div>
        <div class="mb-6">
            <label for="phone" class="text-sm text-gray-600">current image</label>
            <img class="w-full" src="{{route('image_show',$post->image)}}">
        </div>
        <div class="mb-6">
          <label for="phone" class="text-sm text-gray-600">image</label>
          <input class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="file_input" name="image" type="file">
<p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG or
        </div>
       
        <div class="mb-6">
          <button
            type="submit"
            class="btn btn-primary w-full px-2 py-4 text-white bg-indigo-500 rounded-md  focus:bg-indigo-600 focus:outline-none"
          >
            save
          </button>
        </div>
      </form>
    </div>
  </div>
</div>




@endsection