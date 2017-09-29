<?php
if(!isset($_GET['id'])){
    header('location: Student.Dashboard.php');
}
if(empty($_GET['id']) || (int)$_GET['id'] <= 0){
    header('location: Student.Dashboard.php');
}
$PH = $PT = 'Student Results';
include './PHP/include/head.php'; ?>

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
                <form class="form-inline">
                  <div class="form-group">
                      <select class="form-control" name="level">
                          <option value="L4DB">L4DB</option>
                          <option value="L5DB">L5DB</option>
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
        <div class="statistic d-flex align-items-center bg-red text-white has-shadow changecrs" id="EOM">
          <div class="text"><small>Applications</small></div>
        </div>
        <div class="statistic d-flex align-items-center bg-green text-white has-shadow changecrs" id="UBO">
          <div class="text"><small>Interviews</small></div>
        </div>
        <div class="statistic d-flex align-items-center bg-blue text-white has-shadow changecrs" id="ISO">
          <div class="text"><small>Forwards</small></div>
        </div>
        <div class="statistic d-flex align-items-center bg-orange text-white has-shadow changecrs" id="JS">
          <div class="text"><small>Forwards</small></div>
        </div>
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
$studentResult = true;
include './PHP/include/footer.php'; ?>
