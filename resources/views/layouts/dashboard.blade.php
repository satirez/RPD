@extends('layouts.plane')

@section('body')
<!DOCTYPE html>
<html lang="en">

<head>

  <!-- Custom fonts for this template-->
  <link href="/webcss/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="/webcss/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">BioBerries <sup>BB</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

       <!-- Nav Item -->
       <li class="nav-item">
        <a class="nav-link" href="{{ url ('home') }}">
          <i class="fas fa-fw fa-home"></i>
          <span>Principal</span></a>


      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      
      <!-- Heading -->
      <div class="sidebar-heading">
        Panel Administrativo
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-users"></i>
          <span>Recursos Humanos</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Components:</h6>

            <!-- Usuarios -->
            @can('users.index')
            <a class="collapse-item" href="{{ url ('users') }}">Usuarios</a>

            @endcan
             <!-- Roles -->
             @can('roles.index')
             <a class="collapse-item" href="{{ url ('roles') }}">Roles de usuario</a>

            @endcan
          </div>
        </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Autocompletados</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Utilities:</h6>


            <!-- Isumos -->
            @can('admin.supplies.index')
                <a class="collapse-item" href="{{ url ('supplies') }}">Bandejas</a>
            @endcan

             <!-- Motivos de rechazo -->
            @can('admin.rejecteds.index')
                <a class="collapse-item" href="{{ url ('rejecteds') }}">Rechazos</a>
            @endcan

            <!-- Proveedores -->
            @can('admin.providers.index')
            <a class="collapse-item" href="{{ url ('providers') }}">Productores</a>

            @endcan

             <!-- Quality -->
             @can('admin.providers.index')

            <a class="collapse-item" href="{{ url ('quality') }}">Calidad</a>

            @endcan
            
            <!-- Exportadores -->
            @can('admin.providers.index')

            <a class="collapse-item" href="{{ url ('exporters') }}">Exportadores</a>

            @endcan
             <!-- Tipos Formato -->
            @can('admin.formats.index')
            <a class="collapse-item" href="{{ url ('formats') }}">Formato de Caja</a>

            @endcan
             <!-- Estatus -->
            @can('admin.statuses.index')
                <a class="collapse-item" href="{{ url ('statuses') }}">Estatus de Fruta</a>
            @endcan
         
            <!-- Tipos Frutas -->
            @can('admin.providers.index')
                <a class="collapse-item" href="{{ url ('fruits') }}">Fruta</a>
            @endcan

         <!--  Temporada -->
             @can('admin.providers.index')
                <a class="collapse-item" href="{{ url ('seasons') }}">Temporada</a>
            @endcan

          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Linea Principal
      </div>

      <!-- Nav Item -->
      @can('receptions.index')
      <li class="nav-item">
        <a class="nav-link" href="{{ url ('receptions') }}">
          <i class="fas fa-fw fa-boxes"></i>
          <span>Recepción </span>
          
        </a>  
      </li>
      
      @endcan

         <!-- Nav Item -->
         @can('process.processes.index')

         <li class="nav-item">
          <a class="nav-link" href="{{ url ('processes') }}">
            <i class="fas fa-fw fa-pallet"></i>
            <span>Proceso</span></a>
        </li>

        @endcan

           <!-- Nav Item -->

           @can('dispatch.index')
           <li class="nav-item">
                <a class="nav-link" href="{{ url ('dispatch') }}">
                  <i class="fas fa-fw fa-truck-loading"></i>
                  <span>Despacho</span></a>
              </li>
           @endcan

           
     

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseReport" aria-expanded="true" aria-controls="collapseReport">
          <i class="fas fa-fw fa-book-open"></i>
          <span>Reportes</span>
        </a>
        <div id="collapseReport" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Components:</h6>

            @can('receptions.receptionsdaily')
            <a class="collapse-item" href="{{ url ('receptionsdaily') }}">Diario</a>
            @endcan

             @can('receptions.receptionsperfruit')
             <a class="collapse-item" href="{{ url ('receptionsperfruit') }}">Por Fruta</a>
            @endcan

            @can('receptions.receptionsperproductor')
             <a class="collapse-item" href="{{ url ('receptionsperproductor') }}">Por Productor</a>
            @endcan

          </div>
        </div>
      </li>

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>


          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">      
          

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"> {{ Auth::user()->name }} </span>
                <img class="img-profile rounded-circle" src="https://static05.cminds.com/wp-content/uploads/computer-1331579_1280-1-300x300.png">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
            
                <a class="dropdown-item" 
                        href="{{ url('logout') }}" 
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();" 
                        data-toggle="modal" 
                        data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Salir
                </a>

                <form id="logout-form" 
                    action="{{ url('logout') }}" 
                    method="POST" 
                    style="display: none;">
                    {{ csrf_field() }}
                </form>
                <a >

                     <div class="dropdown-divider"></div>


              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"></h1>
          </div>
            

           <div class="row">  
             @yield('section')
     
          </div>
     


        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; TriBrains 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->


  <!-- Bootstrap core JavaScript-->
  <script src="/webcss/vendor/jquery/jquery.min.js"></script>
  <script src="/webcss/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="/webcss/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="/webcss/js/sb-admin-2.min.js"></script>

</body>

</html>
@stop

