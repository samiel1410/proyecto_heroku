@extends('layouts.app')

@section('template_title')
    {{ $buzon->name ?? 'Show Buzon' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Buzon</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('buzons.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Bar:</strong>
                            @foreach((\App\Models\Bar::all() ?? [] ) as $bar)
                    @if($buzon->bar_id == old('bar_id', $bar->id))                    
                     {{$bar->nombre}}               
                    @endif   
                    @endforeach
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $buzon->descripcion }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
