<?php include './PHP/include/head.php'; ?>
<section class="tables">
  <div class="container-fluid">
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
              <h3 class="h4">Module List</h3>
            </div>
            <div class="card-body">
              <table class="table table-striped table-hover text-capitalize">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Abbr</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Modules</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                    //display modules
                    $courses = $db->prepare('SELECT * FROM Courses ORDER BY abbr');
                    $courses->execute();
                    $i = 0;
                    while ($course = $courses->fetch()) { $i++; ?>
                        <tr>
                            <th scope="row"><?php echo $i; ?></th>
                            <td><?php echo $course['abbr']; ?></td>
                            <td><?php echo $course['name']; ?></td>
                            <td><?php echo $course['price']; ?>Ghc</td>
                            <td>
                                <?php
                                    $modules = $db->prepare('
                                    select modules.abbr from coursesmodules
                                    inner join courses on courses.id = coursesmodules.cid
                                    inner join modules on modules.id = coursesmodules.mid
                                    where cid = ?
                                    ');
                                    $modules->execute(array($course['id']));
                                    while ($module = $modules->fetch()) {
                                        echo $module['abbr'] . ', ';
                                    }
                                 ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>
</div>
</section>
<?php include './PHP/include/footer.php'; ?>
