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

    public function handle()
    {
        $artists = Http::withHeaders([
            'Authorization' => 'basic ' . $this->key,
        ])->get($this->url);

        $response = json_decode($artists);

        return $response;
    }
}
