@extends('layouts.app')
@section('title','create my posts')

@section('content')
<div class="container mx-auto">
  <div class="max-w-xl p-5 mx-auto my-10 bg-white rounded-md shadow-sm">
    <div class="text-center">
      <h1 class="my-3 text-3xl font-semibold text-gray-700">create post</h1>
      <p class="text-gray-400">create post by fill the following fields</p>
    </div>
    <div>
      <form method="post" action="{{route('posts.store')}}" enctype="multipart/form-data">
      @csrf
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
            value="{{old('title')}}"
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
            
          >{!! old('post') !!}</textarea>
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
            create
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
{{--<form method="post" action="{{route('posts.store')}}">
  <div class="mb-6">
    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">title</label>
    <input type="text" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="title" name="title" value="{{old('title')}}" required>
  </div>
  <div class="mb-6">
    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">post</label>
    <textarea id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="post" required name="post"></textarea>

  </div>
  <div class="mb-6">
    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="file_input">image</label>
    <input class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file" name="image">
  </div>
  
 
  <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
</form>--}}



@endsection