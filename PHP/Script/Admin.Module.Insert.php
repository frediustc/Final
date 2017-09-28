<?php
$hasVal = false;
if(isset($_POST['addModule'])){
    $correct = true;
    $abbr = htmlspecialchars(trim($_POST['abbr']));
    $name = htmlspecialchars(trim($_POST['name']));

    //check if the Abbr format is correct (letter within 2 and 5 char)
    if(!preg_match('/[a-zA-Z]{2,5}/', $abbr)) {
        $correct = false;
        echo '<div class="alert alert-danger" role="alert"><strong>Abbr Wrong Format!</strong> 2 - 5 letters only</div>';
    }

    //check if the Name format is correct (letter within 2 and 100 char)
    if(!preg_match('/[a-zA-Z ]{2,100}/', $name)) {
        $correct = false;
        echo '<div class="alert alert-danger" role="alert"><strong>Name Wrong Format!</strong> 2 - 100 letters only</div>';
    }

    //check if the module does not exist
    $check = $db->prepare('SELECT COUNT(*) AS nbr FROM Modules WHERE abbr = ? OR name = ?');
    $check->execute(array($abbr, $correct));
    $result = $check->fetch();
    if($result['nbr'] > 0){
        $correct = false;
        echo '<div class="alert alert-danger" role="alert"><strong>Error</strong> Module Name Or/And Abbr already exist</div>';
    }

    //if all is alright ($correct === true) we insert the value
    if($correct){
        $add = $db->prepare('INSERT INTO Modules(abbr, name) VALUES(?, ?)');
        if($add->execute(array(strtoupper($abbr), ucwords($name)))){
            echo '<div class="alert alert-success" role="alert"><strong>Success</strong> Module Added!</div>';

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
