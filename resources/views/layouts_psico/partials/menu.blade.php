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
            <li class="header">Menú del Psicolog@</li>
            <li class="active">
                <a href="/psico/">
                    <i class="fa fa-th"></i> <span>Escritorio</span>            
                </a>
            </li>
            <li class="treeview">
                <a href="{{ route('Psico.Comp')}}">
                    <i class="fa fa-folder"></i> <span>Comportamiento</span>                    
                </a>                
            </li>            
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>   