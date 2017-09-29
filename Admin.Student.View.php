<?php
$PH = 'View Students';
$PT = 'Administrator Students';
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
              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Pass</th>
                    <th>Gender</th>
                    <th>Course</th>
                    <th>Balance</th>
                  </tr>
                </thead>
                <tbody>

                    <?php
                    //loop trough all the students
                    $users = $db->prepare('SELECT * FROM users WHERE usertype = 1 ORDER BY fullname');
                    $users->execute();

                    while ($user = $users->fetch()) { ?>

                    <tr>
                      <th scope="row"><?php echo $user['id']; ?></th>
                      <td><?php echo $user['fullname']; ?></td>
                      <td><?php echo $user['email']; ?></td>
                      <td><?php echo $user['phone']; ?></td>
                      <td><?php echo $user['initpass']; ?></td>
                      <td><?php echo $user['gender']; ?></td>

                      <?php
                        //get the course of the current student
                        $courses = $db->prepare('
                        SELECT courses.abbr, courses.id
                        FROM studentincourse
                        INNER JOIN users ON users.id = studentincourse.uid
                        INNER JOIN courses ON courses.id = studentincourse.cid
                        WHERE studentincourse.uid = ?
                        ORDER BY since DESC LIMIT 1
                        ');
                        $courses->execute(array($user['id']));
                        $course = $courses->fetch();
                        ?>

                      <td><?php echo $course['abbr']; ?></td>

                      <?php
                          //get the balance of the current student
                          $fees = $db->prepare('
                          SELECT (
                              (SELECT price FROM courses where abbr = ?) -
                              (SELECT SUM(paid) FROM payment WHERE uid = ? AND cid = ?)
                              ) AS balance
                          ');
                          $fees->execute(array($course['abbr'], $user['id'], $course['id']));
                          $fee = $fees->fetch();
                          ?>

                      <td><?php echo $fee['balance']; ?>Ghc</td>
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
