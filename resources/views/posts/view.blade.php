@extends('layouts.app')
@section('content')
@section('title',$post->title)
@section('styles')
<style>
    .w-20 {
        width:5rem;
    }

    .h-20 {
        height:5rem;
    }
</style>
@endsection
<div class="container mx-auto">
<h2 class="text-center" style="font-weight:600;font-size:xx-large">{{$post->title}}</h2>
    <div class="gap-4">
        <div class="p-10">  
            <!--Card 1-->
            <div class="rounded overflow-hidden shadow-lg">
           
                <img class="w-full" src="{{route('image_show',$post->image)}}">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2">{{$post->title}}</div>
                    <p class="text-gray-700 text-base">
                        {!! $post->post !!}
                    </p>
            
                
                </div>
                <div class="px-6 pt-4 pb-2">
                    <livewire:like :post="$post">


                
                    
                </div>
                <div class="px-6 py-4">
                <h3 class="text-lg text-center mb-6">leave a comment</h3>

                 <form method="post" action="{{route('comments.store')}}" enctype="multipart/form-data">
      @csrf
      @csrf
      @if ($errors->any())
      <div role="alert" class="mb-6">
            <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                errors
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
          <label for="email" class="block mb-2 text-sm text-gray-600"
            >comment</label
          >
          <textarea
            rows="5"
            name="comment"
            placeholder="comment"
            class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md  focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300"
            
          >{!! old('comment') !!}</textarea>
        </div>
       <input type="hidden" name="post_id" value="{{$post->id}}">
       
        <div class="mb-6">
          <button
            type="submit"
            class="btn btn-primary w-full px-2 py-4 text-white bg-indigo-500 rounded-md  focus:bg-indigo-600 focus:outline-none"
          >
            send
          </button>
        </div>
      </form>

      @if($post->comments->count())
        @foreach($post->comments()->get() as $comment)
        

            <div class="relative grid grid-cols-1 gap-4 p-4 mb-8 border rounded-lg bg-white shadow-lg">
                <div class="relative flex gap-4">
                    <img src="https://icons.iconarchive.com/icons/diversity-avatars/avatars/256/charlie-chaplin-icon.png" class="relative rounded-lg -top-8 -mb-4 bg-white border h-20 w-20" alt="" loading="lazy">
                    <div class="flex flex-col w-full">
                        <div class="flex flex-row justify-between">
                            <p class="relative text-xl whitespace-nowrap truncate overflow-hidden">{{$comment->user->name}}</p>
                            <a class="text-gray-500 text-xl" href="#"><i class="fa-solid fa-trash"></i></a>
                        </div>
                        <p class="text-gray-400 text-sm">{{Carbon\Carbon::parse($comment->created_at)->format('Y M d')}}</p>
                    </div>
                </div>
                <p class="-mt-4 text-gray-500">
                {{$comment->comment}}
                </p>
            </div>
         
        @endforeach
      @else
      <div role="alert" class="mb-6">
            <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                no results
            </div>
            <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                  
                    <p>No Comments</p>
                          
            
            </div>
        </div>
      @endif   
      </div>

            </div>
        </div>
    </div>
</div>

@endsection