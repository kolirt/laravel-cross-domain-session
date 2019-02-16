<?php

Route::get('sync_session', function(Request $request){
    if (cd_session()->isValideDomain($request->server('HTTP_REFERER'))) {
        $q = cd_session()->decode($request->get('q'));
        cd_session()->set($q);
    }

    return Image::canvas(1, 1)->response('jpg');
});