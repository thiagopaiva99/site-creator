@if( count($sites) > 0 )
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th>Site</th>
                <th>URL</th>
                <th>Tamanho</th>
                <th>Açoes</th>
            </tr>
            </thead>
            <tbody>
            @foreach($sites as $site)
                <tr>
                    <td>
                        {{ $site->name }}
                    </td>
                    <td>
                        <a href="{{ $site->local_url }}" class="btn btn-xs btn-info" target="_blank">{{ $site->local_url }}</a>
                    </td>
                    <td>
                        {{ $site->size }}
                    </td>
                    <td>
                        <button class="btn btn-info btn-reveal-tr btn-xs" data-id="{{ $site->id }}">Ver mais</button>
                    </td>
                </tr>
                <tr style="display: none;" id="tr_{{ $site->id }}">
                    <td  colspan="4">
                        <div class="btn-group">
                            <div class="dropdown">
                                <button class="btn btn-xs btn-secondary dropdown-toggle" type="button" id="status" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Clonar Site
                                </button>
                                <div class="dropdown-menu" aria-labelledby="status">
                                    @foreach( $sites as $miniSite )
                                        @if ( $miniSite->id != $site->id )
                                            <a class="dropdown-item" href="{{ url('/sites/'.$site->id.'/clone/'.$miniSite->id) }}">{{ $miniSite->name }}</a>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="dropdown">
                                <button class="btn btn-xs btn-secondary dropdown-toggle" type="button" id="status" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Status
                                </button>
                                <div class="dropdown-menu" aria-labelledby="status">
                                    <a class="dropdown-item" href="{{ url('/sites/'.$site->id.'/start') }}">Iniciar Site</a>
                                    <a class="dropdown-item" href="{{ url('/sites/'.$site->id.'/stop') }}">Parar Site</a>
                                </div>
                            </div>
                            <div class="dropdown">
                                <button class="btn btn-xs btn-secondary dropdown-toggle" type="button" id="themes" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Temas
                                </button>
                                <div class="dropdown-menu" aria-labelledby="themes">
                                    @foreach($themes as $theme)
                                        <a class="dropdown-item" href="{{ url('/sites/'.$site->id.'/theme/'.$theme) }}">{{ $theme }}</a>
                                    @endforeach
                                </div>
                            </div>
                            <div class="dropdown">
                                <button class="btn btn-xs btn-secondary dropdown-toggle" type="button" id="updates" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Atualizaçoes
                                </button>
                                <div class="dropdown-menu" aria-labelledby="updates">
                                    <a class="dropdown-item" href="#">Action</a>
                                </div>
                            </div>
                            <div class="dropdown">
                                <button class="btn btn-xs btn-secondary dropdown-toggle" type="button" id="plugins" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Plugins
                                </button>
                                <div class="dropdown-menu" aria-labelledby="plugins">
                                    @foreach($plugins as $plugin)
                                        <a class="dropdown-item" href="{{ url('sites/'.$site->id.'/plugin/'.$plugin->id) }}">{{ $plugin->name }}</a>
                                    @endforeach
                                </div>
                            </div>
                            <div class="dropdown">
                                <button class="btn btn-xs btn-secondary dropdown-toggle" type="button" id="backups" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Backups
                                </button>
                                <div class="dropdown-menu" aria-labelledby="backups">
                                    <a class="dropdown-item" href="{{ url('/sites/'.$site->id.'/backup') }}">Backup do Site</a>
                                </div>
                            </div>
                            <div class="dropdown">
                                <button class="btn btn-xs btn-secondary dropdown-toggle" type="button" id="downloads" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Downloads
                                </button>
                                <div class="dropdown-menu" aria-labelledby="downloads">
                                    <a class="dropdown-item" href="{{ url('backups/'.strtolower($site->slug).'.zip') }}">Backup do Site</a>
                                </div>
                            </div>
                            <div class="dropdown">
                                <button class="btn btn-xs btn-secondary dropdown-toggle" type="button" id="deploys" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Deploys
                                </button>
                                <div class="dropdown-menu" aria-labelledby="deploys">
                                    <a class="dropdown-item" href="#">Action</a>
                                </div>
                            </div>
                            <div class="dropdown">
                                <button class="btn btn-xs btn-secondary dropdown-toggle" type="button" id="deletes" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Exclusoes
                                </button>
                                <div class="dropdown-menu" aria-labelledby="deletes">
                                    <a class="dropdown-item" href="{{ url('/sites/'.$site->id.'/delete') }}">Deletar Site</a>
                                    <a class="dropdown-item" href="{{ url('/sites/'.$site->id.'/delete-backups') }}">Deletar Backups</a>
                                </div>
                            </div>
                        </div>
                        <!--{!! Form::open(['route' => ['sites.destroy', $site->id], 'method' => 'delete']) !!}
                            <a href="{!! url("sites/$site->id/down") !!}" onclick="return confirm('Deseja realmente EXCLUIR OS DADOS desse site?');" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Deletar Dados</a>
                            <a href="{!! url("sites/$site->id/backup/delete") !!}" onclick="return confirm('Deseja realmente EXCLUIR O BACKUP desse site?');" class="btn btn-warning btn-xs"><i class="fa fa-trash"></i> Deletar Backup</a>
                            {!! Form::button('<i class="glyphicon glyphicon-trash"></i> Deletar', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        {!! Form::close() !!}-->
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{--{!! $sites->render() !!}--}}
    </div>
@else
    <h1>Nao tem nada</h1>
@endif