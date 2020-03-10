@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Vista de Tarea</div>

                <div class="card-body">
                    <a href="{{ route('tarea.edit', $tarea->id ) }}" class="btn btn-success btn-sm">Editar</a>

                    <hr>
                    <form action="{{ route('tarea.destroy', $tarea->id ) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Borrar</button>
                    </form>

                    <table class="table">
                        <tr>
                            <th>ID</th>
                            <th>Tarea</th>
                            <th>Descripción</th>
                            <th>Prioridad</th>
                            <th>Inicio</th>
                            <th>Término</th>
                        </tr>
                        <tr>
                            <td>{{ $tarea->id }}</td>
                            <td>{{ $tarea->nombre_Tarea }}</td>
                            <td>{{ $tarea->descripcion }}</td>
                            <td>{{ $tarea->prioridad }}</td>
                            <td>{{ $tarea->fecha_Inicio->format('d/m/Y') }}</td>
                            <td>{{ $tarea->fecha_Fin->format('d/m/Y') }}</td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                Usuario: {{$tarea->user->name}} ({{$tarea->user->email}}) <br>
                                Categoria: {{ $tarea->categoria->nombre_Categoria }}
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
