<?php include './PHP/include/head.php'; ?>
<section class="dashboard-counts no-padding-bottom">
  <div class="container-fluid">
    <div class="row bg-white has-shadow">
      <!-- Item -->
      <div class="col-xl-3 col-sm-6">
        <div class="item d-flex align-items-center">
          <div class="icon bg-violet"><i class="icon-user"></i></div>
          <div class="title"><span>Total<br>Students</span>

          </div>
          <div class="number"><strong>25</strong></div>
        </div>
      </div>
      <!-- Item -->
      <div class="col-xl-3 col-sm-6">
        <div class="item d-flex align-items-center">
          <div class="icon bg-red"><i class="icon-padnote"></i></div>
          <div class="title"><span>Total<br>Staffs</span>

          </div>
          <div class="number"><strong>70</strong></div>
        </div>
      </div>
      <!-- Item -->
      <div class="col-xl-3 col-sm-6">
        <div class="item d-flex align-items-center">
          <div class="icon bg-green"><i class="icon-bill"></i></div>
          <div class="title"><span>Total<br>Classes</span>

          </div>
          <div class="number"><strong>44</strong></div>
        </div>
      </div>
      <!-- Item -->
      <div class="col-xl-3 col-sm-6">
        <div class="item d-flex align-items-center">
          <div class="icon bg-orange"><i class="icon-check"></i></div>
          <div class="title"><span>Total<br>Courses</span>

          </div>
          <div class="number"><strong>35</strong></div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="client">
  <div class="container-fluid">
    <div class="row">
        <div class="col-lg-4">
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
        </div>
        <!-- Recent Post-->
        <div class="col-lg-8">
          <div class="articles card">
            <div class="card-close">
              <div class="dropdown">
                <button type="button" id="closeCard" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                <div aria-labelledby="closeCard" class="dropdown-menu has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
              </div>
            </div>
            <div class="card-header d-flex align-items-center">
              <h2 class="h3">Teacher Reports</h2>
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
      <div class="col-lg-6">
        <div class="recent-updates card">
          <div class="card-close">
            <div class="dropdown">
              <button type="button" id="closeCard" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
              <div aria-labelledby="closeCard" class="dropdown-menu has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
            </div>
          </div>
          <div class="card-header">
            <h3 class="h4">Billboard</h3>
          </div>
          <div class="card-body no-padding">
            <!-- Item-->
            <div class="item d-flex justify-content-between">
              <div class="info d-flex">
                <div class="icon"><i class="icon-rss-feed"></i></div>
                <div class="title">
                  <h5>Lorem ipsum dolor sit amet.</h5>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed.Lorem ipsum dolor sit amet, consectetur adipisicing elit sed.</p>
                </div>
              </div>
              <div class="date text-right"><strong>24</strong><span>May</span></div>
            </div>
            <!-- Item-->
            <div class="item d-flex justify-content-between">
              <div class="info d-flex">
                <div class="icon"><i class="icon-rss-feed"></i></div>
                <div class="title">
                  <h5>Lorem ipsum dolor sit amet.</h5>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed.</p>
                </div>
              </div>
              <div class="date text-right"><strong>24</strong><span>May</span></div>
            </div>
            <!-- Item        -->
            <div class="item d-flex justify-content-between">
              <div class="info d-flex">
                <div class="icon"><i class="icon-rss-feed"></i></div>
                <div class="title">
                  <h5>Lorem ipsum dolor sit amet.</h5>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed.</p>
                </div>
              </div>
              <div class="date text-right"><strong>24</strong><span>May</span></div>
            </div>
            <!-- Item-->
            <div class="item d-flex justify-content-between">
              <div class="info d-flex">
                <div class="icon"><i class="icon-rss-feed"></i></div>
                <div class="title">
                  <h5>Lorem ipsum dolor sit amet.</h5>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed.</p>
                </div>
              </div>
              <div class="date text-right"><strong>24</strong><span>May</span></div>
            </div>
            <!-- Item-->
            <div class="item d-flex justify-content-between">
              <div class="info d-flex">
                <div class="icon"><i class="icon-rss-feed"></i></div>
                <div class="title">
                  <h5>Lorem ipsum dolor sit amet.</h5>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed.</p>
                </div>
              </div>
              <div class="date text-right"><strong>24</strong><span>May</span></div>
            </div>
          </div>
        </div>
      </div>
  </div>
</div>
</section>
<?php include './PHP/include/footer.php'; ?>
