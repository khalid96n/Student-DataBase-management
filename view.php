<?php
include 'dbconnect.php';

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
			 <a href="main.php" class="list-group-item list-group-item-action">
			 	<i class="fa fa-vcard-o"></i> DashBoard
			 </a>

			 <a href="addStudent.php" class="list-group-item list-group-item-action">
			 	<i class="fa fa-user"></i> Add </a>

			 <a href="#" class="list-group-item list-group-item-action">
			 	<i class="fa fa-eye"></i> View </a>

			 <a href="#" class="list-group-item list-group-item-action">
			 	<i class="fa fa-pencil"></i> Edit </a>

			 <a href="#" class="list-group-item list-group-item-action">
			 	<i class="fa fa-sign-out"></i> Logout</a>
			
		</ul>
	</div>



	<div class="main-body">
		<button class="btn btn-outline-light  bg-secondary mt-3" id="toggler">
			<i class="fa fa-bars"></i>
		</button>


		<section id="main-form">
			<h3 class="text-center text-success"><?php echo @ $_GET['delete_msg']; ?></h3>

			<h2 class="text-center text-dark pt-3 font-weight-bold">Manage Student</h2>
			<div class="container bg-dark" id="formsetting">
				<h4 class="text-white text-center pb-4 pt-2 font-weight-light">Student details</h4>
			
			<div class="row">
				<div class="col-md-12 col-sm-12 col-12">
					<table class="table table-borderd text-white table-responsive">
						<thead>
							<tr>
								<th>Sl.no</th>
								<th>First Name</th>
								<th>Last Name</th>
								<th>Email</th>
								<th>Father Name</th>
								<th>Birth Date</th>
								<th>Gender</th>		
								<th>Mobile</th>
								<th>City</th>
								<th>District</th>
								<th>State</th>
								<th>Nationality</th>
								<!-- <th>Photo</th> -->
								<th>Action</th>
							</tr>
						</thead>
						<?php
						$sql= "select * from student_detail "; 
						$run = mysqli_query($conn,$sql);
						$i= 1;

						while ($row =mysqli_fetch_assoc($run)) {
							// code...
						

						?>
						<tbody>
							<tr>
								<td><?php echo $i++ ; ?></td>
								<td><?php echo $row['fname'] ; ?></td>
								<td><?php echo $row['lname'] ; ?></td>
								<td><?php echo $row['email'] ; ?></td>
								<td><?php echo $row['father_name'] ; ?></td>
								<td><?php echo $row['birthdate'] ; ?></td>
								<td><?php echo $row['gender'] ; ?></td>
								<td><?php echo $row['mobile'] ; ?></td>
								<td><?php echo $row['city'] ; ?></td>
								<td><?php echo $row['district'] ; ?></td>
								<td><?php echo $row['state'] ; ?></td>
								<td><?php echo $row['nation'] ; ?></td>
								 <!-- <td>
								 	<a href="st_image/<?php echo $row['photo'];?>">
								 		<img src="st_image/<?php echo $row['photo']; ?>" width="50" height="50">
								 	</a>
								 </td> -->
								 <td>
								 	<a style="color: whitesmoke; text-decoration:none; " href="edit.php?edit_student=<?php echo $row['st_id'];?>">Edit</a> |
								 	<a style="color: whitesmoke; text-decoration:none; " href="delete.php?delete_student=<?php echo $row['st_id'];?>">Delete</a>
								 </td>
								
							</tr>
						</tbody>
						<?php } ?>
					</table>
					
				</div>
				
				

				</div>

			</div>
			
		</section>
	
	</div>
	</div>

</body>
</html>



