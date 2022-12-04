<?php

namespace App\Http\Requests;

use App\Rules\ChannelExistsRule;
use Illuminate\Foundation\Http\FormRequest;

class FetchChannelRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'videos_channel_id' => [
                'filled',
                new ChannelExistsRule
            ],
            'playlists_channel_id' => [
                'filled',
                new ChannelExistsRule
            ]
        ];
    }
}
