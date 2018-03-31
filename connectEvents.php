<?php
$conn = mysqli_connect("localhost", "root", "");
mysqli_select_db($conn, 'selemene');
if(!$conn)
echo "error cant connect";

else {
  echo "Got connected...";
}
 ?>
