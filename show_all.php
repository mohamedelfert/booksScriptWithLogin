<?php
/**
 * Created by PhpStorm.
 * User: mohamed ibrahiem elfert
 * Date: 23/02/2017
 * Time: 08:00 م
 */

include 'connect.php';
$query = $conn->query("SELECT * FROM books WHERE active = 1");

?>

<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta charset="UTF-8">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
        <div id="page">

            <!-- Header -->
            <div class="page-header">
              <h1 class="title">Books Script</h1>
            </div>

            <!-- Navbar -->
            <ul class="nav nav-pills">
                <li role="presentation" class="active"><a href="control.php">
                    <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Control</a>
                </li>
                <li role="presentation"><a href="add_new.php">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add New</a>
                </li>
                <li role="presentation"><a href="show_all.php">
                    <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Show All</a>
                </li>
                <li role="presentation"><a href="index.php">
                    <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Log Out</a>
                </li>
            </ul>

            <!-- Tabel -->
            <table class="table table-hover">
            
              <tr id="htr">
                <td>ID</td>
                <td>Title</td>
                <td>Author</td>     
              </tr>
        
              <?php
              while ($row = $query->fetch(PDO::FETCH_OBJ)) {
                echo"
                    <tr>
                        <td>$row->id</td>
                        <td>$row->title</td>
                        <td>$row->author</td> 
                    </tr>
                ";
               }
              ?>
              
            </table>

        </div>

        <!-- Start footer -->
        <div class="alert alert-info">
            <strong>copyright &copy;  2017 Mohamed Elfert &trade;</strong>
        </div>
        <!-- End footer -->

        <script src="https://code.jquery.com/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>