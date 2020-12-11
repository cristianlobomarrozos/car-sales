<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = "coches";
$conn = mysqli_connect($servername, $username, $password, "$dbname");
if (!$conn) {
  die('Could not Connect My Sql:' . mysql_error());
}
$limit = 10;
if (isset($_GET["page"])) {
  $page  = $_GET["page"];
} else {
  $page = 1;
};
$start_from = ($page - 1) * $limit;
echo "SELECT * FROM usuario ASC LIMIT $start_from, $limit";
//echo "<pre>".print_r($conn, true)."</pre>" ;
$result = mysqli_query($conn, "SELECT * FROM usuario LIMIT $start_from, $limit");
echo "<pre>" . print_r($result, true) . "</pre>";

//die() ;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>

<body>
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>userid</th>
        <th>First name</th>
        <th>Last name</th>
        <th>City name</th>
        <th>email</th>
      </tr>
      <thead>
      <tbody>
        <?php
        while ($row = mysqli_fetch_array($result)) {
          //echo "<pre>".print_r($row["NomUsu"], true)."</pre>" ;
          //die() ;
        ?>
          <tr>
            <td><?php echo $row["NomUsu"]; ?></td>
            <td><?php echo $row["ApeUsu"]; ?></td>
            <td><?php echo $row["email"]; ?></td>
            <td><?php echo $row["FecNacUsu"]; ?></td>
            <td><?php echo $row["esAdmin"]; ?></td>
          </tr>
        <?php
        };
        ?>
      </tbody>
  </table>
  <?php

  $result_db = mysqli_query($conn, "SELECT COUNT(*) FROM usuario");
  $row_db = mysqli_fetch_row($result_db);
  $total_records = $row_db[0];
  $total_pages = ceil($total_records / $limit);
  /* echo  $total_pages; */
  $pagLink = "<ul class='pagination'>";
  for ($i = 1; $i <= $total_pages; $i++) {
    $pagLink .= "<li class='page-item'><a class='page-link' href='index.php?page=" . $i . "'>" . $i . "</a></li>";
  }
  echo $pagLink . "</ul>";
  ?>

</body>

</html>