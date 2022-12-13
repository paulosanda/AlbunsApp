<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actions\GetAlbum;
use App\Models\Album;

class AlbumController extends Controller
{
    public function getAlbum($id)
    {
        $albums = app(GetAlbum::class)->handle([
            'id' => $id,
        ]);

        return view('albums', compact('albums'));
    }

    public function update(Request $request)
    {
        /**
         * We have few variables so it's not worth creating a specific form request
         */
        $validated = $request->validate([
            'album_name' => 'required',
            'year' => 'required',
            'id' => 'required',
        ]);

        Album::where('id', $validated['id'])->update([
            'album_name' => $validated['album_name'],
            'year' => $validated['year']
        ]);

        return redirect()->back();
    }

    public function delete(Request $request)
    {
        Album::where('id', $request->id)->delete();
        return redirect()->back();
    }
}
