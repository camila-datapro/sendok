@extends('layouts.menu_lateral')
@section('headers')
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Sendok</title>
      <link rel="stylesheet" href="{{ asset('/assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css') }}">
      <link rel="stylesheet" href="{{ asset('/assets/vendors/iconfonts/ionicons/css/ionicons.css') }}">
      <link rel="stylesheet" href="{{ asset('/assets/vendors/iconfonts/typicons/src/font/typicons.css') }}">
      <link rel="stylesheet" href="{{ asset('/assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css') }}">
      <link rel="stylesheet" href="{{ asset('/assets/vendors/css/vendor.bundle.base.css') }}">
      <link rel="stylesheet" href="{{ asset('/assets/vendors/css/vendor.bundle.addons.css') }}">
      <link rel="stylesheet" href="{{ asset('/assets/css/shared/style.css') }}">
      <link rel="stylesheet" href="{{ asset('/assets/css/demo_1/style.css') }}">
      <link rel="shortcut icon" href="{{ asset('/assets/images/favicon.png') }}" />
   </head>
   @endsection
   @section('body1')
   <body>
      <div class="container-scroller">
         <!-- partial:partials/_navbar.html -->
         @endsection
         @section('body2')
         <!-- partial -->
         <div class="main-panel">
            <div class="content-wrapper">
               <!-- Page Title Header Starts-->
               <div class="row page-title-header">
                  <div class="col-12">
                     <div class="page-header">
                        <h4 class="page-title">Estadísticas</h4>
                     </div>
                  </div>
               </div>
               <!-- inicio row-->
               <!-- Page Title Header Ends-->
               <div class="row">
                  <div class="col-md-12 grid-margin">
                     <div class="card">
                        <div class="card-body">
                           <div class="row">
                              <div class="col-lg-3 col-md-6">
                                 <div class="d-flex">
                                    <div class="wrapper">
                                       <h3 class="mb-0 font-weight-semibold">32,451</h3>
                                       <h5 class="mb-0 font-weight-medium text-primary">Visits</h5>
                                       <p class="mb-0 text-muted">+14.00(+0.50%)</p>
                                    </div>
                                    <div class="wrapper my-auto ml-auto ml-lg-4">
                                       <canvas height="50" width="100" id="stats-line-graph-1"></canvas>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-lg-3 col-md-6 mt-md-0 mt-4">
                                 <div class="d-flex">
                                    <div class="wrapper">
                                       <h3 class="mb-0 font-weight-semibold">15,236</h3>
                                       <h5 class="mb-0 font-weight-medium text-primary">Impressions</h5>
                                       <p class="mb-0 text-muted">+138.97(+0.54%)</p>
                                    </div>
                                    <div class="wrapper my-auto ml-auto ml-lg-4">
                                       <canvas height="50" width="100" id="stats-line-graph-2"></canvas>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-lg-3 col-md-6 mt-md-0 mt-4">
                                 <div class="d-flex">
                                    <div class="wrapper">
                                       <h3 class="mb-0 font-weight-semibold">7,688</h3>
                                       <h5 class="mb-0 font-weight-medium text-primary">Conversation</h5>
                                       <p class="mb-0 text-muted">+57.62(+0.76%)</p>
                                    </div>
                                    <div class="wrapper my-auto ml-auto ml-lg-4">
                                       <canvas height="50" width="100" id="stats-line-graph-3"></canvas>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-lg-3 col-md-6 mt-md-0 mt-4">
                                 <div class="d-flex">
                                    <div class="wrapper">
                                       <h3 class="mb-0 font-weight-semibold">1,553</h3>
                                       <h5 class="mb-0 font-weight-medium text-primary">Downloads</h5>
                                       <p class="mb-0 text-muted">+138.97(+0.54%)</p>
                                    </div>
                                    <div class="wrapper my-auto ml-auto ml-lg-4">
                                       <canvas height="50" width="100" id="stats-line-graph-4"></canvas>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!--fin row-->
               <!-- inicio row-->
               <div class="row">
                  <div class="col-md-8 grid-margin stretch-card">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="card-title mb-0">Sales Statistics Overview</h4>
                           <div class="d-flex flex-column flex-lg-row">
                              <p>Lorem ipsum is placeholder text commonly used</p>
                              <ul class="nav nav-tabs sales-mini-tabs ml-lg-auto mb-4 mb-md-0" role="tablist">
                                 <li class="nav-item">
                                    <a class="nav-link active" id="sales-statistics_switch_1" data-toggle="tab" role="tab" aria-selected="true">1D</a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link" id="sales-statistics_switch_2" data-toggle="tab" role="tab" aria-selected="false">5D</a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link" id="sales-statistics_switch_3" data-toggle="tab" role="tab" aria-selected="false">1M</a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link" id="sales-statistics_switch_4" data-toggle="tab" role="tab" aria-selected="false">1Y</a>
                                 </li>
                              </ul>
                           </div>
                           <div class="d-flex flex-column flex-lg-row">
                              <div class="data-wrapper d-flex mt-2 mt-lg-0">
                                 <div class="wrapper pr-5">
                                    <h5 class="mb-0">Total Cost</h5>
                                    <div class="d-flex align-items-center">
                                       <h4 class="font-weight-semibold mb-0">15,263</h4>
                                       <small class="ml-2 text-gray d-none d-lg-block"><b>89.5%</b> of 20,000 Total</small>
                                    </div>
                                 </div>
                                 <div class="wrapper">
                                    <h5 class="mb-0">Total Revenue</h5>
                                    <div class="d-flex align-items-center">
                                       <h4 class="font-weight-semibold mb-0">$753,098</h4>
                                       <small class="ml-2 text-gray d-none d-lg-block"><b>10.5%</b> of 20,000 Total</small>
                                    </div>
                                 </div>
                              </div>
                              <div class="ml-lg-auto" id="sales-statistics-legend"></div>
                           </div>
                           <canvas class="mt-5" height="120" id="sales-statistics-overview"></canvas>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-4 grid-margin stretch-card">
                     <div class="card">
                        <div class="card-body d-flex flex-column">
                           <div class="wrapper">
                              <h4 class="card-title mb-0">Net Profit Margin</h4>
                              <p>Started collecting data from February 2019</p>
                              <div class="mb-4" id="net-profit-legend"></div>
                           </div>
                           <canvas class="my-auto mx-auto" height="250" id="net-profit"></canvas>
                        </div>
                     </div>
                  </div>
               </div>
               <!--fin row-->
            </div>
         </div>
      </div>
      <script src="{{ asset('/assets/vendors/js/vendor.bundle.base.js') }}"></script>
      <script src="{{ asset('/assets/vendors/js/vendor.bundle.addons.js') }}"></script>
      <script src="{{ asset('/assets/js/shared/off-canvas.js') }}"></script>
      <script src="{{ asset('/assets/js/shared/misc.js') }}"></script>
      <script src="{{ asset('/assets/js/demo_1/dashboard.js') }}"></script>
   </body>
</html>
@endsection