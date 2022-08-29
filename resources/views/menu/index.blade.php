@extends('layouts.app')

@section('template_title')
Menu
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Menu') }}
                        </span>

                        <div class="float-right">
                            @can('menus.create')
                            <a href="{{ route('menus.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
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
                                    <th>Nombre</th>
                                    <th>Precio</th>
                                    <th>Disponible</th>
                                    <th>Descripcion</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($menus as $menu)
                                <tr>
                                    <td>{{ ++$i }}</td>

                                    <td> @foreach((\App\Models\Bar::all() ?? [] ) as $bar)
                                        @if($menu->bar_id == old('bar_id', $bar->id))
                                        {{$bar->nombre}}

                                        @endif
                                        @endforeach
                                    </td>
                                    <td>{{ $menu->nombre }}</td>
                                    <td>{{ $menu->precio }}</td>
                                    <td>@if($menu->disponible== ('1'))
                                        SI
                                        @else NO
                                        @endif </td>
                                    <td>{{ $menu->descripcion }}</td>

                                    <td>
                                        <form action="{{ route('menus.destroy',$menu->id) }}" method="POST">
                                            @can('menus.show')
                                            <a class="btn btn-sm btn-primary " href="{{ route('menus.show',$menu->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                            @endcan
                                            @can('menus.edit')
                                            <a class="btn btn-sm btn-success" href="{{ route('menus.edit',$menu->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                            
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
            {!! $menus->links() !!}
        </div>
    </div>
</div>
@endsection