 <?php
$link = new mysqli("localhost","root","","d4vez");
if ($link -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}
?> 