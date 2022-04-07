@extends('admin.main')

@section('title')
order
@endsection


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 p-3">
                <div class="card ">
                    <div class="card-header">
                        <h4 class="   "> Total Orders
                            <a href="{{'order-history' }}" class="btn btn-warning  float-right">Order History</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th> Order Date</th>
                                    <th>Orders no</th>
                                    <th>Tracking Number</th>
                                    <th>Total price</th>
                                    <th>status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $item)
                                    <tr>
                                        <td>{{ date('Y-m-d', ($item['created_at'])) }}</td>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->tracking_no }}</td>
                                        <td>{{ $item->total_price }}</td>
                                        <td>{{ $item->status == '0' ? 'pending' : 'completed' }}</td>
                                        <td>
                                            <a href="{{ url('admin/view-order/'.$item->id)}}" class="btn btn-primary"></a>
                                        </td>
                                    </tr>
                                    
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
