@extends('layouts.app')
@section('content')
        <div class="row h-100 justify-content-center align-items-center">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title me-3" style="display: inline;">{{ $post->title }}</h3>
                    @Auth
                    @if(Auth::user()->id===$post->user_id)
        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-outline-primary btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
            <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001m-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708z"/>
          </svg></a>
        <form action="{{ route('posts.destroy', $post->id) }}" method="post" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-outline-danger btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
              </svg></button>
        </form>
    @endif
    @endAuth
                </div>
                <div class="card-body">
                    <p class="card-text"> <b>User: </b>{{ $post->user->name }}</p>
                    <p style="font-size: 12px"><b>Created at: </b>{{$post->created_at}}
                    <b>Updated at: </b>{{$post->updated_at}}
                </p>
                    <hr>
                    <p style="font-size: 20px;" class="card-text mb-5">{{ $post->body }}</p>
                    
                    
                    <hr>
                    <h5>Comments</h5>
                    @include('posts.commentsDisplay', ['commentss' => $post->comments, 'post_id' => $post->id])
                    @auth
                    <hr />
                    
                        
                    <h4>Write comment</h4>

                    <form method="post" action="{{ route('comments.store'   ) }}">
                        @csrf
                        <div class="form-group">
                            <textarea class="form-control" name="comment"></textarea>
                            <input type="hidden" name="post_id" value="{{ $post->id }}" />
                        </div>
                        <div class="form-group mt-2">
                            <input type="submit" class="btn btn-success" value="Add Comment" />
                        </div>
                    </form>
                    @endauth

                </div>
               
            </div>
        </div>
    </div>
@endsection