<?php


namespace App\Services;

use Illuminate\Support\Facades\Http;

class YoutubeService
{

    private $endpoints = [
        'playlists.list' => 'https://youtube.googleapis.com/youtube/v3/playlists',
    ];

    public function PlaylistsByChannelId($channelId, $pageToken)
    {
        $endpoint = $this->endpoints['playlists.list'];

        $params = [
            'channelId'  => $channelId,
            'part'       => 'snippet',
            'maxResults' => 8,
            'key'        => config('services.youtube.api_key'),
        ];
        if ($pageToken) {
            $params['pageToken'] = $pageToken;
        }
        $response = Http::withoutVerifying()->get($endpoint, $params);

        return json_decode($response->body());
    }
}
