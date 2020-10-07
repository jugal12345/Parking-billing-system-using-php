<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Parking Receipt </title>
  </head>
  <body style="background-color:#b9fffc; margin-left:33%; margin-right:30%;margin-top:2%;border-style: solid; color:#132743">
    <div style="margin:10px; padding:0px; ">
      <h1 style="margin-left:100px;margin-top:10px;">Parking Receipt</h1>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "parking";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$sql = "INSERT INTO parks (type, reg_no, in_date, in_time, out_date, out_time)
VALUES ('$_POST[type]', '$_POST[reg_no]', '$_POST[in_date]', '$_POST[in_time]', '$_POST[out_date]', '$_POST[out_time]')";
$d1="$_POST[in_date]"." "."$_POST[in_time]";
$d2="$_POST[out_date]"." "."$_POST[out_time]";
$date1=strtotime($d1);
$date2=strtotime($d2);
$diff=abs($date2-$date1);
$days=floor($diff/60/60/24);
$hours=$diff/60/60-$days*24;
echo"<h3> Vehicle no:</h3>";
echo" $_POST[reg_no]<br> ";
echo"<br><h3>Total Time:</h3>";
echo "$days days , ";
echo "$hours hours <br>";
if ("$_POST[type]"=="car") {
  $cost=$days*250;
  if($hours>12){
    $cost=$cost+250;
  }
  elseif ($hours>6) {
    $cost=$cost+100;
  }
  elseif($hours>3){
    $cost=$cost+60;
  }
  else{
    $cost=$cost+30;
  }
}
else{
  $cost=$days*150;
  if($hours>12){
    $cost=$cost+90;
  }
  elseif ($hours>6) {
    $cost=$cost+60;
  }
  elseif($hours>3){
    $cost=$cost+35;
  }
  else{
    $cost=$cost+10;
  }
}
if (mysqli_query($conn, $sql)) {
  echo"<br><h3>Total Bill: </h3>";
  echo "Rs $cost ";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
</div>
</body>
</html>
