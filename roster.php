<?php
    include ("connectToDB.inc");           
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Creighton Men's Basketball</title>
    <link rel="stylesheet" href="table.css" />
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <header>
      <div class="header-title">
        <img class="creighton-image" src="creighton.png" />
        <img class="basketball-image" src="basketball.png" />
        <h1>Creighton Men's Basketball</h1>
      </div>
      <nav class="header-nav">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="roster.php" id="this">Roster</a></li>
          <li><a href="schedule.php">Schedule</a></li>
        </ul>
      </nav>
    </header>
    <main>
      <section>
      <?php
          function showAllData() {
            $dataBase = connectDB();
          
            $queryUsers  = 'SELECT * FROM Player ORDER BY Number';
            $resultUsers = mysqli_query($dataBase, $queryUsers) or die('Query failed: '.mysqli_error($dataBase));
            echo "<h2 style='text-align:center'>2021-22 Men's Basketball Roster<h2>";
            echo "<table>";
            echo "<tr> <th>Number</th> <th>First Name</th> <th>Last Name</th> <th>Class</th> <th>Height</th> <th>Weight</th>
            <th>City</th><th>State</th><th>Country</th><th>Position</th><th>Image</th></tr>";
            while ($lineUsers = mysqli_fetch_array($resultUsers, MYSQL_ASSOC)) {extract($lineUsers);
              echo "<tr> <td>$Number</td> <td>$FirstName</td>  <td>$LastName</td> <td>$Class</td> <td>$Height</td>
              <td>$Weight</td> <td>$City</td> <td>$State</td> <td>$Country</td> <td>$Position</td> <td>$Image</td> </tr>";
            }
            echo "</table>";
          
            mysqli_close($dataBase);
          
          }

            showAllData();

          

         
          
        ?>
      </section>

    </main>
    <footer>
      <div>
        Page made by Diego Rojo
        <a href="https://github.com/DiegoRojo99" title="Github">Github</a> 
      </div>
    </footer>
  </body>
</html>