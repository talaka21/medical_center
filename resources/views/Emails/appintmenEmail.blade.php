<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <title>{{ __('Appointment Confirmation') }}</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; background-color: #f4f4f4; padding: 20px;">
    <div style="max-width: 600px; margin: auto; background-color: white; padding: 30px; border-radius: 8px;">
        <h2 style="color: #2c3e50;">
            @if ($recipientType === 'user')
                {{ __('Appointment Confirmation') }}
            @else
                {{ __('New Appointment Notification') }}
            @endif
        </h2>

        <p>

            @if ($recipientType === 'user')
                {{ __('Dear') }} {{ $appointment->user->name }},
                <br>{{ __('Your appointment has been confirmed.') }}
            @else
                {{ __('Dear Dr.') }} {{ $appointment->doctor->name }},
                <br>{{ __('A new appointment has been booked.') }}
            @endif
        </p>

        <table cellpadding="5" cellspacing="0" border="0" style="margin-top: 15px;">
            @if ($recipientType ==='user')
                <tr>
                    <td><strong>{{ __('Doctor') }}:</strong></td>
                    <td>{{ $appointment->doctor->name }}</td>
                </tr>
            @else
                <tr>
                    <td><strong>{{ __('user') }}:</strong></td>
                    <td>{{ $appointment->user->name }}</td>
                </tr>
            @endif
            <tr>
                <td><strong>{{ __('Date') }}:</strong></td>
                <td>{{ $appointment->date }}</td>
            </tr>
            <tr>
                <td><strong>{{ __('Time') }}:</strong></td>
                <td>{{ $appointment->time }}</td>
            </tr>
        </table>

        <p style="margin-top: 20px;">
            <a href="{{ url('/appointments/' . $appointment->id) }}" style="background-color: #3490dc; color: #fff; padding:
