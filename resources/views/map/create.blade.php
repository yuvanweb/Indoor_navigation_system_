
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
<form action="{{ route('maps.store') }}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="mb-3">
    <label for="simpleinput" class="form-label">Map Name:</label>
    <input class="form-control" type="text" name="name" required>
</div>
 

<div class="mb-3">
    <label for="simpleinput" class="form-label">Upload Map Image:</label>
    <input class="form-control" type="file" name="image" required>
</div>

 
<div class="mb-3">
  <button class="btn btn-secondary" type="submit">Upload Map</button>
</div>
  

</form>
</div>

</div>
<div class="col-md-2"></div>
</div>



   
<!-- ========== Page Title End ========== -->

</div>
@endsection