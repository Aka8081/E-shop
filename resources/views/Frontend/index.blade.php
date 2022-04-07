@extends('layouts.front')

@section('title')
    welcome to E-shop
@endsection

@section('content')
    <div class="container">
        @include('layouts.slider')
    </div>
    <div class="py-5">
        <div class="container">
            <div class="row">
                <h5>featured products</h5>
                @foreach ($featured_products as $prod )
                {{-- <a href="{{ url('view-category/'.$prod->slug)}}"> --}}
                    <div class="col-2 my-3  md-auto" >

                        <div class="card">
                            <img src="{{ asset('assets/uploads/products/' . $prod->image) }}" alt="product image">
                            
                            <div class="card body">
                                <h5>{{ $prod->name }}</h5>
                                <span class="float-start"> {{ $prod->selling_price }}</span>
                                <span class="float-end"> <s> {{ $prod->original_price }} </s> </span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>



    <div class="py-5">
        <div class="container">
            <div class="row">
                <h5>Trending category</h5>
                @foreach ($featured_category as $tcategory)
                    <div class="col-3 my-3">
                        <a href="{{ url('view-category/' . $tcategory->slug) }}">
                            <div class="card">
                                <img src="{{ asset('assets/uploads/category/' . $tcategory->image) }}"alt="product image">


                                <div class="card body">
                                    <h5>{{ $tcategory->name }}</h5>
                                    <p>
                                        {{ $tcategory->description }}
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach

            </div>

        </div>
    </div>
@endsection



