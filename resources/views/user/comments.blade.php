@extends('layouts.admin')

@section('title') User Comments @endsection
@section('content')
  <div class="content">
      <div class="card">
          <div class="card-header bg-light">
              User Comment Details
          </div>

          <div class="card-body">
              <div class="table-responsive">
                  <table class="table table-striped">
                      <thead>
                      <tr>
                          <th>ID</th>
                          <th>Post</th>
                          <th>Content</th>
                          <th>Created at</th>
                          <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>
                      @foreach(Auth::user()->comments as $comment)
                        <tr>
                           <td>{{$comment->id}}</td>
                           <td class="text-nowrap"><a href="{{route('singlePost', $comment->id)}}">{{$comment->post->title}}</a></td>
                           <td>{{$comment->content}}</td>
                           <td>{{\Carbon\Carbon::parse($comment->created_at)->diffForHumans()}}</td>
                            <form method="Post" id="deleteComment-{{$comment->id}}" action="{{route('deleteComment',$comment->id)}}">@csrf</form>
                            <td><button type="button" class="btn btn-danger" onclick="document.getElementById('deleteComment-{{ $comment->id }}').submit()">x</button></td>
                        </tr>
                      @endforeach
                      </tbody>
                  </table>
              </div>
          </div>
      </div>

  </div>
@endsection
