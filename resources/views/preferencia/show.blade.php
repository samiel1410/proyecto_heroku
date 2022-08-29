@extends('layouts.app')

@section('template_title')
    {{ $preferencia->name ?? 'Show Preferencia' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Preferencia</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('preferencias.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Menu Id:</strong>
                            {{ $preferencia->menu_id }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha:</strong>
                            {{ $preferencia->fecha }}
                        </div>
                        <div class="form-group">
                            <strong>Observacion:</strong>
                            {{ $preferencia->observacion }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
