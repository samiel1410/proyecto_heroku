@extends('layouts.app')

@section('template_title')
Menu
@endsection

@section('content_header')
<h1>Lista de Roles</h1>
@endsection

@section('content')

<div class="card">
    
    <div class="card-body">
    <div class="float-right">
                            @can('menus.create')
                            <a href="{{ route('admin.roles.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                                {{ __('Nuevo Rol') }}
                            </a>
                            @endcan
                        </div>
        <table class="table table-striped">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Role</th>
                    <th colspan="2"></th>

                </tr>

            <tbody>
                @foreach($roles as $role)

                <tr>

                    <td>{{$role->id}}</td>
                    <td>{{$role->name}}</td>
                    <td width="10px">
                        <a href="{{route('admin.roles.edit',$role->id)}}" class="btn btn-sm btn-primary">Editar</a>

                    </td>
                    <td>
                        <form action="{{route('admin.roles.destroy',$role->id)}}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                        </form>

                    </td>
                </tr>

                @endforeach

            </tbody>
            </thead>
        </table>
    </div>
</div>
@endsection