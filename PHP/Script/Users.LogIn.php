<?php
if (isset($_POST['Login'])) {
    $id = htmlspecialchars(trim($_POST['id']));
    $pass = htmlspecialchars(trim($_POST['pass']));

    $check = $db->prepare('SELECT * FROM users WHERE id = ? AND password = ?');
    $check->execute(array($id, sha1($pass)));
    if($user = $check->fetch()){
        $_SESSION['id'] = $user['id'];
        switch ($user['usertype']) {
            case 1:
                header('location: Student.Dashboard.php');
                break;
            case 2:
                header('location: Staff.Dashboard.php');
                break;
            case 2:
                header('location: Admin.Dashboard.php');
                break;
            default:
                echo '<div class="alert alert-danger" role="alert"><strong>Error</strong> Wrong usertype</div>';
                break;
        }
    }
    else {
        echo '<div class="alert alert-danger" role="alert"><strong>Error</strong> User not found or data do not match</div>';
    }
}
