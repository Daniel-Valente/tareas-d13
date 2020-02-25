@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Captura de nueva tarea</div>
                <div class="card-body">
                    <form action="{{ action('TareaController@store') }}" method="POST"><!--Cualquier formulario con POST tiene que ir con @ csrf -->
                        @csrf <!--{ { route('tarea.store') } }-->
                            <div class="form-group">
                                <label for="nombre_Tarea">Nombre Tarea</label>
                                <input type="text" class="form-control" id="nombre_Tarea" name="nombre_Tarea">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="fecha_Inicio">Fecha Inicio</label>
                                    <input type="date" class="form-control" name="fecha_Inicio">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="fecha_Fin">Fecha Término</label>
                                    <input type="date" class="form-control" name="fecha_Fin">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripción</label>
                                <textarea class="form-control" name="descripcion"></textarea>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="prioridad">Prioridad</label>
                                    <select name="prioridad" class="form-control">
                                        <option selected disabled value="">...</option>
                                        <option value="1">Baja  [1]</option>
                                        <option value="2">Media [2]</option>
                                        <option value="3">Alta  [3]</option>
                                    </select>
                                </div>
                                <!--<div class="form-group col-md-6">
                                    <label for="prioridad">Estatus</label>
                                    <select name="estatus" class="form-control">
                                        <option selected disabled value="">...</option>
                                        <option value="Sin comenzar">Sin comenzar</option>
                                        <option value="Comenzada">Comenzada</option>
                                        <option value="Finalizada">Finalizada</option>
                                    </select>
                                </div>-->
                            </div>
                            <button type="submit" class="btn btn-primary">Crear Tarea</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
