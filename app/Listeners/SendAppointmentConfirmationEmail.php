<?php

namespace App\Listeners;

use App\Events\AppointmentBooked;
use App\Mail\AppintmenMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendAppointmentConfirmationEmail
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
    public function handle(AppointmentBooked $event): void
{
    $appointment = $event->appointment;
    $appointment->load('user', 'doctor');

    Mail::to($appointment->user->email)->send(new AppintmenMail($appointment,'user'));
    Mail::to($appointment->doctor->email)->send(new AppintmenMail($appointment,'doctor'));
}

}
