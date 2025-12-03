<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <?php

  include 'connect.php';




  if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $mysqli->prepare("DELETE FROM pagina WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    if ($stmt->affected_rows > 0) {
      echo "Record deleted successfully.";
      header("Location: index.php");
      exit();
    } else {
      echo "No record found.";
    }


    $stmt->close();
  } else {
    echo "No ID provided.";
  }






  ?>




</body>

</html>