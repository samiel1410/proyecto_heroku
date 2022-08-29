@extends('layouts.app')

@section('template_title')
{{ $bar->name ?? 'Show Bar' }}
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-left">
                        <span class="card-title">Show Bar</span>
                    </div>
                    <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('bars.index') }}"> Back</a>
                    </div>
                </div>

                <div class="card-body">

                    <div class="form-group">
                        <strong>Campus:</strong>
                        @foreach((\App\Models\Campus::all() ?? [] ) as $campus)
                        @if($bar->campus_id == old('campus_id', $campus->id))
                        {{$campus->nombre}}

                        @endif
                        @endforeach
                    </div>
                    <div class="form-group">
                        <strong>Nombre:</strong>
                        {{ $bar->nombre }}
                    </div>
                    <div class="form-group">
                        <strong>Abierto:</strong>
                        @if($bar->abierto== ('1'))
                        SI
                        @else NO
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection