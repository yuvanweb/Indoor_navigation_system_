
@extends('master.layout')

@section('content')

<div class="container-fluid">
  
  <div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="mb-0 fw-semibold">{{ __('messages.indoorlocationmapping') }}</h4>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">{{ __('messages.pages') }}</a></li>
                <li class="breadcrumb-item active">{{ __('messages.add_shop') }}</li>
            </ol>
        </div>
    </div>
</div>
    <div class="row justify-content-between align-items-center mb-4">
        <div class="col-md-6">
            <h1>{{ __('messages.add_shop') }}</h1>
        </div>
        <div class="col-md-6 text-end">
          
        </div>
    </div>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<form action="{{ route('shops.store') }}" method="POST">
  @csrf


  <label> {{ __('messages.select_floor') }}</label> 
  <select  name="map_id"  class="form-control" required>
    <option value="">Select Floor</option>
  @foreach ($map as $mp)
  <option value="{{$mp->id}}">{{$mp->name}}</option>
  @endforeach

</select>
 

  <br> <br> 
  
  
  <label>  {{ __('messages.select_category') }}  </label> 
  <select  name="cat_id"  class="form-control" required>
    <option value="">Select Category</option>
  @foreach ($categories as $ct)
  <option value="{{$ct->id}}">{{$ct->name}}</option>
  @endforeach

</select>
 

  <br> <br>
  
  
  <label> {{ __('messages.select_grid') }}</label>
  <select  name="grid_id"  class="form-control" required>
    <option value="">Select Location Grid</option>
  @foreach ($locationgrid as $lg)
  <option value="{{$lg->id}}">{{$lg->name}}</option>
  @endforeach

</select>
 

  <br> <br> 
  
  <label> {{ __('messages.shop_name') }}</label>
  <input type="text" name="name" class="form-control" required>
  
  <br> <br> 
   <label>{{ __('messages.x_coordinate') }}</label>
  <input type="text" name="x_coordinate" class="form-control" required> 
  
  <br> <br>  <label>{{ __('messages.y_coordinate') }}</label>
  <input type="text" name="y_coordinate" class="form-control" required>

  
  <button  class="btn btn-secondary" type="submit">{{ __('messages.submit') }}</button>
</form>


</div>
@endsection