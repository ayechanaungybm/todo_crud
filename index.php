<?php
require 'config.php';
$pdostatement=$pdo->prepare("SELECT * FROM todo ORDER BY id DESC");
$pdostatement->execute();
$result=$pdostatement->fetchAll();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="shortcut icon" href="#">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

  </head>
  <body>
    <div class="card">
      <div class="card-body">
        <h2>ToDo Here Page</h2>
        <div>
          <a href="add.php" type="button" class="btn btn-success">Create New</a>
        </div><br>
        <table class="table table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Title</th>
              <th>Description</th>
              <th>Created</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php
                if($result){
                  $i=1;
                  foreach ($result as $value) {

                    ?>
                    <tr>
                      <td><?php echo $i; ?></td>
                      <td><?php echo $value['Title'];?></td>
                      <td><?php echo $value['Description'];?></td>
                      <td><?php echo date('Y-m-d',strtotime($value['Created_at']));?></td>
                      <td>
                        <a type="button" class="btn btn-warning" href="edit.php?id=<?php echo $value['ID']; ?>">Edit</a>
                        <a type="button" class="btn btn-danger" href="delete.php?id=<?php echo $value['ID'];?>">Delete</a>
                      </td>
                    </tr>
                    <?php
                    $i++;
                  }
                }

             ?>



          </tbody>
        </table>
      </div>
    </div>
  </body>
</html>
