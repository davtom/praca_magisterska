 <?php
$link = new mysqli("mysql.cba.pl","d4vez","30.Dz/97.","d4vez");
if ($link -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}
?> 