<?php
function sortData(){
    include("koneksi.php");
    $_SESSION['orderBy'] = 'ASC';
    $_SESSION['newOrderBy'] = 'ASC';
    if(isset($_GET['col'])){
        $_SESSION['col'] = $_GET['col'];
        $_SESSION['orderBy'] = $_GET['orderBy'];

        $_SESSION['query'] = mysqli_query($conn, "SELECT * FROM members ORDER BY " . $_SESSION['col'] . " " . $_SESSION['orderBy']);
        
        if($_SESSION['orderBy'] == 'ASC'){
            $_SESSION['newOrderBy'] ='DESC';
        }else{
            $_SESSION['newOrderBy'] ='ASC';
        }
    }
}
?>