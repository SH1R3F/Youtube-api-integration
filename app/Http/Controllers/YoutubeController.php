<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\YoutubeService;
use App\Http\Requests\FetchChannelRequest;

class YoutubeController extends Controller
{

    public function videos(FetchChannelRequest $request, YoutubeService $service)
    {
        // Fetch playlists by channel id
        $channelId = $request->videos_channel_id;

        $channel = $service->ChannelInfo($channelId);

        $videos = $service->VideosByChannelId($channelId, $request->get('pageToken'));

        if (isset($videos->error)) {
            return redirect()->route('youtube')->withErrors(['videos_channel_id' => $videos->error->errors[0]->message]);
        }

        return view('youtube.videos', compact('channel', 'videos', 'channelId'));
    }

    public function playlists(FetchChannelRequest $request, YoutubeService $service)
    {
        // Fetch playlists by channel id
        $channelId = $request->playlists_channel_id;

        $channel = $service->ChannelInfo($channelId);

        $playlists = $service->PlaylistsByChannelId($channelId, $request->get('pageToken'));

        if (isset($playlists->error)) {
            return redirect()->route('youtube')->withErrors(['playlists_channel_id' => $playlists->error->errors[0]->message]);
        }

        return view('youtube.playlists', compact('channel', 'playlists', 'channelId'));
    }

    public function playlist(Request $request, $playlistId, YoutubeService $service)
    {

        $playlist = $service->PlaylistById($playlistId, $request->get('pageToken'));

        // Fetch video information
        return view('youtube.playlist', compact('playlist', 'playlistId'));
    }

    public function show($videoId, YoutubeService $service)
    {

        $video = $service->VideoById($videoId);

        if (!$video->pageInfo->totalResults) {
            abort(404, 'Video not found');
        }

        // Fetch video information
        return view('youtube.video', compact('video'));
    }
}
