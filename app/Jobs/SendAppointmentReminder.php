<?php

namespace App\Jobs;

use App\Mail\AppintmenMail;
use App\Mail\AppointmentReminderMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;


class SendAppointmentReminder implements ShouldQueue
{
    use Dispatchable, Queueable;

    /**
     * Create a new job instance.
     */
    protected $appointment;
    public function __construct($appointment)
    {
        $this->appointment = $appointment;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
       Mail::to($this->appointment->user->email)
        ->send(new AppointmentReminderMail($this->appointment));
         logger("Email sent successfully.");

    }
}
