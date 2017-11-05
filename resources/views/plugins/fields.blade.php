<h2 class="add-ct-btn"><button type="submit" class="btn btn-circle btn-lg btn-success waves-effect waves-dark">+</button></h2>

{{ csrf_field() }}

<div class="row">
    <!-- Name Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('name', 'Nome do plugin:') !!}
        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Digite o nome do plugin']) !!}
    </div>

    <div class="form-group col-sm-6">
        {!! Form::label('url', 'URL do plugin:') !!}
        {!! Form::text('url', null, ['class' => 'form-control', 'placeholder' => 'Digite a URL de download do plugin']) !!}
    </div>
</div>

