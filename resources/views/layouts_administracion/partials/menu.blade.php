
@section('sis_menu_lateral')
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <?php 
              $idUsu = sis_ccc\libreriaCCC\fncCCC::getId();
              echo sis_ccc\libreriaCCC\fncCCC::getAvatar($idUsu, 30);         
            ?>
        </div>
            <div class="pull-left info">
                <p>@yield('usuccc')</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Conectado</a>
            </div>
        </div>        
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">            
            <li class="header alert alert-success">
                    <i class="fa fa-archive" aria-hidden="true"></i> Menú de Administración</li>
            <li class="<?php echo ((Route::current()->getName() == 'Admtr.Reg'))? "active":"";?>">
                <a href="{{ route('Admtr.Reg') }}">
                    <i class="fa fa-th"></i> <span>Escritorio</span>            
                </a>
            </li>            
            <li class="treeview <?php echo ((Route::current()->getName() == 'Admtr.Doc'))? "active":"";?>">                
                <a href="#">
                    <i class="fa fa-id-card-o"></i> <span>Plantel Docente</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>                
                <ul class="treeview-menu">
                    @foreach($Niveles as $Nivel)                         
                    <li>
                        <a href="{{ route('Admtr.Reg')}}/profesores/nivel/{{ $Nivel->grd_nivel_id }}"> {{ $Nivel->grd_nivel_nombre }}                            
                        </a> 
                    </li>                            
                    @endforeach
                </ul>
            </li>
            <li class="treeview <?php echo ((Route::current()->getName() == 'Admtr.listalumnos'))? "active":"";?>">
                <a href="#">
                    <i class="fa fa-graduation-cap"></i> <span>Alumnos</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">                    
                    @foreach($Niveles as $Nivel)                         
                    <li>
                        <a href="{{ route('Admtr.Reg')}}/alumnos/nivel/{{ $Nivel->grd_nivel_id }}"> {{ $Nivel->grd_nivel_nombre }}
                            <span class="pull-right-container">
                                <small class="label pull-right bg-green">({{ count($Nivel->Cursos) }})</small>
                            </span>
                        </a> 
                    </li>
                    @endforeach
                    <li>
                        <a href="{{ route('Admtr.listalumnos')}}"> Todos</a> 
                    </li>
                </ul>
            </li>
            <li class="<?php echo ((Route::current()->getName() == 'Admtr.secactividades'))? "active":"";?>">
                <a href="{{ route('Admtr.secactividades') }}">
                    <i class="fa fa-pencil"></i> <span>Secretaria</span> 
                </a>
            </li> 
            <li class="<?php echo ((Route::current()->getName() == 'Admtr.alumcomportamiento'))? "active":"";?>">
                <a href="{{ route('Admtr.alumcomportamiento') }}">
                    <i class="fa fa-book"></i> <span>Regencia</span>            
                </a>
            </li> 
            
            <li class="<?php echo ((Route::current()->getName() == 'Admtr.PsiComp'))? "active":"";?>">
                <a href="{{ route('Admtr.PsiComp') }}">
                    <i class="fa fa-eye" aria-hidden="true"></i> <span>Dep. Psicologico</span>            
                </a>
            </li> 
            <li class="hidden">
                <a href="{{ route('Admtr.agenda') }}">
                    <i class="fa fa-calendar"></i><span>Agenda</span>

                </a>
            </li>
            <hr>
            <li class="<?php echo ((Route::current()->getName() == 'Admtr.cuadSegui'))? "active":"";?>">
                <a href="{{ route('Admtr.cuadSegui') }}">
                    <i class="fa  fa-pencil-square-o"></i> <span>Cuaderno de Seguimiento</span>                    
                </a>
            </li>
            <hr>
            <!-- ********** Menú SUPER Administración *********** -->
            <li class="header alert alert-success">
                <i class="fa fa-star" aria-hidden="true"></i>
                Menú SUPER Administración</li>
           
            <li>
                <a href="#">
                    <i class="fa fa-puzzle-piece" aria-hidden="true"></i> <span>Administracion</span>
                    <span class="pull-right-container">                        
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>                
                <ul class="treeview-menu">                    
                    <li>                        
                        <a href="{{ route('Admtr.Doc')}}" target="Opc1">
                            <i class="fa fa-id-card-o"></i> <span>Docente</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('Admtr.listalumnos')}}" target="Opc1">
                            <i class="fa fa-graduation-cap"></i>  <span>Alumnos</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('Admtr.secactividades') }}" target="Opc1">
                            <i class="fa fa-pencil"></i> <span>Secretaria</span> 
                        </a>
                    </li> 
                    <li>
                        <a href="{{ route('Admtr.alumcomportamiento') }}" target="Opc1">
                            <i class="fa fa-book"></i> <span>Regencia</span>            
                        </a>
                    </li> 
                    
                    <li>
                        <a href="{{ route('Admtr.PsiComp') }}" target="Opc1">
                            <i class="fa fa-eye" aria-hidden="true"></i> <span>Dep. Psicologico</span>            
                        </a>
                    </li> 
                </ul>
            </li>
            <!-- ********** Direccion *********** -->
            <li>
                <a href="#">
                    <i class="fa fa-graduation-cap aria-hidden="true""></i> <span>Dirección</span>
                    <span class="pull-right-container">                        
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>                
                <ul class="treeview-menu">                    
                    <li>
                        <a href="{{route('Dir.Doc')}}" target="Opc2">
                            <i class="fa fa-id-card-o"></i> <span>Plantel Docente</span>                    
                        </a>
                    </li> 
                    <li>
                        <a href="{{ route('Dir.com') }}" target="Opc2">
                            <i class="fa fa-comments-o"></i>  <span>Comunicado</span>                     
                        </a>
                    </li>                                               
                    <li>
                        <a href="{{ route('Dir.actividades') }}" target="Opc2">
                            <i class="fa  fa-calendar-check-o"></i> <span>Cal. de Actividades</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('Dir.lib')}}" target="Opc2">
                            <i class="fa fa-file-text"></i> <span>Libretas</span>                              
                        </a>
                    </li>
                </ul>
            </li>                        
            <!-- ********** Contador *********** -->
            <li>
                <a href="{{ route('Cont.Reg') }}" target="Opc3">
                    <i class="fa fa-calculator" aria-hidden="true"></i> <span>Contador</span> 
                </a>
            </li> 
            <hr />
            <!-- ********** Secretaria *********** -->
            <li>
                <a href="#">
                    <i class="fa fa-id-card-o"></i> <span>Secretaría</span>
                    <span class="pull-right-container">                        
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>                
                <ul class="treeview-menu">                    
                    <li>
                        <a href="{{ route('Secr.actividades') }}" target="Opc4">
                            <i class="fa  fa-calendar-check-o"></i> <span>Cal. de Actividades</span>              
                        </a>
                    </li> 
                    <li>
                        <a href="{{ route('Secr.libreta')}}" target="Opc4">
                        <i class="fa fa-file-text"></i> <span>Libretas</span>
                        <span class="pull-right-container">
                            <small class="label pull-right bg-green">subir</small>
                        </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('Secr.doc')}}" target="Opc4">
                        <i class="fa fa-file-text"></i> <span>Curriculum Vitae</span>
                        <span class="pull-right-container">
                            <small class="label pull-right bg-green">subir</small>
                        </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('Secr.Avatar') }}" target="Opc4">                    
                            <i class="fa fa-file-image-o" aria-hidden="true"></i> <span>Avatar</span>
                            <span class="pull-right-container">
                                <small class="label pull-right bg-green">subir</small>
                            </span>         
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('Secr.reportes') }}" target="Opc4">
                            <i class="fa fa-file-excel-o"></i> <span>Reportes</span>                    
                        </a>
                    </li>  
                </ul>
            </li>
            <!-- ********** Regente *********** -->            
            <li>
                <a href="#" target="Opc5">
                    <i class="fa fa-binoculars" aria-hidden="true"></i> <span>Regente</span>                
                    <span class="pull-right-container">                        
                            <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a> 
                <ul class="treeview-menu">                    
                    <li>            
                        <a href="{{ route('Rege.Reg')}}" target="Opc5">
                            <i class="fa fa-th"></i> <span>Escritorio</span>   
                        </a>                
                    </li>
                    <li>            
                        <a href="{{ route('Rege.Comp')}}" target="Opc5">
                            <i class="fa fa-circle-o"></i> <span>Todos los grados</span>                    
                        </a>                
                    </li>
                </ul>                              
            </li>
            <!-- ********** Dep. Psicologico *********** -->
            <li>
                <a href="#" target="Opc6">
                    <i class="fa fa-eye" aria-hidden="true"></i> <span>Dep. Psicologico</span>
                    <span class="pull-right-container">                        
                            <i class="fa fa-angle-left pull-right"></i>
                    </span>                    
                </a>             
                <ul class="treeview-menu">                    
                    <li>
                        <a href="{{ route('Psico.Reg')}}" target="Opc6">
                            <i class="fa fa-th"></i> <span>Escritorio</span>            
                        </a>
                    </li>
                    <li>            
                        <a href="{{ route('Psico.Comp')}}" target="Opc6">
                            <i class="fa fa-folder"></i> <span>Comportamiento</span>                    
                        </a>                
                    </li>            
                </ul>
            </li>
            <hr />
            <li class="<?php echo((Route::current()->getName() == 'AdmCCC.usuReg'))? 'active':''; ?>">
                <a href="#">
                    <i class="fa fa-plus-square" aria-hidden="true"></i> <span>Mas Opciones</span>
                    <span class="pull-right-container">                        
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>                
                <ul class="treeview-menu">
                    <li>
                        <a href="{{ route('inscr-ccc')}}" target="suscripcion">
                            <i class="fa fa-user-circle-o" aria-hidden="true"></i> <span>Suscripción Estudiantil</span>            
                        </a>
                    </li>                    
                    <li class="<?php echo ((Route::current()->getName() == 'AdmCCC.usuReg'))? "active":"";?>">
                        <a href="{{ route('AdmCCC.usuReg') }}" target="borrarUsuario">
                            <i class="fa fa-users" aria-hidden="true"></i> <span>Usuarios</span>     
                        </a>
                    </li> 
                    <li>
                            <a href="{{ route('password.request','ingrese-email@ccc.edu.bo') }}"  target="modiClv">
                            <i class="fa fa-key" aria-hidden="true"></i> <span>Modificar Contraseña</span>       
                            </a>
                    </li>
                </ul>
            </li>                        
        </ul>
    </section>
    <!-- /.sidebar -->

</aside>    
@endsection	
