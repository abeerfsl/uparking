<style type="text/css">
table{
  width: 100%;
}
	table td, table th{
		border:1px solid black;
		text-align: center;

	}

</style>
<div class="container">

<h1 class="text-center"> Booking Info</h1>
	<br/>
	<table class="table tablesorter ">
  <tr>
        <th scope="col" class="text-center">{{ __('Date') }}</th>
        <th scope="col" class="text-center">{{ __('Start Time') }}</th>
        <th scope="col" class="text-center">{{ __('End Time') }}</th>
        <th scope="col" class="text-center">{{ __('Plate Number') }}</th>
        <th scope="col" class="text-center">{{ __('Booking State') }}</th>
        <th scope="col" class="text-center">{{ __('Username') }}</th>
        <th scope="col" class="text-center">{{ __('Slot Number') }}</th>
  </tr>
			@foreach ($booking as $booking)
    @if (auth()->user()->id == $booking->users_id)
			<tr>

            <td scope="col" class="text-center">{{ $booking->date }}</td>
            <td scope="col" class="text-center">{{ Carbon\Carbon::parse($booking->start_time)->format('H:i:s') }}</td>
            <td scope="col" class="text-center">{{ Carbon\Carbon::parse($booking->end_time)->format('H:i:s') }}</td>
            <td scope="col" class="text-center">{{ $booking->plate_number }}</td>
            <td scope="col" class="text-center">{{ $booking->booking_state }}</td>
            <td scope="col" class="text-center">{{ $booking->username }}</td>
            <td scope="col" class="text-center">{{ $booking->slot_number }}</td>
			</tr>
      @endif
			@endforeach


	</table>
</div>
