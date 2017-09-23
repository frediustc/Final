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
                    <th>Title</th>
                    <th>Info</th>
                    <th>Target</th>
                    <th>Created Date</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                    //display info
                    $target = array('Students', 'Staff', 'Both');
                    $infos = $db->prepare('SELECT * FROM noticeboard ORDER BY createddate DESC');
                    $infos->execute();
                    $i = 0;
                    while ($info = $infos->fetch()) { $i++; ?>
                        <tr>
                            <th scope="row"><?php echo $i; ?></th>
                            <td><?php echo $info['title']; ?></td>
                            <td><?php echo $info['info']; ?></td>
                            <td><?php echo $target[$info['target'] - 1]; ?></td>
                            <td><?php echo $info['createddate']; ?></td>
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
