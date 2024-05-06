@extends('layouts.site.masterSite')

@section('contant')

		<!-- product section -->
        <div class="product-section mt-150 mb-150">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2 text-center">
                        <div class="section-title">
                            <h3><span class="orange-text">Our</span> Products</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet beatae optio.</p>
                        </div>
                    </div>
                </div>

                <div class="row">

                    @foreach ($products as $product)
                        <div class="col-lg-4 col-md-6 text-center">
                            <div class="single-product-item">

                                <div class="product-image">
                                    <a style="max-height: 250px !important,min-height:250px !important" href=""><img src="{{asset('images/products/'.$product->image)}}" alt=""></a>
                                </div>
                                <h3>{{ $product->name }}</h3>
                                <p class="product-price"><span>Per Kg</span> {{ $product->price }}$ </p>
                                <a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
        </div>
        <!-- end product section -->
@endsection
