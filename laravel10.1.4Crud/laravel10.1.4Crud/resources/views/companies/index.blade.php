<!DOCTYPE html>
<html>
<head>
	<title>laravel9crud</title>
	<link rel="stylesheet" type="text/css" href="">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css')}}">
</head>
<body>

	 <h1 class="text text-info" style="text-align: center; margin-top: 4%;"> Hello World this is CRUD With laravel 10.1.4</h1>
	<!-- verifion si bootstrap prends -->
	<button class="btn btn-primary">hello</button> 


	<div class="container mt-2">
		<div class="row">
			<div class="col-lg-12 margin-tb">
				<div class="pull-left">
					<h2> Laravel 10.1.4 CRUD EXAMPLE</h2>
				</div>

				<div class="pull-right mb-2">
					<a class="btn btn-success" href="{{ route('companies.create') }}">Create Compagny</a>
				</div>
			</div>
		</div>
	</div>


	@if($message = Session::get('success'))

	   <div class="alert alert-success">
	   	 <p>{{ $message }}</p>
	   </div>
	@endif
	

	<table class="table table-bordered">
		<thead>
			<tr>
				<th>S.No</th>
				<th>Compagny Name</th>
				<th>Compagny Email</th>
				<th>Compagny Address</th>

				<th width="280px">Action</th>
			</tr>
		</thead>

		<tbody>
			
             @foreach($companies as $compagny)

             <tr>
             	
             	<td>{{ $compagny->id }}</td>
             	<td>{{ $compagny->name}}</td>
             	<td>{{ $compagny->email}}</td>
             	<td>{{ $compagny->address }}</td>

             	<td>
             		
             		<form action="{{ route('companies.destroy',$compagny->id)}}">

             			<a class="btn btn-primary" href="{{route('companies.edit',$compagny->id)}}">Edit</a>

             			@csrf

             			@method('DELETE')

             			<button type="submit" class="btn btn-dangrd">Delede</button>
             			
             		</form>
             	</td>
             </tr>

             @endforeach

		</tbody>
	</table>  


	{!! $companies->links() !!} 

</body>
</html>