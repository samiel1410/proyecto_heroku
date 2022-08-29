@extends('layouts.app')

@section('template_title')
    Asignar un Rol
@endsection

@section('content')
    @if(session('info'))
        <div class="alert alert-sucess">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
   <div class="card">
    <div class="card-body">
        <p class="h1">Nombre</p>
        <p class="form-control">{{$user->name}}</p>
        {!! Form::model($user,['route'=>['admin.users.update',$user],'method'=>'put']) !!}
        @foreach ($roles as $role)
            <div>
                <label for="">

                    {!! Form::checkbox('roles[]',$role->id,null,['class'=>'mr-1']) !!}
                    {{$role->name}}
                </label>
            </div>
        @endforeach

        {!! Form::submit('Asignar Rol',['class'=>'btn btn-primary mt-2']) !!}
        {!! Form::close()!!}
    </div>
   </div>
@endsection
