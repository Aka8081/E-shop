<div class="content-center">

    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">

        <div class="carousel-inner">
            <div class="carousel-item active">
                @foreach ($featured_products as $prod)
                    <div class="col-3 my-3">
                        <div class="card">
                            <img src="{{ asset('assets/uploads/products/' . $prod->image) }}" alt="product image">
                            <div class="card body">

                                <h5>{{ $prod->name }}</h5>
                                <span class="float-start"> {{ $prod->selling_price }}</span>
                                <span class="float-end"> <s>{{ $prod->original_price }} </s> </span>
                            </div>
                        </div>
                    </div>
                @endforeach  

            </div>
        </div>
    </div>
</div>
