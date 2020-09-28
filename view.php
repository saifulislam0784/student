<?php include_once "app/autoload.php"; ?>

<?php

    if(isset($_GET['id'])){

        $student_id = $_GET['id'];

        $sql = "SELECT * FROM students WHERE id = $student_id";
        $data = $connection -> query($sql);

        $single_id = $data -> fetch_assoc();
        
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Development Area</title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">

    <style>

        .profile {
            font-family: "Candara Light";
        }

        .profile img{
            width: 150px;
            height: 150px;
            border: 2px solid black;
            border-radius: 50%;
            display: block;
            margin: auto;
        }

        .profile h2{

            text-align: center;

        }

    </style>
</head>
<body>




	
	

	<div class="wrap shadow">
        <a class="btn btn-sm btn-primary"  href="student.php">Back</a>
		<div class="card">
			<div class="card-body profile">

                    <img class="shadow-lg" src="images/<?php echo $single_id['image']?>">

                    <h2><?php echo $single_id['name']?></h2>

                    <table class="table table-striped">

                        <tr>
                            <td>Name</td>
                            <td><?php echo $single_id['name']?></td>
                        </tr>

                        <tr>
                            <td>Email</td>
                            <td><?php echo $single_id['email']?></td>
                        </tr>

                        <tr>
                            <td>Cell</td>
                            <td><?php echo $single_id['cell']?></td>
                        </tr>

                        <tr>
                            <td>Username</td>
                            <td><?php echo $single_id['uname']?></td>
                        </tr>

                        <tr>
                            <td>Age</td>
                            <td><?php echo $single_id['age']?></td>
                        </tr>

                        <tr>
                            <td>Gender</td>
                            <td><?php echo $single_id['gender']?></td>
                        </tr>

                        <tr>
                            <td>Shift</td>
                            <td><?php echo $single_id['shift']?></td>
                        </tr>

                        <tr>
                            <td>Location</td>
                            <td><?php echo $single_id['location']?></td>
                        </tr>

                    </table>

			</div>
		</div>
	</div>
	









	<!-- JS FILES  -->
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
</body>
</html>


