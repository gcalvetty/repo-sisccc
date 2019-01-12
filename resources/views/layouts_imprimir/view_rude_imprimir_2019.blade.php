@extends('layouts_sisccc.pagsis_imprimir')
@section('titulo','Imprimir RUDE')	
@section('sis_contenido')
<style>
        @media print {
            div.saltopagina{ display:block; page-break-before:always;
             }
          }
</style>
<!-- Fixed navbar -->
<div id="app">
    
    <nav class="navbar navbar-inverse navbar-fixed-top"  id="imprimir">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">RUDE</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">RUDE <strong><em>{{ $NomAlm }}</em></strong></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">            
            <li>
                <button class="btn btn-success btn-lg" 
                        v-on:click="imprimirRude">
                    <i class="fa fa-print" aria-hidden="true"></i>&nbsp;Imprimir RUDE
                </button>
            </li>
            <li class="hidden">
                <a class="btn btn-facebook btn-lg" href="#">
                    <i class="fa fa-file-pdf-o" aria-hidden="true"></i>&nbsp;
                    Descargar en .PDF
                </a>
            </li>            
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <div class="container theme-showcase" role="main">
    <section class="content" id="RUDEImp">
            
            <section>
                    <div id="p1" style="overflow: hidden; position: relative; background-color: white; width: 935px; height: 1540px;">
                        <!-- Begin page background -->
                        <div id="pg1Overlay" style="width:100%; height:100%; position:absolute; z-index:1; background-color:rgba(0,0,0,0); -webkit-user-select: none;">
                                <svg class="cont-svg1">
                                        <text x="0" y="15">{{ 'C0'.$datos["rude_id"] }}</text>
                                        <text x="0" y="35">{{ config('siscccConfig.impr.cod-col') }}</text>
                                </svg>

                        </div>
                        <div id="pg1" style="-webkit-user-select: none;">
                            <object width="935" height="1540" data="{{ asset("reportes/rude-2019/pag-1/1.svg") }}" type="image/svg+xml" id="pdf1" style="width:935px; height:1540px; -moz-transform:scale(1); z-index: 0;">                                
                            </object>
                            
                        </div>
                    <!-- End page background -->
                    </div>
                    
            </section>             
            <section>
                    <div id="p2" style="overflow: hidden; position: relative; background-color: white; width: 935px; height: 1540px;">
                    <!-- Begin page background -->
                    <div id="pg2Overlay" style="width:100%; height:100%; position:absolute; z-index:1; background-color:rgba(0,0,0,0); -webkit-user-select: none;"></div>
                    <div id="pg2" style="-webkit-user-select: none;">
                        <object width="935" height="1540" data="{{ asset("reportes/rude-2019/pag-2/2.svg") }}" type="image/svg+xml" id="pdf2" style="width:935px; height:1540px; -moz-transform:scale(1); z-index: 0;">
                        </object>
                    </div>
                    <!-- End page background -->
                    </div>
            </section> 
    </section>                  
</div>    
@endsection