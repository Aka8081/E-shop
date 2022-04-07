@extends('admin.main')

@section('content')

<div class="card mt-4">
    <div class="card-header ">
        <h4>Registered Users </h4>
        
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $item)
                    <tr>
    
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name.''.$item->lname }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->phone }}</td>
                        <td>
                            <a href="{{ url('view-user/'.$item->id) }}" class="btn btn-primary btn-sm"></a>
                        </td>
                       
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


@endsection
