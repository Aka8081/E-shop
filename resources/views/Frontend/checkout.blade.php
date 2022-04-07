@extends('layouts.front')

@section('title')
    checkout
@endsection

@section('content')
<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">
            <a href="{{ url('/') }}">
                home
            </a> |
            <a href="{{ url('cart') }}">
                cart
            </a> |

        </h6>
    </div>
</div>            

    <div class="contianer mt-5">
        <form action="{{ url('place-order') }}" method="post">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h6> Basic Details </h6>
                            <div class="row checkout-form">
                                <div class="col-md-6">
                                    <label for=""> First Name</label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->name }}" name="name" placeholder="Enter First Name">
                                </div>
                                <div class="col-md-6">
                                    <label for="">last Name</label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->lname }}" name="lname" placeholder="Enter Last Name">
                                </div>

                                <div class="col-md-6 mt-3">
                                    <label for="">Email</label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->email }}" name="email" placeholder="Enter Email">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Phone Number</label>
                                    <input type=" text" class="form-control" value="{{ Auth::user()->phone }}" name="phone"
                                        placeholder="Enter Phone Number">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Address 1</label>
                                    <input type="text" class="form-control"  value="{{ Auth::user()->address1 }}" name="address1" placeholder="Enter Address 1">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Address 2</label>
                                    <input type="text" class="form-control"  value="{{ Auth::user()->address2 }}" name="address2" placeholder="Enter Address 2">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for=""> City</label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->city }}" name="city" placeholder="Enter City">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for=""> state</label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->state }}" name="state" placeholder="Enter state">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for=""> country</label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->country }}" name="country" placeholder="Enter Country">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">pincode</label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->pincode }}" name="pincode" placeholder="Enter pincode">
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="col-md-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h6> Order Details </h6>
                                <hr>
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>name </th>
                                            <th>qty</th>
                                            <th>price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php  $total_price = 0; @endphp
                                        @foreach($cartitems as $item)
                                            <div class="col-md-12">
                                                <tr>
                                                    <td>{{ $item->products->name }}</td>
                                                    <td>{{ $item->prod_qty }}</td>
                                                    <td>{{ $item->products->selling_price }}</td>
                                                </tr>
                                                @php  $total_price += $item->products->selling_price * $item->prod_qty ; @endphp
                                            </div>
                                        @endforeach
                                    </tbody>
                                

                                </table>
                                <hr>
                                <h4> Total:{{ $total_price }}</h4> 
                                <input type="hidden" name="total_price" value="{{ $total_price }}">
                                <br>

                                <button type="submit" class="btn btn-primary w-100">place Order</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        
    </script>
@endsection
