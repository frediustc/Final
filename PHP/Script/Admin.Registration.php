<?php
$hasVal = false;
if(isset($_POST['Register'])){
    $correct = true;

    $ut = 3;
    $fn = htmlspecialchars(trim($_POST['fn']));
    $ps = strtolower(htmlspecialchars(trim($_POST['ps'])));
    $cn = htmlspecialchars(trim($_POST['cn']));
    $ph = '';

    //check if the Full Name format is correct (letter within 2 and 5 char)
    if(!preg_match('/^[a-zA-Z ]{5,100}$/', $fn)) {
        $correct = false;
        echo '<div class="alert alert-danger" role="alert"><strong>Full Name Wrong Format!</strong> 5 - 100 letters & spaces only</div>';
    }

    if (strlen($ps) < 6) {
        $correct = false;
        echo '<div class="alert alert-danger" role="alert"><strong>Password!</strong> 6 character minimum</div>';
    }

    if($ps !== $cn){
        $correct = false;
        echo '<div class="alert alert-danger" role="alert"><strong>Password!</strong> Password and Confim do not match</div>';
    }

    //if all is alright ($correct === true) we insert the value
    if($correct){
        //need to create the database first

        $add = $db->prepare('INSERT INTO users(fullname, email, gender, phone, initpass, password, registdate, usertype) VALUES(?, "admin@admin.com", "M", 0123456789, "undefined", ?, NOW(), ?)');
        if($add->execute(array(ucwords($fn) ,sha1($ps), $ut))){
            echo '<div class="alert alert-success" role="alert"><strong>Success</strong> Student Added!</div>';
        }
        else {
            echo '<div class="alert alert-danger" role="alert"><strong>Error</strong> Something went wrong</div>';
        }
        $add->closeCursor();
    }
    else {
        $hasVal = true;
    }
}
?>
