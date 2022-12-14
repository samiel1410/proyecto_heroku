<div class="container">
    <div class="card">

        <div class="card-header">
            <h3>Crear Preferencia </h3>
            
        </div>
        <div class="card-body">

        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
            <li class="text-danger">{{ $error }}</li>
            @endforeach
        </ul 
        @endif 
        <form  method="POST" novalidate>
        @csrf
                        <div class="form-group">
            <label for="bar_id">Menu</label>
            <select class="form-control" name="bar_id" id="bar_id">
                @foreach((\App\Models\Bar::all() ?? [] ) as $bar)
                <option value="{{$bar->id}}">
                    {{$bar->nombre}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
        <input class="form-control " type="hidden"  type="text"  name="user_name" id="user_name" value={{auth()->user()->name}}>                
                        
        </div>
        <div class="form-group">
        <input class="form-control " type="hidden"  type="text"  name="user_name" id="user_name" value={{auth()->user()->name}}>                
                        
        </div>
                
                              
                                <div class="form-group">
            <label for="observacion">Descripcion</label>
                        <textarea class="form-control" name="descripcion" id="descripcion" cols="30" rows="10">{{old('descripcion')}}</textarea>
                        @if($errors->has('descripcion'))
            <p class="text-danger">{{$errors->first('descripcion')}}</p>
            @endif
        </div>
                                                                        <div>
            <button class="btn btn-success" type="submit">Grabar</button>
            <a href="{{route('public')}}" class="btn btn-danger">Cancelar</a>
        
        </div>
        </form>
        </div>
    </div>
</div>