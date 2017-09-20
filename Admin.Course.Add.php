<?php include './PHP/include/head.php'; ?>
<div class="alert-list">
    <?php include 'PHP/Script/Admin.Course.Insert.php'; ?>
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
                  <h3 class="h4">Add New Course</h3>
                </div>
                <div class="card-body">
                  <form method="post" action="Admin.Course.Add.php">
                    <div class="form-group">
                      <label for="inlineFormInput">Course Abbr</label>
                      <input id="inlineFormInput" type="text" name="abbr" placeholder="Ex: L4DB" <?php if ($hasVal): ?> value="<?php echo $_POST['abbr']; ?>" <?php endif; ?>class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label for="inlineFormInput">Course Name</label>
                      <input id="inlineFormInput" type="text" name="name" placeholder="Ex: Level 4 Diploma Business" <?php if ($hasVal): ?> value="<?php echo $_POST['name']; ?>" <?php endif; ?>class="form-control" required>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 form-control-label">Modules</small></label>
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
                    <div class="form-group">
                        <input type="submit" value="Add" name="addCourse" class="btn btn-primary btn-block">
                    </div>

                  </form>
                </div>
              </div>
            </div>
        </div>
    </div>
</section>
<?php include './PHP/include/footer.php'; ?>
