<?php include './PHP/include/head.php'; ?>
<section class="dashboard-counts no-padding-bottom">
  <div class="container-fluid">
    <div class="row bg-white has-shadow">
        <?php
        $nbrs = $db->prepare('SELECT
            (SELECT COUNT(*) FROM users WHERE usertype = 1) AS stu,
            (SELECT COUNT(*) FROM users WHERE usertype = 2) AS sta,
            (SELECT COUNT(*) FROM modules) AS mds,
            (SELECT COUNT(*) FROM courses) AS crs
        ');
        $nbrs->execute();
        $nbr = $nbrs->fetch();
         ?>
      <!-- Item -->
      <div class="col-xl-3 col-sm-6">
        <div class="item d-flex align-items-center">
          <div class="icon bg-violet"><i class="fa fa-users"></i></div>
          <div class="title"><span>Total<br>Students</span>

          </div>
          <div class="number"><strong><?php echo $nbr['stu']; ?></strong></div>
        </div>
      </div>
      <!-- Item -->
      <div class="col-xl-3 col-sm-6">
        <div class="item d-flex align-items-center">
          <div class="icon bg-red"><i class="fa fa-black-tie"></i></div>
          <div class="title"><span>Total<br>Staffs</span>

          </div>
          <div class="number"><strong><?php echo $nbr['sta']; ?></strong></div>
        </div>
      </div>
      <!-- Item -->
      <div class="col-xl-3 col-sm-6">
        <div class="item d-flex align-items-center">
          <div class="icon bg-green"><i class="fa fa-book"></i></div>
          <div class="title"><span>Total<br>Modules</span>

          </div>
          <div class="number"><strong><?php echo $nbr['mds']; ?></strong></div>
        </div>
      </div>
      <!-- Item -->
      <div class="col-xl-3 col-sm-6">
        <div class="item d-flex align-items-center">
          <div class="icon bg-orange"><i class="fa fa-graduation-cap"></i></div>
          <div class="title"><span>Total<br>Courses</span>

          </div>
          <div class="number"><strong><?php echo $nbr['crs']; ?></strong></div>
        </div>
      </div>
      <?php $nbrs->closeCursor(); ?>
    </div>
  </div>
</section>

<section class="client">
  <div class="container-fluid">
    <div class="row">
        <div class="col-lg-6">
          <div class="recent-updates card">
            <div class="card-close">
              <div class="dropdown">
                <button type="button" id="closeCard" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                <div aria-labelledby="closeCard" class="dropdown-menu has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
              </div>
            </div>
            <div class="card-header">
              <h3 class="h4">Lastest In The Notice Board</h3>
            </div>
            <div class="card-body no-padding">
                <?php
                $m = array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');
                $infos = $db->prepare('SELECT * FROM noticeboard ORDER BY id DESC LIMIT 5');
                $infos->execute();
                while ($info = $infos->fetch()) { ?>
              <!-- Item-->
              <div class="item d-flex justify-content-between">
                <div class="info d-flex">
                  <div class="icon"><i class="icon-rss-feed"></i></div>
                  <div class="title">
                      <h5><?php echo $info['title']; ?></h5>
                      <p><?php echo $info['info']; ?></p>
                  </div>
                </div>
                <?php
                $date = explode('-', $info['createddate']);

                 ?>
                <div class="date text-right"><strong><?php echo $date[2]; ?></strong><span><?php echo $m[$date[1] - 1]; ?></span></div>
              </div>
              <?php } ?>
            </div>
          </div>
        </div>
        
        <div class="col-lg-6">
          <div class="articles card">
            <div class="card-close">
              <div class="dropdown">
                <button type="button" id="closeCard" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                <div aria-labelledby="closeCard" class="dropdown-menu has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
              </div>
            </div>
            <div class="card-header d-flex align-items-center">
              <h2 class="h3">Lastest Teacher Reports</h2>
            </div>
            <div class="card-body no-padding">
                <?php
                $reports = $db->prepare('
                SELECT users.fullname, reports.description
                FROM reports
                INNER JOIN users ON users.id = reports.uid
                WHERE reports.view = "0"
                ORDER BY reports.id DESC
                LIMIT 5
                ');

                $reports->execute();
                while ($report = $reports->fetch()) { ?>
                <div class="item d-flex align-items-center">

                <div class="image"><img src="img/school_logo.png" alt="school logo" class="img-fluid rounded-circle"></div>
                <div class="text">
                    <h3 class="h5"><a href="#"><?php echo $report['fullname'] ?></a></h3>
                    <small><a href="#"><?php echo $report['description'] ?>
                        <div class="badge badge-rounded bg-green">New</div></a>
                    </small>
                </div>
              </div>
          <?php } ?>
            </div>
          </div>
        </div>
    </div>
</div>
</section>

<section class="updates no-padding-top">
  <div class="container-fluid">
    <div class="row">
      <!-- Billboard-->

  </div>
</div>
</section>
<?php include './PHP/include/footer.php'; ?>
