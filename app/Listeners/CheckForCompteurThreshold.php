<?php

namespace App\Listeners;

use App\Events\CompteurHeuresUpdated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CheckForCompteurThreshold
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(CompteurHeuresUpdated $event): void
    {
        //
    }
}
