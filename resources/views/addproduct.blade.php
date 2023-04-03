@extends('layouts.templates')

@section('title','Halaman Tambah Product')

@section('partials.navbar')

@section('content')

    {{-- @dd(last(request()->segments())) --}}
   

    <div class="container py-5">
        <h5 class="text-center">Add Products</h5>
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
                </div>
                <div>
                  <label for="exampleInputEmail1">Select Picture : </label><br>
                  <input type="file" id="picture" class="mb-4">
                </div>
                <button type="button" onClick="add()" class="btn btn-primary">Send</button>
                <a class="btn btn-danger" href="{{ route('products') }}" role="button" aria-expanded="false" aria-controls="collapseExample">Back</a>
              </form>
              </div>
            </div>
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
                for (let category of listCategories){
                    html += `<option value="${category.id}">${category.name}</option>`
                }
                console.log(listCategories)
                html = $.parseHTML(html)
                $("#category").append(html)
            }
        })

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });

        function add(){
            console.log("hilih")
            let name = $("#name").val()
            let price = $("#price").val()
            let description = $("#description").val()
            let category = $("#category").val()
            let picture = $("#picture").prop('files')[0]

            if(name === "") return alert("nama tidak boleh kosong")
            if(price === "") return alert("harga tidak boleh kosong")
            if(description === "") return alert("description produk tidak boleh kosong")
            if(category === "") return alert("kategori produk tidak boleh kosong")
            if(!picture ) return alert("foto produk tidak boleh kosong")


            let fd = new FormData();
            fd.append("name",name)
            fd.append("price",price)
            fd.append("description",description)
            fd.append("categories_id",category)
            fd.append("picture",picture)
           

            $.ajax({

                url: "http://127.0.0.1:8000/api/products",
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