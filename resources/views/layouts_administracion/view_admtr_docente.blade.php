@extends('layouts_sisccc.pagsis_docentes')
@section('titulo','Administración Docente')
@section('usuccc')
{{ $usuactivo }}
@endsection
@section('usuico')
<i class="fa fa-graduation-cap fa-2x"></i>
@endsection
@section('usuico-peq')
<i class="fa fa-graduation-cap fa-lg"></i>
@endsection

@section('sis_menu_lateral')
@include('layouts_administracion.partials.menu')   
@endsection	

@section('sis_contenido')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">    	
    <!-- Content Header (Page header) -->
    <section class="content-header">      
        <h1>
            Escritorio           
        </h1>
        <ol class="breadcrumb">
            <li><a href="/dirección/"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Listado de Docentes</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="row">
            <section class="col-lg-4 connectedSortable ui-sortable">
                <div class="box box-primary">
                    <div class="box-header ui-sortable-handle" style="cursor: move;">
                        <i class="fa fa-comments-o"></i>

                        <h3 class="box-title">Docentes - Sección</h3>

                    </div>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>N°</th>
                                <th>Profesor</th>                                
                                <th>C.V.</th>                                                                        
                            </tr>
                        </thead>                                                   
                        <tbody>
                            <?php $aux = 1 ?>
                            @foreach($l1 as $Prof1)
                            <tr>
                                <td>{{ $aux++ }}</td>                                                                         
                                <td>
                                    <div class="col-md-3">                                            
                                            <?php echo sis_ccc\libreriaCCC\fncCCC::getAvatar($Prof1->id, 35) ?>
                                    </div>
                                    <div class="col-md-8 text-left">
                                        <span class="nomProf">{{ $Prof1->nombre }}</span><br/> 
                                        <span class="apeProf">{{ $Prof1->ape_paterno }} {{ $Prof1->ape_materno }}</span>
                                    </div>    
                                </td>
                                <td>
                                    <button>
                                    @if(($Prof1->libreta!='') || ($Prof1->libreta!=null))
                                    <a href="{{ $Prof1->libreta }}" target="_blank"><i class="fa fa-file-text fa-lg" aria-hidden="true"></i></a>                                         
                                    @else
                                        <i class="fa fa-file-text fa-lg" aria-hidden="true" title="no disponible" disable></i>                                         
                                    @endif 
                                    </button>
                                    <button type="button" class="btn btn-facebook"
                                                    data-toggle="modal" 
                                                    data-target="#infProf" 
                                                    data-usuario="{{ $Prof1->nombre }}"
                                                    data-profesor="{{ $Prof1->ape_paterno }} {{ $Prof1->ape_materno }}">
                                                <i class="fa fa-info fa-fw" aria-hidden="true"></i></button>
                                </td>
                            </tr>
                            @endforeach  

                            </tbody>
                    </table>
                </div> 
            </section>

            <section class="col-lg-4 connectedSortable ui-sortable">
                <div class="box box-success">
                    <div class="box-header ui-sortable-handle" style="cursor: move;">
                        <i class="fa fa-comments-o"></i>

                        <h3 class="box-title">Docentes - Primaria</h3>

                    </div>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>N°</th>
                                <th>Profesor</th>                                
                                <th>C.V.</th>                                                                        
                            </tr>
                        </thead>
                        <?php $aux = 1 ?>
                            @foreach($l2 as $Prof1)
                            <tr>
                                <td>{{ $aux++ }}</td>                                                                         
                                <td>
                                    <div class="col-md-3">                                            
                                            <?php echo sis_ccc\libreriaCCC\fncCCC::getAvatar($Prof1->id, 35) ?>
                                    </div>
                                    <div class="col-md-8 text-left">
                                        <span class="nomProf">{{ $Prof1->nombre }}</span><br/>
                                        <span class="apeProf">{{ $Prof1->ape_paterno }} {{ $Prof1->ape_materno }}</span>
                                    </div>    
                                </td>
                                <td>
                                    <button>
                                    @if(($Prof1->libreta!='') || ($Prof1->libreta!=null))
                                    <a href="{{ $Prof1->libreta }}" target="_blank"><i class="fa fa-file-text fa-lg" aria-hidden="true"></i></a>                                         
                                    @else
                                        <i class="fa fa-file-text fa-lg" aria-hidden="true" title="no disponible" disable></i>                                         
                                    @endif 
                                    </button> 
                                    <button type="button" class="btn btn-facebook"
                                                    data-toggle="modal" 
                                                    data-target="#infProf" 
                                                    data-usuario="{{ $Prof1->nombre }}"
                                                    data-profesor="{{ $Prof1->ape_paterno }} {{ $Prof1->ape_materno }}">
                                                <i class="fa fa-info fa-fw" aria-hidden="true"></i></button>                                                                      
                                </td>
                            </tr>
                            @endforeach  

                            </tbody>
                    </table>
                </div> 
            </section>

            <section class="col-lg-4 connectedSortable ui-sortable ">
                <div class="box box-info">
                    <div class="box-header ui-sortable-handle" style="cursor: move;">
                        <i class="fa fa-comments-o"></i>

                        <h3 class="box-title">Docentes - Secundaria</h3>

                    </div>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>N°</th>
                                <th>Profesor</th>                                
                                <th>C.V.</th>                                                                        
                            </tr>
                        </thead>
                        <?php $aux = 1 ?>
                            @foreach($l3 as $Prof1)
                            <tr>
                                <td>{{ $aux++ }}</td>                                                                         
                                <td>
                                    <div class="col-md-3">                                            
                                            <?php echo sis_ccc\libreriaCCC\fncCCC::getAvatar($Prof1->id, 35) ?>
                                    </div>
                                    <div class="col-md-8 text-left">
                                    <span class="nomProf">{{ $Prof1->nombre }}</span><br/>
                                    <span class="apeProf">{{ $Prof1->ape_paterno }} {{ $Prof1->ape_materno }}</span>
                                    </div>    
                                </td>
                                <td>                                    
                                    <button>
                                    @if(($Prof1->libreta!='') || ($Prof1->libreta!=null))
                                    <a href="{{ $Prof1->libreta }}" target="_blank"><i class="fa fa-file-text fa-lg" aria-hidden="true"></i></a>                                         
                                    @else
                                        <i class="fa fa-file-text fa-lg" aria-hidden="true" title="no disponible" disable></i>                                         
                                    @endif 
                                    </button> 
                                    <button type="button" class="btn btn-facebook"
                                                    data-toggle="modal" 
                                                    data-target="#infProf" 
                                                    data-usuario="{{ $Prof1->nombre }}"
                                                    data-profesor="{{ $Prof1->ape_paterno }} {{ $Prof1->ape_materno }}">
                                                <i class="fa fa-info fa-fw" aria-hidden="true"></i></button>
                                </td>

                            </tr>
                            @endforeach  

                            </tbody>
                    </table>
                </div> 
            </section>


        </div>

        <div class="row">
            <section class="col-lg-6 connectedSortable ui-sortable">
                <div class="box box-title">
                    <div class="box-header ui-sortable-handle" style="cursor: move;">
                        <i class="fa fa-comments-o"></i>

                        <h3 class="box-title">Docentes - Taller Inicial</h3>

                    </div>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>N°</th>
                                <th>Profesor</th>                                
                                <th>C.V.</th>                                                                        
                            </tr>
                        </thead>
                        <?php $aux = 1 ?>
                            @foreach($l4 as $Prof1)
                            <tr>
                                <td>{{ $aux++ }}</td>                                                                         
                                <td>
                                    <div class="col-md-3">                                            
                                            <?php echo sis_ccc\libreriaCCC\fncCCC::getAvatar($Prof1->id, 35) ?>
                                    </div>
                                    <div class="col-md-8 text-left">
                                    <span class="nomProf">{{ $Prof1->nombre }}</span><br/>
                                    <span class="apeProf">{{ $Prof1->ape_paterno }} {{ $Prof1->ape_materno }}</span>
                                    </div>    
                                </td>

                                <td>                                    
                                <button>
                                    @if(($Prof1->libreta!='') || ($Prof1->libreta!=null))
                                    <a href="{{ $Prof1->libreta }}" target="_blank"><i class="fa fa-file-text fa-lg" aria-hidden="true"></i></a>                                         
                                    @else
                                        <i class="fa fa-file-text fa-lg" aria-hidden="true" title="no disponible" disable></i>                                         
                                    @endif 
                                    </button>
                                        <button type="button" class="btn btn-facebook"
                                                    data-toggle="modal" 
                                                    data-target="#infProf" 
                                                    data-usuario="{{ $Prof1->nombre }}"
                                                    data-profesor="{{ $Prof1->ape_paterno }} {{ $Prof1->ape_materno }}">
                                                <i class="fa fa-info fa-fw" aria-hidden="true"></i></button> 
                                </td>
                            </tr>
                            @endforeach  

                            </tbody>
                    </table>
                </div> 
            </section>

            <section class="col-lg-6 connectedSortable ui-sortable">
                <div class="box box-danger">
                    <div class="box-header ui-sortable-handle" style="cursor: move;">
                        <i class="fa fa-comments-o"></i>

                        <h3 class="box-title">Docentes - Sin Asignación</h3>

                    </div>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>N°</th>
                                <th>Profesor</th>                               
                                <th>C.V.</th>                                                                        
                            </tr>
                        </thead>
                        <?php $aux = 1 ?>
                            @foreach($l0 as $Prof1)
                            <tr>
                                <td>{{ $aux++ }}</td>                                                                         
                                <td>
                                    <div class="col-md-3">                                            
                                            <?php echo sis_ccc\libreriaCCC\fncCCC::getAvatar($Prof1->id, 35) ?>
                                    </div>
                                    <div class="col-md-8 text-left">
                                    <span class="nomProf">{{ $Prof1->nombre }}</span><br/>
                                    <span class="apeProf">{{ $Prof1->ape_paterno }} {{ $Prof1->ape_materno }}</span>
                                    </div>    
                                </td>
                                <td>                                    
                                <button>
                                    @if(($Prof1->libreta!='') || ($Prof1->libreta!=null))
                                    <a href="{{ $Prof1->libreta }}" target="_blank"><i class="fa fa-file-text fa-lg" aria-hidden="true"></i></a>                                         
                                    @else
                                        <i class="fa fa-file-text fa-lg" aria-hidden="true" title="no disponible" disable></i>                                         
                                    @endif 
                                    </button>                                       
                                        <button type="button" class="btn btn-facebook"
                                                    data-toggle="modal" 
                                                    data-target="#infProf" 
                                                    data-usuario="{{ $Prof1->nombre }}"
                                                    data-profesoresor="{{ $Prof1->ape_paterno }} {{ $Prof1->ape_materno }}">
                                                <i class="fa fa-info fa-fw" aria-hidden="true"></i></button>

                                    </td>
                            </tr>
                            @endforeach  
                            </tbody>
                    </table>
                </div> 
            </section>
        </div>
    </section>
</div>
<div class="modal fade" id="infProf" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 id="exampleModalLabel"><i class="fa fa-graduation-cap" aria-hidden="true"></i> <label class="modal-title"></label></h4>
                </div>
                <div class="modal-body">

                    <ul class="list-group">
                        <li>CI:</li>
                        <li>Dirección:</li>
                        <li>Teléfono:</li>
                        <li>Año de Antiguedad</li>
                        <li>Curso:</li>                        
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>  

                </div>
            </div>
        </div>
    </div>

    <!-- /.content -->

</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
    {!! Html::footer('siscccConfig.pie') !!}
</footer>
@endsection

@section('menu-configuracion')
<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
        <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home">1</i></a></li>      
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
        <!-- Home tab content -->
        <div class="tab-pane" id="control-sidebar-home-tab">
            <h3 class="control-sidebar-heading">Actividades Recientes</h3>
        </div>
    </div>
</aside>
<!-- /.control-sidebar -->
<!-- Add the sidebar's background. This div must be placed
     immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
@endsection	
