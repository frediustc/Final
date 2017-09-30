<?php include './PHP/include/head.php'; include './PHP/include/checkAdmin.php'; ?>
<div class="alert-list">
    <?php include 'PHP/Script/Admin.NoticeBoard.Insert.php'; ?>
</div>
<section>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <!-- Form Elements -->
            <div class="col-lg-6">
              <div class="card">
                <div class="card-close">
                  <div class="dropdown">
                    <button type="button" id="closeCard" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                    <div aria-labelledby="closeCard" class="dropdown-menu has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                  </div>
                </div>
                <div class="card-header d-flex align-items-center">
                  <h3 class="h4">Add New Information</h3>
                </div>
                <div class="card-body">
                  <form method="post" action="Admin.NoticeBoard.Add.php">
                    <div class="form-group">
                      <label for="title">Title</label>
                      <input id="title" type="text" name="title" placeholder="Ex: December Discount" <?php if ($hasVal): ?> value="<?php echo $_POST['title']; ?>" <?php endif; ?>class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label for="cn">Information</label>
                      <textarea name="info" class="form-control" required rows="6"><?php if ($hasVal): ?><?php echo $_POST['info']; ?> <?php endif; ?></textarea>
                    </div>
                    <div class="form-group">
                      <label class="form-control-label">Target</label>
                        <select name="target" class="form-control" required>
                          <option value="3">Both</option>
                          <option value="2">Staff</option>
                          <option value="1">Student</option>
                        </select>
                    <div class="form-group">
                        <input type="submit" value="Add" name="addInfo" class="btn btn-primary btn-block">
                    </div>
                  </form>
                </div>
              </div>
            </div>
        </div>
    </div>
</section>
<?php include './PHP/include/footer.php'; ?>
