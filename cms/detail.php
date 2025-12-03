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


  if (isset($_POST['submit'])) {
    $afbeelding = $_POST['afbeelding'];
    $beschrijving = $_POST['beschrijving'];
    $catalogusnummer = $_POST['catalogusnummer'];
    $id = $_POST['id'];
    // var_dump($afbeelding);

    $stmt = $mysqli->prepare("UPDATE pagina SET afbeelding = ?, beschrijving = ?, catalogusnummer = ? WHERE id = ?");
    $stmt->bind_param("ssii", $afbeelding, $beschrijving, $catalogusnummer, $id);
    $stmt->execute();
    $stmt->close();
  }

  if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $mysqli->prepare("SELECT * FROM pagina WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
  ?>
      <form action="detail.php?id=<?php echo $id; ?>" method="post">

        <input type="text" name="afbeelding" value="<?php echo $row['afbeelding']; ?>">
        <input type="text" name="beschrijving" value="<?php echo $row['beschrijving']; ?>">
        <input type="number" name="catalogusnummer" value="<?php echo $row['catalogusnummer']; ?>">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="submit" name="submit" value="Verzenden">

      </form>
  <?php

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