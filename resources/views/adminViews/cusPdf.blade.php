<!DOCTYPE html>
<html lang="en">
<head>
	<title>Genarate customers</title>
    <style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>

	
	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100"><center><h3>Customer Details  </h3></center>
                    
					<table>
                                        <thead>
                                            <tr>
                                                <th>Customer Name</th>
                                                <th>Email</th>
                                                <th>Address</th>
                                                <th>Membership status</th>
                                                <th>Points</th>
                                                <th>Phone No</th>
                                                
                                            </tr>
                                        </thead>
                                       
                                        <tbody>

                                            @foreach($customers as $customer)
                                                    <tr>
                                                        <td>{{$customer->name}}</td>
                                                        <td>{{$customer->email}}</td>
                                                        <td>{{$customer->address}}</td>
                                                        <td>{{$customer->membership_status}}</td>
                                                        <td>{{$customer->shopping_point}}</td>
                                                        <td>{{$customer->phone_no}}</td>
                                                       
                                                </tr>
                                           @endforeach 
                                        </tbody>
                                  
					</table>
				</div>
			</div>
		</div>
	</div>


	



</body>
</html>