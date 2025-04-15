
@extends('master.layout')

@section('content')

<div class="container-fluid">
  
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="mb-0 fw-semibold">{{ __('messages.indoorlocationmapping') }}</h4>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">{{ __('messages.pages') }}</a></li>
                    <li class="breadcrumb-item active">{{ __('messages.floor_list') }}</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="row justify-content-between align-items-center mb-4">
        <div class="col-md-6">
            <h1></h1>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('maps.create') }}" class="btn btn-primary">{{ __('messages.create_new_floor_plan') }}</a>
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
                        <table  id ="example" class="table table-striped table-borderless table-centered">
                             <thead class="table-light">
                                  <tr>
                                       
                                       <th scope="col">#</th>
                                       <th scope="col">{{ __('messages.floor_name') }}</th>
                                       <th scope="col">{{ __('messages.image') }}</th>
                                     
                                       <th scope="col">{{ __('messages.action') }}</th>
                                  </tr>
                             </thead>
                             <tbody>
                                @foreach($categories as $category)
                                  <tr>
                                      
                                       <td> {{ $category->id }} </td>
                                       <td>{{ $category->name }}</td>
                                       <td><img src="/storage/{{ $category->image_path }}" alt="" class="avatar-md rounded border border-light border-3"></td>
                                       <td> <a href="/maps-view/{{ $category->id }}" class="btn btn-info btn-sm">View</a>
                                       <a href="/maps-edit/{{$category->id}}" class="btn btn-primary btn-sm">Edit</a>
                                      
                                          
                                           <a href="/maps-delete/{{$category->id}}"  class="btn btn-danger btn-sm" >Delete</a>
                                      
                                      </td>
                                  </tr>
                                  @endforeach
                             </tbody>
                        </table>
                   </div>    
                    <!-- ========== Page Title End ========== -->

               </div>
 @endsection