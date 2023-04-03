@extends('layouts.templates')

@section('title','Halaman Tambah Categories')

@section('partials.navbar')

@section('content')

    {{-- @dd(last(request()->segments())) --}}
    

    <div class="container py-5">
        <div class="row justify-content-center">
          <div class="col-8">
            <div class="card">
            <h5 class="text-center p-1">Add Categories</h5>
              <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="exampleInputEmail1"> Categories Name : </label>
                  <input type="text" id="name" class="form-control" id="exampleInputEmail1" placeholder="Categories Name">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Categories Description : </label>
                  <input type="text" id="description" class="form-control" placeholder="Categories Description">
                </div>
                <div class="my-4">
                    <button type="button" onClick="add()" class="btn btn-primary">Send</button>
                    <a class="btn btn-danger" href="{{ route('categories') }}" role="button" aria-expanded="false" aria-controls="collapseExample">Back</a>
                </div>
                
              </form>
              </div>
            </div>
          </div>
        </div>
    
      </div>

      <script>

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });

        function add(){
            console.log("hilih")
            let name = $("#name").val()
            let description = $("#description").val()

            if(name === "") return alert("nama tidak boleh kosong")
            if(description === "") return alert("description tidak boleh kosong")


            let fd = new FormData();
            fd.append("name",name)
            fd.append("description",description)
           

            $.ajax({

                url: "http://127.0.0.1:8000/api/categories",
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