<?php include './PHP/include/head.php'; ?>
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
                          <form class="form-inline">
                            <div class="form-group">
                              <label for="inlineFormInput" class="sr-only">Name</label>
                              <input id="inlineFormInput" type="text" placeholder="Jane Doe" class="mr-3 form-control">
                            </div>
                            <div class="form-group">
                              <input type="submit" value="Submit" class="btn btn-primary">
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
                          <form class="form-inline">
                            <div class="form-group">
                              <label for="inlineFormInput" class="sr-only">Name</label>
                              <input id="inlineFormInput" type="text" placeholder="Jane Doe" class="mr-3 form-control">
                            </div>
                            <div class="form-group">
                              <input type="submit" value="Submit" class="btn btn-primary">
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
                          <h3 class="h4">TimeTable View</h3>
                        </div>
                        <div class="card-body">
                          <form class="">
                            <label class="form-control-label">Rooms</label>
                            <div class="">
                                <select name="account" class="form-control">
                                  <option>option 1</option>
                                  <option>option 2</option>
                                  <option>option 3</option>
                                  <option>option 4</option>
                                </select>
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
                          <form class="form-horizontal">
                            <div class="form-group row">
                              <label class="col-sm-3 form-control-label">Room</label>
                              <div class="col-sm-9">
                                  <select name="account" class="form-control">
                                    <option>option 1</option>
                                    <option>option 2</option>
                                    <option>option 3</option>
                                    <option>option 4</option>
                                  </select>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-sm-3 form-control-label">Day</label>
                              <div class="col-sm-9">
                                  <select name="account" class="form-control">
                                    <option>option 1</option>
                                    <option>option 2</option>
                                    <option>option 3</option>
                                    <option>option 4</option>
                                  </select>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-sm-3 form-control-label">Lvl</label>
                              <div class="col-sm-9">
                                  <select name="account" class="form-control">
                                    <option>option 1</option>
                                    <option>option 2</option>
                                    <option>option 3</option>
                                    <option>option 4</option>
                                  </select>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-sm-3 form-control-label">Teacher</label>
                              <div class="col-sm-9">
                                  <select name="account" class="form-control">
                                    <option>option 1</option>
                                    <option>option 2</option>
                                    <option>option 3</option>
                                    <option>option 4</option>
                                  </select>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-sm-3 form-control-label">Start Time</label>
                              <div class="col-sm-9">
                                  <div class="input-group bootstrap-timepicker">
                                      <input type="text" class="form-control tp" id="st">
                                      <span class="input-group-btn"><button type="button" class="btn btn-primary"><span class="fa fa-clock-o"></span></button></span>
                                  </div>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-sm-3 form-control-label">End Time</label>
                              <div class="col-sm-9">
                                  <div class="input-group bootstrap-timepicker">
                                      <input type="text" class="form-control tp" id="et">
                                      <span class="input-group-btn"><button type="button" class="btn btn-primary"><span class="fa fa-clock-o"></span></button></span>
                                  </div>
                              </div>
                            </div>
                            <div class="form-group row">
                              <div class="col-sm-9 offset-sm-3">
                                <input type="submit" value="Signin" class="btn-block btn btn-primary">
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
