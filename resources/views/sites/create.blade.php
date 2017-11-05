@extends('layouts.app')

@section('content')
    <div class="card" style="width: 100%;">
        <div class="card-block bg-info">
            <h4 class="text-white card-title">Criar um novo site</h4>
            <h6 class="card-subtitle text-white m-b-0 op-5">Preencha os campos com os dados do site</h6>
        </div>
        <div class="card-block">
            <div class="message-box contact-box">
                {!! Form::open(['route' => 'sites.store']) !!}

                @include('sites.fields')

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection