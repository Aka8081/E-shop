@extends('layouts.front')
@section('title')
    products | {{ $products->name }}
@endsection


@section('content')
<div class="container">
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <h6 class="mb-0">
        <a href="{{ url('/') }}">
              home
        </a> |
        <a href="{{ url('category') }}">
            category
               </a>     
      

    </h6>
    </div>
</div>
   
        <div class="container">
            
            {{-- <h6 class="mb-0">Collections / {{ $products->category->name }} / {{ $products->name }} </h6> --}}
        </div>
    </div>
    <div class="container">
        <div class="card shadow product_data">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 border-right">
                        <img src="{{ asset('assets/uploads/products/' . $products->image) }}" class="w-100"
                            alt="">
                    </div>
                    <div class="col-md-8">
                        <h2 class="mb-0">
                            {{ $products->name }}
                            @if ($products->trending == '0')
                                <label style="font-size: 16px;" class="float-end badge bg-danger trending_tag">
                                    trending</label>
                            @endif
                        </h2>

                        <hr>
                        <label ass="me-3">Original Price: <s>Rs {{ $products->original_price }}</s></label>
                        <label class="fw-bold">Selling Price: Rs {{ $products->selling_price }}</label>
                        <p class="mt-3 ">
                            {!! $products->small_description !!}
                        </p>
                        <hr>

                        @if ($products->qty > 1)
                            <label class="badge bg-success">In stock </label>
                            <label class="badge bg-warning">{{$products->qty }} left</label>
                        @else
                            <label class="badge bg-danger">Out of stock</label>
                        @endif
                        <div class="row mt-2">
                            <div class="col-md-2">
                                <input type="hidden" value="{{ $products->id }}" class="prod_id">
                                <input type="hidden" id="availQty" class="form-control text-center"
                                        value="{{ $products->qty }}">
                                <label for="Quantity"> Quantity</label>
                                <div class="input-group text-center mb-3" style="width:120px;">
                                    <button class="input-group-text decrement-btn">-</button>
                                    <input type="text" name="quantity" class="form-control qty-input text-center" value="1">
                                    <button class="input-group-text increment-btn">+</button>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <br />
                                @if ($products->qty > 0)
                                    <button type="button" id="addtocart"
                                    class="btn btn-primary me-3 addtocartBtn float-start">Add to Cart <i
                                        class="fa fa-shopping-cart"></i></button>
                             @else
                            @endif
                                {{-- <button type="button" class="btn btn-success me-3  float-start">Add to Wishlist <i
                                        class="fa fa-heart"></i></button> --}}


                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <hr>
                    <p class="mt-3 ">
                    <h3>Description</h3>
                    {!! $products->description !!}
                    </p>
                </div>
                <div class="col-md-12">
                    <hr>
                    <p class="mt-3 ">
                    <h3>meta_description</h3>
                    {!! $products->meta_description !!}
                    </p>
                </div>

                <div class="col-md-12">
                    <hr>
                    <p class="mt-3 ">
                    <h3>meta_keywords</h3>
                    {!! $products->meta_keywords !!}
                    </p>
                </div>
            </div>
        </div>
    </div>
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

        $(document).ready(function() {
            $('.increment-btn').click(function(e) {
                e.preventDefault();

                var incAvailQty = $('#availQty').val();
                var inc_value = $('.qty-input').val();
                var value = parseInt(inc_value);
                var availQty = parseInt(incAvailQty);
                value = isNaN(value) ? 1 : value;
                if (value < 5 && value < availQty) {
                    value++;
                    $('.qty-input').val(value);
                } else {
                    $('.qty-input').val(value);
                }

            });

            $('.decrement-btn').on('click', function(e) {
                e.preventDefault();

                var dec_value = $('.qty-input').val();
                var value = parseInt(dec_value);
                value = isNaN(value) ? 1 : value;
                if (value > 1) {
                    value--;
                    $('.qty-input').val(value);
                }

            });

        });


        $(document).ready(function() {

            $('#addtocart').click(function(e) {
                e.preventDefault();

                var product_id = $(this).closest('.product_data').find('.prod_id').val();
                var product_qty = $(this).closest('.product_data').find('.qty-input').val();

                $.ajax({
                    type: "POST",
                    url: "/add-to-cart",
                    data: {
                        'product_id': product_id,
                        'product_qty': product_qty,
                    },
                    success: function(response) {
                        alert(response.status);

                    }

                });

            });




        });
    </script>
@endsection
