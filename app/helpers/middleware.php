<?php 
function notLogin($id){
    if($id){
        return true;
    }else{
        header('location:' . BASE_URL . '/404.php');
        exit();
    }
}

?>