<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
        <label for="menu_id">Menu</label>
            <select class="form-control" name="menu_id" id="menu_id">
                @foreach((\App\Models\Menu::all() ?? [] ) as $menu)
                <option value="{{$menu->id}}">
                    {{$menu->nombre}}</option>
                @endforeach
            </select>
        </div>
        </div>
        <div class="form-group">
        <label for="fecha">Fecha</label>
                        <input class="form-control Date"  type="date"  name="fecha" id="fecha" value="{{old('fecha')}}"                         required="required"
                        >
                        
            <p class="text-danger">{{$errors->first('fecha')}}</p>
        </div>
        <div class="form-group">
        <input class="form-control " type="hidden"  type="text"  name="user_name" id="user_name" value={{auth()->user()->name}}>                
                        
        </div>
        <div class="form-group">
            {{ Form::label('observacion') }}
            {{ Form::text('observacion', $preferencia->observacion, ['class' => 'form-control' . ($errors->has('observacion') ? ' is-invalid' : ''), 'placeholder' => 'Observacion']) }}
            {!! $errors->first('observacion', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>