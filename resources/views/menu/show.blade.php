@extends('layouts.app')

@section('template_title')
{{ $menu->name ?? 'Show Menu' }}
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-left">
                        <span class="card-title">Show Menu</span>
                    </div>
                    <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('menus.index') }}"> Back</a>
                    </div>
                </div>

                <div class="card-body">

                    <div class="form-group">
                        <strong>Bar:</strong>
                        @foreach((\App\Models\Bar::all() ?? [] ) as $bar)
                        @if($menu->bar_id == old('bar_id', $bar->id))
                        {{$bar->nombre}}

                        @endif
                        @endforeach
                    </div>
                    <div class="form-group">
                        <strong>Nombre:</strong>
                        {{ $menu->nombre }}
                    </div>
                    <div class="form-group">
                        <strong>Precio:</strong>
                        {{ $menu->precio }}
                    </div>
                    <div class="form-group">
                        <strong>Disponible:</strong>
                        @if($menu->disponible== ('1'))
                        SI
                        @else NO
                        @endif
                    </div>
                    <div class="form-group">
                        <strong>Descripcion:</strong>
                        {{ $menu->descripcion }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection