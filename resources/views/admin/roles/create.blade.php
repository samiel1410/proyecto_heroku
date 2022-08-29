@extends('layouts.app')

@section('template_title')
Menu
@endsection



@section('content')

<div class="card">
    <div class="card-body">
        {!! Form::open(['route'=> 'admin.roles.store']) !!}

            <div class="form-group">
                {!! Form::label('name','Nombre')!!}
                {!! Form::text('name',null,['class'=> 'form-control','placeholder'=>'Ingrese el nombre del rol'])!!}
            </div>
            <h3>Lista de permisos</h3>
            @foreach($permissions as $permi)
                <div>

                <label for="">
                    {!! Form::checkbox('permissions[]',$permi->id,null,['class'=>'mr-1'])!!}
                    {{$permi->description}}
                    
                </label>
                </div>

            @endforeach
            {!! Form::submit('Crear Rol',['class'=> 'btn btn-primary'])!!}
        {!! Form::close()!!}
    </div>
</div>
@endsection