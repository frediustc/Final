<?php
$PH = $PT = 'Teacher Dashboard';
include './PHP/include/head.php'; ?>
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
      <div class="col-md-4 col-xs-6">
        <div class="item d-flex align-items-center">
          <div class="icon bg-red"><i class="fa fa-black-tie"></i></div>
          <div class="title"><span>Unseen<br>Notifications</span>

          </div>
          <div class="number"><strong><?php echo $nbr['sta']; ?></strong></div>
        </div>
      </div>
      <!-- Item -->
      <div class="col-md-4 col-xs-6">
        <div class="item d-flex align-items-center">
          <div class="icon bg-green"><i class="fa fa-book"></i></div>
          <div class="title"><span>Total<br>Modules</span>

          </div>
          <div class="number"><strong><?php echo $nbr['mds']; ?></strong></div>
        </div>
      </div>
      <!-- Item -->
      <div class="col-md-4 col-xs-6">
        <div class="item d-flex align-items-center">
          <div class="icon bg-orange"><i class="fa fa-graduation-cap"></i></div>
          <div class="title"><span>Total<br>Reports</span>

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
          <div class="row">
              <!-- Inline Form-->
              <div class="col-lg-12 mb-4">
                  <div class="card">
                    <div class="card-close">
                      <div class="dropdown">
                        <button type="button" id="closeCard" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                        <div aria-labelledby="closeCard" class="dropdown-menu has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                      </div>
                    </div>
                    <div class="card-header d-flex align-items-center">
                      <h3 class="h4">Horizontal Form</h3>
                    </div>
                    <div class="card-body">
                        <?php if (sha1($cu['initpass']) == $cu['password']): ?>
                            <div class="alert alert-warning" role="alert">
                              <strong>Warning!</strong> Your are using the default password please change it to your own.
                            </div>
                        <?php endif; ?>
                      <form class="form-horizontal">
                        <div class="form-group row">
                          <label class="col-sm-3 form-control-label">New Password</label>
                          <div class="col-sm-9">
                            <input type="password" placeholder="Your password" class="form-control form-control-success">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-3 form-control-label">Confirm New Password</label>
                          <div class="col-sm-9">
                            <input type="password" placeholder="Confirm Pasword" class="form-control form-control-warning">
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-9 offset-sm-3">
                            <input type="submit" value="Signin" class="btn btn-primary">
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
              </div>
              <div class="col-12">
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
                        $infos = $db->prepare('SELECT * FROM noticeboard WHERE target != 1 ORDER BY createddate DESC LIMIT 5');
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
          </div>
        </div>
        <!-- [personal info] -->
        <div class="col-lg-6">
          <div class="card">
            <div class="card-close">
              <div class="dropdown">
                <button type="button" id="closeCard" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                <div aria-labelledby="closeCard" class="dropdown-menu has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
              </div>
            </div>
            <div class="card-header d-flex align-items-center">
              <h3 class="h4">Personal information</h3>
            </div>
            <div class="card-body">
              <p>Click on the texts to edit your informations. <br> <small>Informations with (*) can be edited</small></p>

              <form class="form-horizontal" id="persoInfo">
                <div class="form-group row">
                  <label class="col-sm-3 form-control-label">ID</label>
                  <div class="col-sm-9">
                    <p class="display"><?php echo $cu['id'] ?></p>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-3 form-control-label">Full Name</label>
                  <div class="col-sm-9">
                    <p class="display"><?php echo $cu['fullname'] ?></p>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-3 form-control-label">Email*</label>
                  <div class="col-sm-9">
                    <input type="email" placeholder="Email" class="form-control form-control-warning" required value="<?php echo $cu['email'] ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-3 form-control-label">Phone*</label>
                  <div class="col-sm-9">
                    <input type="number" placeholder="Phone" class="form-control form-control-warning" required value="<?php echo $cu['phone'] ?>">
                  </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 form-control-label">Gender</label>
                    <div class="col-sm-9">
                        <?php if ($cu['gender'] == 'M'): ?>
                            <p class="display">Male</p>
                        <?php endif; ?>
                        <?php if ($cu['gender'] == 'F'): ?>
                            <p class="display">Female</p>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 form-control-label">Modules</label>
                    <div class="col-sm-9">
                        <ul class="list-unstyled list-inline modulelist">
                            <li class="d-inline-block"><small>PHP</small></li>
                            <li class="d-inline-block"><small>PHP</small></li>
                            <li class="d-inline-block"><small>PHP</small></li>
                        </ul>
                    </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-9 offset-sm-3">
                    <input type="submit" value="Signin" class="btn btn-primary">
                  </div>
                </div>
              </form>
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
