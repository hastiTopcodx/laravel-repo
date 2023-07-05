<html>
<head>
    <title>table data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

<div class="container mt-5">
    <div class="d-flex justify-content-between">
        <h1>Post Create</h1>
        <a href="{{ route('posts.index') }}" class="btn btn-primary h-100">Back</a>
    </div>
    <form method="post" action="{{route('posts.store')}}">
        @csrf
        <div class="mb-3">
            <label for="exampleInputName" class="form-label">Title</label>
            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                   id="exampleInputName" value="{{ old('title') }}">
            @error('title')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputDescription" class="form-label">Description</label>
            <input type="text" name="description" class="form-control  @error('description') is-invalid @enderror"
                   id="exampleInputDescription" value="{{ old('description') }}">
            @error('description')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputCategory" class="form-label">Category</label>
            <select class="form-control" @error('category') is-invalid @enderror id="exampleInputCategory"
                    name="category" value="{{ old('category') }}">
                <option value="business">Business</option>
                <option value="company">Company</option>
                <option value="online-Shopping">Online-Shopping</option>
                <option value="other">Other</option>

            </select>
            @error('category')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>


        <div class="mb-3">
            <label for="exampleInputCategory" class="form-label">Tag</label>

            <select class="form-control" id="exampleInputCategory" multiple name="tag[]">
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="exampleInputCategory" class="form-label">Status</label>
            <select class="form-control" @error('status') is-invalid @enderror id="exampleInputCategory" name="status"
                    value="{{ old('status') }}">
                <option value="active">Active</option>
                <option value="inActive">inActive</option>
            </select>
            @error('status')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="exampleInputpublish_date" class="form-label">published Date</label>
            <input type="date" name="published_date" class="form-control @error('publish_date') is-invalid @enderror"
                   id="exampleInputpublish_date" value="{{old('published_date') }}">

            @error('publish_date')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>


        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>
</html>

