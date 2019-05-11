<?php

namespace Kolirt\CrossDomainSession\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class CrossDomainSessionController extends Controller
{

    public function index(Request $request)
    {
        if (cd_session()->isValideDomain(request()->root())) {
            $q = cd_session()->decode($request->get('q'));
            cd_session()->set($q);
        }

        return Image::canvas(1, 1)->response('jpg');
    }

}