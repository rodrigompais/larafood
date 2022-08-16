<?php

namespace App\Observers;

use App\Models\Admin\Client;
use Illuminate\Support\Str;

class ClientObserver
{
    /**
     * Handle the client "created" event.
     *
     * @param  \App\Models\Product  $client
     * @return void
     */
    public function creating(Client $client)
    {
        $client->uuid = Str::uuid();
    }

}
