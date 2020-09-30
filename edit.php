
<?php include_once "app/autoload.php"; ?>

<?php

    if(isset($_GET['edit_id'])){

        $edit_id = $_GET['edit_id'];

        $sql = "SELECT * FROM students WHERE id = ' $edit_id' ";

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
						<input name="name" class="form-control" value="<?php echo $single_data['name'];?>" type="text" >
					</div>

					<div class="form-group">
						<input name="email" class="form-control" value="<?php echo $single_data['email'];?>" type="text" >
					</div>

					<div class="form-group">
						<input name="cell" class="form-control" value="<?php echo $single_data['cell'];?>" type="text" >
					</div>

					<div class="form-group">
						<input name="uname" class="form-control" value="<?php echo $single_data['uname'];?>" type="text" >
					</div>

                    <div class="form-group">
                        <input name="age" class="form-control" value="<?php echo $single_data['age'];?>" type="text" >
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


