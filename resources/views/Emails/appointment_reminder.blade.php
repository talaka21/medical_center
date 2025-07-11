@php
    $locale = app()->getLocale();
@endphp

@if ($locale === 'ar')
    <h1>تذكير بموعدك</h1>
    <p>مرحبا {{ $appointment->user->name }}،</p>
    <p>لديك موعد مع الدكتور {{ $appointment->doctor->name }} بتاريخ {{ $appointment->date }} الساعة {{ $appointment->time }}.</p>
@else
    <h1>Appointment Reminder</h1>
    <p>Hello {{ $appointment->user->name }},</p>
    <p>You have an appointment with Dr. {{ $appointment->doctor->name }} on {{ $appointment->date }} at {{ $appointment->time }}.</p>
@endif
