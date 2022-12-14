<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actions\GetAlbum;
use App\Models\Album;
use Illuminate\Support\Facades\Gate;

class AlbumController extends Controller
{
    /**
     * getAlbum
     *
     * @param  mixed $id
     * @return string
     */
    public function getAlbum($id): string
    {
        $albums = app(GetAlbum::class)->handle([
            'id' => $id,
        ]);

        return view('albums', compact('albums'));
    }

    /**
     * update
     *
     * @param  mixed $request
     */
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

    /**
     * delete
     *
     * @param  mixed $request
     */
    public function delete(Request $request)
    {
        if (!Gate::allows('delete-album', \Auth::user())) {
            abort(403);
        }

        Album::where('id', $request->id)->delete();

        return redirect()->back();
    }
}
