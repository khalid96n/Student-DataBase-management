<?php 

session_start();
if (!$_SESSION['email']) {
	$_SESSION['login_first']="Please login first";
	header('location:index.php');
}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Main Page</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="style.css">

<script>
	jQuery(document).ready(function($){
		$('#toggler').click(function(event){
			{
				event.preventDefault();
				$('#wrap').toggleClass('toggled');
			}
		});
	});
</script>

</head>
<body>

	<div class="d-flex" id="wrap">
		
		<div class="sidebar bg-light border-light">
			<div class="sidebar-heading">
			<p class="text-center">Manage Student</p>
		</div>
		
		<ul class="list-group list-group-flush">
			 <a href="#" class="list-group-item list-group-item-action">
			 	<i class="fa fa-vcard-o"></i> DashBoard
			 </a>

			 <a href="addStudent.php" class="list-group-item list-group-item-action">
			 	<i class="fa fa-user"></i> Add </a>

			 <a href="view.php" class="list-group-item list-group-item-action">
			 	<i class="fa fa-eye"></i> View </a>

			 <a href="#" class="list-group-item list-group-item-action">
			 	<i class="fa fa-pencil"></i> Edit </a>

			 <a href="index.php" class="list-group-item list-group-item-action">
			 	<i class="fa fa-sign-out"></i> Logout</a>
			
		</ul>
	</div>



	<div class="main-body">
		<button class="btn btn-outline-light  bg-secondary mt-3" id="toggler">
			<i class="fa fa-bars"></i>
		</button>


		<section id="main-form">

			<h2 class="text-center text-dark pt-3 font-weight-bold">Manage Student</h2>
			<div class="container bg-dark" id="formsetting">
				<h4 class="text-white text-center pb-4 pt-2 font-weight-light">DashBoard</h4>
			
			<div class="row">
				
				<div class="col-md-4 col-sm-4 col-12 m-auto icon">
					<a href="addStudent.php" class="text-center text-white"><i class="fa fa-user"></i>
						<h5>Add Student Details</h5>
					</a>
				</div>


				<div class="col-md-4 col-sm-4 col-12 m-auto icon">
					<a href="view.php" class="text-center text-white"><i class="fa fa-eye"></i>
						<h5>View Student Details</h5>
					</a>
				</div>



				<div class="col-md-4 col-sm-4 col-12 m-auto icon">
					<a href="#" class="text-center text-white"><i class="fa fa-pencil"></i>
						<h5>Edit Student Details</h5>
					</a>
				</div>

				</div>

			</div>
			
		</section>
	
	</div>
	</div>

</body>
</html>