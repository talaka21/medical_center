<?php

namespace App\Http\Controllers;

use App\Events\AppointmentBooked;
use App\Models\Appointment;

use App\Http\Requests\AppointmentRequest;
use App\Services\AppointmentService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends ApiController
{
protected $appointmentService;

    public function __construct(AppointmentService $appointmentService)
    {
        $this->appointmentService = $appointmentService;
    }

public function store(AppointmentRequest $request)
{
  $user = Auth::guard('user')->user();

    $response = $this->appointmentService->bookAppointment(
        $user->id,
        $request->doctor_id,
        $request->date,
        $request->time
    );

    return response()->json([
        'success' => $response['success'],
        'message' => $response['message'],
        'data' => $response['data'] ?? null,
        'error' => $response['error'] ?? null,
    ], $response['code']);
    }
}
