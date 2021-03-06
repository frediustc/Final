<?php include './PHP/include/head.php'; include './PHP/include/checkAdmin.php'; ?>
<section>
    <div class="container-fluid">
        <div class="row">
            <!-- Form Elements -->
            <div class="col-lg-12">
              <div class="card">
                <div class="card-close">
                  <div class="dropdown">
                    <button type="button" id="closeCard" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                    <div aria-labelledby="closeCard" class="dropdown-menu has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                  </div>
                </div>
                <div class="card-header d-flex align-items-center">
                  <h3 class="h4">Add New Student</h3>
                </div>
                <div class="card-body">
                  <form class="form-horizontal" method="post" action="Admin.Student.Add.php">
                    <div class="form-group row">
                      <label class="col-sm-3 form-control-label">Full Name*</label>
                      <div class="col-sm-9">
                        <input type="text" name="fn" class="form-control" required>
                      </div>
                    </div>
                    <div class="line"></div>
                    <div class="form-group row">
                      <label class="col-sm-3 form-control-label">Email*</label>
                      <div class="col-sm-9">
                        <input type="email" name="em" class="form-control" required>
                      </div>
                    </div>
                    <div class="line"></div>
                    <div class="form-group row">
                      <label class="col-sm-3 form-control-label">Phone</label>
                      <div class="col-sm-9">
                        <input type="number" name="nb" class="form-control">
                      </div>
                    </div>
                    <div class="line"></div>
                    <div class="form-group row">
                      <label class="col-sm-3 form-control-label">Gender*</label>
                      <div class="col-sm-9">
                        <div class="i-checks">
                          <input id="genderMale" type="radio" value="M" name="gd" class="radio-template">
                          <label for="genderMale">Male</label>
                        </div>
                        <div class="i-checks">
                          <input id="genderFemale" type="radio" checked="" value="F" name="gd" class="radio-template">
                          <label for="genderFemale">Female</label>
                      </div>
                      </div>
                    </div>
                    <div class="line"></div>
                    <div class="form-group row">
                      <label class="col-sm-3 form-control-label">Course*</label>
                      <div class="col-sm-9 select">
                        <select name="account" class="form-control" required>
                          <option>L4DB</option>
                          <option>L4DBIT</option>
                          <option>L5DB</option>
                          <option>L5DBIT</option>
                        </select>
                      </div>
                    </div>
                    <div class="line"></div>
                    <div class="form-group row">
                      <label class="col-sm-3 form-control-label">Fee Paid*</label>
                      <div class="col-sm-9">
                        <div class="form-group">
                          <div class="input-group">
                            <input type="number" name="fee" class="form-control" required><span class="input-group-addon">Ghc</span>
                          </div>
                          <span class="help-block-none">Field with * are required</span>
                        </div>
                      </div>
                    </div>
                    <div class="line"></div>
                    <div class="form-group row">
                      <div class="col-sm-4 offset-sm-3">
                        <button type="submit" class="btn btn-secondary">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
        </div>
    </div>
</section>
<?php include './PHP/include/footer.php'; ?>
