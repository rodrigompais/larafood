<?php

namespace App\Observers;

use App\Models\Admin\Table;
use Illuminate\Support\Str;

class TableObserver
{
    /**
     * Handle the table "created" event.
     *
     * @param  \App\Models\Product  $table
     * @return void
     */
    public function creating(Table $table)
    {
        $table->uuid = Str::uuid();
    }
}
