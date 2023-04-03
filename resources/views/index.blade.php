@extends('layouts.templates')

@section('title','Home Page')

@section('partials.navbar')

@section('content')

<h2 class="text-center pt-4">Product Catalog</h2>

<div id="card-product" class="row">

</div>


<script>
    $.ajax({
        url: "http://127.0.0.1:8000/api/products",
        method: "GET",
        dataType: "json",
        success: response => {
            let listProduct = response.data
            let html = ""
            let index = 0
            for (let product of listProduct){
                html += `
                <div class="col-3 container d-flex justify-content-center mt-4">
                    <figure class="card card-product-grid card-lg"> <a href="#" class="img-wrap text-center" data-abc="true"> <img src="${product.picture}" width="200" class="p-2"> </a>
                        <div>
                            <div class="row pt-2">
                                <h5 class="text-center">Product : ${product.name}</h5>
                            </div>
                        </div>
                        <div>
                            <div class="row px-4 text-center">
                                <h6>Description : </h6>
                                <p class="text-secondary">${product.description}</p>
                            </div>
                        </div>
                        <div>
                            <div class="row">
                                <p class="text-center">Category : ${product.category.name}</p>
                            </div>
                        </div>
                        <div>
                            <div class="row">
                                <p class="text-center">Price : $ ${product.price}</p>
                            </div>
                        </div>
                    </figure>
                </div>`
            }
            html = $.parseHTML(html)
            $("#card-product").append(html)
        }
    })
    
</script>  

@endsection