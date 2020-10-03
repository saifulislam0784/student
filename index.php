
<?php include_once "app/autoload.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Development Area</title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body>

    <?php

        /**

         * form isset

         */

        if(isset($_POST['add'])){

            $name = $_POST['name'];
            $email = $_POST['email'];
            $cell = $_POST['cell'];
            $uname = $_POST['uname'];
            $age = $_POST['age'];

            if (isset($_POST['gender'])){
                $gender = $_POST['gender'];
            }

            $shift = $_POST['shift'];
            $location = $_POST['location'];



            $file_name = $_FILES['image']['name'];
            $file_tmp_name = $_FILES['image']['tmp_name'];
            $file_size = $_FILES['image']['size'];

            $unique_file_name = md5(time(). rand()) . $file_name;

            /**
             * form validation
             */

            if (empty($name) || empty($email) || empty($cell) || empty($uname) || empty($age) || empty($gender) || empty($shift) || empty($location)){

                    $mess = validationMsg( 'All fields are required',) ;

            }elseif(filter_var($email, FILTER_VALIDATE_EMAIL) == false){

                    $mess = validationMsg( 'Invalid email') ;

            }elseif ($age <= 5 || $age >= 12){

                $mess = validationMsg( 'Age is not eligible') ;

            }else {


                $connection -> query("INSERT INTO students (name, email, cell, uname, age, gender, shift, location,image) VALUES ('$name','$email','$cell','$uname','$age','$gender','$shift','$location','$unique_file_name')");
                
                $mess = validationMsg( 'Data stable', 'success');

                move_uploaded_file($file_tmp_name, 'images/' . $unique_file_name);
            }


        }

    ?>
	
	

	<div class="wrap shadow">
        <a class="btn btn-sm btn-primary"  href="student.php">All students</a>
		<div class="card">
			<div class="card-body">
				<h2>Add new student</h2>
                <?php
                    if (isset($mess)){
                        echo $mess;
                    }

                ?>
				<form action="" method="POST" enctype="multipart/form-data">

					<div class="form-group">
						<input name="name" class="form-control" type="text" placeholder="Name">
					</div>

					<div class="form-group">
						<input name="email" class="form-control" type="text" placeholder="Email">
					</div>

					<div class="form-group">
						<input name="cell" class="form-control" type="text" placeholder="Cell">
					</div>

					<div class="form-group">
						<input name="uname" class="form-control" type="text" placeholder="Username">
					</div>

                    <div class="form-group">
                        <input name="age" class="form-control" type="text" placeholder="Age">
                    </div>

                    <div class="form-group">
                        <label for="">Gender</label> <br>
                        <input name="gender" class="" type="radio" value="male" id="male"><label for="male">Male</label>
                        <input name="gender" class="" type="radio" value="female" id="female"><label for="male">Female</label>
                    </div>

                    <div class="form-group">
                        <label for="">Shift</label>
                        <select class="form-control" name="shift" id="">
                            <option value="">-select-</option>
                            <option value="Morning">Morning</option>
                            <option value="Day">Day</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Location</label>
                        <select class="form-control" name="location" id="">
                            <option value="">-select-</option>
                            <option value="Barisal">Barisal</option>
                            <option value="Chittagong">Chittagong</option>
                            <option value="Dhaka">Dhaka</option>
                            <option value="Khulna">Khulna</option>
                            <option value="Mymensingh">Mymensingh</option>
                            <option value="Rajshahi">Rajshahi</option>
                            <option value="Rangpur">Rangpur</option>
                            <option value="Sylhet">Sylhet</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Image</label>
                        <input name="image" class="form-control" type="file">
                    </div>

					<div class="form-group">
						<input name="add" class="btn btn-primary" type="submit" value="Add student">
					</div>
				</form>
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


