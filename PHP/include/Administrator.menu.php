<?php if($cu['usertype'] != 3) {
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
    <li <?php if ($PT == 'Administrator Dashboard'): ?> class="active" <?php endif; ?>> <a href="./Admin.Dashboard.php"><i class="fa fa-user-circle-o"></i>Dashboard</a></li>
    <li <?php if ($PT == 'Administrator Courses'): ?> class="active" <?php endif; ?>><a href="#CoursesLink" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-graduation-cap"></i>Courses </a>
      <ul id="CoursesLink" class="collapse list-unstyled">
        <li><a href="Admin.Course.Add.php">Add</a></li>
        <li><a href="Admin.Course.View.php">View</a></li>
      </ul>
    </li>
    <li <?php if ($PT == 'Administrator Modules'): ?> class="active" <?php endif; ?>><a href="#ModuleLink" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-book"></i>Modules </a>
      <ul id="ModuleLink" class="collapse list-unstyled">
        <li><a href="Admin.Module.Add.php">Add</a></li>
        <li><a href="Admin.Module.View.php">View</a></li>
      </ul>
    </li>
    <li <?php if ($PT == 'Administrator Staff'): ?> class="active" <?php endif; ?>><a href="#staffLink" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-black-tie"></i>Staff </a>
      <ul id="staffLink" class="collapse list-unstyled">
        <li><a href="Admin.Staff.Add.php">Add</a></li>
        <li><a href="Admin.Staff.View.php">View</a></li>
      </ul>
    </li>
    <li <?php if ($PT == 'Administrator Students'): ?> class="active" <?php endif; ?>><a href="#studentLink" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-group"></i>Students </a>
      <ul id="studentLink" class="collapse list-unstyled">
        <li><a href="Admin.Student.Add.php">Add</a></li>
        <li><a href="Admin.Student.View.php">View</a></li>
      </ul>
    </li>
    <span class="heading">Interaction</span>
    <li <?php if ($PT == 'Administrator Timetable'): ?> class="active" <?php endif; ?>> <a href="Admin.Schedule.View.php"><i class="fa fa-table"></i>Time Tables</a></li>
    <li <?php if ($PT == 'Administrator Reports'): ?> class="active" <?php endif; ?>> <a href="Admin.Reports.View.php"><i class="fa fa-flag"></i>Reports</a></li>
    <li <?php if ($PT == 'Administrator Notice Board'): ?> class="active" <?php endif; ?>><a href="#noticeLink" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-info-circle"></i>Notice board</a>
      <ul id="noticeLink" class="collapse list-unstyled">
        <li><a href="Admin.NoticeBoard.Add.php">Add</a></li>
        <li><a href="Admin.NoticeBoard.View.php">View</a></li>
      </ul>
    </li>
    <li <?php if ($PT == 'Administrator Payment'): ?> class="active" <?php endif; ?>><a href="#payment" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-money"></i>Payment</a>
      <ul id="payment" class="collapse list-unstyled">
        <li><a href="Admin.Payment.Add.php">Add</a></li>
        <li><a href="Admin.Payment.View.php">View</a></li>
      </ul>
    </li>
  </ul>
</nav>
