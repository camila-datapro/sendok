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
                                       <h3 class="mb-0 font-weight-semibold" id="creadas_total">{{ intval($propuestas_total[0]->est) }}</h3>
                                       <h5 class="mb-0 font-weight-medium text-primary">Total de</h5>
                                       <p class="mb-0 font-weight-medium text-primary">propuestas creadas</p>
                                    </div>
                                    <div class="wrapper my-auto ml-auto ml-lg-4">
                                       <canvas height="50" width="100" id="stats-line-graph-1"></canvas>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-lg-3 col-md-6 mt-md-0 mt-4">
                                 <div class="d-flex">
                                    <div class="wrapper">
                                       <h3 class="mb-0 font-weight-semibold" id="enviadas_total">{{ intval($propuestas_enviadas[0]->est) }}</h3>
                                       <h5 class="mb-0 font-weight-medium text-primary">Total de</h5>
                                       <p class="mb-0 font-weight-medium text-primary">propuestas enviadas</p>
                                    </div>
                                    <div class="wrapper my-auto ml-auto ml-lg-4">
                                       <canvas height="50" width="100" id="stats-line-graph-2"></canvas>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-lg-3 col-md-6 mt-md-0 mt-4">
                                 <div class="d-flex">
                                    <div class="wrapper">
                                       <h3 class="mb-0 font-weight-semibold" id="creadas_30">{{ intval($propuestas_30_dias[0]->est) }}</h3>
                                       <h5 class="mb-0 font-weight-medium text-primary">Propuestas creadas</h5>
                                       <p class="mb-0 font-weight-medium text-primary">en los últimos 30 días</p>
                                    </div>
                                    <div class="wrapper my-auto ml-auto ml-lg-4">
                                       <canvas height="50" width="100" id="stats-line-graph-3"></canvas>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-lg-3 col-md-6 mt-md-0 mt-4">
                                 <div class="d-flex">
                                    <div class="wrapper">
                                       <h3 class="mb-0 font-weight-semibold" id="enviadas_30">{{ intval($enviadas_30_dias[0]->est) }}</h3>
                                       <h5 class="mb-0 font-weight-medium text-primary">Propuestas enviadas</h5>
                                       <p class="mb-0 text-muted">en los últimos 30 días</p>
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
   

                  <div class="col-md-4 grid-margin stretch-card">
                     <div class="card">
                        <div class="card-body d-flex flex-column">
                           <div class="wrapper">
                           <h4 class="card-title mb-0">Gráfico de torta</h4>
                              <id id="pie-chart-legend" class="mr-4"><div class="chartjs-legend"><ul><li><span style="background-color:#54C3BE"></span>Enviadas</li><li><span style="background-color:#EF726F"></span>Pendientes</li></ul></div></id>
                           </div>
                           <canvas class="my-auto chartjs-render-monitor" id="pieChart" height="191" width="442" style="display: block; width: 442px; height: 191px;"></canvas>
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
      <script src="{{ asset('/js/charts.js') }}"></script>
   </body>
</html>
@endsection