 <?php
  try {
    
     // konfigurasi database dbreg
    $con = new PDO('mysql:host=localhost; dbname=dbreg; port=8111', 'root', '', array(PDO::ATTR_PERSISTENT => true));
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
  include_once 'TokoBukuClass.php';
  $user = new TokoBuku($con);
  ?>