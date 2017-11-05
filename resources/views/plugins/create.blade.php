@extends('layouts.app')

@section('content')
    <div class="card" style="width: 100%;">
        <div class="card-block bg-info">
            <h4 class="text-white card-title">Adicionar um novo plugin</h4>
            <h6 class="card-subtitle text-white m-b-0 op-5">Preencha os campos com os dados do plugin</h6>
        </div>
        <div class="card-block">
            <div class="message-box contact-box">
                {!! Form::open(['route' => 'site-plugins.store']) !!}

                @include('plugins.fields')

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection