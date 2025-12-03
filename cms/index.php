<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <?php
  if (isset($_POST['submit'])) {
    include 'connect.php';
    $afbeelding = $_POST['afbeelding'];
    $beschrijving = $_POST['beschrijving'];
    $catalogusnummer = $_POST['catalogusnummer'];
    // var_dump($afbeelding);

    $stmt = $mysqli->prepare("INSERT INTO pagina (afbeelding, beschrijving, catalogusnummer) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $afbeelding, $beschrijving, $catalogusnummer);
    $stmt->execute();
    $stmt->close();
  }

  ?>
  <form action="index.php" method="post">

    <input type="text" name="afbeelding">
    <input type="text" name="beschrijving">
    <input type="number" name="catalogusnummer">
    <input type="submit" name="submit" value="Verzenden">

  </form>


  <?php
  include 'connect.php';
  $result = $mysqli->query("SELECT * FROM pagina");
  while ($row = $result->fetch_assoc()) {
    echo "<div>";
    echo "<a href='detail.php?id=" . $row['id'] . "'>" . $row['id'] . "</a><br />";
    echo "<img src='" . $row['afbeelding'] . "' alt=''>";
    echo "<p>" . $row['beschrijving'] . "</p>";
    echo "<p>Catalogusnummer: " . $row['catalogusnummer'] . "</p>";
    echo "<a onclick=\"return confirm('Are you sure you want to delete this item')\" href='delete.php?id=" . $row['id'] . "'>delete</a><br />";
    echo "</div>";
  }
  $result->free();
  $mysqli->close();
  ?>
</body>

</html>