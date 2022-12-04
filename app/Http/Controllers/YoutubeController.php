<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FetchChannelRequest;
use App\Services\YoutubeService;

class YoutubeController extends Controller
{

    public function playlists(FetchChannelRequest $request, YoutubeService $service)
    {
        // Fetch playlists by channel id
        $channelId = $request->channel_id;
        $playlists = $service->PlaylistsByChannelId($channelId, $request->get('pageToken'));

        if (isset($playlists->error)) {
            return redirect()->route('youtube')->withErrors(['playlists_channel_id' => $playlists->error->errors[0]->message]);
        }

        return view('youtube.show', compact('playlists', 'channelId'));
    }
}
