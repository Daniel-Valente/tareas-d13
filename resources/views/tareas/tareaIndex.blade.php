@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Lista de tareas</div>

                <div class="card-body">
                <a href="{{ action('TareaController@create') }}" class="btn btn-success btn-sm">Nueva Tarea</a>
                    <hr>
                    <table class="table">
                        <tr>
                            <th>ID</th>
                            <th>Tarea</th>
                            <th>Descripción</th>
                        </tr>
                        @foreach ($tareas as $tarea)
                            <tr>
                                <td>{{ $tarea->id }}</td>
                                <td>
                                    <a href=" {{ route('tarea.show', $tarea->id) }} ">
                                        {{ $tarea->nombre_Tarea }}
                                    </a>
                                </td>
                                <td>{{ $tarea->descripcion }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
