@extends('layouts.app')

@section('template_title')
    Campus
@endsection
@section('css')

<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>

<script>
   $(document).ready(function () {
    $('#campus').DataTable();
}); 
</script>


@endsection


@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Campus') }}
                            </span>

                             <div class="float-right">
                                @can('campuses.create')
                                <a href="{{ route('campuses.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                            <table id="campus" class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Nombre</th>
										<th>Direccion</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($campuses as $campus)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $campus->nombre }}</td>
											<td>{{ $campus->direccion }}</td>

                                            <td>
                                                <form action="{{ route('campuses.destroy',$campus->id) }}" method="POST">
                                                    @can('campuses.show')
                                                    <a class="btn btn-sm btn-primary " href="{{ route('campuses.show',$campus->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                                    @endcan
                                                    @can('campuses.edit')
                                                    <a class="btn btn-sm btn-success" href="{{ route('campuses.edit',$campus->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
                {!! $campuses->links() !!}
            </div>
        </div>
    </div>
@endsection
