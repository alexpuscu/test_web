<?php
    require 'database.php';
    $id = 0;
     
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( !empty($_POST)) {
        // keep track post values
        $id = $_POST['id'];
         
        // delete data
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM items  WHERE id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        Database::disconnect();
        header("Location: admin.php");
         
    }
?>
 
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
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Delete an item</h3>
                    </div>
                     
                    <form class="form-horizontal" action="delete.php" method="post">
                      <input type="hidden" name="id" value="<?php echo $id;?>"/>
                      <p class="alert alert-error">Are you sure to delete ?</p>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-danger">Yes</button>
                          <a class="btn" href="admin.php">No</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>