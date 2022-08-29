@extends('layouts.app')

@section('template_title')
    Preferencia
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Preferencia') }}
                            </span>

                             <div class="float-right">
                                @can('preferencias.create')
                                <a href="{{ route('preferencias.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Menu </th>
										<th>Fecha</th>
										<th>Observacion</th>
                                        <th>Usuario</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($preferencias as $preferencia)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>@foreach((\App\Models\Menu::all() ?? [] ) as $menu)
                                @if($preferencia->menu_id == old('menu_id', $menu->id))                    
                                    {{$menu->nombre}}               
                                @endif                
                            @endforeach </td>
											<td>{{ $preferencia->fecha }}</td>
											<td>{{ $preferencia->observacion }}</td>
                                            <td>{{ $preferencia->user_name }}</td>

                                            <td>
                                                <form action="{{ route('preferencias.destroy',$preferencia->id) }}" method="POST">
                                                    @can('preferencias.show')
                                                    <a class="btn btn-sm btn-primary " href="{{ route('preferencias.show',$preferencia->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                                    @endcan

                                                    @can('preferencias.edit')
                                                    <a class="btn btn-sm btn-success" href="{{ route('preferencias.edit',$preferencia->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    
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
                {!! $preferencias->links() !!}
            </div>
        </div>
    </div>
@endsection
