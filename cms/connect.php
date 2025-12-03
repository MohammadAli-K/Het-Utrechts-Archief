<?php
$mysqli = new mysqli("localhost", "root", "root", "6.1 Het Utrechts Archief");

// Check connection
if ($mysqli->connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli->connect_error;
  exit();
} else {
  // echo "Connection successful!";
}
