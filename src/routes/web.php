<?php

Route::middleware('web')->get('sync_session', 'Kolirt\\CrossDomainSession\\app\\Http\\Controllers\\CrossDomainSessionController@index');