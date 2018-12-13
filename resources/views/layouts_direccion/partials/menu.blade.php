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
        
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">Menú del Director</li>
            <li class="<?php echo ((Route::current()->getName() == 'Dir.Reg'))? "active":"";?>">
                <a href="{{route('Dir.Reg')}}">
                    <i class="fa fa-dashboard"></i> <span>Escritorio</span>            
                </a>
            </li>
            
            <li class="<?php echo ((Route::current()->getName() == 'Dir.Doc'))? "active":"";?>">
                <a href="{{route('Dir.Doc')}}">
                    <i class="fa fa-id-card-o"></i> <span>Plantel Docente</span>                    
                </a>
            </li> 
            
            <li class="treeview <?php echo ($Grd > 0)? "active":"";?>">
                <a href="#">
                    <i class="fa fa-th"></i> <span>Alumnos</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @foreach($Niveles as $Nivel)                         
                    <li class="<?php echo ($Grd == $Nivel->grd_nivel_id)? "active":"";?>">
                        <a href="{{ route('Dir.Reg')}}/nivel/{{ $Nivel->grd_nivel_id }}"> {{ $Nivel->grd_nivel_nombre }}
                            <span class="pull-right-container">
                                <small class="label pull-right bg-green">({{ count($Nivel->Cursos) }})</small>
                            </span>
                        </a> 
                    </li>                            
                    @endforeach
                </ul>
            </li>             
            
            <li class="<?php echo ((Route::current()->getName() == 'Dir.com'))? "active":"";?>">
                <a href="{{ route('Dir.com') }}">
                    <i class="fa fa-comments-o"></i>  <span>Comunicado</span>                     
                </a>
            </li> 
           
            
             <li class="<?php echo ((Route::current()->getName() == 'Dir.actividades'))? "active":"";?>">
                <a href="{{ route('Dir.actividades') }}">
                    <i class="fa  fa-calendar-check-o"></i> <span>Calendario de Actividades</span>                    
                </a>
            </li> 
            
            <li>
                <a href="{{ route('Dir.lib')}}">
                  <i class="fa fa-file-text"></i> <span>Libretas</span>
                  <span class="pull-right-container">
                    <small class="label pull-right bg-green">subir</small>
                  </span>
                </a>
            </li>
            
            <li class="enable">
                <a href="{{ route('register') }}">
                    <i class="fa  fa-user-plus"></i> <span>Crear Nuevo Usuario</span>                                        
                </a>
            </li> 
            

            
        </ul>
    </section>
    <!-- /.sidebar -->

</aside>    
	
