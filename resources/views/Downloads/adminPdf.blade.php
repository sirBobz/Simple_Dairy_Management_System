
<!DOCTYPE html>
<html lang="en">
<head>
  <title>PDF Download</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
  
<div class="container">
<br/>
	<a href="{{ route('pdfview',['download'=>'pdf']) }}" class="btn btn-success btn-sm">
      <span class="glyphicon glyphicon-download-alt"></span> Download PDF 
    </a>
    <br/><br/>
    <div class="table-responsive">
	<table id="farmersDetails" class="table table-striped table no-margin" cellspacing="0" width="100%">
       <thead>
         <tr class ="success">
			      <th class="text-center"> ID </th>
            <th class="text-center"> Name </th>
            <th class="text-center"> ID No.</th>
            <th class="text-center"> Dairy No.</th>
            <th class="text-center"> Milk Weight</th>
            
            <th class="text-center"> Total Amount</th>
            
		</tr>
      </thead>
      <tbody>
		@foreach ($items as $key => $item)
		<tr>
		    <td class="text-center"> {{++$key}} </td>
            <td class="text-center">{{$item->farmerName}}</td>
            <td class="text-center">{{$item->farmer_ID}}</td>
            <td class="text-center">{{$item->farmerDairyNum}}</td>
            <td class="text-center">{{$item->total_milk}}</td>
            
            <td class="text-center">{{$item->amount}}</td>
            
		</tr>
		@endforeach
		</tbody>
	</table>
  </div>
</div>

</body>
</html>


                            