@extends('layouts.templates')

@section('title','Edit Categories Page')

@section('partials.navbar')

@section('content')

    {{-- @dd(last(request()->segments())) --}}
    

    <div class="container py-5">
        <h5 class="text-center">Edit Categories</h5>
        <div class="row justify-content-center">
          <div class="col-8">
            <div class="card">
              <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="exampleInputEmail1"> Category Name : </label>
                  <input type="text" id="name" class="form-control" id="exampleInputEmail1" placeholder="Category Name">
                </div>
        
                <div class="form-group">
                  <label for="exampleInputEmail1">Category Description : </label>
                  <input type="text" id="description" class="form-control" placeholder="Category Description">
                </div>
                <div class="py-4">
                    <button type="button" onClick="update()" class="btn btn-primary">Send</button>
                    <a class="btn btn-danger" href="{{ route('categories') }}" role="button" aria-expanded="false" aria-controls="collapseExample">Back</a>
                </div>
              </form>
              </div>
            </div>
          </div>
        </div>
    
      </div>

      <script>

        id = '{{last(request()->segments())}}';
                    $.ajax({
                        url: "http://127.0.0.1:8000/api/categories/"+id,
                        method: "GET",
                        dataType: "json",
                        success: response => {
                            let categories = response.data
                            let html = ""
                            let name = $('#name').val(categories.name)
                            let description = $('#description').val(categories.description)
                        }
                    })

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });

        function update(){
            let name = $("#name").val()
            let description = $("#description").val()

            if(name === "") return alert("name is required")
            if(description === "") return alert("description is required")


            let fd = new FormData();
            fd.append("name",name)
            fd.append("description",description)

            $.ajax({

                url: `http://127.0.0.1:8000/api/categories/${id}/edit`,
                method: "POST",
                data: fd,
                processData: false,
                contentType:false,
                success: _ => {
                    window.location.href = "http://127.0.0.1:8001/categories"
                }
            })
        }
    </script>   
@endsection