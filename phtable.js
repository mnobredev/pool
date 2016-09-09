   
    google.charts.load('current', {packages: ['corechart', 'bar']});
    google.charts.setOnLoadCallback(drawBasic);
    
    google.load('visualization', '1.0', {'packages':['corechart']});
    google.setOnLoadCallback(drawChart);
    
    function drawBasic() {

        var data = new google.visualization.DataTable();
        var day = new google.visualization.DataTable();
        
        data.addColumn('string', 'Time of Day');
        data.addColumn('number', 'PH');

        var size = hrArray.length;
            
        for (var i=0; i<size; i++){
            var hour = parseInt(hrArray[i]);
            var ph = parseFloat(phArray[i]);     
            data.addRows([[hour+':00', ph]]);
        }
        
        function selectHandler(e) {
            
            //get by day
            day.addColumn('string', 'Time of Day');
            day.addColumn('number', 'PH');
            
            size = hrArrayphora.length;
            
            var selectedItem = chart.getSelection()[0];
                if (selectedItem) {
                    var value = selectedItem.row;
            }
            
            for (var i=0; i<size; i++){
            
                if (hrArrayphora[i]==value){
                    min = minArray[i];
                    ph = parseFloat(phArrayphora[i]);     
                    day.addRows([[19+":"+min, ph]]);
                }
               
            }
            //end get by day
            
            chart.draw(day, options);
        }
         
        var formatter = new google.visualization.NumberFormat({fractionDigits: 2});
        formatter.format(data, 1);

        var options = {
            vAxis: {
                viewWindow: {
                    min: 6,
                    max: 8
                },
                ticks: [6, 6.5,7,7.5,8]
            },
            legend: {position: 'none'}
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('phchart'));
        google.visualization.events.addListener(chart, 'select', selectHandler);
        chart.draw(data, options);
    }
