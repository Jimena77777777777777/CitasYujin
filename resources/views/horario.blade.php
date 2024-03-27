@extends('layouts.panel')

@section('content')
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Gestionar Horario</h3>
                </div>
                <div class="col text-right">
                    <a href="{{ url('') }}" class="btn btn-sm btn-primary">Guardar cambios</a>
                </div> 
            </div>
        </div>
        <div class="card-body">
            @if (session('notification'))
                <div class="alert alert-success" role="alert">
                    {{ session('notification') }}
                </div>
            @endif
        </div>
        <div class="table-responsive">
            <!-- Projects table -->
            <table class="table align-items-center table-flush">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Dia</th>
                        <th scope="col">Activo</th>
                        <th scope="col">Turno mañana</th>
                        <th scope="col">Turno tarde</th>
                    </tr>
            </thead>
            <tbody>
                 @foreach ($days as $day)
                    <tr>
                         <th>{{$day}}</th>
                         <td>
                             <label class="custom-toggle">
                              <input type="checkbox" checked >
                                <span class="custom-toggle-slider rounded-circle"></span>
                             </label>
                         </td>
                    </tr> 
                @endforeach
            </tbody>

            </table>
        </div>
       
    </div>
@endsection