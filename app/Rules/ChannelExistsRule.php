<?php

namespace App\Rules;

use App\Services\YoutubeService;
use Illuminate\Contracts\Validation\Rule;

class ChannelExistsRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $service = new YoutubeService();
        $channel = $service->ChannelInfo(($value));
        return !!$channel->pageInfo->totalResults;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'No channels found with this id.';
    }
}
