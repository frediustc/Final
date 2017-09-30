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
                    <th>Student</th>
                    <th>Course</th>
                    <th>Payment</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                    //display modules
                    $payments = $db->prepare('SELECT users.fullname, users.id AS uid, courses.abbr, payment.id, payment.paid FROM payment INNER JOIN users ON users.id = payment.uid INNER JOIN courses ON courses.id = payment.cid ORDER BY payment.id DESC');
                    $payments->execute();
                    while ($payment = $payments->fetch()) {
                        $cids = $db->prepare('SELECT cid FROM studentincourse WHERE uid = ? ORDER BY since DESC LIMIT 1');
                        $cids->execute(array($payment['uid']));
                        $cid = $cids->fetch();
                        ?>
                        <tr>
                            <th scope="row"><?php echo $payment['id']; ?></th>
                            <td><a href="Admin_staff.Student.Results.View.php?uid=<?php echo $payment['uid']; ?>&cid=<?php echo $cid['cid']; ?>"><?php echo $payment['fullname']; ?></a></td>
                            <td><?php echo $payment['abbr']; ?></td>
                            <td><?php echo $payment['paid']; ?>Ghc</td>
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
