<?php
/**
 * Created by PhpStorm.
 * User: mohamed ibrahiem elfert
 * Date: 23/02/2017
 * Time: 08:00 م
 */

if (isset($_POST['add_new'])) {
    $title = filter_var($_POST['title'] , FILTER_SANITIZE_STRING);
    $author = filter_var($_POST['author'] , FILTER_SANITIZE_STRING);
    $active = $_POST['active'];
    $errors = array();

    if (empty($title && $author)) {
        $errors[] = "All Faileds Required !";
    } else {
        include 'connect.php';
        $query = $conn->prepare("INSERT INTO books (title,author,active) VALUES (?,?,?)");
        $query->bindParam(1,$title,PDO::PARAM_STR);
        $query->bindParam(2,$author,PDO::PARAM_STR);
        $query->bindParam(3,$active,PDO::PARAM_INT);
        $query->execute();
        $success = "The Book Has Been Add !";
    }
}

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

            <!-- Form -->
            <form class="form-horizontal" action="" method="post">
                <fieldset>
                    <br>

                    <?php
                    if (isset($success)) {
                            echo '<div class="alert alert-success" role="alert">'. $success .'</div>';
                    }
                    if (isset($errors)) {
                        foreach ($errors as $error) {
                            echo '<div class="alert alert-danger" role="alert">'. $error .'</div>';
                        }
                    }
                    ?>

                    <!-- Text input-->
                    <div class="control-group">
                      <label class="control-label" for="textinput-0">Input Title</label>
                      <div class="controls">
                        <input id="textinput-0"  type="text" name="title" placeholder="Title" class="input-xlarge">
                      </div>
                    </div>

                    <!-- Text input-->
                    <div class="control-group">
                      <label class="control-label" for="textinput-1">Input Author</label>
                      <div class="controls">
                        <input id="textinput-1"  type="text" name="author" placeholder="Author" class="input-xlarge">
                      </div>
                    </div>

                    <!-- Select Basic -->
                    <div class="control-group">
                      <label class="control-label" for="selectbasic-0">Select Basic</label>
                      <div class="controls">
                        <select id="selectbasic-0" name="active" class="input-xlarge">
                          <option value="0">Un Active</option>
                          <option value="1">Active</option>
                        </select>
                      </div>
                    </div>

                    <!-- Button -->
                    <div class="control-group">
                      <div class="controls">
                        <button id="singlebutton-0" name="add_new" class="btn btn-primary">Add</button>
                      </div>
                    </div>

                </fieldset>
            </form>

        </div>

        <!-- Start footer -->
        <br>
        <div class="alert alert-info">
            <strong>copyright &copy;  2017 Mohamed Elfert &trade;</strong>
        </div>
        <!-- End footer -->

        <script src="https://code.jquery.com/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>