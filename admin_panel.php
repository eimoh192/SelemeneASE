<html>
<head>
<title>Admin Panel - Nosgene </title>
<link rel="stylesheet" type="text/css" href="css/style_admin.css">
</head>


<body>



<div id="header">
  <br>
<center><img src="./images/icons/admin_icon.png">
<h3> Welcome to Admin Panel </h3></center>
</div>

<div id="sidemenu">
 <ul><center>
    <form action="add.php">
  <input type = "submit" class="main-btn" name="submit" value="Add Events">
  </form>
  <form >
<input type = "submit" class="main-btn" name="submit" value="Delete Events">
</form>
<form>
<input type = "submit" class="main-btn" name="submit" value="Update Events">
</form>
 </ul>
 <center>
</div>

<div id="data">
<br><br>

<h1>Data available</h1>
<?php
    include 'connectEvents.php';

	//add error_reporting(0); to remove errors


  $result = mysqli_query($conn, "select id,title,image,about,para1,para2,datetime,location from events");

if (mysqli_num_rows($result) > 0) {

    while($row = mysqli_fetch_assoc($result)) {
    //echo "<h4>ID: </h4>" , $row["id"]. "<br>" . "  Title: " , $row["title"].  " <br> " .  "About: " , $row["about"] .  "<br>" . "Para1" , $row["para1"]. "<br><br><br>";
    echo"<br><br> ID: " , $row['id'];
    echo"<br> Event Title: " , $row['title'];

	 }
} else {
    echo "<h3><center>No user data found!<center></h3>";
}
?>
</div>
<!--
      ENCODED BY RAMEEZ SAFDAR / For more web and other programmings check out my channel nosgene https://www.youtube.com/channel/UCYbUaMVWujooISm4m7NDIeg
 -->
</body>
</html>
