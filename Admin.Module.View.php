<?php
$PH = 'View Modules';
$PT = 'Administrator Modules';
 include './PHP/include/head.php'; include './PHP/include/checkAdmin.php'; ?>
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
                  </tr>
                </thead>
                <tbody>
                    <?php
                    //display modules
                    $modules = $db->prepare('SELECT * FROM Modules ORDER BY abbr');
                    $modules->execute();
                    $i = 0;
                    while ($module = $modules->fetch()) { $i++; ?>
                        <tr>
                            <th scope="row"><?php echo $i; ?></th>
                            <td><?php echo $module['abbr']; ?></td>
                            <td><?php echo $module['name']; ?></td>
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
