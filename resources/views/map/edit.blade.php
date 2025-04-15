
@extends('master.layout')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="mb-0 fw-semibold">Indoor Location Mapping </h4>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                    <li class="breadcrumb-item active"> Floor wise Layout View</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="row justify-content-between align-items-center mb-4">
        <div class="col-md-6">
            <h1></h1>
        </div>
        <div class="col-md-6 text-end">
          
        </div>
    </div>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
                    <!-- Start here.... -->
                    <!-- ========== Page Title Start ========== -->
                 
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div>
<form action="{{ route('maps.update') }}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="mb-3">
    <label for="simpleinput" class="form-label">Map Name:</label>
    <input class="form-control" type="text" name="name"  value ="{{ $maps[0]->name}}" required>
    <input type="hidden" name="id"  value ="{{ $maps[0]->id}}" >
</div>
 

<div class="mb-3">
    <label for="simpleinput" class="form-label">Upload Map Image:</label>
    <input class="form-control" type="file" id="imgInp"  name="image" value="" required>
</div>


<div class="mb-3">
    <img id="blah" class="mt-3" src="{{ asset('storage/' . $maps[0]->image_path) }}" alt="{{ $maps[0]->name }}" width="500" height="500">
      
</div>

 
<div class="mb-3">
  <button class="btn btn-secondary" type="submit">Upload Map</button>
</div>
  

</form>
</div>

</div>
<div class="col-md-2"></div>
</div>

<script>


imgInp.onchange = evt => {
  const [file] = imgInp.files
  if (file) {
    blah.src = URL.createObjectURL(file)
  }
}
    
</script>

   
<!-- ========== Page Title End ========== -->

</div>
@endsection