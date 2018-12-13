<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                    <?php 
                  $idUsu = sis_ccc\libreriaCCC\fncCCC::getId();
                  $avatar = sis_ccc\libreriaCCC\fncCCC::getAvatar($idUsu); 
                ?>
                    @if(( $avatar!='') && ($avatar!=null))
                    <img src="{{ $avatar }}" class="img-circle" alt="Avatar">
                    @else 
                    @yield('usuico')
                    @endif
                
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
            
            <li class="<?php echo ((Route::current()->getName() == 'Secr.libreta'))? "active":"";?>">
                <a href="{{ route('Secr.libreta')}}">
                  <i class="fa fa-file-text"></i> <span>Libretas</span>
                  <span class="pull-right-container">
                    <small class="label pull-right bg-green">subir</small>
                  </span>
                </a>
            </li>
            <li class="<?php echo ((Route::current()->getName() == 'Secr.Avatar'))? "active":"";?>">
                <a href="{{ route('Secr.Avatar') }}">                    
                    <i class="fa fa-file-image-o" aria-hidden="true"></i> <span>Subir Avatar</span>
                    <span class="pull-right-container">
                        <small class="label pull-right bg-green">subir</small>
                    </span>         
                </a>
            </li> 
            
            <li class="<?php echo ((Route::current()->getName() == 'Secr.reportes'))? "active":"";?>">
                <a href="{{ route('Secr.reportes') }}">
                    <i class="fa fa-file-excel-o"></i> <span>Reportes</span>                    
                </a>
            </li> 
            
            
            
        </ul>
    </section>
    <!-- /.sidebar -->

</aside>    

