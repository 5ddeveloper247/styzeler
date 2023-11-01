<?php

namespace App\Console\Commands;

use App\Models\BookingSlots;
use Illuminate\Console\Command;

class CancelOnHolds extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cancel:onHolds';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cancel On Hold that have not been responded to within 36 hours.';
    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $on_hold_slots = BookingSlots::where('status', '=', 'Booked')
            ->where('created_at', '<', now())
            ->get();
        foreach ($on_hold_slots as $on_hold) {
            $on_hold->status = 'Cancelled due to Time Expire';
            $on_hold->slots_time = null;
            $on_hold->save();
        }
        return Command::SUCCESS;
    }
}
