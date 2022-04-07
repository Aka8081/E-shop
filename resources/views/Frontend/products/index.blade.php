@extends('layouts.front')
@section('title')
    {{ $category->name }}
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
               </a> |

    </h6>
    </div>
</div>
    <div class="py-5">
        <div class="container">
            <div class="row">
                <h5> {{ $category->name }}</h5>
                @foreach ($products as $prod)
                    <div class="col-3 my-3 md-3">
                        <div class="card">
                            <img src="{{ asset('assets/uploads/products/' . $prod->image) }}" alt="product image">
                            <a href="{{ url('/view-category/' . $category->slug . '/' . $prod->slug) }}">
                                <div class="card body">
                                    <h5>{{ $prod->name }}</h5>
                                        
                                    <span class="float-start"> {{ $prod->selling_price }}</span>
                                    <span class="float-end"> <s> {{ $prod->original_price }} </s> </span>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

