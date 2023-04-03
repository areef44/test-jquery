@extends('layouts.templates')

@section('title','Detail Page')

@section('partials.navbar')

@section('content')

    {{-- @dd(last(request()->segments())) --}}
   

    <section style="background-color: #eee;">
        <div class="container py-2">
        <h5 class="text-center">Halaman Detail Products</h5>
          <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-4">
              <div class="card text-black">
                <i class="fab fa-apple fa-lg pt-3 pb-1 px-3"></i>
                <img id="image" src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Products/3.webp"
                  class="card-img-top" alt="Apple Computer" />
                <div class="card-body">
                  <div class="text-center">
                    <h5 class="card-title" id="name">Believing is seeing</h5>
                    <p class="text-muted mb-4" id="description">Apple pro display XDR</p>
                  </div>
                  <div>
                    <div class="d-flex justify-content-between">
                      <span>Price</span><span id="price">$5,999</span>
                    </div>
                  </div>
                  <div class="d-flex justify-content-between total font-weight-bold mt-4">
                    <span>Categories</span><span id="categories">$7,197.00</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="text-center py-2">
              <a class="btn btn-danger" href="{{ route('products') }}" role="button" aria-expanded="false" aria-controls="collapseExample">Back</a>
          </div>
        </div>
      </section>

      <script>
        id = '{{last(request()->segments())}}';
        $.ajax({
            url: "http://127.0.0.1:8000/api/products/"+id,
            method: "GET",
            dataType: "json",
            success: response => {
                let product = response.data
                let html = ""
                let name = $('#name').html(product.name)
                let image =  $("#image").attr("src",product.picture);
                let description = $('#description').html(product.description)
                let price = $('#price').html(product.price)
                let categories = $('#categories').html(product.category.name)
            }
        })
        
    </script>   

@endsection