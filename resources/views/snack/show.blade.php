@extends('layouts.app')

@section('template_title')
    {{ $snack->name ?? 'Show Snack' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Snack</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('snacks.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Bar Id:</strong>
                            {{ $snack->bar_id }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $snack->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Precio:</strong>
                            {{ $snack->precio }}
                        </div>
                        <div class="form-group">
                            <strong>Disponible:</strong>
                            {{ $snack->disponible }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
