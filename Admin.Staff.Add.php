<?php
$PH = 'Add Staff';
$PT = 'Administrator Staff';
 include './PHP/include/head.php'; ?>
<div class="alert-list">
    <?php include 'PHP/Script/Admin.Staff.Insert.php'; ?>
</div>
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
                  <h3 class="h4">Add New Staff</h3>
                </div>
                <div class="card-body">
                  <form class="form-horizontal" method="post" action="Admin.Staff.Add.php">
                      <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Full Name*</label>
                        <div class="col-sm-9">
                          <input type="text" name="fn" class="form-control" <?php if ($hasVal): ?> value="<?php echo $_POST['fn']; ?>" <?php endif; ?>required>
                        </div>
                      </div>
                      <div class="line"></div>
                      <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Email*</label>
                        <div class="col-sm-9">
                          <input type="email" name="em" class="form-control" <?php if ($hasVal): ?> value="<?php echo $_POST['em']; ?>" <?php endif; ?>required>
                        </div>
                      </div>
                      <div class="line"></div>
                      <div class="form-group row">
                        <label class="col-sm-3 form-control-label" <?php if ($hasVal && isset($_POST['fn'])): ?> value="<?php echo $_POST['fn']; ?>" <?php endif; ?>>Phone</label>
                        <div class="col-sm-9">
                          <input type="number" name="ph" class="form-control">
                        </div>
                      </div>
                      <div class="line"></div>
                      <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Gender*</label>
                        <div class="col-sm-9">
                          <div class="i-checks">
                            <input id="genderMale" type="radio" checked="" value="M" name="gd" class="radio-template">
                            <label for="genderMale">Male</label>
                          </div>
                          <div class="i-checks">
                            <input id="genderFemale" type="radio" value="F" name="gd" class="radio-template">
                            <label for="genderFemale">Female</label>
                        </div>
                        </div>
                      </div>

                    <!-- <div class="line"></div>
                    <div class="form-group row">
                      <label class="col-sm-3 form-control-label">Type*</label>
                      <div class="col-sm-9 select">
                        <select name="account" class="form-control" required>
                          <option>Teacher</option>
                          <option>Security</option>
                          <option>Cachier</option>
                        </select>
                      </div>
                    </div> -->
                    <div class="line"></div>
                    <div class="form-group row">
                      <label class="col-sm-3 form-control-label">Modules Teach*</small></label>
                      <div class="col-sm-9">
                        <div class="row">
                            <?php
                            //display available modules
                            $modules = $db->prepare('SELECT id, abbr FROM Modules ORDER BY abbr');
                            $modules->execute();
                            while ($module = $modules->fetch()) { ?>
                            <div class="i-checks col-3">
                                <input id="<?php echo $module['abbr']; ?>" type="checkbox" value="<?php echo $module['id']; ?>" name="<?php echo $module['abbr']; ?>" class="checkbox-template">
                                <label for="<?php echo $module['abbr']; ?>"><?php echo $module['abbr']; ?></label>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                    <div class="line"></div>
                    <div class="form-group row">
                      <label class="col-sm-3 form-control-label">Salary*</label>
                      <div class="col-sm-9">
                        <div class="form-group">
                          <div class="input-group">
                              <input type="text" name="sal" class="form-control" <?php if ($hasVal): ?> value="<?php echo $_POST['sal']; ?>" <?php endif; ?>required><span class="input-group-addon">Ghc</span>
                          </div>
                          <span class="help-block-none">Field with * are required</span>
                        </div>
                      </div>
                    </div>
                    <div class="line"></div>
                    <div class="form-group row">
                      <div class="col-sm-4 offset-sm-3">
                        <button type="reset" class="btn btn-secondary">Cancel</button>
                        <button type="submit" class="btn btn-primary" name="addStaff">Save changes</button>
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
