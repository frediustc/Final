            </div>
        </div>
    </div>

<!-- Javascript files-->
<script src="js/jquery.min.js"></script>
<script src="js/tether.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.cookie.js"> </script>
<script src="js/jquery.validate.min.js"></script>
<!-- <script src="js/Chart.min.js"></script>
<script src="js/charts-home.js"></script> -->
<script src="js/front.js"></script>
<script src="js/timetable.min.js"></script>

<script type="text/javascript">
    var timetable = new Timetable();
    var days = [];
    var color = [];
    <?php
    $daysSel = $db->prepare('SELECT * FROM days');
    $daysSel->execute();
    while ($daySel = $daysSel->fetch()) { ?>
        days.push('<?php echo $daySel['day']; ?>');
    <?php } ?>
    timetable.setScope(8, 19);
    timetable.addLocations(days);

    <?php


    //loop through the events
    $events = $db->prepare('SELECT * FROM timetable WHERE rid = ?');
    $events->execute(array($_SESSION['rv']));
    while ($event = $events->fetch()) { ?>
        timetable.addEvent(
            '<?php echo $event['c'] . ' (' .$event['module'] . ')'; ?>', //module abbr as title of the event
            '<?php echo $event['day']; ?>', //day of the classs
            new Date(0,0,0,<?php echo $event['sh']; ?>,<?php echo $event['sm']; ?>), //starting time
            new Date(0,0,0,<?php echo $event['eh']; ?>,<?php echo $event['em']; ?>) //ending time
        );
    <?php } ?>
    //display the timetable
    var renderer = new Timetable.Renderer(timetable);
    renderer.draw('.timetable');
</script>

<script src="js/bootstrap-timepicker.min.js" charset="utf-8"></script>
<script type="text/javascript">
    $('#st').timepicker({
        showMeridian: false,
        icons: {
            minuteStep: 5,
            up: 'fa fa-angle-up',
            down: 'fa fa-angle-down'
        }
    });
    $('#et').timepicker({
        showMeridian: false,
        icons: {
            minuteStep: 5,
            up: 'fa fa-angle-up',
            down: 'fa fa-angle-down'
        }
    });

    $('.tp').click(function(){
        $(this).timepicker('showWidget');
    });
</script>
<!-- Google Analytics: change UA-XXXXX-X to be your site's ID.-->
<!---->
<script>
  (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
  function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
  e=o.createElement(i);r=o.getElementsByTagName(i)[0];
  e.src='//www.google-analytics.com/analytics.js';
  r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
  ga('create','UA-XXXXX-X');ga('send','pageview');
</script>
</body>
</html>
