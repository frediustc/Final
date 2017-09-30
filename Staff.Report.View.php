<?php
$PT = 'Teacher Reports';
$PH = 'View Reports';
include './PHP/include/head.php'; ?>
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
              <h3 class="h4">Reports List</h3>
            </div>
            <div class="card-body">
              <table class="table table-striped table-hover text-capitalize">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Module</th>
                    <th>Description</th>
                    <th>View</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                    //display modules
                    $reports = $db->prepare('
                    SELECT reports.id, modules.abbr, reports.description, reports.view
                    FROM reports
                    INNER JOIN modules ON modules.id = reports.mid
                    WHERE reports.uid = ? ORDER BY reports.id DESC');
                    $reports->execute(array($_SESSION['id']));
                    $i = 0;
                    while ($report = $reports->fetch()) { $i++; ?>
                        <tr>

                            <th scope="row"><?php echo $i; ?></th>
                            <td><?php echo $report['abbr']; ?></td>
                            <td><a href="Staff.View.Unique.Report.php?id=<?php echo $report['id']; ?>"> <?php echo $report['description']; ?> </a></td>
                            <td><?php echo $report['view'] == 0 ? 'Unseen' : 'Seen'; ?></td>
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
