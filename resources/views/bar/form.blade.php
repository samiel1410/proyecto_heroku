@if($bar->abierto== ('1'))
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
        <label for="campus_id">Campus</label>
            <select class="form-control" name="campus_id" id="campus_id">
                @foreach((\App\Models\Campus::all() ?? [] ) as $campus)
                <option value="{{$campus->id}}">
                    {{$campus->nombre}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $bar->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
        <div class="form-group">
            <label for="disponible">Abierto</label>
                        <input class="form-control Boolean"  type="radio"  name="abierto" id="abierto" value="{{('1')}}"<?php echo $abierto?>                         required="required"
                        >
           
            
            <label for="disponible">Cerrado</label>
                        <input class="form-control Boolean"  type="radio"  name="abierto" id="abierto" value="{{('0')}}" <?php echo $cerrado?>                        required="required"
                        >
                        @if($errors->has('abierto'))
            <p class="text-danger">{{$errors->first('abierto')}}</p>
            @endif
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>