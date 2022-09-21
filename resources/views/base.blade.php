@extends('layouts.app')
<?php  if (Auth::check()) { ?>
    @section('menu')
        <div class="col-md-2">
            <div class="list-group">
                
                @if(Auth::user()->id_rol == 1)
                    <a href="{{ url('home') }}" class="list-group-item list-group-item-action">Dashboard</a>
                    <a href="{{ url('admin/usuarios/perfiles') }}" class="list-group-item list-group-item-action">Perfiles</a>
                    <a href="{{ url('admin/estandar/lista') }}" class="list-group-item list-group-item-action">Estándares/Cursos</a>
                    <a href="{{ url('admin/groups/lista') }}" class="list-group-item list-group-item-action">Grupos</a>
                    <a href="{{ url('admin/instructor/lista') }}" class="list-group-item list-group-item-action">Instructores</a>
                    <a href="{{ url('usuarios') }}" class="list-group-item list-group-item-action">Usuarios</a>
                    <a href="{{ url('candidatos') }}" class="list-group-item list-group-item-action">Candidatos</a>
                    <a href="{{ url('certificaciones') }}" class="list-group-item list-group-item-action">Certificaciones</a>
                    <a href="{{ url('certificados') }}" class="list-group-item list-group-item-action">Certificados pendientes</a>
                    <a href="{{ url('agenda') }}" class="list-group-item list-group-item-action">Agenda</a>
                    <a href="{{ url('documentos') }}" class="list-group-item list-group-item-action">Documentos recibidos</a>
                    <a href="{{ url('pagos') }}" class="list-group-item list-group-item-action">Pagos recibidos</a>
                    <a href="{{ url('citas/lista') }}" class="list-group-item list-group-item-action">Citas</a>
                    <a href="{{ url('usuario/perfil') }}/{{Auth::user()->name}}" class="list-group-item list-group-item-action">Perfil </a>
                    <a href="{{ url('usuario/preguntas') }}" class="list-group-item list-group-item-action">Preguntas frecuentes</a>
                    <a href="{{ url('usuario/catalogo/certificaciones') }}" class="list-group-item list-group-item-action">Catálogo de certificaciones</a>
                @endif
                @if(Auth::user()->id_rol == 2)
                    <a href="{{ url('admin/estandar/lista') }}" class="list-group-item list-group-item-action">Estándares/Cursos</a>
                    <a href="{{ url('admin/groups/lista') }}" class="list-group-item list-group-item-action">Grupos</a>
                    <a href="{{ url('candidatos') }}" class="list-group-item list-group-item-action">Candidatos</a>
                    <a href="{{ url('documentos') }}" class="list-group-item list-group-item-action">Documentos recibidos</a>
                    <a href="{{ url('agenda') }}" class="list-group-item list-group-item-action">Agenda</a>
                    <a href="{{ url('citas/lista') }}" class="list-group-item list-group-item-action">Citas</a>
                    <a href="{{ url('certificaciones') }}" class="list-group-item list-group-item-action">Certificaciones</a>
                    <a href="{{ url('certificados') }}" class="list-group-item list-group-item-action">Certificados pendientes</a>
                    <a href="{{ url('usuario/preguntas') }}" class="list-group-item list-group-item-action">Preguntas frecuentes</a>
                @endif
                @if(Auth::user()->id_rol == 3)
                    <a href="{{ url('pagos') }}" class="list-group-item list-group-item-action">Pagos recibidos</a>
                @endif

                @if(Auth::user()->id_rol == 10)
                    <a href="{{ url('usuario/perfil') }}/{{Auth::user()->name}}" class="list-group-item list-group-item-action">Perfil </a>
                    @if(Helper::profileCheck(Auth::user()->name) == 'Si')
                    <a href="{{ url('usuario/certificaciones')}}/{{Auth::user()->name}}" class="list-group-item list-group-item-action">Mis Certificaciones </a>
                    @endif
                    <a href="{{ url('usuario/preguntas') }}" class="list-group-item list-group-item-action">Preguntas frecuentes</a>
                @endif
            </div>
        </div>
    @endsection
<?php } ?>

