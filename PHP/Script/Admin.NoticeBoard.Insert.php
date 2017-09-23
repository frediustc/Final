<?php
$hasVal = false;
if(isset($_POST['addInfo'])){
    $correct = true;

    $title = htmlspecialchars(trim($_POST['title']));
    $info = htmlspecialchars(trim($_POST['info']));


    //check if the Title format is correct (anything within 1 and 100 char)
    if(strlen($title) <= 0 || strlen($title) >= 100) {
        $correct = false;
        echo '<div class="alert alert-danger" role="alert"><strong>Title Wrong Format!</strong> 1 - 100 characters</div>';
    }

    //check if the Info
    if(strlen($info) <= 0) {
        $correct = false;
        echo '<div class="alert alert-danger" role="alert"><strong>Information Wrong Format!</strong> 1 - 100 characters</div>';
    }



    //if all is alright ($correct === true) we insert the value
    if($correct){
        $add = $db->prepare('INSERT INTO noticeboard(title, info, target, createddate) VALUES(?, ?, ?, NOW())');

        if($add->execute(array(ucwords($title), $info, $_POST['target']))){

            echo '<div class="alert alert-success" role="alert"><strong>Success</strong> Student Added!</div>';
        }
        else {
            echo '<div class="alert alert-danger" role="alert"><strong>Error</strong> Something went wrong</div>';
        }
    }
    else {
        $hasVal = true;
    }
}
?>
