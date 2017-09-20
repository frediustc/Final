<?php
$hasVal = false;
if(isset($_POST['addCourse'])){
    $correct = true;
    //insert available module in an array to check if they have been checked
    $mod = array();

    $modules = $db->prepare('SELECT id, abbr FROM Modules ORDER BY abbr');
    $modules->execute();

    while ($module = $modules->fetch()) {
        if(isset($_POST[$module['abbr']])){
            array_push($mod, $module['id']);
        }
    }

    if (count($mod) < 1) {
        $correct = false;
        echo '<div class="alert alert-danger" role="alert"><strong>Module</strong> You must check a module at least</div>';
    }

    $abbr = htmlspecialchars(trim($_POST['abbr']));
    $name = htmlspecialchars(trim($_POST['name']));

    //check if the Abbr format is correct (letter within 2 and 5 char)
    if(!preg_match('/[a-zA-Z]{2,8}/', $abbr)) {
        $correct = false;
        echo '<div class="alert alert-danger" role="alert"><strong>Abbr Wrong Format!</strong> 2 - 8 letters only</div>';
    }

    //check if the Name format is correct (letter within 2 and 100 char)
    if(!preg_match('/[a-zA-Z0-9 ]{2,100}/', $name)) {
        $correct = false;
        echo '<div class="alert alert-danger" role="alert"><strong>Name Wrong Format!</strong> 2 - 100 letters, numbers and spaces only</div>';
    }

    //check if the module does not exist
    $check = $db->prepare('SELECT COUNT(*) AS nbr FROM Courses WHERE abbr = ? OR name = ?');
    $check->execute(array($abbr, $correct));
    $result = $check->fetch();
    if($result['nbr'] > 0){
        $correct = false;
        echo '<div class="alert alert-danger" role="alert"><strong>Error</strong> Course Name Or/And Abbr already exist</div>';
    }

    //if all is alright ($correct === true) we insert the value
    if($correct){
        $add = $db->prepare('INSERT INTO Courses(abbr, name) VALUES(?, ?)');
        if($add->execute(array(strtoupper($abbr), ucwords($name)))){
            $id = $db->lastInsertId();

            //insert the courseid and module id
            $link = $db->prepare('INSERT INTO coursesmodules(cid, mid) VALUES(?, ?)');
            for ($i=0; $i < count($mod); $i++) {
                $link->execute(array($id, $mod[$i]));//while we find element in mod we execute the insertion
            }
            echo '<div class="alert alert-success" role="alert"><strong>Success</strong> Course Added!</div>';
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
