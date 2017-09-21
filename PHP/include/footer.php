            </div>
        </div>
    </div>

<!-- Javascript files-->
<script src="js/jquery.min.js"></script>
<script src="js/tether.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- <script src="js/jquery.cookie.js"> </script> -->
<!-- <script src="js/jquery.validate.min.js"></script> -->
<!-- <script src="js/Chart.min.js"></script>
<script src="js/charts-home.js"></script> -->
<!-- <script src="js/front.js"></script> -->
<script src="js/timetable.min.js"></script>

<script type="text/javascript">
    var timetable = new Timetable();
    timetable.setScope(8, 19);
    timetable.addLocations(['Silent Disco', 'Nile', 'Len Room', 'Maas Room']);
    timetable.addEvent('Frankadelic', 'Nile', new Date(2015,7,17,10,45), new Date(2015,7,17,12,30));
    var options = {
      url: '#',
      class: 'vip',
      data: {
        id: 4,
        ticketType: 'VIP'
      }
    }
    timetable.addEvent('Jam Session', 'Nile', new Date(2015,7,17,16,00), new Date(2015,7,17,17,00), options);
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
