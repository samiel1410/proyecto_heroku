@extends('layouts.app')

@section('template_title')
Buzon
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Buzon') }}
                        </span>

                        <div class="float-right">
                            @can('buzons.create')
                            <a href="{{ route('buzons.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                                {{ __('Nuevo') }}
                            </a>
                            @endcan
                        </div>
                    </div>
                </div>
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="thead">
                                <tr>
                                    <th>No</th>

                                    <th>Bar</th>
                                    <th>Descripcion</th>

                                    <th>Usuario</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($buzons as $buzon)
                                <tr>
                                    <td>{{ ++$i }}</td>

                                    <td>@foreach((\App\Models\Bar::all() ?? [] ) as $bar)
                                        @if($buzon->bar_id == old('bar_id', $bar->id))
                                        {{$bar->nombre}}
                                        @endif
                                        @endforeach
                                    </td>
                                    <td>{{ $buzon->descripcion }}</td>
                                    <td>{{ $buzon->user_name }}</td>

                                    <td>
                                        <form action="{{ route('buzons.destroy',$buzon->id) }}" method="POST">
                                            @can('buzons.show')
                                            <a class="btn btn-sm btn-primary " href="{{ route('buzons.show',$buzon->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                            @endcan

                                            @can('buzons.edit')
                                            <a class="btn btn-sm btn-success" href="{{ route('buzons.edit',$buzon->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>

                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Borrar</button>
                                            @endcan
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {!! $buzons->links() !!}
        </div>
    </div>
</div>
@endsection