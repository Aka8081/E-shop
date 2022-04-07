@extends('admin.main')

@section('title')
order
@endsection


@section('content')
{{-- <div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">
            <a href="{{ url('#') }}">
                home
            </a>


        </h6>
    </div>
</div> --}}


<div class="container">
    <div class="row">
        <div class="col-md-12 mt-3">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-while"> My order view</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 order-details" >
                            <h4> shipping Details</h4>
                            <hr>
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
                                    @php
                                        $totalPrice = 0;
                                    @endphp
                                    @foreach ($orders->orderItems as $item)
                                    @php
                                        $totalPrice = (int)$totalPrice + $item->price;
                                    @endphp
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
                            <h4> Total:{{ $totalPrice }}</h4>
                            <div class="mt-5 px-2">
                                <label for="">Order status</label>
                                    <form action="{{ url('update-order/' .$orders->id) }}" method="post">
                                        @csrf
                                        @method('put')
                                        <select class="form-select"name="order_status">
                                        
                                            <option {{ $orders->status == '0'? 'selected' : '' }} value="0">pending</option>
                                            <option {{ $orders->status == '1'? 'selected' : '' }} value="1" >completed</option>
                             
                                        </select>

                                        <button type="submit" class="btn btn-primary mt-3">Update</button>
                                    </form>
                               
                            </div>    
                        </div>
                    </div>

                </div>
            </div>

            </tbody>
            </table>
        </div>
    </div>
</div>

@endsection