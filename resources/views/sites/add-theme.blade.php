{{--<div class="text-center">--}}
    {{--{!! Form::open(['url' => '/sites/add-theme']) !!}--}}
        {{--<div class="form-group col-sm-3 col-sm-offset-4">--}}
            {{--<label for="">Escolha o tema</label>--}}
            {{--<br>--}}
            {{--<input type="file" class="form-control">--}}
        {{--</div>--}}
    {{--{!! Form::close() !!}--}}
{{--</div>--}}

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            {!! Form::open(['url' => '/sites/add-theme', 'enctype' => 'multipart/form-data']) !!}
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Adicionar Tema</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Selecione o tema</label>
                        <br>
                        {{ Form::file('theme', ['class' => 'form-control']) }}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>