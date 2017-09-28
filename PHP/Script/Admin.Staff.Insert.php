<?php
$hasVal = false;
if(isset($_POST['addStaff'])){
    function generateRandomString($length = 16) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    $correct = true;

    $ut = 2;
    $fn = htmlspecialchars(trim($_POST['fn']));
    $em = strtolower(htmlspecialchars(trim($_POST['em'])));
    $sal = htmlspecialchars(trim($_POST['sal']));
    $ph = '';

    //check if phone format is good if inserted
    if(isset($_POST['ph']) && !empty($_POST['ph'])){
        $ph = htmlspecialchars(trim($_POST['ph']));
        if(!preg_match('/^[0-9]{10}$/', $ph)) {
            $correct = false;
            echo '<div class="alert alert-danger" role="alert"><strong>Phone Wrong Format!</strong> 10 Numbers (this field is not required)</div>';
        }
    }

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
        echo '<div class="alert alert-danger" role="alert"><strong>Module Teach Error</strong> You must check a module at least</div>';
    }

    //check if the Full Name format is correct (letter within 2 and 5 char)
    if(!preg_match('/^[a-zA-Z ]{5,100}$/', $fn)) {
        $correct = false;
        echo '<div class="alert alert-danger" role="alert"><strong>Full Name Wrong Format!</strong> 5 - 100 letters & spaces only</div>';
    }

    //check if the email format is correct (letter within 2 and 5 char)
    if(!preg_match('/(^[a-zA-Z0-9_.+-]+)@([a-zA-Z_-]+).([a-zA-Z]){2,4}$/', $em)) {
        $correct = false;
        echo '<div class="alert alert-danger" role="alert"><strong>Email Wrong Format!</strong> must be in example@domain.extension format</div>';
    }

    //check if the paid fee format is correct (letter within 2 and 100 char)
    if(!preg_match('/^[0-9]+(\.)?[0-9]+$/', $sal)) {
        $correct = false;
        echo '<div class="alert alert-danger" role="alert"><strong>Salary Wrong Format!</strong> 12.2 format only</div>';
    }

    //check if the email does not exist
    $check = $db->prepare('SELECT COUNT(*) AS nbr FROM users WHERE email = ?');
    $check->execute(array($em));
    $result = $check->fetch();
    if($result['nbr'] > 0){
        $correct = false;
        echo '<div class="alert alert-danger" role="alert"><strong>Error</strong> Email already exist</div>';
    }

    //if all is alright ($correct === true) we insert the value
    if($correct){
        $ip = generateRandomString();
        $add = $db->prepare('INSERT INTO users(fullname, email, gender, phone, initpass, password, registdate, usertype, salary) VALUES(?, ?, ?, ?, ?, ?, NOW(), ?, ?)');
        if($add->execute(array(ucwords($fn), $em, $_POST['gd'], $ph, $ip, sha1($ip), $ut, $sal))){

            //insert the studentincourse
            $id = $db->lastInsertId();
            $link = $db->prepare('INSERT INTO teachermodules(uid, mid) VALUES(?,?)');
            for ($i=0; $i < count($mod); $i++) {
                $link->execute(array($id, $mod[$i]));//while we find element in mod we execute the insertion
            }

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
