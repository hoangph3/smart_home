<?php require 'database.php';
  if (!empty($_POST)) {
    //Retrived data 
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $id = 0;
    $sql = 'SELECT * FROM statusled WHERE ID = ?';
    $q = $pdo->prepare($sql);
    $q->execute(array($id));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    
    //Read Stat and Color
    $Stat = isset($_POST['Stat']) ? $_POST['Stat'] : $data['Stat'];
    $Color = isset($_POST['Color']) ? $_POST['Color'] : $data['Color'];

    //Insert data
    $sql = "UPDATE statusled SET Stat = ?, Color = ? WHERE ID = 0";
    $q = $pdo->prepare($sql);
    $q->execute(array($Stat,$Color));
    Database::disconnect();
    header("Location: Main.php");
  }
?>