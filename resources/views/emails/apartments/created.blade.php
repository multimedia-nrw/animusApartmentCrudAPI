@component('mail::message')

# Following are the apartment details entered

@component('mail::panel')
<label for="">Apartment Address</label>
<span>{{ $apartment_address }}</span>
@endcomponent

@component('mail::panel')
<label for="">Apartment Property Id</label>
<span>{{ $apartment_property_id }}</span>
@endcomponent

@component('mail::panel')
<label>Move In Date</label>
<span>{{ $move_in_date }}</span>
@endcomponent

@component('mail::button', ['url' => $editUrl, 'color' => 'blue'])
Edit Apartment
@endcomponent

@component('mail::button', ['url' => $deleteUrl, 'color' => 'red'])
Delete Apartment
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
