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
                $infos = $db->prepare('SELECT * FROM noticeboard ORDER BY createddate DESC LIMIT 5');
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
        <!-- <div class="col-lg-4">
          <div class="client card">
            <div class="card-close">
              <div class="dropdown">
                <button type="button" id="closeCard" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                <div aria-labelledby="closeCard" class="dropdown-menu has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
              </div>
            </div>
            <div class="card-header d-flex align-items-center">
              <h2 class="h3">My Profile</h2>
            </div>
            <div class="card-body text-center">
              <div class="client-avatar"><img src="img/avatar-2.jpg" alt="..." class="img-fluid rounded-circle">
                <div class="status bg-green"></div>
              </div>
              <div class="client-title">
                <h3>Jason Doe</h3>
                <span>Administrator</span>
                <p class="profile-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                <a href="#">Edit</a>
              </div>
            </div>
          </div>
        </div> -->
        <!-- Recent Post-->
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
              <div class="badge badge-rounded bg-green">3 New</div>
            </div>
            <div class="card-body no-padding">
              <div class="item d-flex align-items-center">
                <div class="image"><img src="img/avatar-1.jpg" alt="..." class="img-fluid rounded-circle"></div>
                <div class="text">
                    <a href="#">
                        <h3 class="h5">Mister Patric</h3>
                        <small>Result of the L5DBIT
                            <div class="badge badge-rounded bg-green">New</div>
                        </small>
                    </a>
                </div>
              </div>
              <div class="item d-flex align-items-center">
                <div class="image"><img src="img/avatar-2.jpg" alt="..." class="img-fluid rounded-circle"></div>
                <div class="text"><a href="#">
                    <h3 class="h5">Lorem Ipsum Dolor</h3></a><small>Posted on 5th June 2017 by Frank Williams.   </small></div>
              </div>
              <div class="item d-flex align-items-center">
                <div class="image"><img src="img/avatar-3.jpg" alt="..." class="img-fluid rounded-circle"></div>
                <div class="text"><a href="#">
                    <h3 class="h5">Lorem Ipsum Dolor</h3></a><small>Posted on 5th June 2017 by Ashley Wood.   </small></div>
              </div>
              <div class="item d-flex align-items-center">
                <div class="image"><img src="img/avatar-3.jpg" alt="..." class="img-fluid rounded-circle"></div>
                <div class="text"><a href="#">
                    <h3 class="h5">Lorem Ipsum Dolor</h3></a><small>Posted on 5th June 2017 by Ashley Wood.   </small></div>
              </div>
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