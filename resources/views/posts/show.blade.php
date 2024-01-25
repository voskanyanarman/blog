<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <title>Post</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-warning">
        <div class="container-fluid">
            <a class="navbar-brand h1" href="{{ route('posts.index') }}">CRUDPosts</a>
            <div class="justify-end ">
                <div class="col ">
                    <a class="btn btn-sm btn-success" href="{{ route('posts.create') }}">Add Post</a>
                </div>
            </div>
    </nav>
    <div class="container h-100 mt-5">
        <div class="row h-100 justify-content-center align-items-center">

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">{{ $post->title }}</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">{{ $post->body }}</p>
                    <p class="card-text">User created this post:<b>{{ $post->user->name }}</b></p>
                    {{$post->created_at}}
                    {{$post->updated_at}}
                    <h4>Display Comments</h4>
  
                    @include('posts.commentsDisplay', ['commentss' => $post->comments, 'post_id' => $post->id])
   
                    <hr />
                    <h4>Add comment</h4>
                    <form method="post" action="{{ route('comments.store'   ) }}">
                        @csrf
                        <div class="form-group">
                            <textarea class="form-control" name="comment"></textarea>
                            <input type="hidden" name="post_id" value="{{ $post->id }}" />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success" value="Add Comment" />
                        </div>
                    </form>
                </div>
                @Auth
                                @if(Auth::user()->id===$post->user_id)
                <div class="card-footer">
                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </div>
                @endif
                @endAuth
            </div>
        </div>
    </div>
</body>

</html>