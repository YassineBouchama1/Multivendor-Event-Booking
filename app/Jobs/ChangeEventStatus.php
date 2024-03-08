<?php


namespace App\Jobs;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ChangeEventStatus implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    protected $eventId;

    public function __construct($eventId)
    {
        $this->eventId = $eventId;
    }
    // sail artisan queue:work --once
    public function handle(): void
    {
        $event = Event::find($this->eventId);

        //1- Check if event exists and is still active
        if ($event && $event->status != 'canceled') {
            //2- Convert start_date to a Carbon instance
            $endDate = Carbon::parse($event->end_date);

            //3- Check if the event is older
            if ($endDate->isPast()) {
                // Cancel the event
                $event->update(['status' => 'ended']);
            }
        }
    }
}
