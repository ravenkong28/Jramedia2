@extends('layouts.main')

@section('header')
    @include('partials.navbar1')
@endsection

<style>
    .container {
        height: 100%;
        width: 100%;
    }

    #body{
        background-color: #ffffff;
    }
</style>

@section('content')
    <body id ='body'>
        <div class="text-lg-center">
            <h1 class="text-info">Our Products</h1>
            <a class="btn btn-success mt-2" href="/add_product">Add Product</a>
        </div>
        
        <div class="container mt-5">                 
            <div class="row mb-4">
                {{-- FOREACH --}}
                <div class="col-md-4 col-sm-6">
                    <div class="card mb-30">
                        <a class="card-img-tiles" href="#" data-abc="true">
                            <div class="inner">
                                <div class="main-img"><img class = "rounded mx-auto d-block" src="Image/pulpen.jpg" alt="Category"></div>
                            </div>
                        </a>
                        <div class="card-body">
                            <h4 class="card-title">Laptops</h4>
                            <p class="card-price text-warning">Rp. 22000</p>
                            <p></p>
                            <p class="card-desc">description</p>
                            <a class="btn btn-primary text-white" href="#">Update</a>
                            <a class="btn btn-danger text-white" href="#">Delete</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6">
                    <div class="card mb-30">
                        <a class="card-img-tiles" href="#" data-abc="true">
                            <div class="inner">
                                <div class="main-img"><img class = "rounded mx-auto d-block" src="Image/pulpen.jpg" alt="Category"></div>
                            </div>
                        </a>
                        <div class="card-body">
                            <h4 class="card-title">Laptops</h4>
                            <p class="card-price text-warning">Rp. 22000</p>
                            <p></p>
                            <p class="card-desc">description</p>
                            <a class="btn btn-primary text-white" href="#">Update</a>
                            <a class="btn btn-danger text-white" href="#">Delete</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6">
                    <div class="card mb-30">
                        <a class="card-img-tiles" href="#" data-abc="true">
                            <div class="inner">
                                <div class="main-img"><img class = "rounded mx-auto d-block" src="Image/pulpen.jpg" alt="Category"></div>
                            </div>
                        </a>
                        <div class="card-body">
                            <h4 class="card-title">Laptops</h4>
                            <p class="card-price text-warning">Rp. 22000</p>
                            <p></p>
                            <p class="card-desc">description</p>
                            <a class="btn btn-primary text-white" href="#">Update</a>
                            <a class="btn btn-danger text-white" href="#">Delete</a>
                        </div>
                    </div>
                </div>

            </div>

            {{-- PAGINATION --}}

            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                        </a>
                    </li>
                </ul>
            </nav>

        </div>
    </body>

@endsection

@section('footer')
    @include('partials.footer')
@endsection