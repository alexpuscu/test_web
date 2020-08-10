<?php
    require 'database.php';
 
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( null==$id ) {
        header("Location: admin.php");
    }
     
    if ( !empty($_POST)) {
        // keep track validation errors
        $titleError = null;
        $textError = null;
        $categoryError = null;
        $imageError = null;
         
        // keep track post values
         $title = $_POST['title'];
         $text = $_POST['text'];
         $category = $_POST['category'];
          $image = $_POST['image'];
        
        // validate input
        $valid = true;
        if (empty($title)) {
            $titleError = 'Please enter title';
            $valid = false;
        }
         
        if (empty($text)) {
            $textError = 'Please enter text';
            $valid = false;
        }
         
        if (empty($category)) {
            $categoryError = 'Please enter category';
            $valid = false;
        }
         
        // edit data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE items  set title = ?, text = ?, category =? WHERE id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($title,$text,$category,$id));
            Database::disconnect();
            header("Location: admin.php");
        }
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM items where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        $title = $data['title'];
        $text = $data['text'];
        $category = $data['category'];
        $image = $data['image'];
        Database::disconnect();
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
                        <h3>Edit an item</h3>
                    </div>
             
                    <form class="form-horizontal" action="edit.php?id=<?php echo $id?>" method="post">
                      <div class="control-group <?php echo !empty($titleError)?'error':'';?>">
                        <label class="control-label">Title</label>
                        <div class="controls">
                            <input name="title" type="text"  placeholder="title" value="<?php echo !empty($title)?$title:'';?>">
                            <?php if (!empty($titleError)): ?>
                                <span class="help-inline"><?php echo $titleError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($textError)?'error':'';?>">
                        <label class="control-label">Text</label>
                        <div class="controls">
                            <input name="text" type="text" placeholder="Text" value="<?php echo !empty($text)?$text:'';?>">
                            <?php if (!empty($textError)): ?>
                                <span class="help-inline"><?php echo $textError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($categoryError)?'error':'';?>">
                        <label class="control-label">Category</label>
                        <div class="controls">
                            <input name="category" type="text"  placeholder="Category" value="<?php echo !empty($category)?$category:'';?>">
                            <?php if (!empty($categoryError)): ?>
                                <span class="help-inline"><?php echo $categoryError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Edit</button>
                          <a class="btn" href="admin.php">Back</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>
