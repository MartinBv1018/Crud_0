@extends('layouts.layout')
@section('content')
<div class="row">
    <section class="content">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                @if(\Illuminate\Support\Facades\Session::has('success'))
                    <div class="alert alert-info">
                        {{\Illuminate\Support\Facades\Session::get('success')}}
                    </div>
                @endif
                <div class="panel-body">
                    <div><h3>Lista Empleados</h3></div>

                    <div class="pull-right">
                        <div class="btn-group">
                            <a href="{{route('empleado.create')}}" class="btn btn-success">Añadir empleado</a><br><br><br>
                        </div>
                    </div>

                    <div class="table-container">
                        <table id="tablaEmpleados" class="table table-bordered table-striped">
                            <thead>
                                <th>Nombre</th>
                                <th>Edad</th>
                                <th>Puesto</th>
                                <th>Estado</th>
                                <th>Activo</th>
                                <th>Moneda</th>
                                <th>Salario</th>
                                <th>Acciones</th>
                            </thead>
                            <tbody>

                            @if($empleados->count())
                                @foreach($empleados as $empleado)
                                    <tr>
                                        <td>{{$empleado->nombre}}</td>
                                        <td>{{$empleado->edad}}</td>
                                        <td>{{$empleado->puesto}}</td>
                                        <td>{{$empleado->estado}}</td>
                                        <!-- Funcion ternaria -->
                                        <td>{{$empleado->activo == 1 ? "Si" : "No"}}</td>
                                        <td>{{$empleado->moneda}}</td>
                                        <td>{{$empleado->salario}}</td>

                                        <td>
                                            <!-- mostrar -->
                                            <a class="btn btn-primary btn-xs" href="{{route('empleado.show', $empleado->id)}}" ><span class="glyphicon glyphicon-eye-open"></span></a>
                                            <!-- Modificar -->
                                            <a class="btn btn-primary btn-xs" href="{{route('empleado.edit', $empleado->id)}}" ><span class="glyphicon glyphicon-edit"></span></a>
                                            <!-- Eliminar -->
                                            <a class="btn btn-primary btn-xs" href="{{route('empleado.delete', $empleado->id)}}"><span class="glyphicon glyphicon-remove"></span></a>

                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6">No hay registros</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection