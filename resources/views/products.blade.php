@extends('layouts.templates')

@section('title','Products Page')

@section('partials.navbar')

@section('content')

   

    <body>

        <h5 class="text-center py-4">Manage Products</h5>
        <div class="container">
            <div class="row">
              <div class="col-12">
                <a href="{{ route('addproduct') }}"><button class="btn btn-primary">Add Products</button></a>
                  <table class="table table-image">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Picture</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Description</th>
                        <th scope="col">Categories</th>
                        <th scope="col" class="text-center">Action</th>
                      </tr>
                    </thead>
                    <tbody id="tabel-pengguna">
                        
                    </tbody>
                  </table>   
              </div>
            </div>
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
                            <tr>
                            <td>${++index}</td>
                            <td><img src=${product.picture} width=50px height=50px></td> 
                            <td>${product.name}</td>
                            <td>${product.price}</td>
                            <td>${product.description}</td>
                            <td>${product.category.name}</td>
                                
                            </td>
    
                            <td class="text-center">
                            <a href= "/products/${product.id}">
                            <button class="btn btn-warning">Detail</button>
                            </a>
                            <a href= "/editproduct/${product.id}">
                            <button class="btn btn-success">Edit</button>
                            </a>
                            <button class="btn btn-danger" onclick="deleteProduk(${product.id})">Delete</button>
                            </td>
                            </tr>`
                }
                html = $.parseHTML(html)
                $("#tabel-pengguna").append(html)
            }
        })
        
        function deleteProduk(id){
            $.ajax({
                url: `http://127.0.0.1:8000/api/products/${id}/delete`,
                method : "POST",
                dataType : "json",
                success : _ => {
                    console.log("SUCCESS")
                    window.location.href = ""
                }
            })
        }
    </script>   
    </body>

@endsection