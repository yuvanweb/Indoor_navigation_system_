<div class="main-nav">
               <!-- Sidebar Logo -->
               <div class="logo-box">
                    <a href="index.html" class="logo-dark">
                         <img src="/admin-template/dist/assets/images/logo-sm.png" class="logo-sm" alt="logo sm">
                         <img src="/admin-template/dist/assets/images/logo-dark.png" class="logo-lg" alt="logo dark">
                    </a>

                    <a href="index.html" class="logo-light">
                         <img src="/admin-template/dist/assets/images/logo-sm.png" class="logo-sm" alt="logo sm">
                         <img src="/admin-template/dist/assets/images/logo-light.png" class="logo-lg" alt="logo light">
                    </a>
               </div>

               <!-- Menu Toggle Button (sm-hover) -->
               <button type="button" class="button-sm-hover" aria-label="Show Full Sidebar">
                    <i class="ri-menu-2-line fs-24 button-sm-hover-icon"></i>
               </button>

               <div class="scrollbar" data-simplebar>

                    <ul class="navbar-nav" id="navbar-nav">

                         <li class="menu-title">Menu</li>

                           

                         <li class="nav-item">
                          <a class="nav-link" href="/dashboard">
                               <span class="nav-icon">
                                <i class="ri-dashboard-2-line"></i>
                               </span>
                               <span class="nav-text"> {{ __('messages.dashboard') }}</span>
                          </a>
                     </li>


                     
               
                         <li class="nav-item">
                              <a class="nav-link" href="/business-categories">
                                   <span class="nav-icon">
                                        <i class="ri-home-office-line"></i>
                                   </span>
                                   <span class="nav-text"> {{ __('messages.business_categories') }}</span>
                              </a>
                         </li> 
                         
                         <li class="nav-item">
                              <a class="nav-link" href="/location-grid">
                                   <span class="nav-icon">
                                    <i class='bx bxs-plane-take-off'></i>
                                   </span>
                                
                                   <span class="nav-text">{{ __('messages.airportlocationgrids') }}</span>
                              </a>
                         </li>  
                         <li class="nav-item">
                          <a class="nav-link menu-arrow" href="#sidebarBlog" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarBlog">
                               <span class="nav-icon">
                                <i class='bx bxs-navigation'></i>
                               </span>
                               <span class="nav-text">{{ __('messages.indoorlocationmapping')}} </span>
                          </a>

                          <div class="collapse" id="sidebarBlog">
                               <ul class="nav sub-navbar-nav">
                                   {{--  <li class="sub-nav-item">
                                         <a class="sub-nav-link" href="#">Add Airport Layout</a>
                                    </li> --}}
                                    <li class="sub-nav-item">
                                         <a class="sub-nav-link" href="/maps">  {{ __('messages.floor_list') }}</a>
                                    </li>    
                                    <li class="sub-nav-item">
                                         <a class="sub-nav-link" href="/shops"> {{ __('messages.shop_list') }}</a>
                                    </li><li class="sub-nav-item">
                                         <a class="sub-nav-link" href="/maps-list"> {{ __('messages.path_list') }}</a>
                                    </li>                           
                               </ul>
                          </div>
                     </li> <!-- end Pages Menu -->

                       
                         <li class="nav-item">
                              <a class="nav-link menu-arrow" href="#sidebarBlog" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarBlog">
                                   <span class="nav-icon">
                                    <i class='bx bxs-navigation'></i>
                                   </span>
                                   <span class="nav-text"> {{ __('messages.select_language') }}</span>
                              </a>
    
                              <div class="collapse" id="sidebarBlog">
                                   <ul class="nav sub-navbar-nav">
                                       {{--  <li class="sub-nav-item">
                                             <a class="sub-nav-link" href="#">Add Airport Layout</a>
                                        </li> --}}
                                        <li class="sub-nav-item">
                                             <a class="sub-nav-link" href="/locale/en"> {{ __('messages.english') }}</a>
                                        </li>    
                                        <li class="sub-nav-item">
                                             <a class="sub-nav-link" href="/locale/fr"> {{ __('messages.french') }} </a>
                                        </li><li class="sub-nav-item">
                                             <a class="sub-nav-link" href="/locale/tn"> {{ __('messages.tamil') }}</a>
                                        </li>                           
                                   </ul>
                              </div>
                         </li> <!-- end Pages Menu -->
                         <li class="nav-item">
                              <a class="nav-link" href="#">
                                   <span class="nav-icon">
                                        <i class="ri-chat-quote-line"></i>
                                   </span>
                                   <span class="nav-text">{{ __('messages.currency') }}</span>
                              </a>
                         </li>

                    </ul>
               </div>
          </div>