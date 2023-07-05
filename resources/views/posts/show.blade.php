<html>
<head>
    <title>Show User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

<div class="container mt-5">
    <div class="d-flex justify-content-between">
        <h1>Show User</h1>
        <a href="{{ route('posts.index') }}" class="btn btn-primary h-100">Back</a>
    </div>
    <div class="card mt-5">
        <div class="card-title">
            <div class="row">
                <div class="table table-bordered table table-hover">
                    <label for="">Title: {{ $post->title}}</label>
                </div>
                <div class="table table-bordered table table-hover">
                    <label for="">Description: {{ $post->description }}</label>
                </div>
                <div class="table table-bordered table table-hover">
                    <label for="">Category :{{ $post->category }}</label>
                </div>
                <div class="table table-bordered table table-hover">
                    <label for="">Tag :</label>
                    @foreach ($post->tags as $tags)
                        {{$tags->name}}
                    @endforeach
                </div>

                <div class="table table-bordered table table-hover">
                    <label for="">Status :{{ $post->status }}</label>
                </div>
                <div class="table table-bordered table table-hover">
                    <label for="">Created At: {{ $post->created_at }}</label>
                </div>

            </div>
        </div>
    </div>
</div>


<div class="row d-flex justify-content-center mt-5">
    <div class="col-md-8 col-lg-6">
        @if(session()->has('Success'))
            <div class="alert alert-success">
                {{ session()->get('Success') }}
            </div>
        @endif
        <div class="card shadow-0 border" style="background-color: #e1e1f1">
            <h5>Comments :</h5>
            <form method="post" action="{{route('post-comment-store', $post->id)}}">
                @csrf
                <div class="card-body p-5" id="chatScroll" class="nano has-scrollbar"
                     style="overflow-y:scroll;height:270px">
                    @foreach ($post->comments as $comment)
                        <h5>{{$comment->created_at}}</h5>
                        {{$comment->comment}}
                    @endforeach
                </div>
                <div class="container mt-5 d-flex justify-content-between">
                    <input type="text" id="addANote" name="comment" class="form-control" placeholder="Type comment..."/>
                    <button class="btn btn-success" type="submit" value="submit">Send</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>
</html>


