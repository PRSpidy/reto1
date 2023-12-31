@extends('layouts.app')
@section('content')

<div class="container">

    <div id="estados" class="col">
        <div class="row header">
            <div class="col-md-10">
                <h1><b>Estados</b></h1>
            </div>
            <div class="col-md-1 d-flex justify-content-end">
                @auth
                <a href="{{route('estados.create')}}" role="button">
                    <i class="bi bi-file-earmark-plus icono-grande"></i>
                </a>
                @endauth
            </div>
        </div>
        <hr style="border: none; border-top: 3px solid #000000; width: 92%;">
        <div class="row">
            <div class="col-md-1 d-flex justify-content-center">
                <b>Ver</b>
            </div>
            <div class="col">
                <b>Nombre</b>
            </div>
            <div class="col">
                <b>Num Incidencias</b>
            </div>
            <div class="col">
                <b>Editar</b>
            </div>
            <div class="col">
                <b>Eliminar</b>
            </div>
            <div class="col">
                <b>Mostrar incidencias</b>
            </div>
        </div>
        @foreach ($estados as $estado)
            <div class="categoria">
                <div class="row">
                    <div class="col-md-1 d-flex justify-content-center">
                        <a href="{{route('estados.show', $estado)}}">
                            <i class="bi bi-eye"></i>
                        </a>
                    </div>
                    <div class="col">
                        {{$estado->name}}
                    </div>
                    <div class="col">
                        @if($estado->incidencias)
                            {{$estado->incidencias->count()}}
                        @else
                            0
                        @endif
                    </div>
                    <div class="col">
                        @auth
                        <a href="{{route('estados.edit', $estado)}}" role="button">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        @endauth
                    </div>
                    <div class="col">
                        @auth
                        <form action="{{route('estados.destroy', $estado)}}" method="POST" style="display: inline">
                            @csrf
                            @method('DELETE')
                            <button style="border: none; background: none; " type="submit" onclick="return confirm('¿Estás seguro?')">
                                <i class="bi bi-trash3"></i>
                            </button>
                        </form>
                        @endauth
                    </div>
                    <div class="col d-flex justify-content-center">
                        @if($estado->incidencias->count()>0)
                        <button style="border: none; background: none;" class="toggle-incidencias btn btn-primary btn-sm" data-target=".incidencias">
                            <img class="mostrar-image" src="images/mostrar.ico" alt="Mostrar" style="display: none; width: 30px; height: 30px;">
                            <img class="ocultar-image" src="images/ocultar.ico" alt="Ocultar" style="display: block; width: 20px; height: 20px;">
                        </button>
                        @endif
                    </div>
                </div>
                @if($estado->incidencias->count()>0)
                    <div class="incidencias col-md-10" style="display: block" >
                        @include('layouts/showIncidenciasList', ['incidencias' => $estado->incidencias->sortByDesc('created_at')->take(5)])
                    </div>
                @endif
            </div>
        @endforeach
    </div>

</div>

@endsection


