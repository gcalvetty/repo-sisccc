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
            <li class="header">Menú del Regente</li>
            <li class="<?php echo ((Route::current()->getName() == 'Rege.Reg')) ? "active" : ""; ?>">
                <a href="/regente/">
                    <i class="fa fa-th"></i> <span>Escritorio</span>            
                </a>
            </li>
            <li class="treeview <?php echo ((Route::current()->getName() == 'Rege.Comp')or(Route::current()->getName() == 'Rege.Comp.Nivel')) ? "active" : ""; ?>">
                <a href="#">
                    <i class="fa fa-folder"></i> <span>Comportamiento</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @foreach($Niveles as $Nivel)
                    <li class="<?php echo ($Nivel->grd_nivel_id == $NivSel) ? "active" : ""; ?>">
                        <a href="{{ route('Rege.Comp.Nivel',$Nivel->grd_nivel_id) }}"><i class="fa fa-circle-o"></i> {{$Nivel->grd_nivel_nombre}}</a>
                    </li>                    
                    @endforeach
                    <li class="<?php echo (Route::current()->getName() == 'Rege.Comp') ? "active" : ""; ?>">            
                        <a href="{{ route('Rege.Comp')}}">
                            <i class="fa fa-circle-o"></i> <span>Todos los grados</span>                    
                        </a>                
                    </li>                     
                </ul>
            </li> 

            <hr>
            <li class="<?php echo ((Route::current()->getName() == 'Rege.cuadSegui'))? "active":"";?>">
                <a href="{{ route('Rege.cuadSegui') }}">
                    <i class="fa  fa-pencil-square-o"></i> <span>Cuaderno de Seguimiento</span>                    
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>   