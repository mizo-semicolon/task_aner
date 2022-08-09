@extends('layouts.app')
@section('content')
@section('styles')
<style>
.col-4 img {
   
    height:300px;
  
}
</style>
@endsection
@section('title','show posts')

  <h2 class="text-center mb-6" style="font-weight:600;font-size:xx-large">Posts</h2>


<div class="container">
<div class="row">

@foreach($posts as $post)

<div class="col-4">

  <div>  
  <a href="{{route('posts.show',$post->id)}}">
      <!--Card 1-->
      <div class="rounded overflow-hidden shadow-lg">
        <img class="w-full h-full" src="{{route('image_show',$post->image)}}" alt="Mountain">
        <div class="px-6 py-4">
          <div class="font-bold text-xl mb-2">{{$post->title}}</div>
          <p class="text-gray-700 text-base">
              {!! \Illuminate\Support\Str::words($post->post,30,'..') !!}
          </p>
        </div>
        </a>
          <div class="px-6 pt-4 pb-2">
            <livewire:like :post="$post">


        
          
          </div>
          
        
      </div>
  
  </div>
  
</div>


@endforeach
{{ $posts->links('pagination::semantic-ui') }} 
</div>

@endsection