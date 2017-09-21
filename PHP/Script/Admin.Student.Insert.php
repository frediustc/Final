<?php
$hasVal = false;
if(isset($_POST['addStudent'])){
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

    $ut = 1;
    $fn = htmlspecialchars(trim($_POST['fn']));
    $em = strtolower(htmlspecialchars(trim($_POST['em'])));
    $fee = htmlspecialchars(trim($_POST['fee']));
    $ph = '';
    echo '<div class="alert alert-danger" role="alert"><strong>'.$_POST['gd'].'</div>';
    //check if phone format is good if inserted
    if(isset($_POST['ph']) && !empty($_POST['ph'])){
        $ph = htmlspecialchars(trim($_POST['ph']));
        if(!preg_match('/[0-9]{10}/', $ph)) {
            $correct = false;
            echo '<div class="alert alert-danger" role="alert"><strong>Phone Wrong Format!</strong> 10 Numbers (this field is not required)</div>';
        }
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
    if(!preg_match('/^[0-9]+(\.)?[0-9]+$/', $fee)) {
        $correct = false;
        echo '<div class="alert alert-danger" role="alert"><strong>Fee Wrong Format!</strong> 12.2 format only</div>';
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
        $add = $db->prepare('INSERT INTO users(fullname, email, gender, phone, initpass, password, registdate, usertype) VALUES(?, ?, ?, ?, ?, ?, NOW(), ?)');
        if($add->execute(array(ucwords($fn), $em, $_POST['gd'], $ph, $ip, sha1($ip), $ut))){

            //insert the payment
            $id = $db->lastInsertId();
            $pay = $db->prepare('INSERT INTO payment(uid, cid, paid) VALUES(?,?,?)');
            $pay->execute(array($id, $_POST['crs'], $fee));

            //insert the studentincourse
            $id = $db->lastInsertId();
            $pay = $db->prepare('INSERT INTO studentincourse(uid, cid, since) VALUES(?,?, NOW())');
            $pay->execute(array($id, $_POST['crs']));

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
