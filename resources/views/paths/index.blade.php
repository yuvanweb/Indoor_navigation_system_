@extends('master.layout')

@section('content')

<div class="container-fluid">
  
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="mb-0 fw-semibold">{{ __('messages.indoorlocationmapping') }}</h4>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">{{ __('messages.pages') }}</a></li>
                    <li class="breadcrumb-item active">{{ __('messages.path_list') }}</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="row justify-content-between align-items-center mb-4">
        <div class="col-md-6">
            <h1></h1>
        </div>
        <div class="col-md-6 text-end">
          {{--   <a href="{{ route('shops.create') }}" class="btn btn-primary">{{ __('messages.draw_path') }}</a> --}}
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
                                      
                                       <th scope="col">{{ __('messages.action') }}</th>
                                  </tr>
                             </thead>
                             <tbody>
                                @foreach($map as $sp)
                                  <tr>
                                      
                                       <td> {{ $sp->id }} </td>
                                     
                                       <td>{{ $sp->name }}</td>
                                     
                                       <td> <a href="/maps/{{ $sp->id }}" class="btn btn-info btn-sm">{{ __('messages.draw_path') }}</a>
                                        <a href="/maps/{{ $sp->id }}/show-path" class="btn btn-info btn-sm">{{ __('messages.view_path') }}</a>
                                       <a href="/delete-path/{{$sp->id}}" class="btn btn-primary btn-sm">{{ __('messages.delete_path') }}</a>
                                      
                                          
                                        
                                      
                                      </td>
                                  </tr>
                                  @endforeach
                             </tbody>
                        </table>
                   </div>    
                    <!-- ========== Page Title End ========== -->

               </div>
 @endsection