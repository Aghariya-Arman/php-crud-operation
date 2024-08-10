<?php

$conn = new mysqli('localhost', 'root', '', 'crud_op');

if (!$conn) {
  die(mysqli_error($conn));
}
