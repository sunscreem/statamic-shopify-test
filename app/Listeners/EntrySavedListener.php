<?php

namespace App\Listeners;

use Statamic\Events\EntrySaved;

class EntrySavedListener
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
    public function handle(EntrySaved $event): void
    {

        if ($event->entry->collection()->handle() === 'products') {
            $dataPublished = $event->entry->data()['published'];
            $event->entry->published($dataPublished)->saveQuietly();
        }
    }
}
