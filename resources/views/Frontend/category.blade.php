@extends('layouts.front')

@section('title')
    category
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


   




    <div class="py5">
        <div class="container">
            <div class="row">
                <div class="col- 3 md-14 my-auto">
                    <div class="row">
                        @foreach ($category as $cate)
                            <div class="col-4 my-auto ">
                                <a href="{{ url('view-category/'.$cate->slug)}}">
                                    <div class="card">
                                        <img src="{{ asset('assets/uploads/Category/' . $cate->image) }}" alt=" image">
                                        <div class="card body">
                                            <h5>{{ $cate->name }}</h5>
                                            <p>
                                                {{ $cate->description }}
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
