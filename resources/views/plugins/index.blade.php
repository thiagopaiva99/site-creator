@extends("layouts.app")

@section("content")
    <div class="col-lg-12">
        @include('flash::message')

        <div class="card">
            <div class="card-block">
                <h4 class="card-title">Plugins
                    <a href="{{ url('site-plugins/create') }}" class="btn btn-info btn-xs waves-effect waves-dark pull-right">Novo Plugin</a>
                </h4>

                <hr>

{{--                @include("sites.add-theme")--}}

                @include("plugins.table")
            </div>
        </div>
    </div>
@endsection