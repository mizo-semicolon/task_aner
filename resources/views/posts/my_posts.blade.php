@extends('layouts.app')
@section('content')
@section('styles')
<style>
.col-4 img {
   
    height:300px;
  
}
</style>
@endsection
@section('title','my posts')
<div class="container mx-auto">
<h2 class="text-center mb-6" style="font-weight:600;font-size:xx-large">My Posts</h2>
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
</div>
<div class="container">
<div class="row">

@foreach($posts as $post)
<div class="col-4">
  <div>  
      <!--Card 1-->
      <div class="rounded overflow-hidden shadow-lg h-100">
        <img class="w-full" src="{{route('image_show',$post->image)}}" alt="Mountain">
        <div class="px-6 py-4">
          <div class="font-bold text-xl mb-2">{{$post->title}}</div>
          <p class="text-gray-700 text-base">
              {!! \Illuminate\Support\Str::words($post->post,30,'..') !!}
          </p>
        </div>
        <div class="px-6 pt-4 pb-2">
          <a href="{{route('posts.edit',$post->id)}}">
          <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">edit</span>
          </a>
          <form id="delete-form" action="{{ route('posts.destroy',$post->id) }}" method="POST" class="d-none">
                                          @csrf
                                          @method('delete')
                                      </form>
          
          <a href="#" onclick="if(!confirm('are you sure you want to delete?')){event.preventDefault();} else { document.getElementById('delete-form').submit(); }
                                                      ">
          <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">delete</span>
          </a>
          
        </div>
      </div>
  
  </div>
</div>


@endforeach
</div>
<div class="mt-4">
{{ $posts->links('pagination::semantic-ui') }} 
</div>
</div>


@endsection