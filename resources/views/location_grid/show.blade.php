
@extends('master.layout')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="mb-0 fw-semibold">Business Category</h4>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                    <li class="breadcrumb-item active">Business Category</li>
                </ol>
            </div>
        </div>
    </div>
   
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
                    <!-- Start here.... -->
                    <!-- ========== Page Title Start ========== -->
                   
    <div class="card">
        <div class="card-body">
            <div class="mb-3">
                <strong>ID:</strong> {{ $category->id }}
            </div>
            <div class="mb-3">
                <strong>Name:</strong> {{ $category->name }}
            </div>
           
            <div class="mb-3">
                <strong>Description:</strong> {{ $category->description ?? 'N/A' }}
            </div>
           
        </div>
    </div>
                    <!-- ========== Page Title End ========== -->

               </div>
 @endsection