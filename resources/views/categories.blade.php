@extends('layouts.templates')

@section('title','Categories Page')

@section('partials.navbar')

@section('content')

<body>
    <h5 class="text-center py-4">Manage Categories</h5>
    <div class="container">
        <div class="row">
          <div class="col-12">
            <a href="{{ route('addcategories') }}"><button class="btn btn-primary">Add Categories</button></a>
              <table class="table table-image">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
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
        url: "http://127.0.0.1:8000/api/categories",
        method: "GET",
        dataType: "json",
        success: response => {
            let listCategories = response.data
            let html = ""
            let index = 0
            for (let category of listCategories){
                html += `
                        <tr>
                        <td>${++index}</td>
                        <td>${category.name}</td>
                        <td>${category.description}</td> 

                        <td class="text-center">
                        <a href= "/editcategories/${category.id}">
                        <button class="btn btn-success" >Edit</button>
                        </a>

                        <button class="btn btn-danger" onclick="deleteCategory(${category.id})">Delete</button>
                            
                        </td>
                        
                        </tr>`
            }
            html = $.parseHTML(html)
            $("#tabel-pengguna").append(html)
        }
    })
    
    function deleteCategory(id){
        $.ajax({
            url: `http://127.0.0.1:8000/api/categories/${id}/delete`,
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