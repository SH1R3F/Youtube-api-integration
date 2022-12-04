<?php


namespace App\Services;

use Illuminate\Support\Facades\Http;

class YoutubeService
{

    private $endpoints = [
        'search.list' => 'https://youtube.googleapis.com/youtube/v3/search',
        'playlists.list' => 'https://youtube.googleapis.com/youtube/v3/playlists',
    ];

    private $params = [];

    public function __construct()
    {
        $this->params = [
            'part'       => 'snippet',
            'maxResults' => 16,
            'key'        => config('services.youtube.api_key')
        ];
    }

    public function VideosByChannelId($channelId, $pageToken)
    {
        $endpoint = $this->endpoints['search.list'];
        $this->params['channelId'] = $channelId;
        $this->params['type'] = 'video';
        $this->params['order'] = 'date';

        if ($pageToken) {
            $this->params['pageToken'] = $pageToken;
        }
        $response = Http::withoutVerifying()->get($endpoint, $this->params);

        return json_decode($response->body());
    }

    public function PlaylistsByChannelId($channelId, $pageToken)
    {
        $endpoint = $this->endpoints['playlists.list'];
        $this->params['channelId'] = $channelId;

        if ($pageToken) {
            $this->params['pageToken'] = $pageToken;
        }
        $response = Http::withoutVerifying()->get($endpoint, $this->params);

        return json_decode($response->body());
    }
}
