@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
     <img src="{{$user->profile->profileImage()}}" style="width: 200px " class="rounded-circle w-100" alt="">
   
        </div>

        <div class="col-9 pt-5">
         <div class="d-flex justify-content-between align-items-baseline">
             <div class="d-flex align-items-center pb-1">
                 <div class="h3" >{{$user->username}}</div>
             <follow-button user-id="{{$user->id}}" follows="{{$follows}}"></follow-button>
             </div>
             @can('update', $user->profile)
           <a href="/post/create">Add new post</a>
           @endcan
           
        </div>
        @can('update', $user->profile)
        <a href="/profile/{{$user->id}}/edit">Edit profile</a>
        @endcan
    
         <div class="d-flex">
             <div class="pr-4">
             <strong>{{$user->posts->count()}}</strong> posts
             </div>
             <div class="pr-4">
                <strong>{{$user->profile->followers->count()}}</strong> followers
            </div>
            <div class="pr-4">
            <strong>{{$user->following->count()}}</strong> following
            </div>
        
        
        </div>

    <div class="pt-4 font-weight-bold " style="font-size: 15px ">{{$user->profile->title}}</div>
    <div>{{$user->profile->description}}
    </div>
    <a href="#" class="font-weight-bold text-dark" style="font-size: 20px ">{{$user->profile->url ?? 'N/A'}}</a>


        </div>
    </div>

    <div class="row pt-5 ">

        @foreach ($user->posts as $post)
        <div class="col-4 pb-4">
            <a href="/post/{{$post->id}}"><img src="/storage/{{ $post->image}}" class="w-100" ></a>
        </div>
         
        @endforeach
       
           
        
    </div>
</div>
@endsection
