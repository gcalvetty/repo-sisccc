@extends('layouts_sisccc.pagsis')
@section('titulo','RUDE')	

@section('sis_contenido')
<div class="jumbotron">
    <div class="container">
        <h1>Vista del @yield('titulo')</h1>    
    </div>     
</div>
<ccctab titulo="@lang('auth.titEscr')" nombre="{{ Auth::user()->nombre }}" ></ccctab>
@endsection	
