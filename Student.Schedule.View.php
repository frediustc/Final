<?php
$PH = $PT = 'Student Timetable';
include './PHP/include/head.php'; include './PHP/include/checkStd.php'; ?>
<section>
    <div class="container-fluid">
        <!-- show time table -->
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                      <h3 class="h4">Time Table</h3>
                    </div>
                    <div class="card-body">
                        <div class="timetable"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
$studentSchedule = true;
include './PHP/include/footer.php'; ?>
