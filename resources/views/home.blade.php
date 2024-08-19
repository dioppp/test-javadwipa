@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header card-title fw-semibold mb-3">Home</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card">
                                    <img src="{{ asset('images/products/fashion.jpg') }}" class="card-img-top"
                                        alt="..." />
                                    <div class="card-body">
                                        <h5 class="card-title">Fashion</h5>
                                        <p class="card-text">
                                            Discover the latest trends and stylish apparel in our Fashion category.
                                        </p>
                                        <a href="{{ route('orders.index') }}" class="btn btn-primary">Order Now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <img src="{{ asset('images/products/shoes.jpg') }}" class="card-img-top"
                                        alt="..." />
                                    <div class="card-body">
                                        <h5 class="card-title">Shoes</h5>
                                        <p class="card-text">
                                            Check out our range of shoes, from comfy sneakers to stylish formal options.
                                        </p>
                                        <a href="{{ route('orders.index') }}" class="btn btn-primary">Order Now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <img src="{{ asset('images/products/laptop.jpg') }}" class="card-img-top"
                                        alt="..." />
                                    <div class="card-body">
                                        <h5 class="card-title">Electronics</h5>
                                        <p class="card-text">
                                            Upgrade with the latest tech in our Electronics category.
                                        </p>
                                        <a href="{{ route('orders.index') }}" class="btn btn-primary">Order Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
