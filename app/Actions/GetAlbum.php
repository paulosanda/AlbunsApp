<?php

namespace App\Actions;

use Illuminate\Support\Facades\Http;
use App\Models\Album;
use Illuminate\Database\Eloquent\Collection;

class GetAlbum
{
    public function __construct(
        protected $url = 'https://europe-west1-madesimplegroup-151616.cloudfunctions.net/artists-api-controller',
        protected $key = 'ZGV2ZWxvcGVyOlpHVjJaV3h2Y0dWeQ=='
    ) {
    }

    /**
     * handle
     *
     * @param  mixed $data
     * @return Collection
     */
    public function handle($data): Collection
    {
        $albums = Http::withHeaders([
            'Authorization' => 'basic ' . $this->key,
        ])->get($this->url . '?artist_id=' . $data['id']);

        $response = json_decode($albums, true);
        /**At this point the API does not provide the necessary data
         * so we mock the results to be able to proceed
         * */
        // dd($response['json']);
        $albums = Album::where('artist', $response['json'][0]['name'])->get();
        if ($albums->count() < 1) {
            $newAlbums = $this->createAlbums($response['json'][0]['name']);
            return $newAlbums;
        } else {
            return $albums;
        }
    }


    /**
     * createAlbums
     *
     * @param  mixed $data
     * @return Collection
     */
    protected function createAlbums($data): Collection
    {
        $newAlbums = Album::factory()->count(10)->create([
            'artist' => $data
        ]);
        return $newAlbums;
    }
}
