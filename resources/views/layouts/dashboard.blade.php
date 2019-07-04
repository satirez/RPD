@extends('layouts.plane')

@section('body')
 <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand"  href="{{ url ('/') }}">
                    Software RPD |     
                </a>
                <img src="{{ asset('images/logo.png') }}" width="100" height="100" class="img-responsive" >
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <label >Trabajador en sesión: {{ Auth::user()->name }}</label>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">

                        <!-- Salir -->

                        <li> <a href="{{ url('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out fa-fw"></i> Salir</a>
                        <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="BUSCAR...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li {{ (Request::is('/') ? 'class="active"' : '') }}>
                            <a href="{{ url ('home') }}"><i class="fa fa-home fa-fw"></i> Principal</a>
                        </li>
                        <!-- Usuarios -->
                        @can('users.index')
                        <li {{ (Request::is('/') ? 'class="active"' : '') }}>
                            <a href="{{ url ('users') }}"><i class="fa fa-user fa-fw"></i> Usuarios</a>
                        </li>
                        @endcan
                         <!-- Roles -->
                         @can('roles.index')
                        <li {{ (Request::is('/') ? 'class="active"' : '') }}>
                            <a href="{{ url ('roles') }}"><i class="fa fa-users fa-fw"></i> Roles de usuario</a>
                        </li>
                        @endcan
                        
                         <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i>Panel Administrativo<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                               
                                        <!-- Isumos -->
                                        @can('admin.supplies.index')
                                          <li {{ (Request::is('/') ? 'class="active"' : '') }}>
                                            <a href="{{ url ('supplies') }}"><i class="fa fa-cube"></i> Insumos</a>
                                        </li>
                                        @endcan
                                         <!-- Motivos de rechazo -->
                                        @can('admin.rejecteds.index')
                                          <li {{ (Request::is('/') ? 'class="active"' : '') }}>
                                            <a href="{{ url ('rejecteds') }}"><i class="fa fa-cube"></i> Rechazos</a>
                                        </li>
                                        @endcan

                                        <!-- Proveedores -->
                                        @can('admin.providers.index')
                                          <li {{ (Request::is('/') ? 'class="active"' : '') }}>
                                            <a href="{{ url ('providers') }}"><i class="fa fa-truck"></i> Productores</a>
                                        </li>
                                        @endcan

                                         <!-- Quality -->
                                         @can('admin.providers.index')
                                          <li {{ (Request::is('/') ? 'class="active"' : '') }}>
                                            <a href="{{ url ('quality') }}"><i class="fa fa-check"></i>Calidad</a>
                                        </li>
                                        @endcan
                                        
                                        <!-- Exportadores -->
                                        @can('admin.providers.index')
                                          <li {{ (Request::is('/') ? 'class="active"' : '') }}>
                                            <a href="{{ url ('exporters') }}"><i class="fa fa-truck"></i> Exportadores</a>
                                        </li>
                                        @endcan
                                        
                                     
                                        <!-- Tipos Frutas -->
                                        @can('admin.providers.index')
                                          <li {{ (Request::is('/') ? 'class="active"' : '') }}>
                                            <a href="{{ url ('fruits') }}"><i class="fa fa-tree"></i>Fruta</a>
                                        </li>
                                        @endcan

                                     <!--  Temporada -->
                                     @can('admin.providers.index')
                                          <li {{ (Request::is('/') ? 'class="active"' : '') }}>
                                        <a href="{{ url ('seasons') }}"> <i class="fa fa-sun-o"></i>Temporada</a>       
                                        </li>
                                        @endcan
                                        
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        
                       

                        <!-- Recepción -->
                <li>
                    <a href="#"><i class="fa fa-database"></i> Panel de Recepciones<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                        @can('receptions.index')
                          <li {{ (Request::is('/') ? 'class="active"' : '') }}>
                            <a href="{{ url ('receptions') }}">
                                Recepciones disponibles</a>
                            <a href="{{ url ('inprocess') }}">
                                Recepciones procesadas
                            </a>
                        </li>
                    </ul>
                </li>
                        @endcan

                        <!-- Proceso -->
                        @can('process.processes.index')

                         <li {{ (Request::is('/') ? 'class="active"' : '') }}>
                            <a href="{{ url ('processes') }}"><i class="fa fa-gears fa-fw"></i> Proceso</a>
                        </li>
                        @endcan

                           <!-- Despacho -->
                        @can('dispatch.index')
                        <li {{ (Request::is('/') ? 'class="active"' : '') }}>
                            <a href="{{ url ('dispatch') }}">
                                <i class="fa fa-database" ></i> Despacho</a>
                        </li>
                        @endcan
                        
                        <li>
                            <a href="#"><i class="fa fa-info"></i> Reportes <span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">
                            
                                @can('receptions.reportsdaily')
                                  <li {{ (Request::is('/') ? 'class="active"' : '') }}>

                                    <a href="{{ url ('receptionsdaily') }}">
                                        Reporte Diario</a>

                                    <a href="{{ url ('receptionsperfruit') }}">
                                        Reporte por Fruta
                                    </a>

                                    <a href="{{ url ('receptionsperproductor') }}">
                                        Reporte por productor
                                    </a>
                                </li>
                                @endcan
                            </ul>
                        </li>


                        <!-- Fin -->


                   
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
			 <div class="row">
                <div class="col-lg-12">
                    <br>
                    <br>
                </div>
                <!-- /.col-lg-12 -->
           </div>
			<div class="row">  
				@yield('section')

            </div>

                @section('scripts')
                
                @show
            <!-- /#page-wrapper -->
        </div>
    </div>
@stop

