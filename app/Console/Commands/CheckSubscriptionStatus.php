<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Booking;
use Illuminate\Console\Command;

class CheckSubscriptionStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:check-subscription-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $expiredSubscriptions = Booking::where('end_date', '<', Carbon::now())->get();

        foreach ($expiredSubscriptions as $subscription) {
            $subscription->status = 0;
            $subscription->save();
        }

        $this->info('Subscription status checked and updated.');
    }
}
