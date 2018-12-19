<?php

namespace App\Observers;

use App\Models\Config;

class ConfigObserve
{
    /**
     * Handle the config "created" event.
     *
     * @param  \App\Models\Config  $config
     * @return void
     */
    public function created(Config $config)
    {
        $this -> saveConfigToCache ();
    }

    /**
     * Handle the config "updated" event.
     *
     * @param  \App\Models\Config  $config
     * @return void
     */
    public function updated(Config $config)
    {
        $this -> saveConfigToCache ();
    }

    public function saveConfigToCache ()
    {

        \ Cache::forever ('config_cache',Config::pluck('content','name'));

    }

}
