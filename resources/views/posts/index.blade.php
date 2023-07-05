<html>
<head>
    <title>table data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

<div class="container mt-5">
    <div class="d-flex justify-content-between">
        <h1>Post-Table</h1>
        <a href="{{route('posts.create')}}" class="btn btn-primary h-100">Create</a>
    </div>
    <table class="table table-bordered table table-hover ">
        <thead>
        <tr class="table-row">
            <th scope="col"> No</th>
            <th scope="col"> title</th>
            <th scope="col"> Description</th>
            <th scope="col"> Category</th>
            <th scope="col">Status</th>
            <th scope="col">Published_Date</th>
            <th scope="col"> created_at</th>
            <th scope="col"> Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($userdata as  $data)
            <tr>
                <th scope="row">{{$data->id}}</th>
                <td>
                    <a href="{{route('posts.show', $data->id)}}">
                        {{$data->title}}
                    </a>
                </td>
                <td>{{$data->description}}</td>
                <td>{{$data->category}}</td>
                <td>{{$data->status}}</td>
                <td>{{$data->published_date}}</td>
                <td>{{$data->created_at}}</td>

                <td><a href="{{route('posts.edit',$data->id)}}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('posts.destroy',$data->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
            </tr>

        @endforeach
        </tbody>

    </table>
    <div style="margin-left: 400px;">
        {!! $userdata->links() !!}
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>
</html>

