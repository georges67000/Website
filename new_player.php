<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="style.css">

    <title>Add Film</title>

  </head>

  <body class="new_film">

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="ranking">Home<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="new_player">Add player<span class="sr-only"></span></a>
        </li>
        <!--<li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Films
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="film_list">Film List</a>
            <a class="dropdown-item" href="download_film">Download Film</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="new_film">Add Film</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            English
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="english_words">List</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="new_word">Add Definition</a>
          </div>
        </li>-->
        <li class="nav-item">
          <a class="nav-link" href="contact">Contact</a>
        </li>
        <!--<li class="nav-item">
          <a class="nav-link disabled" href="#">Disabled</a>
        </li>-->
      </ul>
        <!--<form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" id="SearchButton" type="submit">Search</button>
        </form>-->
      </div>
    </nav>

    <br>

    <?php
    if(isset($_POST['submit'])) {
      $dbhost = 'localhost';
      $dbuser = 'root';
      $dbpass = '';
      $dbname = 'chess';
      $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

      $mysqli = new mysqli("localhost", "root", "", "chess");

      if(!$conn) {
        echo('Could not connect: '. mysqli_connect_error());
      }

      if(! get_magic_quotes_gpc() ) {
        $name_player = addslashes ($_POST['name_player']);
        $promo_player = addslashes ($_POST['promo_player']);
      }else {
        $name_player = $_POST['name_player'];
        $promo_player = $_POST['promo_player'];
      }

      /*$submit_date = $_POST['promo_player'];
      $name_filmtype = $_POST['name_filmtype'];
      $name_language = $_POST['name_language'];*/

      $sql = "INSERT INTO players ". "(name_player, promo_player) ". "VALUES ('$name_player', '$promo_player');";

      //$selected = mysql_select_db("film_dl", $conn) or die("Could not select examples");

      /*$query = "SELECT ID_FilmType, FilmType_Name FROM film_type";
      $result = mysqli_query ($query);
      echo "<select name='dropdown' value=''><option>Dropdown</option>";
      while ($r = mysqli_fetch_array($result)) {
        echo "<option value=".$r['ID_FilmType'].">".$r['FilmType_Name']."</option>";
      }
      echo "</select>";*/

      if(mysqli_multi_query($conn, $sql)) {
        //echo "New recordes created successfully";
        //echo '<script>popup()</script>';
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }

      mysqli_close($conn);
    }
   ?>

  <div class="container">
    <div class="row">
      <div class="col-md-offset-3 col-md-12">
        <form class="new_film" action="new_player.php" method="POST" autocomplete="off">
          <h1>Add New Film</h1>
          <br>
          <div class="form-group">
            <!--<label for="name_film" class="col col-form-label">Film Name *</label>-->
            <input class="form-control is-valid" type="text" id="name_player" name="name_player" placeholder="Name *" required>
          </div>
           <div class="form-group">
            <!--<label for="name_film" class="col col-form-label">Film Name *</label>-->
            <input class="form-control is-valid" type="text" id="promo_player" name="promo_player" placeholder="Promo *" required>
          </div>
          <div>
            <tr>
              <td>Test</td>
              <select name="Owner">
              <option value="comedy">Comedy</option>
              <option value="drama">Drama</option>
              <option value="action">Action</option>
              <option value="western">Western</option>
              </select>
            </tr>
          </div>
          <!--<div class="form-group">
            <input class="form-control is-valid" type="text" id="name_filmtype" name="name_filmtype" placeholder="Film Type *" required>     
          </div>
          <div class="form-group">
            <input class="form-control is-valid" type="text" id="name_language" placeholder="Language *" name="name_language" required>
          </div>
          <div class="form-group">
            <input class="form-control is-valid" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="submit_date" placeholder="Submit date *" name="submit_date" required>
          </div>-->

            <p class="text-muted">
              <strong>*</strong> These fields are required
            </p>

            <div class="text-center">
              <button type="submit" class="btn1 btn-success btn-send" name="submit" value="Submit">Submit</button>
            </div>

      </div>      
    </form>
  </div>
</div>
</div>



    </form>
  </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>