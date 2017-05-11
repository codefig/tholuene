<?php
include_once('model/Bootstrap.php');
if(isset($_POST['task']) && $_POST['task'] == 'addcourse')

{
	// if the page is making a request to add a course 
	$errors = array();


	$title = $_POST['title'];
	$courseCode = $_POST['courseCode'];
	$lecturer = $_POST['lecturer'];
	$units = $_POST['units'];
	// then do the insertion into the table 
	$query = "INSERT INTO courses(title, course_code, lecturer, units) VALUES(:title, :ccode, :lect, :units)";
	$handler = $con->prepare($query);
	
	$handler->execute(array(
		':title' => $title, 
		':ccode' => $courseCode,
		':lect' => $lecturer, 
		':units' => $units));

	//count the number of rows affected
	$rowcount = $handler->rowCount();
	if($rowcount > 0){
		$errors['success'] = true;
		$errors['message'] = "Course Added Successfully !";
	}
	else{
		$errors['success'] = false;
		$errors['message'] = "Error, Addition Failed";
	}

	echo json_encode($errors);
}


if(isset($_POST['task']) && $_POST['task'] == 'delete')
{
	// echo "delete something";
    $id = $_POST['id'];
    $errors = array();
    $delete_query = "DELETE FROM courses WHERE id=:courseid";
    $handler = $con->prepare($delete_query);
    $handler->execute(array(
    	':courseid' => $id));
    $rowcount = $handler->rowCount();
    if($rowcount > 0){
    	//then the row was deleted
    	$errors['success'] = true;
    	$errors['message'] = "Course Deleted Successfully !";
    } 
    else{
    	$errors['success'] = false;
    	$errors['message'] = "Course Deletion Unsuccessful !";
    }
    echo json_encode($errors);
}


?>