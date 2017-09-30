<?php
if(!isset($_GET['uid'])){
    header('location: Admin.Dashboard.php');
}
if(empty($_GET['uid']) || (int)$_GET['uid'] <= 0){
    header('location: Admin.Dashboard.php');
}
if(!isset($_GET['cid'])){
    header('location: Admin.Dashboard.php');
}
if(empty($_GET['cid']) || (int)$_GET['cid'] <= 0){
    header('location: Admin.Dashboard.php');
}
$PH = $PT = 'Student Results';
include './PHP/include/head.php';
if($cu['usertype'] == 1){
    header('location: Student.Dashboard.php');
}
?>

<section class="no-padding-bottom">
    <div class="container-fluid">
      <div class="row">
          <div class="col">
            <div class="card">
              <div class="card-close">
                <div class="dropdown">
                  <button type="button" id="closeCard" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                  <div aria-labelledby="closeCard" class="dropdown-menu has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                </div>
              </div>
              <div class="card-header d-flex align-items-center">
                <h3 class="h4">Select the Course</h3>
              </div>
              <div class="card-body">
                <form class="form-inline" method="get" action="Admin_staff.Student.Results.View.php">
                  <div class="form-group">
                      <input type="hidden" name="uid" value="<?php echo $_GET['uid']; ?>" required>
                      <select class="form-control" name="cid">
                          <?php
                          $seeCrs = $db->prepare('
                              SELECT courses.abbr, courses.id
                              FROM studentincourse
                              INNER JOIN users ON users.id = studentincourse.uid
                              INNER JOIN courses ON courses.id = studentincourse.cid
                              WHERE studentincourse.uid = ?
                              ORDER BY studentincourse.since DESC
                          ');

                          $seeCrs->execute(array($_GET['uid']));
                          while ($Scrs = $seeCrs->fetch()) { ?>
                              <option value="<?php echo $Scrs['id'] ?>"><?php echo $Scrs['abbr'] ?></option>
                          <?php } ?>
                      </select>
                  </div>
                  <div class="form-group">
                    <input type="submit" value="Submit" class="mx-sm-3 btn btn-primary">
                  </div>
                </form>
              </div>
            </div>
          </div>
      </div>
    </div>
</section>
<!-- Dashboard Header Section    -->
<section class="dashboard-header">
  <div class="container-fluid">
    <div class="row">
      <!-- Statistics -->
      <div class="statistics col-lg-3 col-12">
          <?php
          $seeMods = $db->prepare('
          SELECT DISTINCT modules.abbr
          FROM coursesmodules
          INNER JOIN modules ON modules.id = coursesmodules.mid
          INNER JOIN courses ON courses.id = coursesmodules.cid
          WHERE courses.id = ? LIMIT 4
          ');
          $i = 0;
          $colors = array('red', 'green', 'blue', 'orange');
          $seeMods->execute(array($_GET['cid']));
          while ($seeMod = $seeMods->fetch()) { ?>
              <div class="statistic d-flex align-items-center bg-<?php echo $colors[$i] ?> text-white has-shadow changecrs" id="<?php echo $seeMod['abbr'] ?>">
                <div class="text"><small><?php echo $seeMod['abbr'] ?></small></div>
              </div>
        <?php $i++; } ?>
      </div>
      <!-- Line Chart            -->
      <div class="chart col-lg-9 col-12">
        <div class="line-chart bg-white d-flex align-items-center justify-content-center has-shadow">
          <canvas id="myChart"></canvas>
        </div>
      </div>
    </div>
  </div>
</section>
<?php
$adminEmpStudentResult = true;
include './PHP/include/footer.php'; ?>
