
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
   
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
                    <!-- Start here.... -->
                    <!-- ========== Page Title Start ========== -->
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('locationgrid.store') }}" method="POST">
                                @csrf
                
                                <div class="mb-3">
                                    <label for="name" class="form-label">{{ __('messages.title') }}</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                
                                <div class="mb-3">
                                    <label for="description" class="form-label">{{ __('messages.description') }}</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">{{ __('messages.submit') }}</button>
                                <a href="/location-grid" class="btn btn-secondary">{{ __('messages.cancel') }}</a>
                          
                            </form>
                        </div>
                    </div>
                    <!-- ========== Page Title End ========== -->

               </div>
 @endsection