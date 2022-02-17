<?php 

include 'dbconnect.php';
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

			 <a href="view.php" class="list-group-item list-group-item-action">
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
				
			<h2 class="text-center text-dark pt-3 font-weight-bold">Manage Student</h2>
			<div class="container bg-dark" id="formsetting">
				<h4 class="text-white text-center pb-4 pt-2 font-weight-light">Edit Student Details</h4>

				<?php 

				if(isset($_GET['edit_student'])){

					$edit_st_id=$_GET['edit_student'];
					$query= "select * from student_detail where st_id = 'edit_st_id'";
					$run= mysqli_query($conn,$query);
					while($row = mysqli_fetch_assoc($run))
					{


				?>

			<form method="post" action="" enctype="multipart/forn-data">
			<div class="row">
				
				<div class="col-md-5 col-sm-5 col-12 m-auto">
				
					<div class="form-group">
					<label class="text-white">First Name</label>
					<input type="text" name="fname" placeholder="Enter first name" class="form-control" value="<?php echo $row['fname'];?>">
					</div>

					<div class="form-group">
					<label class="text-white">Email</label>
					<input type="email" name="email" placeholder="Enter email id" class="form-control" value="<?php echo $row['email'];?>">
					</div>

					<div class="form-group">
					<label class="text-white">Father's Name</label>
					<input type="text" name="fathername" placeholder="Enter Father's name" class="form-control" value="<?php echo $row['father_name'];?>">
					</div>


					<div>
					<label class="text-white">Gender</label>	

					<input type="radio" name="gender" value="male"class="form-check-input ml-2" <?php if ($row['gender']=='male') echo "checked"; ?>>
					<label class="form-check-label text-white pl-4">Male</label>
					

					<input type="radio" name="gender" value="female" class="form-check-input ml-2"  <?php if ($row['gender']=='female') echo "checked"; ?>>
					<label class="form-check-label text-white pl-4">Female</label>
					</div>



					<div class="form-group">
					<label class="text-white">City</label>
					<input type="text" name="city" placeholder="Enter city name" class="form-control" value="<?php echo $row['city'];?>">
					</div>

					<div class="form-group">
					<label class="text-white">Nationality</label>
					<input type="text" name="nationality" placeholder="Enter Nationality" class="form-control" value="<?php echo $row['nation'];?>">
					</div>

				</div>

				<div class="col-md-5 col-sm-5 col-12 m-auto">
					<div class="form-group">
					<label class="text-white">Last Name</label>
					<input type="text" name="lname" placeholder="Enter last name" class="form-control" value="<?php echo $row['lname'];?>">
					</div>


					<div class="form-group">
					<label class="text-white">Birth Date</label>
					<input type="date" name="birthdate" placeholder="Enter Date of Birth" class="form-control" value="<?php echo $row['birthdate'];?>">
					</div>

					<div class="form-group">
					<label class="text-white">Mobile No.</label>
					<input type="text" name="mobile" placeholder="Enter Mobile number" class="form-control" value="<?php echo $row['mobile'];?>">
					</div>


					<div class="form-group">
					<label class="text-white">District</label>
					<input type="text" name="district" placeholder="Enter District name" class="form-control" value="<?php echo $row['district'];?>">
					</div>


					<div class="form-group">
					<label class="text-white">State</label>
					<input type="text" name="state" placeholder="Enter State name" class="form-control" value="<?php echo $row['state'];?>">
					</div>

					<div class="input-group">
					<div class="input-group-prepend">
					<span class="input-group-text" id="inputGroupFileAddOn01">Upload</span>
					</div> 

					<div class="custom-file">
					<input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddOn01" name="image">
					<label class="custom-file-label" for="inputGroupFile01">ChooseFile/Studentimage</label>
					</div>

				<?php }} ?>	
				</div>

				<input type="submit" name="update" value="update Details" class="btn btn-success px-5 mt-3">
				
			</div>

			</form>

			</div>
			
		</section>
	
	</div>
	</div>

</body>
</html>


<?php

if(isset($_POST['update'])){
	$edit_st_id=$_GET['edit_student'];
	$fname = mysqli_real_escape_string($conn,$_POST['fname']);
	$lname = mysqli_real_escape_string($conn,$_POST['lname']);
	$email = mysqli_real_escape_string($conn,$_POST['email']);
	$fathername = mysqli_real_escape_string($conn,$_POST['fathername']);
	$birthdate = mysqli_real_escape_string($conn,$_POST['birthdate']);
	$gender = mysqli_real_escape_string($conn,$_POST['gender']);
	$city = mysqli_real_escape_string($conn,$_POST['city']);
    $district = mysqli_real_escape_string($conn,$_POST['district']);
    $state = mysqli_real_escape_string($conn,$_POST['state']);
	$nationality = mysqli_real_escape_string($conn,$_POST['nationality']);
	$mobile = mysqli_real_escape_string($conn,$_POST['mobile']);
	// $image = $_FILES['image']['name'];
	// $image_type = $_FILES['image']['type'];
	// $image_size = $_FILES['image']['size'];
	// $image_tmp = $_FILES['image']['tmp_name'];

	// $image_query = "select * from student_detail where st_id='$edit_st_id'";
	// $run=mysqli_query($conn,$image_query);
	// while($row=mysqli_fetch_assoc($run)){
	// 	$img=$row['photo'];
	// }

	// unlink('st_image/'.$img);
	
	// if (!$image_type == 'image/jpg' or !$image_type == 'image/png') {

	// 	$match_error = "invalid image format";

	// }
	// 	elseif ($image_size <= 2000) {

	// 		$size_error = "image size is larger . image size should be less than 2 MB";
	// 	}
	// else
	// 	move_uploaded_file($image_tmp, "st_image/$image");
		$sql = "update student_detail set fname='$fname' , lname='$lname', email='$email', 	father_name='$fathername',birthdate='$birthdate',mobile='$mobile',gender='$gender', city='$city',district='$district',state='$state',nation='$nationality' where st_id='$edit_st_id'";
		$run = mysqli_query($conn,$sql);
		if ($run) {
			echo "<script>window.open('view.php?update_success=Student data upadated successfully','_self')</script>";
		}
		else{
			echo "<script>window.open('view.php?update_error=Student data was not upadated . please try again ','_self')</script>";
		}

	
}

?>