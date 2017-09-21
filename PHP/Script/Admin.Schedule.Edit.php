<?php
$editDay = $editRoom = $editAct = $roomsView = false;
//get the first room for default display
$fr = $db->prepare('SELECT * FROM rooms ORDER BY room LIMIT 1');
$fr->execute();
$_fr = $fr->fetch();

//if room changement is call we change the value of rid otherwise we take the value of the first room
$_SESSION['rv'] = !empty($_SESSION['rv']) ? $_SESSION['rv'] : $_fr['id'];
$_SESSION['rv'] = isset($_POST['changeRoom']) ? $_POST['rid'] : $_SESSION['rv'];

//add day
if(isset($_POST['addDay'])){
    $d = htmlspecialchars(trim($_POST['day']));
    if(preg_match('/[a-zA-Z]{2,10}/', $d)){

        $check = $db->prepare('SELECT COUNT(*) AS nbr FROM days WHERE day = ?');
        $check->execute(array(ucwords($d)));
        $c = $check->fetch();
        if($c['nbr'] >= 1){
            $editDay = true;
            echo '<div class="alert alert-danger" role="alert"><strong>Day !</strong> day already exits</div>';
        }
        else {
            $add = $db->prepare('INSERT INTO days(day) VALUES(?)');
            $add->execute(array(ucwords($d)));
            echo '<div class="alert alert-success" role="alert"><strong>Sucess!</strong> Day added</div>';
        }
    }
    else {
        $editDay = true;
        echo '<div class="alert alert-danger" role="alert"><strong>Day Wrong Format!</strong> 2 - 10 letters only</div>';
    }
}

//add room
if(isset($_POST['addRoom'])){
    $r = htmlspecialchars(trim($_POST['room']));
    if(preg_match('/^[a-zA-Z]+[a-zA-Z0-9 ]{1,50}$/', $r)){
        $check = $db->prepare('SELECT COUNT(*) AS nbr FROM rooms WHERE room = ?');
        $check->execute(array(ucwords($r)));
        $c = $check->fetch();
        if($c['nbr'] >= 1){
            $editRoom = true;
            echo '<div class="alert alert-danger" role="alert"><strong>Room !</strong> room already exits</div>';
        }
        else {
            $add = $db->prepare('INSERT INTO rooms(room) VALUES(?)');
            $add->execute(array(ucwords($r)));
            echo '<div class="alert alert-success" role="alert"><strong>Sucess!</strong> Room added</div>';
        }

    }
    else {
        $editRoom = true;
        echo '<div class="alert alert-danger" role="alert"><strong>Room Wrong Format!</strong> 2 - 50 letters, space and numbers only</div>';
    }
}

if(isset($_POST['addEvent'])){
    $m = htmlspecialchars(trim($_POST['m']));
    $rid = htmlspecialchars(trim($_POST['rid']));
    $d = htmlspecialchars(trim($_POST['d']));
    $cid = htmlspecialchars(trim($_POST['c']));
    $uid = htmlspecialchars(trim($_POST['uid']));
    $st = explode(":", htmlspecialchars(trim($_POST['st']))); //make research about explode in php
    $et = explode(":", htmlspecialchars(trim($_POST['et']))); //make research about explode in php

    $add = $db->prepare('INSERT INTO timetable(module, day, rid, c, uid, sh, sm, eh, em) VALUES(?,?,?,?,?,?,?,?,?)');

    //Check if the time if correct
    if(($et[0] > $st[0]) || ($et[1] > $st[1])){

        //see if there are no class at that time for this rrom
        $exist = $db->prepare('SELECT COUNT(*) AS nbr FROM timetable WHERE ((sh < ? AND eh > ?) OR (sh = ? AND sm < ?)) AND rid = ? AND day = ?');
        $exist->execute(array($st[0], $st[0], $et[0], $et[1], $rid, $d));
        $ex = $exist->fetch();
        if($ex['nbr'] >= 1){
            echo '<div class="alert alert-danger" role="alert"><strong>Error !</strong> There is another class in that room during the same periode</div>';
        }
        else {
            if($add->execute(array($m, $d, $rid, $cid, $uid, $st[0], $st[1], $et[0], $et[1]))){
                echo '<div class="alert alert-success" role="alert"><strong>Success !</strong> Event Added</div>';
            }
            else {
                echo '<div class="alert alert-danger" role="alert"><strong>Error !</strong> Event Not Added</div>';
            }
        }
    }
    else{
        echo '<div class="alert alert-danger" role="alert"><strong>Error !</strong> Wrong time interval</div>';
    }
}
