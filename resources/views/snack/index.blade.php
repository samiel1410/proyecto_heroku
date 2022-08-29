@extends('layouts.app')

@section('template_title')
Snack
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Snack') }}
                        </span>

                        <div class="float-right">
                            @can('snacks.create')
                            <a href="{{ route('snacks.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                                {{ __(' Nuevo') }}
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

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($snacks as $snack)
                                <tr>
                                    <td>{{ ++$i }}</td>

                                    <td> @foreach((\App\Models\Bar::all() ?? [] ) as $bar)
                                        @if($snack->bar_id == old('bar_id', $bar->id))
                                        {{$bar->nombre}}
                                        @endif
                                        @endforeach
                                    </td>
                                    <td>{{ $snack->nombre }}</td>
                                    <td>{{ $snack->precio }}</td>
                                    <td>@if($snack->disponible== ('1'))
                                        SI
                                        @else NO
                                        @endif </td>

                                    <td>
                                        <form action="{{ route('snacks.destroy',$snack->id) }}" method="POST">
                                            @can('snacks.show')
                                            <a class="btn btn-sm btn-primary " href="{{ route('snacks.show',$snack->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                            @endcan
                                            @can('snacks.edit')
                                            <a class="btn btn-sm btn-success" href="{{ route('snacks.edit',$snack->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
            {!! $snacks->links() !!}
        </div>
    </div>
</div>
@endsection