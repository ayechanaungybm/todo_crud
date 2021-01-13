<?php
require 'config.php';
$pdostatement=$pdo->prepare("DELETE FROM todo WHERE ID=".$_GET['id']);
$pdostatement->execute();

header("Location: index.php");//Redirect to index.php page
 ?>
