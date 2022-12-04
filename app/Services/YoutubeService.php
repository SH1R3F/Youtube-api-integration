<?php


namespace App\Services;

use Illuminate\Support\Facades\Http;

class YoutubeService
{

    private $endpoints = [
        'channels.list'      => 'https://youtube.googleapis.com/youtube/v3/channels',
        'search.list'        => 'https://youtube.googleapis.com/youtube/v3/search',
        'playlists.list'     => 'https://youtube.googleapis.com/youtube/v3/playlists',
        'videos.list'        => 'https://youtube.googleapis.com/youtube/v3/videos',
        'playlistItems.list' => 'https://youtube.googleapis.com/youtube/v3/playlistItems',
    ];

    public function ChannelInfo($channelId)
    {
        $endpoint = $this->endpoints['channels.list'];
        $params = [
            'part' => 'snippet,statistics',
            'id'   => $channelId,
            'key'  => config('services.youtube.api_key')
        ];

        $response = Http::withoutVerifying()->get($endpoint, $params);

        return json_decode($response->body());
    }

    public function VideoById($videoId)
    {
        $endpoint = $this->endpoints['videos.list'];
        $params = [
            'part' => 'snippet',
            'id'   => $videoId,
            'key'  => config('services.youtube.api_key')
        ];

        $response = Http::withoutVerifying()->get($endpoint, $params);

        return json_decode($response->body());
    }

    public function PlaylistById($playlistId, $pageToken)
    {
        $endpoint = $this->endpoints['playlistItems.list'];
        $params = [
            'part'       => 'snippet',
            'playlistId' => $playlistId,
            'key'        => config('services.youtube.api_key'),
            'maxResults' => 8,
        ];
        if ($pageToken) {
            $params['pageToken'] = $pageToken;
        }
        $response = Http::withoutVerifying()->get($endpoint, $params);

        return json_decode($response->body());
    }

    public function VideosByChannelId($channelId, $pageToken)
    {
        $endpoint = $this->endpoints['search.list'];
        $params = [
            'part'       => 'snippet',
            'maxResults' => 16,
            'key'        => config('services.youtube.api_key'),
            'channelId'  => $channelId,
            'type'       => 'video',
            'order'      => 'date',
        ];

        if ($pageToken) {
            $params['pageToken'] = $pageToken;
        }
        $response = Http::withoutVerifying()->get($endpoint, $params);

        return json_decode($response->body());
    }

    public function PlaylistsByChannelId($channelId, $pageToken)
    {
        $endpoint = $this->endpoints['playlists.list'];
        $params = [
            'part'       => 'snippet',
            'maxResults' => 16,
            'key'        => config('services.youtube.api_key'),
            'channelId'  => $channelId
        ];

        if ($pageToken) {
            $params['pageToken'] = $pageToken;
        }
        $response = Http::withoutVerifying()->get($endpoint, $params);

        return json_decode($response->body());
    }
}
