@extends('layouts.app')

@section('template_title')
    {{ $campus->name ?? 'Show Campus' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Campus</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('campuses.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $campus->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Direccion:</strong>
                            {{ $campus->direccion }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
