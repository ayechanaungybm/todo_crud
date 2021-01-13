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
         <form class="" action="add.php" method="POST">
            <div class="form-group">
              <label for="">Title</label>
              <input type="text" class="form-control" name="title" value="" required>
            </div>
            <div class="form-group">
                <label for="">Description</label>
                <textarea name="description" class="form-control" rows="8" cols="80"></textarea>
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
 <?php
 require 'config.php';
 if(!empty($_POST)){
   $title=$_POST['title'];
   $desc=$_POST['description'];

   $sql="INSERT INTO todo(Title,Description) VALUES(:title,:description)";
   $pdostatement=$pdo->prepare($sql);
   $result=$pdostatement->execute(
     array(
       ':title'=>$title,
       ':description'=>$desc
     )
   );

   if($result){
     echo "<script>alert('New Todo is added');window.location.href='index.php';</script>";
   }
 }

 ?>
