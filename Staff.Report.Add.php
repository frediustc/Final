<?php
$PT = 'Teacher Reports';
$PH = 'Add Reports';
include './PHP/include/head.php'; ?>
<div class="alert-list">
    <?php include 'PHP/Script/Staff.Report.Insert.php'; ?>
</div>
<section>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <!-- STEP 1 -->
            <?php if ((!isset($step_1) && !isset($_POST['addReport-2'])) || isset($step_0)): ?>
                <div class="col-lg-6">
                  <div class="card">
                    <div class="card-close">
                      <div class="dropdown">
                        <button type="button" id="closeCard" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                        <div aria-labelledby="closeCard" class="dropdown-menu has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                      </div>
                    </div>
                    <div class="card-header d-flex align-items-center">
                      <h3 class="h4">Add a report - Step 1</h3>
                    </div>
                    <div class="card-body">
                      <form method="post" action="Staff.Report.Add.php">
                        <div class="form-group">
                          <label for="title">Description</label>
                          <input id="title" type="text" name="desc" placeholder="Ex: Result of the L5DBIT" <?php if ($hasVal): ?> value="<?php echo $_POST['desc']; ?>" <?php endif; ?>class="form-control" required>
                        </div>
                        <div class="form-group">
                          <label class="form-control-label">Course*</label>
                          <div class="select">
                            <select name="crs" class="form-control" required>
                                <?php
                                //display available courses
                                $hasModule = false;
                                $courses = $db->prepare('
                                SELECT DISTINCT courses.id, courses.abbr
                                FROM coursesmodules
                                INNER JOIN courses ON courses.id = coursesmodules.cid
                                INNER JOIN modules ON modules.id = coursesmodules.mid
                                RIGHT OUTER JOIN teachermodules ON teachermodules.mid = modules.id
                                RIGHT OUTER JOIN users ON users.id = teachermodules.uid
                                WHERE teachermodules.uid = ?
                                ORDER BY abbr
                                ');
                                $courses->execute(array($_SESSION['id']));
                                while ($course = $courses->fetch()) {
                                    $hasModule =  true;
                                    ?>
                                <option value="<?php echo $course['id']; ?>"><?php echo $course['abbr']; ?></option>
                                <?php } ?>
                            </select>
                          </div>
                        </div>

                        <div class="form-group">
                            <input type="submit" value="Add" name="addReport-1" class="btn btn-primary btn-block" <?php if (!$hasModule): ?> disabled <?php endif; ?>>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
            <?php endif; ?>
            <!-- STEP2 -->
            <?php if ((isset($step_1) || isset($_POST['addReport-2'])) && !isset($step_0)): ?>
                <div class="col-lg-6">
                  <div class="card">
                    <div class="card-close">
                      <div class="dropdown">
                        <button type="button" id="closeCard" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                        <div aria-labelledby="closeCard" class="dropdown-menu has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                      </div>
                    </div>
                    <div class="card-header d-flex align-items-center">
                      <h3 class="h4">Add a report - Step 2</h3>
                    </div>
                    <div class="card-body">
                      <form method="post" action="Staff.Report.Add.php">
                        <div class="form-group">
                          <input type="hidden" name="desc" value="<?php echo $step_1['desc']; ?>" required>
                          <input type="hidden" name="crs" value="<?php echo $step_1['crs']; ?>" required>
                        </div>
                        <div class="form-group">
                          <label class="form-control-label">Module*</label>
                          <div class="select">
                            <select name="md" class="form-control" required>
                                <?php
                                //display available courses
                                $hasModule = false;
                                $courses = $db->prepare('
                                SELECT DISTINCT modules.id, modules.abbr
                                FROM coursesmodules
                                INNER JOIN courses ON courses.id = coursesmodules.cid
                                INNER JOIN modules ON modules.id = coursesmodules.mid
                                RIGHT OUTER JOIN teachermodules ON teachermodules.mid = modules.id
                                RIGHT OUTER JOIN users ON users.id = teachermodules.uid
                                WHERE teachermodules.uid = ? AND courses.id = ?
                                ORDER BY abbr
                                ');
                                $courses->execute(array($_SESSION['id'], $step_1['crs']));
                                while ($course = $courses->fetch()) {
                                    $hasModule =  true;
                                    ?>
                                <option value="<?php echo $course['id']; ?>"><?php echo $course['abbr']; ?></option>
                                <?php } ?>
                            </select>
                          </div>
                        </div>

                        <?php
                        //display students
                        $students = $db->prepare('
                        SELECT users.fullname, users.id
                        FROM studentincourse
                        INNER JOIN users ON users.id = studentincourse.uid
                        INNER JOIN courses ON courses.id = studentincourse.cid
                        WHERE studentincourse.cid = ?
                        ORDER BY users.fullname
                        ');
                        $students->execute(array($step_1['crs']));

                        while ($std = $students->fetch()) { ?>
                            <div class="form-group">
                              <label><?php echo $std['fullname'] ?></label>
                              <input name="<?php echo $std['id'] ?>" type="number" min="0" max="100" placeholder="Ex: 75" <?php if ($hasVal): ?> value="<?php echo $_POST[$std['id']]; ?>" <?php endif; ?>class="form-control" required>
                            </div>
                        <?php } ?>

                        <div class="form-group">
                            <input type="submit" value="Add" name="addReport-2" class="btn btn-primary btn-block" <?php if (!$hasModule): ?> disabled <?php endif; ?>>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php include './PHP/include/footer.php'; ?>
