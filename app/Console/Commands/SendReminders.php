<?php

namespace App\Console\Commands;

use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendReminders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:reminders';
    protected $description = 'Send reminders for today\'s appointments based on configured working hours.';

    /**
     * The console command description.
     *
     * @var string
     */


    /**
     * Execute the console command.
     */
    public function handle()
    {
 $workingDays = config('schedule.working_days');
        $timeSlots   = config('schedule.time_slots');

        $tomorrow = now()->addDay();
        $tomorrowDayName = $tomorrow->format('l'); // Day name, e.g. Sunday, Monday

        if (!in_array($tomorrowDayName, $workingDays)) {
            $this->info("Tomorrow ($tomorrowDayName) is not a working day.");
            return;
        }

        $tomorrowDate = $tomorrow->format('Y-m-d');

        $appointments = Appointment::where('date', $tomorrowDate)->get();
        $count = 0;

        foreach ($appointments as $appointment) {
            $slot = $appointment->time;

            if (in_array($slot, $timeSlots)) {
                Mail::raw("Hello! This is a reminder of your medical appointment scheduled tomorrow at {$slot}.", function ($message) use ($appointment) {
                    $message->to($appointment->user->email)
                            ->subject('Medical Appointment Reminder for Tomorrow');
                });
                $count++;
            }
        }

        $this->info("Sent $count appointment reminders for tomorrow.");
    }
    }

