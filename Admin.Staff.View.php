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
              <h3 class="h4">Staff List</h3>
            </div>
            <div class="card-body">
              <table class="table table-striped table-hover text-capitalize">
                <thead>
                  <tr>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Gender</th>
                    <th>Type</th>
                    <th>Modules</th>
                    <th>Salary</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Diomande dro freddy junior</td>
                    <td>Frediustc@gmail.com</td>
                    <td>0556161301</td>
                    <td>Male</td>
                    <td>Teacher</td>
                    <td>PBO,ISO,ISA,DW,DDW</td>
                    <td>500 Ghc</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>
</div>
</section>
<?php include './PHP/include/footer.php'; ?>
