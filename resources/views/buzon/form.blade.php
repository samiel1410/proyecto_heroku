<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
        <label for="bar_id">Bar</label>
        <select class="form-control" name="bar_id" id="bar_id">
                @foreach((\App\Models\Bar::all() ?? [] ) as $bar)
                <option value="{{$bar->id}}"
                    @if($buzon->bar_id == old('bar_id', $bar->id))
                    selected="selected"
                    @endif
                >{{$bar->nombre}}</option>

                @endforeach
            </select>
        </div>
        <div class="form-group">
            {{ Form::label('descripcion') }}
            {{ Form::text('descripcion', $buzon->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>