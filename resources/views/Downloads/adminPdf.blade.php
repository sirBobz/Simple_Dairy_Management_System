<style type="text/css">
	table td, table th{
		border:1px solid black;
	}
</style>
<div class="container">

	<br/>
	<a href="{{ route('pdfview',['download'=>'pdf']) }}">Download PDF</a>

	<table>
		<tr>
			<th> ID </th>
            <th> Name </th>
            <th> Gender</th>
            <th> Email</th>
            <th> ID Number</th>
            <th> Po Box</th>
            <th> Total Milk</th>
            <th> Status</th>
            <th> Created At</th>  
		</tr>
		@foreach ($items as $key => $item)
		<tr>
		    <td> {{++$key}} </td>
            <td> {{$item->first_name}} {{$item->second_name}} {{$item->third_name}}</td>
            <td> {{$item->gender}}</td>
            <td> {{$item->email}} </td>
            <td> {{$item->id_number}}</td>
            <td> {{$item->box_number}} {{$item->zip_code}} {{$item->postal_town}}</td>
            <td> {{$item->total_milk}}</td>
		</tr>
		@endforeach
	</table>
</div>