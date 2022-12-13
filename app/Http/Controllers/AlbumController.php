<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actions\GetAlbum;

class AlbumController extends Controller
{
    public function getAlbum(Request $request)
    {
        $albums = app(GetAlbum::class)->handle([
            'id' => $request->id,
        ]);
    }
}
