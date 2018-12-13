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
            <li class="header">Menú de Inscripción</li>
            <li class="active">
                <a href="{{route('inscr-ccc')}}">
                    <i class="fa fa-th"></i> <span>Escritorio</span>            
                </a>
            </li>            
        </ul>
    </section>
    <!-- /.sidebar -->

</aside>    
	
