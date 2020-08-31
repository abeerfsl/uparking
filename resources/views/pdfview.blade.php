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

<h1 class="text-center"> Paking Info</h1>
	<br/>
	<table class="table tablesorter ">
	  <thead>
	    <tr>
	      <th scope="col" class="text-center">Parking ID</th>
	      <th scope="col" class="text-center">Parking Name</th>
	      <th scope="col" class="text-center">Parking Location </th>
	      <th scope="col" class="text-center" >Description</th>
	      <th scope="col" class="text-center">AdminId</th>
	    </tr>
	  </thead>
	  <tbody>
			@foreach ($parking_lot as $parking_lot)

			<tr>

				<td scope="row" class="text-center">{{ $parking_lot->id }}</td>
				<td class="text-center">{{ $parking_lot->parking_name }}</td>
				<td class="text-center">{{ $parking_lot->parking_location }}</td>
				<td class="text-center">{{ $parking_lot->description }}</td>
				<td class="text-center">{{ $parking_lot->users_id }}</td>
			</tr>
			@endforeach

	  </tbody>
	</table>
</div>
