
<?php include_once "app/autoload.php"; ?>

<?php

        /**

         * form isset

         */

        if(isset($_POST['add'])){

            $edit_id = $_GET['id'];

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

                $sql = "UPDATE students SET name='$name', email='$email', cell='$cell', uname='$uname', age='$age', gender='$gender', shift='$shift', location='$location' WHERE id='$edit_id' ";

                $connection -> query($sql);
                
                $mess = validationMsg( 'Data stable', 'success');

                move_uploaded_file($file_tmp_name, 'images/students' . $unique_file_name);
            }


        }

    ?>


<?php

    if(isset($_GET['id'])){

        $edit_id = $_GET['id'];

        $sql = "SELECT * FROM students WHERE id='$edit_id'";
        $data = $connection -> query($sql);

        $single_data = $data -> fetch_assoc();


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
</head>
<body>
	
	

	<div class="wrap shadow">
        <a class="btn btn-sm btn-primary"  href="student.php">Back</a>
		<div class="card">
			<div class="card-body">
				<h2>Update Information</h2>
                 <?php
                    if (isset($mess)){
                        echo $mess;
                    }

                ?>
				<form action="" method="POST" enctype="multipart/form-data">

					<div class="form-group">
						<input name="name" class="form-control" value ="<?php echo $single_data['name']; ?>"  type="text" >
					</div>

					<div class="form-group">
						<input name="email" class="form-control" value ="<?php echo $single_data['email']; ?>"  type="text" >
					</div>

					<div class="form-group">
						<input name="cell" class="form-control" value ="<?php echo $single_data['cell']; ?>"  type="text" >
					</div>

					<div class="form-group">
						<input name="uname" class="form-control" value ="<?php echo $single_data['uname']; ?>"  type="text" >
					</div>

                    <div class="form-group">
                        <input name="age" class="form-control" value ="<?php echo $single_data['age']; ?>"   type="text" >
                    </div>

                    <div class="form-group">
                        <label for="">Gender</label> <br>
                        <input name="gender" <?php if($single_data['gender'] == 'male'){ echo "checked";}?> class="" type="radio" value="male" id="male"><label for="male">Male</label>
                        <input name="gender" <?php if($single_data['gender'] == 'female'){ echo "checked";}?> class="" type="radio" value="female" id="female"><label for="female">Female</label>
                    </div>

                    <div class="form-group">
                        <label for="">Shift</label>
                        <select class="form-control" name="shift" id="">
                            <option value="">-select-</option>
                            <option <?php if($single_data['shift'] == 'Morning'){ echo "selected";}?> value="Morning">Morning</option>
                            <option <?php if($single_data['shift'] == 'Day'){ echo "selected";}?> value="Day">Day</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Location</label>
                        <select class="form-control" name="location" id="">
                            <option value="">-select-</option>
                            <option <?php if($single_data['location'] == 'Barisal'){ echo "selected";}?> value="Barisal">Barisal</option>
                            <option <?php if($single_data['location'] == 'Chittagong'){ echo "selected";}?> value="Chittagong">Chittagong</option>
                            <option <?php if($single_data['location'] == 'Dhaka'){ echo "selected";}?> value="Dhaka">Dhaka</option>
                            <option <?php if($single_data['location'] == 'Khulna'){ echo "selected";}?> value="Khulna">Khulna</option>
                            <option <?php if($single_data['location'] == 'Mymensingh'){ echo "selected";}?> value="Mymensingh">Mymensingh</option>
                            <option <?php if($single_data['location'] == 'Rajshahi'){ echo "selected";}?> value="Rajshahi">Rajshahi</option>
                            <option <?php if($single_data['location'] == 'Rangpur'){ echo "selected";}?> value="Rangpur">Rangpur</option>
                            <option <?php if($single_data['location'] == 'Sylhet'){ echo "selected";}?> value="Sylhet">Sylhet</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <img style="width:150px;" src="images/<?php echo $single_data['image']; ?>" alt="">
                        <input name="old_image" value ="<?php echo $single_data['image']; ?>" type="hidden" >
                    </div>

                    <div class="form-group">
                        <label for="">Image</label>
                        <input name="image" class="form-control" type="file">
                    </div>

					<div class="form-group">
						<input name="add" class="btn btn-primary" type="submit" value="Update">
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


