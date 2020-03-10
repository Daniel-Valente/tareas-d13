@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Captura de nueva tarea</div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @isset($tarea)
                        {!! Form::model($tarea, ['route' => ['tarea.update', $tarea->id], 'method' => 'PATCH']) !!}
                    @else
                        {!! Form::open(['route' => 'tarea.store']) !!}
                    @endisset ()
                            <div class="form-group">
                                {!! Form::label('nombre_Tarea', 'Tarea') !!}
                                {!! Form::text('nombre_Tarea', null, ['class' => 'form-control', 'id' => 'nombre_Tarea']) !!}
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="fecha_Inicio">Fecha Inicio</label>
                                    {!! Form::date('fecha_Inicio', isset($tarea) ? $tarea->fecha_Inicio->toDateString() : null, ['class' => 'form-control'])!!}
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="fecha_Fin">Fecha Término</label>
                                    {!! Form::date('fecha_Fin', isset($tarea) ? $tarea->fecha_Inicio->toDateString() : null, ['class' => 'form-control'])!!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripción</label>
                                {!! Form::textarea('descripcion', null, ['class' => 'form-control', 'row' => '3']) !!}
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="prioridad">Prioridad</label>
                                    {!! Form::select('prioridad', [
                                        '1' => 'Baja',
                                        '2' => 'Media',
                                        '3' => 'Alta'],
                                        null, ['class' => 'forn-control']) !!}
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="categoria">Categoria</label>
                                    {!! Form::select('categoria_id', $categorias ,null, ['class' => 'forn-control']) !!}
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Aceptar</button>
                      {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
