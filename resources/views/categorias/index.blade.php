@extends('layouts.app')
@section('content')



<div class="container">

    <div id="categorias" class="row">
        <div class="col">
            <div>
                <b>Categoria</b>
            </div>
            <br>
            @foreach ($categorias as $categoria)
            <div>
                {{$categoria->name}}
            </div>
            <br>
            @endforeach
        </div>
        <div class="col">
            <div>
                <b>Num Incidencias</b>
            </div>
            <br>
            @foreach ($categorias as $categoria)
            <div>
                @if($categoria->incidencias)
                    {{$categoria->incidencias->count()}}
                @else
                    0
                @endif
            </div>
            <br>
            @endforeach
        </div>
        <div class="col">
            <div>
                <b>Editar</b>
            </div>
            <br>
            @foreach ($categorias as $categoria)
            <div>
                <a class="btn btn-warning btn-sm" href="{{route('categorias.edit', $categoria)}}" role="button">Editar</a>
            </div>
            <br>
            @endforeach
        </div>
        <div class="col">
            <div>
                <b>Eliminar</b>
            </div>
            <br>
            @foreach ($categorias as $categoria)
            <div>
                <form action="{{route('categorias.destroy', $categoria)}}" method="POST" style="display: inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                </form>
            </div>
            <br>
            @endforeach
        </div>
    </div>
    <a class="btn btn-primary" href="{{route('categorias.create')}}" role="button">Crear</a>

</div>

@endsection


