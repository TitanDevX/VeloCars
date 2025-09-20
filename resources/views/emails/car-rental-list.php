@component('mail::message')
# New Car Available for Rental! 🚗

Hello {{ $user->name }},

A new rental car matching your preferences has just been listed on {{ config('app.name') }}!

@component('mail::panel')
## {{ $car->year }} {{ $car->make }} {{ $car->model }}

<div style="text-align: center; margin: 20px 0;">
    <img src="{{ $car->getFirstMedia('thumbnail')->getFullUrl() }}" 
         alt="{{ $car->year }} {{ $car->make }} {{ $car->model }}"
         style="max-width: 100%; height: auto; border-radius: 8px; border: 1px solid #eaeaea;">
</div>

<table style="width: 100%; border-collapse: collapse; margin: 15px 0;">
    <tr>
        <td style="padding: 10px; border-bottom: 1px solid #eaeaea; width: 50%;"><strong>Daily Rate:</strong></td>
        <td style="padding: 10px; border-bottom: 1px solid #eaeaea; width: 50%;">${{ number_format($car->daily_rate, 2) }}/day</td>
    </tr>
    <tr>
        <td style="padding: 10px; border-bottom: 1px solid #eaeaea;"><strong>Weekly Rate:</strong></td>
        <td style="padding: 10px; border-bottom: 1px solid #eaeaea;">${{ number_format($car->weekly_rate, 2) }}/week</td>
    </tr>
    <tr>
        <td style="padding: 10px; border-bottom: 1px solid #eaeaea;"><strong>Location:</strong></td>
        <td style="padding: 10px; border-bottom: 1px solid #eaeaea;">{{ $car->location }}</td>
    </tr>
    <tr>
        <td style="padding: 10px; border-bottom: 1px solid #eaeaea;"><strong>Available From:</strong></td>
        <td style="padding: 10px; border-bottom: 1px solid #eaeaea;">{{ $car->available_from->format('M j, Y') }}</td>
    </tr>
    <tr>
        <td style="padding: 10px; border-bottom: 1px solid #eaeaea;"><strong>Minimum Rental:</strong></td>
        <td style="padding: 10px; border-bottom: 1px solid #eaeaea;">{{ $car->min_rental_days }} days</td>
    </tr>
    <tr>
        <td style="padding: 10px;"><strong>Vehicle Type:</strong></td>
        <td style="padding: 10px;">{{ $car->type }}</td>
    </tr>
</table>

@if($car->features)
<div style="margin: 15px 0;">
    <strong>Features:</strong>
    <ul style="padding-left: 20px; margin: 10px 0;">
        @foreach(explode(',', $car->features) as $feature)
        <li>{{ trim($feature) }}</li>
        @endforeach
    </ul>
</div>
@endif
@endcomponent

@component('mail::button', ['url' => route('car.show', $car->id), 'color' => 'primary'])
Reserve This Vehicle
@endcomponent

<!-- @if($similarCars->count() > 0)
<hr style="margin: 30px 0; border-top: 1px solid #eaeaea;">

<h2>Other Rental Vehicles Available</h2>

@foreach($similarCars as $similarCar)
<div style="margin: 15px 0; padding: 15px; border: 1px solid #eaeaea; border-radius: 5px;">
    <table width="100%">
        <tr>
            <td width="100" valign="top">
                <img src="{{ $similarCar->image_url ?? asset('images/default/car-thumbnail-placeholder.jpg') }}" 
                     alt="{{ $similarCar->year }} {{ $similarCar->make }} {{ $similarCar->model }}"
                     style="width: 90px; height: auto; border-radius: 4px;">
            </td>
            <td valign="top" style="padding-left: 15px;">
                <h3 style="margin: 0 0 8px 0; font-size: 16px;">{{ $similarCar->year }} {{ $similarCar->make }} {{ $similarCar->model }}</h3>
                <p style="margin: 4px 0; font-size: 14px;"><strong>${{ number_format($similarCar->daily_rate, 2) }}/day</strong></p>
                <p style="margin: 4px 0; font-size: 14px;">{{ $similarCar->location }}</p>
                <a href="{{ route('rentals.show', $similarCar->id) }}" 
                   style="color: #3490dc; text-decoration: none; font-weight: bold; font-size: 14px;">
                   View Details →
                </a>
            </td>
        </tr>
    </table>
</div>
@endforeach
@endif -->

@component('mail::button', ['url' => route('cars.search', ['rent' => 1]), 'color' => 'success'])
Browse All Rental Vehicles
@endcomponent

<!-- <p style="font-size: 14px; color: #666; margin-top: 25px;">
    Not finding what you're looking for? 
    <a href="{{ route('profile.edit') }}" style="color: #3490dc;">Update your rental preferences</a> 
    to receive more targeted alerts.
</p> -->

Thanks,<br>
The {{ config('app.name') }} Team

@component('mail::subcopy')
You're receiving this email because you subscribed to rental car listing notifications.
[Unsubscribe]({{ route('notifsub.unsubscribe', ['token' => $user->unsubscribe_token, 'type' => 'rental']) }}) from rental alerts.
@endcomponent
@endcomponent