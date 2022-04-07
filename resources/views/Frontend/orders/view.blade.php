@extends('layouts.front')

@section('title')
    my orders
@endsection

@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{ url('/') }}">
                    home
                </a>


            </h6>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-while"> My order view</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 order-details" >
                                <label for="">First Name</label>
                                <div class="border p-2"> {{$orders->name}} </div>
                                <label for="">last Name</label>
                                <div class="border p-2"> {{$orders->lname}} </div>
                                <label for="">Email</label>
                                <div class="border p-2"> {{$orders->email}} </div>
                                <label for=""> Content no.</label>
                                <div class="border p-2"> {{$orders->phone}} </div>
                                <label for="">Shipping Address</label>
                                <div class="border p-2"> 
                                    {{$orders->address1}} ,<br>
                                    {{$orders->city}} ,<br>
                                    {{$orders->state}}  
                                </div>
                                <label for="">Zip Code</label>
                                <div class="border p-2"> {{$orders->pincode}} </div>
                            </div>
                            <div class="col-md-6">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Quantity</th>
                                            <th>price</th>
                                            <th>image</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders->orderItems as $item)
                                            <tr>
                                              <td>{{$item->products->name}}</td>
                                              <td>{{$item->qty}}</td>
                                              <td>{{$item->price}}</td>
                                              <td>
                                                  <img src="{{ asset('assets/uploads/products/'.$item->products->image)  }}" width="50px" alt="image">
                                              </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <h4> Total:{{ $orders->total_price }}</h4>
                            </div>
                        </div>

                    </div>
                </div>

                </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection`



@section('scripts')


@endsection