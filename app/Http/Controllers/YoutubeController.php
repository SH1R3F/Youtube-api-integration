<?php

namespace App\Http\Controllers;

use App\Http\Requests\FetchChannelRequest;
use App\Services\YoutubeService;

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
}
