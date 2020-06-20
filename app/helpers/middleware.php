<?php 
function notLogin($id){
    if(!empty($id)){
        return true;
    }else{
        header('location:' . BASE_URL . '/404.php');
        exit();
    }
}

?>