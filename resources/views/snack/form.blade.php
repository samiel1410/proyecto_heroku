@if($snack->disponible== ('1'))
<?php
$abierto="checked";
$cerrado="";
?>
@else 
<?php
$abierto="";
$cerrado="checked";  
?>            @endif
<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
        <label for="bar_id">Bar</label>
            <select class="form-control" name="bar_id" id="bar_id">
                @foreach((\App\Models\Bar::all() ?? [] ) as $bar)
                <option value="{{$bar->id}}">
                    {{$bar->nombre}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $snack->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('precio') }}
            {{ Form::text('precio', $snack->precio, ['class' => 'form-control' . ($errors->has('precio') ? ' is-invalid' : ''), 'placeholder' => 'Precio']) }}
            {!! $errors->first('precio', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
        <input class="form-control " type="hidden"  type="text"  name="user_name" id="user_name" value={{auth()->user()->name}}>                
                        
        </div>
        <div class="form-group">
        <label for="disponible">Disponible</label>
                        <input class="form-control Boolean"  type="radio"  name="disponible" id="disponible" value="{{('1')}}"<?php echo $abierto?>                           required="required"
                        >
           
            
            <label for="disponible">No Disponible</label>
                        <input class="form-control Boolean"  type="radio"  name="disponible" id="disponible" value="{{('0')}}"<?php echo $cerrado?>                           required="required">
        </div>
        </div>
        <div class="form-group">
            <input type="file" name="url" id="url" accept="image/*">
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>