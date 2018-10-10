<?php
/**
 * Created by PhpStorm.
 * User: tony
 * Date: 16/07/18
 * Time: 12:37
 */
?>

<?php
    include "connect.php";
?>

<html lang="en">
  <head>
      <meta charset="utf-8" />
      <title>Guestbook</title>
      <link rel="stylesheet" type="text/css" href="css/guestbook.css" />
  </head>

  <body>

    <img src="img/php.png" />

    <h1>Guestbook</h1>

  <?php

      try {
          $query = "SELECT id, user, comment, date_posted FROM entries";

          $statement = $connection->prepare($query);
          $statement->execute();

          $result = $statement-> setFetchMode(PDO::FETCH_ASSOC);
          $result = $statement -> fetchAll ();

          if (count ($result) == 0) {
              echo "<p>";
              echo "There are no comments in the Guestbook. What a pity.";
              echo "</p>";
          }
          else {

              echo "<table>";
              echo "<tr>";
              echo "<th>User</th><th>Comment</th><th>Date</th><th></th><th></th>";
              echo "</tr>";

              foreach ($result as $row) {
                  echo "<tr>";
                  echo "<td>" . $row ['user'] . "</td>";
                  echo "<td>" . $row ['comment'] . "</td>";
                  echo "<td>" . date ("D d F, Y G:i", strtotime ($row ['date_posted'])) . "</td>";
                  echo "<td><a href=\"update.php?id=" . $row ['id'] . "\">Update</a></td>";
                  echo "<td><a href=\"delete.php?id=" . $row ['id'] . "\">Delete</a></td>";
                  echo "</tr>";

                  if ($row ['id'] == $_GET ['id']) {
                      $current_user = $row ['user'];
                      $current_comment = $row ['comment'];
                  }
              }

              echo "</table>";
          }
      }
      catch (PDOException $e) {
          echo "Error: " . $e -> getMessage ();
      }

      $connection = null;
  ?>


      <h1>Amend Comment</h1>

      <form action="process_update.php" method="post">
        <input name="id" type="hidden" value="<?php echo $_GET ['id'] ?>" />
        <p>
            User: <input name="user" type="text" size="32" value="<?php echo $current_user; ?>"/>
            Comment: <input name="comment" type="text" size="128" value="<?php echo $current_comment; ?>"/>
        </p>
        <p>
            <input type="submit" value="Submit" />
            <input type="reset" value="Reset" />
        </p>
      </form>
  </body>

</html>