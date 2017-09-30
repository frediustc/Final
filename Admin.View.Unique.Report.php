<?php
if(!isset($_GET['id'])){
    header('location: Admin.Reports.View.php');
}
if(empty($_GET['id']) || (int)$_GET['id'] <= 0){
    header('location: Admin.Reports.View.php');
}

include './PHP/include/head.php';

$view = $db->prepare('UPDATE reports SET view = "1" WHERE id = ?');
$view->execute(array($_GET['id']));
?>
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
              <h3 class="h4">Report Informations</h3>
            </div>
            <div class="card-body">
              <table class="table table-striped table-hover text-capitalize">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Fullname</th>
                    <th>Mark</th>
                    <th>date</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                    //display modules
                    $reports = $db->prepare('
                    SELECT users.fullname, users.id AS uid, results.result, results.createdat
                    FROM results
                    INNER JOIN users ON users.id = results.uid
                    INNER JOIN reports ON reports.id = results.rid
                    WHERE reports.id = ? ORDER BY users.fullname');
                    $reports->execute(array($_GET['id']));
                    $i = 0;
                    while ($report = $reports->fetch()) {
                        $i++;
                        $cids = $db->prepare('SELECT cid FROM studentincourse WHERE uid = ? ORDER BY since DESC LIMIT 1');
                        $cids->execute(array($report['uid']));
                        $cid = $cids->fetch();
                        ?>
                        <tr>
                            <th scope="row"><?php echo $i; ?></th>
                            <td><a href="Admin_staff.Student.Results.View.php?uid=<?php echo $report['uid']; ?>&cid=<?php echo $cid['cid']; ?>"><?php echo $report['fullname']; ?></a></td>
                            <td><?php echo $report['result']; ?> / 100</td>
                            <td><?php echo $report['createdat']; ?></td>
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
