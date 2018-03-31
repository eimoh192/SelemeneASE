<link rel="stylesheet" type="text/css" href="css/style_admin.css">

<?php

include 'ConnectEvents.php';
 error_reporting(0);
  $id = $_POST['id'];
  $title = $_POST['title'];
  $image = $_FILES['image']['tmp_name'];
  $about = $_POST['about'];
  $para1 = $_POST['para1'];
  $para2 = $_POST['para2'];
  $datetime = $_POST['datetime'];
  $location = $_POST['location'];


  $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));







if(!$_POST['submit']){
	// you can remove this echo code and add alert using JS or use required tag in your input feilds.
  echo "All feilds must be filled";
}

else {

 // insert into tableName (feilds) values (variables) If still you cant understand please check videos on my youtube channel NOSGENE or comment there so i can help you
$sql2 = "INSERT INTO events (id,title,image, about,para1,para2,datetime,location)
VALUES ('$id', '$title','$image','$tmpname' '$about', '$para1', '$para2', '$datetime', '$location')";

if (mysqli_query($conn, $sql2)) {
    echo "<h1><center>New record created successfully</center></h1>";
} else {
    echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
}
}
?>

<html>
<head>
<title>Add Data</title>
</head>

<body>
  <center>

	<h2>Add New Events</h2>
		<form action="add.php" method="POST" enctype="multipart/form-data">
			ID: <input type="text" name="id" value="" required><br><br>
			Title: <input type="text" name="title"><br><br>
      Image: <input type="file"  name="image" value="" required></textarea><br>
			About: <textarea rows="4" cols="50" name="about" value="" required></textarea><br>
      Paragraph 1: <textarea rows="4" cols="50" name="para1" value="" required></textarea><br>
      Paragraph 2: <textarea rows="4" cols="50" name="para2" value="" required></textarea><br>
      Date and Time: <textarea rows="4" cols="50" name="datetime" value="" required></textarea><br>
      Location: <textarea rows="4" cols="50" name="location" value="" required></textarea><br>
	<br>
			<input type="submit" name="submit" value="add"/></center>
    </center>
</body>

<!--
	Similarly you can make delete and updates pages with little changes in sql query and here and there. If you need to learn those too
	please check my youtube channel NOSGENE as i am running a full stack web development course there right now.
 -->

 <!--
      ENCODED BY RAMEEZ SAFDAR / For more web and other programmings check out my channel nosgene https://www.youtube.com/channel/UCYbUaMVWujooISm4m7NDIeg
 -->
</html>
