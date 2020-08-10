<!DOCTYPE html>
<html lang="en">
 <head>
        <title>Test</title>
        <meta charset='UTF-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name='description' content='test' />
        <meta name='keywords' content='test, website' />
        <meta name='author' content='test' />

        <!-- Styles -->
        <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Rubik' rel='stylesheet'>
        <link href='css/bootstrap.min.css' rel='stylesheet' type='text/css'>
        <link href='css/style.css' rel='stylesheet' type='text/css'>

        <link href="slick/slick.css" rel="stylesheet">
        <link href="slick/slick-theme.css" rel="stylesheet">
    </head>
 
<body>
    <div class="container">
            <div class="row">
                <h3>Items list</h3>
            </div>
            <div class="row">
                <p>
                    <a href="create.php" class="btn btn-success">Create</a>
                </p>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Title</th>
                      <th>Text</th>
                      <th>Category</th>
                      <th>Image</th>
                     <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                   include 'Database.php';
                   $pdo = Database::connect();
                   $sql = 'SELECT * FROM items ORDER BY id DESC';
                  
                   $res = $pdo->query($sql);

                      if(!empty($res)) {
                           foreach ($res as $row) {
                                echo '<tr>';
                                echo '<td>'. $row['title'] . '</td>';
                                echo '<td>'. $row['text'] . '</td>';
                                echo '<td>'. $row['category'] . '</td>';
                                echo '<td><img src="'. $row['image'] . '" alt="image not found"/></td>';
                                echo '<td><a class="btn btn-danger" href="delete.php?id='.$row['id'].'">Delete</a>';
                                echo ' <a class="btn btn-warning" href="edit.php?id='.$row['id'].'">Edit</a></td>';
                                echo '</tr>';
                           }
                      }
                   Database::disconnect();
                  ?>
                  </tbody>
            </table>
        </div>
    </div> <!-- /container -->
  </body>
</html>