@extends("layouts.app")

@section("content")
    <div class="col-lg-12">
        @include('flash::message')

        <div class="card">
            <div class="card-block">
                <h4 class="card-title">Sites
                    <a href="{{ url('sites/create') }}" class="btn btn-info btn-xs waves-effect waves-dark pull-right">Novo Site</a>
                    <button type="button" class="btn btn-primary btn-xs pull-right waves-effect waves-dark" data-toggle="modal" data-target="#myModal" style="margin-right: 5px;">Adicionar Tema</button>
                </h4>

                <hr>

                @include("sites.add-theme")

                @include("sites.table")
            </div>
        </div>
    </div>
@endsection