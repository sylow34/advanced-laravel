<?php

namespace App\Http\View\Composers;

use App\Models\Channel;
use Illuminate\View\View; // here is important

class ChannelsComposer
{
    public function compose(View $view)
    {
        $view->with('channels', Channel::orderBy('name')->get());
    }
}
