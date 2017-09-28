<?php
$hasVal = false;
if(isset($_POST['pay'])){
    $correct = true;
    $paid = htmlspecialchars(trim($_POST['paid']));

    if(!preg_match('/^[0-9]+(\.)?[0-9]+$/', $paid)) {
        $correct = false;
        echo '<div class="alert alert-danger" role="alert"><strong>Fee Wrong Format!</strong> 12.2 format only</div>';
    }

    //if all is alright ($correct === true) we insert the value
    if($correct){
        $pay = $db->prepare('INSERT INTO payment(uid, cid, paid) VALUES(?,?,?)');
        if($pay->execute(array($_POST['uid'], $_POST['cid'], $paid))){
            echo '<div class="alert alert-success" role="alert"><strong>Success!</strong> Payment made</div>';
        }
        else {
            echo '<div class="alert alert-danger" role="alert"><strong>Error!</strong> Something went wrong</div>';
        }
        $pay->closeCursor();
    }
    else {
        $hasVal = true;
    }
}
?>
