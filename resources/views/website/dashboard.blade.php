
@extends('master.layout')

@section('content')<div class="container-fluid">

                    <!-- Start here.... -->
                    <!-- ========== Page Title Start ========== -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <h4 class="mb-0 fw-semibold">{{ __('messages.welcome_info') }}</h4>
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">{{ __('messages.pages') }}</a></li>
                                    <li class="breadcrumb-item active">{{ __('messages.welcome_info') }}</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- ========== Page Title End ========== -->

                 
               </div>
 @endsection