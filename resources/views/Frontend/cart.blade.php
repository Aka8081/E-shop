@extends('layouts.front')
@section('title')
    MY CART
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

    <div class="container my-5">
        <div class="card shadow product_data">
            <div class=" card body">
                {{-- @if ($cartiem->count() > 0) --}}
                    
                
                    @php  $total = 0; @endphp
                    @auth

                        @foreach ($cartitems as $item)
                            <div class="row product_data">
                                <input type="hidden" id="availQty{{ $item->id }}" class="form-control text-center"
                                    value="{{ $item->products->qty }}">
                                <div class="col-md-2 my-auto">
                                    <img id="proImg{{ $item->id }}"
                                        src="{{ asset('assets/uploads/products/' . $item->products->image) }}" height="70px"
                                        width="70px">
                                </div>
                                <div class="col-md-3 my-auto">
                                    <h6 id="prodName{{ $item->id }}">{{ $item->products->name }}</h6>
                                </div>
                                <div class="col-md-2 my-auto">
                                    <h6> Rs {{ $item->products->selling_price }}</h6>
                                </div>
                                <div class="col-md-3 my-2 my-auto">
                                    <input type="hidden" class="prod_id" value="{{ $item->prod_id }}">
                                    @if($item->products->qty >= $item->prod_qty)
                                        <label for="Quantity">Quantity</label>
                                        <div class="input-group text-center mb-3" style="width: 130px;">
                                            <button class="input-group-text changeQuantity decrement-btn"
                                                onclick="decrementCartItem({{ $item->id }})">-</button>
                                            <input type="text" name="quantity" class="form-control text-center bg-light"
                                                id="qty-input{{ $item->id }}" value="{{ $item->prod_qty }}" readonly>
                                            <button class="input-group-text changeQuantity increment-btn"
                                                onclick="incrementCartItem({{ $item->id }})">+</button>
                                        </div>
                                        @php  $total += $item->products->selling_price * $item->prod_qty ; @endphp
                                        @else
                                            <h6>out of stock</h6>
                                    @endif
                                </div>
                                <div class="col-md-2 my-auto">
                                    <button class="btn btn-danger delete-cart-item"> <i class="fa fa-teash"></i>Remove </button>
                                </div>

                            </div>

                        @endforeach
                    @endauth
                    @guest
                        @foreach ($cart as $key => $item)
                            <div class="row product_data">
                                <input type="hidden" id="availQty{{ $item['id'] }}" class="form-control text-center"
                                    value="{{ $item['qty'] }}">
                                <div class="col-md-2 my-auto">
                                    <img id="proImg{{ $item['id'] }}"
                                        src="{{ asset('assets/uploads/products/' . $item['image']) }}" height="70px"
                                        width="70px">
                                </div>
                                <div class="col-md-3 my-auto">
                                    <h6 id="prodName{{ $item['id'] }}">{{ $item['name'] }}</h6>
                                </div>
                                <div class="col-md-2 my-auto">
                                    <h6> Rs {{ $item['price'] }}</h6>
                                </div>
                                <div class="col-md-3 my-2 my-auto">
                                    <input type="hidden" class="prod_id" value="{{ $item['id'] }}">
                                    <label for="Quantity">Quantity</label>
                                    <div class="input-group text-center mb-3" style="width: 130px;">
                                        <button class="input-group-text changeQuantity decrement-btn"
                                            onclick="decrementCartItem({{ $item['id'] }})">-</button>
                                        <input type="text" name="quantity" class="form-control text-center bg-light"
                                            id="qty-input{{ $item['id'] }}" value="{{ $item['qty'] }}" readonly>
                                        <button class="input-group-text changeQuantity increment-btn"
                                            onclick="incrementCartItem({{ $item['id'] }})">+</button>

                                    </div>

                                </div>
                                <div class="col-md-2 my-auto">
                                    <button class="btn btn-danger delete-cart-item"> <i class="fa fa-teash"></i>Remove </button>
                                </div>

                            </div>
                            @php  $total += $item['price'] * $item['qty'] ; @endphp
                        @endforeach
                    @endguest
                </div>
                <div class="card-footer">
                    <h6>Total Price :{{ $total }}</h6>
                    <a href="{{ url('checkout')}}"class="btn btn-outline-success float-end"> process to checkout </a>
                </div>
        {{-- @else
        <div class="card-body text-center">
            <h2>your <i class="fa fa-shoping-cart"></i> cart is empty</h2>
            <a href="{{ url('category') }}"class="btn btn-outline-primary float-end"> countinue shoping</a>    

        </div> --}}
    </div>
@endsection


@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function incrementCartItem(e) {
            var inc_value = $('#qty-input' + e).val();
            var inc_avail = $('#availQty' + e).val();
            var value = parseInt(inc_value);
            var availQty = parseInt(inc_avail);
            value = isNaN(value) ? 1 : value;
            if (value < 5 && value < availQty) {
                value++;
                $('#qty-input' + e).val(value);
            } else {
                $('#qty-input' + e).val(value);
            }
        }

        function decrementCartItem(e) {
            var inc_value = $('#qty-input' + e).val();
            var value = parseInt(inc_value);
            value = isNaN(value) ? 1 : value;
            if (value > 1) {
                value--;
                $('#qty-input' + e).val(value);
            }
        }


        $('.delete-cart-item').on('click', function(e) {
            e.preventDefault();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var prod_id = $(this).closest('.product_data').find('.prod_id').val();
            $.ajax({
                method: 'POST',
                url: "delete-cart-item",
                data: {
                    'prod_id': prod_id,
                },

                success: function(response) {
                    window.location.reload();
                    alert("Success!");
                }
            });
        });

        $('.changeQuantity').click(function(e) {
            e.preventDefault();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var prod_id = $(this).closest('.product_data').find('.prod_id').val();
            var qty = $("#qty-input").val();

            // alert(prod_id + qty);

            $.ajax({
                method: 'POST',
                url: "{{ url('/update-cart') }}",
                contentType: 'application/x-www-form-urlencoded; charset=utf-8',
                data: {
                    'prod_id ': prod_id,
                    'prod_qty': qty,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {

                    alert(" update cart");
                }
            });

        });
    </script>
@endsection
