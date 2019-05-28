<?php
/**
 * Created by PhpStorm.
 * User: mohamed ibrahiem elfert
 * Date: 23/02/2017
 * Time: 08:00 م
 */

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

            <?php
            error_reporting("E_ALL &~ E_NOTIC");
            include 'connect.php';

            if ($_GET['box'] == 'active') {

                $id = intval($_GET['id']);
                $query = $conn->prepare("UPDATE books SET active = 1 WHERE id = :id");
                $query->bindParam(':id',$id,PDO::PARAM_INT);
                $query->execute();
                header("Location: control.php");

            } 
            elseif ($_GET['box'] == 'unactive') {

                $id = intval($_GET['id']);
                $query = $conn->prepare("UPDATE books SET active = 0 WHERE id = :id");
                $query->bindParam(':id',$id,PDO::PARAM_INT);
                $query->execute();
                header("Location: control.php");

            } 
            elseif ($_GET['box'] == 'edite') {

                $id = intval($_GET['id']);
                $query = $conn->query("SELECT * FROM books WHERE id = '$id'");
                $row = $query->fetch(PDO::FETCH_OBJ);

                if (isset($_POST['edite'])) {

                    $title = filter_var($_POST['title'] , FILTER_SANITIZE_STRING);
                    $author = filter_var($_POST['author'] , FILTER_SANITIZE_STRING);

                    $query = $conn->prepare("UPDATE books SET title = :title , author = :author WHERE id = :id");
                    $query->bindParam(':title',$title,PDO::PARAM_STR);
                    $query->bindParam(':author',$author,PDO::PARAM_STR);
                    $query->bindParam(':id',$id,PDO::PARAM_INT);
                    $query->execute();
                    header("Location: control.php");

                }

            ?>
            <form class="form-horizontal" action="" method="post">
             <!-- Text input-->
                <div class="control-group">
                  <label class="control-label" for="textinput-0">Input Title</label>
                  <div class="controls">
                    <input id="textinput-0"  type="text" name="title" value="<?php echo $row->title; ?>" placeholder="Title"       class="input-xlarge">
                  </div>
                </div>

                <!-- Text input-->
                <div class="control-group">
                  <label class="control-label" for="textinput-1">Input Author</label>
                  <div class="controls">
                    <input id="textinput-1"  type="text" name="author" value="<?php echo $row->author; ?>" placeholder="Author"       class="input-xlarge">
                  </div>
                </div>
                <!-- Button -->
                <div class="control-group">
                  <div class="controls">
                    <button id="singlebutton-0" name="edite" class="btn btn-primary">Edite</button>
                  </div>
                </div>

            <?php

            }
            elseif ($_GET['box'] == 'delete') {

                $id = intval($_GET['id']);
                $query = $conn->query("DELETE FROM books WHERE id = '$id'");
                header("Location: control.php");

            }
            else{

            $query = $conn->query("SELECT * FROM books ORDER BY id");
            $count = $query->rowCount();

            if ($count) {
                $row = $query->fetch(PDO::FETCH_OBJ);
            ?>

            <!-- Tabel -->
            <table class="table table-hover">
            
              <tr id="htr">
                <td>ID</td>
                <td>Title</td>
                <td>Author</td>  
                <td>Status</td>
                <td>Edit & Delete</td>      
              </tr>
        
              <?php
              while ($row = $query->fetch(PDO::FETCH_OBJ)) {
                if ($row->active == 0) {
                    echo"
                    <tr>
                        <td>$row->id</td>
                        <td>$row->title</td>
                        <td>$row->author</td>
                        <td><a href='control.php?box=active&id={$row->id}'>Active</a></td>
                        <td>
                            <a href='control.php?box=edite&id={$row->id}'><span class='glyphicon glyphicon-cog' 
                                aria-hidden='true'> </a> &
                            <a href='control.php?box=delete&id={$row->id}'><span class='glyphicon glyphicon-remove-circle' 
                                aria-hidden='true'></a>
                        </td> 
                    </tr>
                   ";
                } elseif ($row->active == 1) {
                     echo"
                    <tr>
                        <td>$row->id</td>
                        <td>$row->title</td>
                        <td>$row->author</td>
                        <td><a href='control.php?box=unactive&id={$row->id}'>Un Active</a></td>
                        <td>
                            <a href='control.php?box=edite&id={$row->id}'><span class='glyphicon glyphicon-cog' 
                                aria-hidden='true'> </a> &
                            <a href='control.php?box=delete&id={$row->id}'><span class='glyphicon glyphicon-remove-circle' 
                                aria-hidden='true'></span></a>
                        </td> 
                    </tr>
                   ";
                }
               }
              ?>
              
            </table>

            <?php
            }else{}
            }
            ?>
            
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