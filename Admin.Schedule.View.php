<?php include './PHP/include/head.php'; include './PHP/include/checkAdmin.php'; ?>
<div class="alert-list">
    <?php include 'PHP/Script/Admin.Schedule.Edit.php'; ?>
</div>
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-5">
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
                          <h3 class="h4">Add Day</h3>
                        </div>
                        <div class="card-body">
                          <form class="form-inline" method="post" action="Admin.Schedule.View.php">
                            <div class="form-group">
                              <label for="inlineFormInput" class="sr-only">Day</label>
                              <input id="inlineFormInput" type="text" name="day" placeholder="Monday" class="mr-3 form-control" required <?php if ($editDay): ?> value="<?php echo $_POST['day']; ?>" <?php endif; ?>>
                            </div>
                            <div class="form-group">
                              <input type="submit" value="Submit" name="addDay" class="btn btn-primary">
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-12">
                      <div class="card">
                        <div class="card-close">
                          <div class="dropdown">
                            <button type="button" id="closeCard" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                            <div aria-labelledby="closeCard" class="dropdown-menu has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                          </div>
                        </div>
                        <div class="card-header d-flex align-items-center">
                          <h3 class="h4">Add Room</h3>
                        </div>
                        <div class="card-body">
                          <form class="form-inline" method="post" action="Admin.Schedule.View.php">
                            <div class="form-group">
                              <label for="inlineFormInput" class="sr-only">Name</label>
                              <input id="inlineFormInput" type="text" name="room" placeholder="Room 1" class="mr-3 form-control" required <?php if ($editRoom): ?> value="<?php echo $_POST['room']; ?>" <?php endif; ?>>
                            </div>
                            <div class="form-group">
                              <input type="submit" value="Submit" name="addRoom" class="btn btn-primary">
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                </div>
                <div class="row mt-4 mb-4">
                    <div class="col-12">
                      <div class="card">
                        <div class="card-close">
                          <div class="dropdown">
                            <button type="button" id="closeCard" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                            <div aria-labelledby="closeCard" class="dropdown-menu has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                          </div>
                        </div>
                        <div class="card-header d-flex align-items-center">
                          <h3 class="h4">TimeTable View</h3>
                        </div>
                        <div class="card-body">
                          <form class="roomViewForm" method="post" action="Admin.Schedule.View.php">
                            <label class="form-control-label">Rooms</label>
                            <div class="form-group">
                                <select required name="rid" class="roomView form-control">
                                <?php
                                $roomsView = $db->prepare('SELECT * FROM rooms ORDER BY room');
                                $roomsView->execute();
                                while ($roomView = $roomsView->fetch()) { ?>
                                    <option
                                    value="<?php echo $roomView['id']; ?>"
                                    <?php if($_SESSION['rv'] == $roomView['id']){
                                            echo ' selected';
                                        } ?>
                                    >
                                    <?php echo $roomView['room']; ?> </option>
                                <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                              <input type="submit" value="Submit" name="changeRoom" class="btn btn-primary">
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
            <!-- room and day insertion  end-->
            <div class="col">
                <div class="row">
                    <div class="col-lg-12">
                      <div class="card">
                        <div class="card-close">
                          <div class="dropdown">
                            <button type="button" id="closeCard" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                            <div aria-labelledby="closeCard" class="dropdown-menu has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                          </div>
                        </div>
                        <div class="card-header d-flex align-items-center">
                          <h3 class="h4">Add Activity</h3>
                        </div>
                        <div class="card-body">
                          <form class="form-horizontal" method="post" action="Admin.Schedule.View.php">
                              <div class="form-group row">
                                <label class="col-sm-3 form-control-label">Module</label>
                                <div class="col-sm-9">
                                    <select required name="m" class="form-control">
                                    <?php
                                    $modulesSel = $db->prepare('SELECT abbr FROM modules ORDER BY abbr');
                                    $modulesSel->execute();
                                    while ($moduleSel = $modulesSel->fetch()) { ?>
                                        <option value="<?php echo $moduleSel['abbr']; ?>"><?php echo $moduleSel['abbr']; ?></option>
                                    <?php } ?>
                                    </select>
                                </div>
                              </div>
                            <div class="form-group row">
                              <label class="col-sm-3 form-control-label">Room</label>
                              <div class="col-sm-9">
                                  <select required name="rid" class="form-control">
                                  <?php
                                  $roomsSel = $db->prepare('SELECT * FROM rooms ORDER BY room');
                                  $roomsSel->execute();
                                  while ($roomSel = $roomsSel->fetch()) { ?>
                                      <option
                                      value="<?php echo $roomSel['id']; ?>"
                                      <?php if($_SESSION['rv'] == $roomSel['id']){
                                              echo ' selected';
                                          } ?>
                                      >
                                      <?php echo $roomSel['room']; ?></option>
                                  <?php } ?>
                                  </select>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-sm-3 form-control-label">Day</label>
                              <div class="col-sm-9">
                                  <select required name="d" class="form-control">
                                  <?php
                                  $daysSel = $db->prepare('SELECT day FROM days');
                                  $daysSel->execute();
                                  while ($daySel = $daysSel->fetch()) { ?>
                                      <option value="<?php echo $daySel['day']; ?>"><?php echo $daySel['day']; ?></option>
                                  <?php } ?>
                                  </select>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-sm-3 form-control-label">Course</label>
                              <div class="col-sm-9">
                                  <select required name="c" class="form-control">
                                  <?php
                                  $coursesSel = $db->prepare('SELECT abbr, id FROM courses ORDER BY abbr');
                                  $coursesSel->execute();
                                  while ($courseSel = $coursesSel->fetch()) { ?>
                                      <option value="<?php echo $courseSel['abbr']; ?>"><?php echo $courseSel['abbr']; ?></option>
                                  <?php } ?>
                                  </select>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-sm-3 form-control-label">Teacher</label>
                              <div class="col-sm-9">
                                  <select required name="uid" class="form-control">
                                  <?php
                                  $teachersSel = $db->prepare('SELECT fullname, id FROM users WHERE usertype = 2 ORDER BY fullname');
                                  $teachersSel->execute();
                                  while ($teacherSel = $teachersSel->fetch()) { ?>
                                      <option value="<?php echo $teacherSel['id']; ?>"><?php echo $teacherSel['fullname']; ?></option>
                                  <?php } ?>
                                  </select>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-sm-3 form-control-label">Start Time</label>
                              <div class="col-sm-9">
                                  <div class="input-group bootstrap-timepicker">
                                      <input type="text" class="form-control tp" id="st" name="st" placeholder="12:05" required>
                                      <span class="input-group-btn"><button type="button" class="btn btn-primary"><span class="fa fa-clock-o"></span></button></span>
                                  </div>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-sm-3 form-control-label">End Time</label>
                              <div class="col-sm-9">
                                  <div class="input-group bootstrap-timepicker">
                                      <input type="text" class="form-control tp" id="et" name="et" placeholder="12:05" required>
                                      <span class="input-group-btn"><button type="button" class="btn btn-primary"><span class="fa fa-clock-o"></span></button></span>
                                  </div>
                              </div>
                            </div>
                            <div class="form-group row">
                              <div class="col-sm-9 offset-sm-3">
                                <input type="submit" value="Add" name="addEvent" class="btn-block btn btn-primary">
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="pt-0">
    <div class="container-fluid">
        <!-- show time table -->
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
                      <h3 class="h4">Time Table</h3>
                    </div>
                    <div class="card-body">
                        <div class="timetable"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include './PHP/include/footer.php'; ?>
