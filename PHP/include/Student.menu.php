<?php if($cu['usertype'] != 1) {
        header('location: ./');
}

//display course
$courses = $db->prepare('
    SELECT courses.abbr, courses.id, courses.name
    FROM studentincourse
    INNER JOIN users ON users.id = studentincourse.uid
    INNER JOIN courses ON courses.id = studentincourse.cid
    WHERE studentincourse.uid = ?
    ORDER BY studentincourse.since DESC LIMIT 1
');

$courses->execute(array($_SESSION['id']));
$crs = $courses->fetch();
$_SESSION['c'] = $crs['abbr'];

?>
<!-- Side Navbar -->
<nav class="side-navbar">
  <!-- Sidebar Header-->
  <div class="sidebar-header d-flex align-items-center">
    <div class="avatar"><img src="img/school_logo.png" alt="..." class="img-fluid rounded-circle"></div>
    <div class="title">
      <h1 class="h4"><?php echo $cu['fullname'] ?></h1>
      <p><?php echo $ut[$cu['usertype'] - 1]; ?></p>
    </div>
  </div>
  <!-- Sidebar Navidation Menus--><span class="heading">Main Menu</span>
  <ul class="list-unstyled">
      <li <?php if ($PT == 'Student Dashboard'): ?> class="active" <?php endif; ?>> <a href="./Student.Dashboard.php"><i class="fa fa-user-circle-o"></i>Dashboard</a></li>
      <li <?php if ($PT == 'Student Results'): ?> class="active" <?php endif; ?>> <a href="Student.Results.View.php?id=<?php echo $crs['id'] ?>"><i class="fa fa-flag"></i>Results</a></li>
      <li <?php if ($PT == 'Student Timetable'): ?> class="active" <?php endif; ?>> <a href="Student.Schedule.View.php"><i class="fa fa-table"></i>Time Tables</a></li>
  </ul>
</nav>
