<?php
include ('connect.php');
$id = $_GET['edit_id'];
$query = "SELECT * FROM person WHERE person_id = '$id'";
$result = mysqli_query($con, $query);

if (isset($_POST['update4'])){ 
	$id = $_GET['edit_id'];
	$person_id = mysqli_real_escape_string($con, $_POST['person_id']);
	$lastname = mysqli_real_escape_string($con, $_POST['lastname']);
	$firstname = mysqli_real_escape_string($con, $_POST['firstname']);
	$middlename = mysqli_real_escape_string($con, $_POST['middlename']);
	$birthplace = mysqli_real_escape_string($con, $_POST['birthplace']);
	$birthdate = mysqli_real_escape_string($con, $_POST['birthdate']);
	$sex = mysqli_real_escape_string($con, $_POST['sex']);
	$civilstatus = mysqli_real_escape_string($con, $_POST['civilstatus']);
	$citizenship = mysqli_real_escape_string($con, $_POST['citizenship']);
	$occupation = mysqli_real_escape_string($con, $_POST['occupation']);

	$sql = "UPDATE `person` SET `person_id` = '$person_id', `lastname` = '$lastname', `firstname` = '$firstname', `middlename` = '$middlename', `birthplace` = '$birthplace', `birthdate` = '$birthdate', `sex` = '$sex', `civilstatus` = '$civilstatus', `citizenship` = '$citizenship', `occupation` = '$occupation' WHERE `person_id` =".$id;
	
	if (mysqli_query($con, $sql)) {
		header('location: personlist2.php');
	}else {
		 echo "Error: " . $update4 . "<br>" . mysqli_error($con);
	}

}
			


?>
<DOCTYPE html>
<html>
<body>
<center>
<form action="" method="POST">
	<br><br>
	<?php 
			if(mysqli_num_rows($result)) {
				while($row = mysqli_fetch_array($result)) {
		?>
	Person ID :
	<input type="number" name="person_id" placeholder="person id" value="<?php echo $row['person_id']; ?>" ><br><br>
	Last name :
	<input type="text" name="lastname" placeholder="lastname" value="<?php echo $row['lastname']; ?>" ><br><br>
	First name :
	<input type="text" name="firstname" placeholder="first name" value="<?php echo $row['firstname']; ?>"><br><br>
	Middle name :
	<input type="text" name="middlename" placeholder="middle name"  value="<?php echo $row['middlename']; ?>"><br><br>
	Birth place : 
	<input type="text" name="birthplace" placeholder="Birthplace" value="<?php echo $row['birthplace']; ?>" ><br><br>
	Birth date : 
	<input type="date" name="birthdate" placeholder="Birthdate" value="<?php echo $row['birthdate']; ?>" ><br><br>
	Gender : 
	<input type="text" name="sex" placeholder="gender" value="<?php echo $row['sex']; ?>" ><br><br>
	Civil status : 
	<input type="text" name="civilstatus" placeholder="Civilstatus" value="<?php echo $row['civilstatus']; ?>" ><br><br>
	Citizenship : 
	<input type="text" name="citizenship" placeholder="Citizenship" value="<?php echo $row['citizenship']; ?>" ><br><br>
	Occupation : 
	<input type="text" name="occupation" placeholder="Occupation" value="<?php echo $row['occupation']; ?>" ><br><br>		
	<button type="submit" name="update4" class="btn btn-primary">Update</button>
	<a href ="personlist2.php"><input class="btn" type="button" id="list_btn" value="Back"/></a>
			<?php } } ?>
</form>
</center>
</body>
</html>