<?php if($cu['usertype'] != 1) {
        header('location: ./');
}
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
      <li <?php if ($PT == 'Teacher Dashboard'): ?> class="active" <?php endif; ?>> <a href="./Student.Dashboard.php"><i class="fa fa-user-circle-o"></i>Dashboard</a></li>
      <li><a href="#ReportsLink" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-flag"></i>Reports </a>
          <ul id="ReportsLink" class="collapse list-unstyled">
              <li><a href="Student.Report.Add.php">Add</a></li>
              <li><a href="Student.Report.View.php">View</a></li>
          </ul>
      </li>
      <li <?php if ($PT == 'Teacher Timetable'): ?> class="active" <?php endif; ?>> <a href="Student.Schedule.View.php"><i class="fa fa-table"></i>Time Tables</a></li>
  </ul>
</nav>
