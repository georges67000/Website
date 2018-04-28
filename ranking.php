<!doctype html>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!--<link rel="stylesheet" type="text/css" href="style.css">-->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <link href="http://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"></style>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://drvic10k.github.io/bootstrap-sortable/Scripts/bootstrap-sortable.js"></script>
    <link rel="stylesheet" href="https://drvic10k.github.io/bootstrap-sortable/Contents/bootstrap-sortable.css" />

    <!--<script type="text/javascript" src="sort_list.js"></script>-->

    <title>Film List</title>

  </head>

  <body>

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
        </li>-->
        <!--<li class="nav-item dropdown">
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
          <input class="form-control mr-sm-2" id="myInput" onkeyup="searchFunction()" type="search" placeholder="Search for films..." aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" id="SearchButton" type="submit">Search</button>
        </form>-->
      </div>    
    </nav>

    <br>
    <br>

    <?php 

      $mysqli = new mysqli("localhost", "root", "", "chess");

      $sql = "SELECT id_player, name_player, score_player, promo_player FROM players";
      
      /*$sql = $mysqli->query("SELECT * FROM film");*/

      if ($result = $mysqli->query($sql)) {
        # code...
      }

      $id_player = 'id_player';
      $name_player = 'name_player';
      $score_player = 'score_player';
      $promo_player = 'promo_player';
      //$name_language = 'name_language';

      /*$resultPerPage = 5;
      $resultTotalesReq = $mysqli->query('SELECT id_film FROM film');
      //$resultTotal = $resultTotalesReq->rowCount();

      if (isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0) {
        $_GET['page'] = intval($_GET['page']);
        $currentPage = $_GET['page'];
      } else {
        $currentPage = 1;
      }

      $start = ($currentPage - 1) * $resultPerPage;


      $files = $mysqli->query('SELECT * FROM chess_championship ORDER BY id_player DESC LIMIT '.$start.','.$resultPerPage);
      while($fl = $files->fetch_assoc()){
        ?>*/
      /*<b>N°<?php echo $fl['id_film']; ?> - <?php echo $fl['name_film']; ?> </b><br />
      <i><?php echo $fl['release_date']; ?></i>
      <br /><br />
      <?php  
      }*/
      ?>


  <div class="table-responsive">
    <!--<div id="datatable_length" class="dataTables_length">
      <label>
          <select class="form-control input-sm" name="datatable_length" aria-controls="datatable">
            <option value="10">10</option>
            <option value="25">25</option>
            <option value="50">50</option>
            <option value="100">100</option>
          </select>
      </label>
    </div>-->
    <table id="filmTable" class="table table-hover sortable">
        <thead>
          <tr>
            <th class="bg-danger">#</th>
            <th class="bg-danger">Player</th>
            <th class="bg-danger">Score</th>
            <th class="bg-danger">Promo</th>
            <!--<th class="bg-danger">Language</th>
            <th class="bg-danger">Submit Date</th>-->
            <!--<th class="bg-danger">#</th>-->
          </tr>
        </thead>

        <tbody>
          <?php
          while ($rows = $result->fetch_assoc()) {
          ?>
          <tr>
            <td class="film"><?php echo $rows['id_player']; ?></td>
            <td class="film"><?php echo $rows['name_player']; ?></td>
            <td class="film"><?php echo $rows['score_player']; ?></td>
            <td class="film"><?php echo $rows['promo_player']; ?></td>
            <!--<td align="center"><a href="http://localhost/Test/update_film.php"><input class="edit" type="image" name="edit" src="images/edit_icon.png"></a><input class="del" type="image" name="delete" src="images/delete.png"></td>-->
          </tr>
          <?php 
         }
         ?>
        </tbody>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>