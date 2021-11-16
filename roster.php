<?php
    include ("connectToDB.inc");           
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Creighton Men's Basketball</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="rosterTable.css" />
    
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
          <li><a href="" id="this">Roster</a></li>
          <li><a href="schedule.php">Schedule</a></li>
        </ul>
      </nav>
    </header>
    <main>
      <section>
      <?php
          function showAllData() {
            $dataBase = connectDB();
          
            $query  = 'SELECT * FROM Player ORDER BY Number';
            $result = mysqli_query($dataBase, $query) or die('Query failed: '.mysqli_error($dataBase));
            echo "<h2 style='text-align:center'>2021-22 Men's Basketball Roster List<h2>";
            echo "<ul class='players-list'>";
            while ($line = mysqli_fetch_array($result, MYSQL_ASSOC)) {extract($line);
              echo "<li class='player-in-list'>";
                echo "<div class='player-image-div'>
                        <img src='$Image'>
                      </div>";
                echo "<div class='player-background'>
                      <span style='font-style: oblique;font-weight:bold'>$Class</span> / $City, $State $Country
                      </div>";
                echo "<div class='player-name-and-physical'><span style='font-size: 65%'>
                      $Position / $Height / $Weight Lbs</span></br>
                      $Number $FirstName $LastName
                      </div>";
              echo "</li>";
            }
            echo "</ul>";
          
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