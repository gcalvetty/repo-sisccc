
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
        
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">Menú del Contador</li>
            <li class="<?php echo ((Route::current()->getName() == 'Cont.Reg'))? "active":"";?>">
                <a href="{{ route('Cont.Reg')}}">
                    <i class="fa fa-th"></i> <span>Escritorio</span>            
                </a>
            </li>
            <li class="treeview <?php echo ($NivelSel != 0)? "active":"noactive:".$NivelSel; ?>">
                <a href="#">
                    <i class="fa fa-edit"></i> <span>Alumnos</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">                    
                    @foreach($Niveles as $Nivel)                         
                    <li class="<?php echo (($NivelSel == $Nivel->grd_nivel_id))? "active":"";?>">
                        <a href="<?php echo ($NivelSel != 0)? "":"contador/"; ?>alumnos-nivel-{{ $Nivel->grd_nivel_id }}"> {{ $Nivel->grd_nivel_nombre }}
                            <span class="pull-right-container">
                                <small class="label pull-right bg-green">({{ count($Nivel->Cursos) }})</small>
                            </span>
                        </a> 
                    </li>                            
                    @endforeach
                    

                </ul>
            </li> 
             

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>    
@endsection	
