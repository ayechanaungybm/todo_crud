<?php
  require 'config.php';
  if($_POST){
    $title=$_POST['title'];
    $desc=$_POST['description'];
    $id=$_POST['id'];
    $pdostatement=$pdo->prepare("UPDATE todo SET title='$title',description='$desc' WHERE id='$id'");
    $result=$pdostatement->execute();
    if($result){
      echo "<script>alert('New Todo is updated');window.location.href='index.php';</script>";
    }
  }else{
    $pdostatement=$pdo->prepare("SELECT * FROM todo WHERE ID=".$_GET['id']);
    $pdostatement->execute();
    $result=$pdostatement->fetchAll();

  }


 ?>
<!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>

     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
     <link rel="shortcut icon" href="#">
   </head>
   <body>
     <div class="card">
       <div class="card-body">
         <h2>Create New Todo</h2>
         <form class="" action="" method="POST">
           <input type="hidden" name="id" value="<?php echo $result[0]['ID'];?>">
            <div class="form-group">
              <label for="">Title</label>
              <input type="text" class="form-control" name="title" value="<?php echo $result[0]['Title']?>" required>
            </div>
            <div class="form-group">
                <label for="">Description</label>
                <textarea name="description" class="form-control" rows="8" cols="80"><?php echo $result[0]['Description']?></textarea>
            </div>
            <div class="form-group">
              <input type="submit" class="btn btn-primary" name="" value="UPDATE" >
              <a href="index.php" type="button" class="btn btn-default" name="">Back</a>
            </div>


         </form>
       </div>
     </div>
   </body>
 </html>
