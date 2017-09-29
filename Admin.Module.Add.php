<?php
$PH = 'Add Modules';
$PT = 'Administrator Modules';
 include './PHP/include/head.php'; ?>
<div class="alert-list">
    <?php include 'PHP/Script/Admin.Module.Insert.php'; ?>
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
                  <h3 class="h4">Add New Module</h3>
                </div>
                <div class="card-body">
                  <form method="post" action="Admin.Module.Add.php">
                    <div class="form-group">
                      <label for="inlineFormInput">Module Abbr</label>
                      <input id="inlineFormInput" name="abbr" type="text" placeholder="Ex: EOM" <?php if ($hasVal): ?> value="<?php echo $_POST['abbr']; ?>" <?php endif; ?>class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label for="inlineFormInput">Module Name</label>
                      <input id="inlineFormInput" name="name" type="text" placeholder="Ex: Essential Of Management" <?php if ($hasVal): ?> value="<?php echo $_POST['name']; ?>" <?php endif; ?>class="form-control" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Add" name="addModule" class="btn btn-primary btn-block">
                    </div>

                  </form>
                </div>
              </div>
            </div>
        </div>
    </div>
</section>
<?php include './PHP/include/footer.php'; ?>
