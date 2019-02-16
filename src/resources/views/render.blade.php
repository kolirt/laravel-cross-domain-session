@foreach($domains as $domain)
    <img src="{{ $domain . '/sync_session?q=' . $params }}" style="display: none;">
@endforeach