@extends('admin.main')


@section('content')
<div class="card">
    <div class="card-body">
        <h4>category</h4>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
        </table>
        <tbody>
            @foreach ($category as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item-> name }}</td>
                    <td>{{ $item->description }}</td>
                    <td>
                        <img src="{{asset('assets/uploads/category/'.$item->image) }}" style="width:150px" alt="image hear">
                    </td>
                    <td>
                        <a href="{{ url('edit-prod/'.$item->id) }}" class="btn btn-primary">Edit</a>
                        <button class="btn btn-danger">Delete</button>
                    </td>
                </tr>

            @endforeach
        </tbody>
</div>

@endsection
