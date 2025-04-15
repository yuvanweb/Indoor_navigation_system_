
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
                    <div class="table-responsive">
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div>
            <h3 class="text-center">{{ $maps[0]->name }}</h3>
            <img class="mt-3" src="{{ asset('storage/' . $maps[0]->image_path) }}" alt="{{ $maps[0]->name }}" width="100%">
        </div>

    </div>
    <div class="col-md-2"></div>
</div>

   


</div>    
<!-- ========== Page Title End ========== -->

</div>
@endsection