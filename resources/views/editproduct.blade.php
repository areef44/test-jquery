@extends('layouts.templates')

@section('title','Edit Product Page')

@section('partials.navbar')

@section('content')

    {{-- @dd(last(request()->segments())) --}}
    <h5 class="text-center">Edit Products</h5>

    <div class="container py-5">
        <div class="row justify-content-center">
          <div class="col-8">
            <div class="card">
              <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="exampleInputEmail1"> Product Name : </label>
                  <input type="text" id="name" class="form-control" id="exampleInputEmail1" placeholder="Product Name">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Product Price : </label>
                  <input type="number" id="price" class="form-control" placeholder="Product Price">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Product Description : </label>
                  <input type="text" id="description" class="form-control" placeholder="Product Description">
                </div>
                
                <div class="form-group py-2">
                  <label for="exampleInputEmail1">Select Category : </label>
                  <select id="category" id="category">
                   
                      <option value="">==Select==</option>
                   
                  </select>
                  <input type="hidden" id="category_id">
                </div>
                <div>
                  <label for="exampleInputEmail1">Select Picture : </label><br>
                  <input type="file" id="picture" class="mb-4">
                </div>
                <button type="button" onClick="update()" class="btn btn-primary">Send</button>
                <a class="btn btn-danger" href="{{ route('products') }}" role="button" aria-expanded="false" aria-controls="collapseExample">Back</a>
              </form>
              </div>
            </div>
          </div>
        </div>
    
      </div>

      <script>

        id = '{{last(request()->segments())}}';
                    $.ajax({
                        url: "http://127.0.0.1:8000/api/products/"+id,
                        method: "GET",
                        dataType: "json",
                        success: response => {
                            let product = response.data
                            let html = ""
                            let name = $('#name').val(product.name)
                            let image =  $("#image").attr("src",product.picture);
                            let description = $('#description').val(product.description)
                            let price = $('#price').val(product.price)
                            let categories = $('#category_id').val(product.category.id)
                          
                        }
                    })

        $.ajax({
            url: "http://127.0.0.1:8000/api/categories",
            method: "GET",
            dataType: "json",
            success: response => {
                let listCategories = response.data
                let idCategory = $('#category_id').val()
                
                let html = ""
                for (let category of listCategories){
                    html += `<option ${category.id == idCategory ? 'selected' : ''} value="${category.id}">${category.name}</option>`
                }
              
                html = $.parseHTML(html)
                $("#category").append(html)
            }
        })

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });

        function update(){
           
            let name = $("#name").val()
            let price = $("#price").val()
            let description = $("#description").val()
            let category = $("#category").val()
            let picture = $("#picture").prop('files')[0]

            if(name === "") return alert("name is required")
            if(price === "") return alert("price is required")
            if(description === "") return alert("description name is required")
            if(category === "") return alert("category is required")
            // if(poto === "") return alert("foto produk tidak boleh kosong")


            let fd = new FormData();
            fd.append("name",name)
            fd.append("price",price)
            fd.append("description",description)
            fd.append("categories_id",category)
            if (picture) fd.append("picture",picture)
           

            $.ajax({

                url: `http://127.0.0.1:8000/api/products/${id}/edit`,
                method: "POST",
                data: fd,
                processData: false,
                contentType:false,
                success: _ => {
                    window.location.href = "http://127.0.0.1:8001/products"
                }
            })
        }
    </script>   
@endsection