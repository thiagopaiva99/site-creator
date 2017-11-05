<h2 class="add-ct-btn"><button type="submit" class="btn btn-circle btn-lg btn-success waves-effect waves-dark">+</button></h2>

{{ csrf_field() }}

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Nome do site:') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Digite o nome do site']) !!}
</div>

<hr>

