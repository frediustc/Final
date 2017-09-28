<?php
$hasVal = false;
if(isset($_POST['addReport-1'])){
    //step1 (define the title of the report)

    $desc = htmlspecialchars(trim($_POST['desc']));
    $crs = htmlspecialchars(trim($_POST['crs']));
    $ok = true;

    //check if the Name format is ok (letter within 2 and 100 char)
    if(!preg_match('/[a-zA-Z0-9 ]{2,100}/', $desc)) {
        $ok = false;
        echo '<div class="alert alert-danger" role="alert"><strong>Name Wrong Format!</strong> 2 - 100 letters, numbers and spaces only</div>';
    }
    else {
        $step_1 = array(
            'desc' => $desc,
            'crs' => $crs
        );
    }
}

if(isset($_POST['addReport-2'])){
    $step_1 = array(
        'desc' => $_POST['desc'],
        'crs' => $_POST['crs']
    );

    $rep = $db->prepare('INSERT INTO reports (uid, description) VALUES(?,?)');
    $rep->execute(array($_SESSION['id'], $_POST['desc']));
    $rid = $db->lastInsertId();

    $usersid = $db->prepare('SELECT uid FROM studentincourse WHERE cid = ?');
    $usersid->execute(array($_POST['crs']));
    while ($id = $usersid->fetch()) {
        if(isset($_POST[$id['uid']])){
            $ins = $db->prepare('INSERT INTO results (mid, uid, result, rid, createdat) VALUES (?,?,?,?, NOW())');
            $ins->execute(array($_POST['md'], $id['uid'], $_POST[$id['uid']], $rid));
        }
    }
    echo '<div class="alert alert-success" role="alert"><strong>Success!</strong> Marking done</div>';
}
?>
