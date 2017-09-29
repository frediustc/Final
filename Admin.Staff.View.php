<?php
$PH = 'View Staff';
$PT = 'Administrator Staff';
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
              <h3 class="h4">Students List</h3>
            </div>
            <div class="card-body">
              <table class="table table-striped table-hover text-capitalize">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Pass</th>
                    <th>Gender</th>
                    <th>Module</th>
                    <th>Balance</th>
                  </tr>
                </thead>
                <tbody>

                    <?php
                    //loop trough all the students
                    $users = $db->prepare('SELECT * FROM users WHERE usertype = 2 ORDER BY fullname');
                    $users->execute();

                    while ($user = $users->fetch()) { ?>

                    <tr>
                      <th scope="row"><?php echo $user['id']; ?></th>
                      <td><?php echo $user['fullname']; ?></td>
                      <td><?php echo $user['email']; ?></td>
                      <td><?php echo $user['phone']; ?></td>
                      <td><?php echo $user['initpass']; ?></td>
                      <td><?php echo $user['gender']; ?></td>
                      <td>
                      <?php
                        //display modules
                          $modules = $db->prepare('
                          select modules.abbr from teachermodules
                          inner join users on users.id = teachermodules.uid
                          inner join modules on modules.id = teachermodules.mid
                          where uid = ?
                          ');
                          $modules->execute(array($user['id']));
                          while ($module = $modules->fetch()) {
                              echo $module['abbr'] . ', ';
                          }
                          ?>
                      </td>
                      <td><?php echo $user['salary']; ?>Ghc</td>
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
