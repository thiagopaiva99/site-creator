@if( count($plugins) > 0 )
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th>Plugin</th>
                <th>URL</th>
                <th>Açoes</th>
            </tr>
            </thead>
            <tbody>
            @foreach($plugins as $plugin)
                <tr>
                    <td>{{ $plugin->name }}</td>
                    <td>{{ $plugin->url }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {!! $plugins->render() !!}
    </div>
@else
    <h1>Nao tem nada</h1>
@endif