   
        google.charts.load('current', {packages: ['corechart', 'bar']});
        google.charts.setOnLoadCallback(drawBasic);

      // Callback that creates and populates a data table, 
      // instantiates the pie chart, passes in the data and
      // draws it.      

    function drawBasic() {

    
      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Time of Day');
      data.addColumn('number', 'PH');
      
            
            var size = hrArray.length;
            
            for (var i=0; i<size; i++){
            
            var hour = parseInt(hrArray[i]);
            var minute = parseInt(minArray[i]);
            var ph = parseFloat(phArray[i]);
            console.log(ph);
            console.log(phArray[i]);

             data.addRows([
                 [hour+':00', ph]
             ]);
             
         }
         
        var formatter = new google.visualization.NumberFormat({
            fractionDigits: 2
});
        formatter.format(data, 1);

      var options = {
        vAxis: {
            viewWindow: {
                min: 6,
                max: 8
            },
            ticks: [6, 6.5,7,7.5,8] // display labels every 25
        },
        legend: {position: 'none'}
      };
      // Instantiate and draw our chart, passing in some options.
      var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    }
