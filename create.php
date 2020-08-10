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
                        <h3>Create an item</h3>
                    </div>
             
                    <form class="form-horizontal" action="create.php" method="post">
                      <div class="control-group <?php echo !empty($titleError)?'error':'';?>">
                        <label class="control-label">Title</label>
                        <div class="controls">
                            <input name="title" type="text"  placeholder="Title" value="<?php echo !empty($title)?$title:'';?>">
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
                          <button type="submit" class="btn btn-success">Create</button>
                          <a class="btn" href="index.php">Back</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>
<?php
     
    require 'database.php';
 
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
        
        $randImages = ['240_1.jpg', '240_2.jpg','240_3.jpg'];
        $imgIndex = array_rand($randImages);         
        $image = 'images/' . $randImages[$imgIndex];
        
        // validate input
        $valid = true;
        if (empty($title)) {
            $titleError = 'Please enter a valid title';
            $valid = false;
        }
         
        if (empty($text)) {
            $textError = 'Please enter text';
            $valid = false;
        }
         
        if (empty($category)) {
            $categoryError = 'Please enter a category';
            $valid = false;
        }
                
        // insert data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO items (title,text,category,image) values(?, ?, ?,?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($title,$text,$category,$image));
            Database::disconnect();
            header("Location: admin.php");
        }
    }
?>