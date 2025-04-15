<!DOCTYPE html>
<html lang="en">

<head>
     <!-- Title Meta -->
     <meta charset="utf-8" />
     <title>Smart Trally| Login</title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="description" content="A fully responsive premium admin dashboard template, Real Estate Management Admin Template" />
     <meta name="author" content="Techzaa" />
     <meta http-equiv="X-UA-Compatible" content="IE=edge" />

     <!-- App favicon -->
     <link rel="shortcut icon" href="/admin-template/dist/assets/images/favicon.ico">

     <!-- Vendor css (Require in all Page) -->
     <link href="/admin-template/dist/assets/css/vendor.min.css" rel="stylesheet" type="text/css" />

     <!-- Icons css (Require in all Page) -->
     <link href="/admin-template/dist/assets/css/icons.min.css" rel="stylesheet" type="text/css" />

     <!-- App css (Require in all Page) -->
     <link href="/admin-template/dist/assets/css/app.min.css" rel="stylesheet" type="text/css" />

     <!-- Theme Config js (Require in all Page) -->
     <script src="/admin-template/dist/assets/js/config.min.js"></script>
</head>

<body class="authentication-bg">

     <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
          <div class="container">
               <div class="row justify-content-center">
                    <div class="col-xl-6">
                         <div class="card auth-card">
                              <div class="card-body p-0">
                                <img width="200" height="100" src="https://www.istudiotech.in/wp-content/uploads/2019/05/web-design-company-in-chennai-istudio-logo.png" class="rounded mx-auto d-block" alt="web-design-company-in-chennai-istudio-logo">
                                     
                                   <div class="row align-items-center g-0">
                                    <div class="col">
                                             <div class="p-4">
                                                  <div class="mx-auto mb-4 text-center">
                                                    <form method="POST" action="{{ route('login') }}">
                                                      @csrf
                                              
                                                      <!-- Email Address -->
                                                      <div class="row">
                                                        <label for="example-email" class="form-label col">Email</label>
                                                          <x-text-input id="email" class="form-control col" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                                                          <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                                      </div>
                                              
                                                      <!-- Password -->
                                                      <div class="row mt-2">
                                                        <label for="example-email" class="form-label col">Password</label>
                                                          <x-text-input id="password" class="col form-control"
                                                                          type="password"
                                                                          name="password"
                                                                          required autocomplete="current-password" />
                                              
                                                          <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                                      </div>
                                              
                                                      <!-- Remember Me -->
                                                      <div class="block mt-4">
                                                          <label for="remember_me" class="inline-flex items-center">
                                                              <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                                                              <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                                          </label>
                                                      </div>
                                              
                                                      <div class="flex items-center justify-end mt-4">
                                                          @if (Route::has('password.request'))
                                                              <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                                                                  {{ __('Forgot your password?') }}
                                                              </a>
                                                          @endif
                                              
                                                         {{--  <x-primary-button class="ms-3">
                                                              {{ __('Log in') }}
                                                          </x-primary-button> --}}
                                                          <button type="submit" class="btn btn-danger">Login</button>
                                                      </div>
                                                  </form>
                                                  </div>
                                             </div>
                                        </div> <!-- end col -->
                                   </div> <!-- end row -->

                              </div> <!-- end card-body -->
                         </div> <!-- end card -->

                    </div> <!-- end col -->
               </div> <!-- end row -->
          </div>
     </div>

     <!-- Vendor Javascript (Require in all Page) -->
     <script src="/admin-template/dist/assets/js/vendor.js"></script>

     <!-- App Javascript (Require in all Page) -->
     <script src="/admin-template/dist/assets/js/app.js"></script>

</body>

</html>