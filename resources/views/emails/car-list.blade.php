@component('mail::message')
# New Car Alert! 🚗

Hello {{ $user->name }},

A new car matching your preferences has just been listed on our platform!

## {{ $car->year }} {{ $car->make }} {{ $car->model }}

**Price:** ${{ number_format($car->buy_price, 2) }}  
**Mileage:** {{ number_format($car->mileage) }} miles  
**Branch:** {{ $car->branch->quickAddress() }}  
**Listed:** {{ $car->created_at->format('M j, Y') }}

@if($car->details)
**Key Features:**
- {{ implode("\n- ", explode(',', $car->details->features)) }}
@endif

@component('mail::button', ['url' => route('cars.show', $car->id)])
View This Car
@endcomponent

@component('mail::button', ['url' => route('cars.index'), 'color' => 'success'])
Browse All New Listings
@endcomponent

### Not finding what you're looking for?
[Update your preferences]({{ route('profile.edit') }}) to receive more targeted alerts.

Thanks,<br>
{{ config('app.name') }} Team

@component('mail::subcopy')
You're receiving this email because you subscribed to new car listing notifications.
[Unsubscribe]({{ route('subscriptions.unsubscribe', $user->unsubscribe_token) }}) from these alerts.
@endcomponent
@endcomponent