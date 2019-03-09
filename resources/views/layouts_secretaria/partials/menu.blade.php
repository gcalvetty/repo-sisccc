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
        
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">Menú de Secretaria</li>
            <li class="<?php echo ((Route::current()->getName() == 'Secr.Reg'))? "active":"";?>">
                <a href="{{ route('Secr.Reg')}}">
                    <i class="fa fa-dashboard"></i> <span>Escritorio</span>            
                </a>
            </li>
             
            
            <li class="<?php echo ((Route::current()->getName() == 'Secr.Reg1'))? "active":"";?> hidden">
                <a href="{{ route('Secr.agenda') }}">
                    <i class="fa fa-calendar"></i><span>Agenda</span>
                    
                </a>
            </li>
            
            <li class="<?php echo ((Route::current()->getName() == 'Secr.actividades'))? "active":"";?>">
                <a href="{{ route('Secr.actividades') }}">
                    <i class="fa  fa-calendar-check-o"></i> <span>Calendario de Actividades</span>                    
                </a>
            </li> 
            
            <li class="treeview <?php echo (
                            (Route::current()->getName() == 'Secr.libreta')||
                            (Route::current()->getName() == 'Secr.Avatar') ||
                            (Route::current()->getName() == 'Secr.doc')                            
                            )? "active":"";?>">
                    <a href="#">
                        <i class="fa fa-th"></i> <span>Subir Documentos</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="<?php echo ((Route::current()->getName() == 'Secr.libreta'))? "active":"";?>">
                            <a href="{{ route('Secr.libreta')}}">
                            <i class="fa fa-file-text"></i> <span>Libretas</span>
                            <span class="pull-right-container">
                                <small class="label pull-right bg-green">subir</small>
                            </span>
                            </a>
                        </li>
                        <li class="<?php echo ((Route::current()->getName() == 'Secr.doc'))? "active":"";?>">
                            <a href="{{ route('Secr.doc')}}">
                            <i class="fa fa-file-text"></i> <span>Curriculum Vitae</span>
                            <span class="pull-right-container">
                                <small class="label pull-right bg-green">subir</small>
                            </span>
                            </a>
                        </li>
                        <li class="<?php echo ((Route::current()->getName() == 'Secr.Avatar'))? "active":"";?>">
                            <a href="{{ route('Secr.Avatar') }}">                    
                                <i class="fa fa-file-image-o" aria-hidden="true"></i> <span>Avatar</span>
                                <span class="pull-right-container">
                                    <small class="label pull-right bg-green">subir</small>
                                </span>         
                            </a>
                        </li> 
                    </ul>
            </li>            
            
            <li class="<?php echo ((Route::current()->getName() == 'Secr.reportes'))? "active":"";?>">
                <a href="{{ route('Secr.reportes') }}">
                    <i class="fa fa-file-excel-o"></i> <span>Reportes</span>                    
                </a>
            </li> 
            <hr>
            <li class="<?php echo ((Route::current()->getName() == 'Secr.cuadSegui'))? "active":"";?>">
                <a href="{{ route('Secr.cuadSegui') }}">
                    <i class="fa  fa-pencil-square-o"></i> <span>Cuaderno de Seguimiento</span>                    
                </a>
            </li>
            
            
            
        </ul>
    </section>
    <!-- /.sidebar -->

</aside>    

