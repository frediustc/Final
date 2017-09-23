<?php include './PHP/include/head.php'; ?>
<div class="alert-list">
    <?php include 'PHP/Script/Admin.Payment.Insert.php'; ?>
</div>
<section>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <!-- Form Elements -->
            <div class="col-lg-6">
              <div class="card">
                <div class="card-close">
                  <div class="dropdown">
                    <button type="button" id="closeCard" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                    <div aria-labelledby="closeCard" class="dropdown-menu has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                  </div>
                </div>
                <div class="card-header d-flex align-items-center">
                  <h3 class="h4">Add New Information</h3>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" method="post" action="Admin.Payment.Add.php">

                      <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Teacher</label>
                        <div class="col-sm-9">
                            <select name="uid" class="form-control">
                            <?php
                            $teachersSel = $db->prepare('SELECT fullname, id FROM users WHERE usertype = 1 ORDER BY fullname');
                            $teachersSel->execute();
                            while ($teacherSel = $teachersSel->fetch()) { ?>
                                <option value="<?php echo $teacherSel['id']; ?>"><?php echo $teacherSel['fullname']; ?></option>
                            <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 form-control-label">Course</label>
                      <div class="col-sm-9">
                          <select name="cid" class="form-control">
                          <?php
                          $coursesSel = $db->prepare('SELECT abbr, id FROM courses ORDER BY abbr');
                          $coursesSel->execute();
                          while ($courseSel = $coursesSel->fetch()) { ?>
                              <option value="<?php echo $courseSel['id']; ?>"><?php echo $courseSel['abbr']; ?></option>
                          <?php } ?>
                          </select>
                      </div>
                    </div>
                      <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Money Paid</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="text" class="form-control" name="paid" placeholder="1200.5" required>
                                <span class="input-group-addon">Ghc</span>
                            </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-sm-9 offset-sm-3">
                          <input type="submit" value="Make Payment" name="pay" class="btn-block btn btn-primary">
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
