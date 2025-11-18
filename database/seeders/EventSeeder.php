<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;
use Carbon\Carbon;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        Event::truncate();

        Event::create(['title' => 'Toplantı', 'start' => Carbon::now()->addDay()->setHour(10), 'end' => Carbon::now()->addDay()->setHour(11), 'all_day' => false]);
        Event::create(['title' => 'Önemli teslim', 'start' => Carbon::now()->addDays(3)->setHour(9), 'end' => null, 'all_day' => true]);
    }
}
