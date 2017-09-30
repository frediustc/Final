<!-- chart student result -->
<script>
    var
        _months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        _colors = ['#FF7676', '#54E69D', '#8A7DF0', '#FFC36D'],
        _labels = [],
        _label = '',
        _data = [],
        _datas = [],
        _mods = [];



    <?php
    $modules = $db->prepare('
    SELECT DISTINCT modules.abbr, modules.id
    FROM coursesmodules
    INNER JOIN modules ON modules.id = coursesmodules.mid
    INNER JOIN courses ON courses.id = coursesmodules.cid
    WHERE courses.id = ?
    ');
    $modules->execute(array($_GET['id']));
    $i = 0;//for color
    while ($m = $modules->fetch()) { ?>
        _label = "<?php echo $m['abbr'] ?>";
        //get result for the module
        <?php $datas = $db->prepare('
        SELECT 	results.result, results.createdat
        FROM results
      	WHERE results.mid = ? AND results.uid = ?
        ORDER BY results.createdat
        ');
        $datas->execute(array($m['id'], $_SESSION['id']));
        $exits = false;
        while ($data = $datas->fetch()) {
            $exits = true;
            //insert result
            ?>
            _data.push(<?php echo $data['result'] ?>);
            <?php
            //get the date (month)
             ?>
            <?php $_m = explode('-', $data['createdat']); ?>
            _labels.push(_months[parseInt(<?php echo $_m[1]?>) - 1 ]);

            <?php }
            if ($exits) { ?>
                //insert modules in an array to get the click index
                _mods.push("<?php echo $m['abbr'] ?>");
                //insert the big datas array
                _datas.push({
                    labels: _labels,
                    datasets: [{
                        label: _label,
                        // lineTension: 0,
                        backgroundColor: 'transparent',
                        borderColor: _colors[<?php echo $i ?>],
                        data: _data,
                        borderWidth: 1,
                        pointBackgroundColor: _colors[<?php echo $i ?>],
                        pointBorderWidth: 2,
                        pointHoverRadius: 5,
                        pointHoverBorderWidth: 4
                    }]
                });
                _labels = [];
                _data = [];

            <?php }
            ?>

        <?php $i++; } ?>

    //function to rebuild the chart
    function createChart(id){
        var ctx = document.getElementById('myChart').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'line',
            // The data for our dataset
            data: _datas[id],
            // Configuration options go here
            options: { }
        });
    }
    createChart(0);

    $('.changecrs').click(function(){
        var _id = this.id;
        if(_mods.indexOf(_id) !== -1){
            createChart(_mods.indexOf(_id));
        }
    });
</script>
