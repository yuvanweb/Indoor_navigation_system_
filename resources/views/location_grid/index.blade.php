
@extends('master.layout')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="mb-0 fw-semibold">{{ __('messages.airportlocationgrids') }}</h4>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">{{ __('messages.pages') }}</a></li>
                    <li class="breadcrumb-item active">{{ __('messages.airportlocationgrids') }}</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="row justify-content-between align-items-center mb-4">
        <div class="col-md-6">
            <h1></h1>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('businesscategories.create') }}" class="btn btn-primary">{{ __('messages.create_new_location_grid') }}</a>
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
                                       <th scope="col">{{ __('messages.title') }}</th>
                                       <th scope="col">{{ __('messages.description') }}</th>
                                     
                                       <th scope="col">{{ __('messages.action') }}</th>
                                  </tr>
                             </thead>
                             <tbody>
                                @foreach($categories as $category)
                                  <tr>
                                      
                                       <td> {{ $category->id }} </td>
                                       <td>{{ $category->name }}</td>
                                       <td>{{ $category->description }}</td>
                                       <td> {{-- <a href="{{ route('businesscategories.show', $category->id) }}" class="btn btn-info btn-sm">View</a> --}}
                                       <a href="/location-grid-edit/{{$category->id}}" class="btn btn-primary btn-sm">Edit</a>
                                      
                                          
                                           <a href="/location-grid-delete/{{$category->id}}"  class="btn btn-danger btn-sm" >Delete</a>
                                      
                                      </td>
                                  </tr>
                                  @endforeach
                             </tbody>
                        </table>
                   </div>    
                    <!-- ========== Page Title End ========== -->

               </div>
 @endsection