<?php

namespace App\Actions;

use Illuminate\Support\Facades\Http;

class GetArtists
{
    public function __construct(
        protected $url = 'https://europe-west1-madesimplegroup-151616.cloudfunctions.net/artists-api-controller',
        protected $key = 'ZGV2ZWxvcGVyOlpHVjJaV3h2Y0dWeQ=='
    ) {
    }

    /**
     * handle
     *
     * @return array
     */
    public function handle(): array
    {
        $artists = Http::withHeaders([
            'Authorization' => 'basic ' . $this->key,
        ])->get($this->url);

        $response = json_decode($artists);

        $artistArray = array();
        foreach ($response as $data) {
            foreach ($data as $d) {
                $artist = json_decode(json_encode($d[0], true));
                array_push($artistArray, [
                    'name' => $artist->name,
                    'id' => $artist->id,
                ]);
            }
        }

        return $artistArray;
    }
}
