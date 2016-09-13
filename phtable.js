   
    google.charts.load('current', {packages: ['corechart', 'bar']});
    google.charts.setOnLoadCallback(drawBasic);
    
    google.load('visualization', '1.0', {'packages':['corechart']});
    google.setOnLoadCallback(drawChart);
    
    
    function drawBasic() {
       
        var status="day";
        var today= new Date();
        var day = new google.visualization.DataTable();
        var hour = new google.visualization.DataTable();
        var chosenday = new google.visualization.DataTable();
        var chosenmonth = new google.visualization.DataTable();
        var selectedDay = today.getDate();
        var selectedMonth = today.getMonth();
       
        document.getElementById("phback").onclick = function back(){
            
            if (status=="hour"){

                chosenday.addColumn('string', 'Time of Day');
                chosenday.addColumn('number', 'PH');
                var size = dayArray.length;
        
                for (var h=0; h<24; h++){
                    var counter=0;
                    var media=0;
                        for (var i=0; i<size; i++){
                            if (selectedDay==dayArray[i]){
                        
                                if (hrArrayphora[i]==h){
                                    var res = phArrayphora[i].replace(",", ".");
                                    media+= parseFloat(res);
                                    counter++;
                                    console.log(media+" "+h);
                                }
                            }
                    }
                    if (counter!=0){
                        chosenday.addRows([[h+':00', media/counter]]);
                    }

                    else{
                        chosenday.addRows([[h+':00', 0]]);
                    }
                }
                chart.draw(chosenday, options);
                status="day";
            }
            else if (status=="day"){
                chosenmonth.addColumn('number', 'Day of the Month');
                chosenmonth.addColumn('number', 'PH');

                var size = dayArray.length;
        
                for (var h=1; h<=31; h++){
                    var counter=0;
                    var media=0;
                        for (var i=0; i<size; i++){
                            if (selectedMonth+1==9){
                                if (dayArray[i]==h){
                                    var res = phArrayphora[i].replace(",", ".");
                                    media+= parseFloat(res);
                                    counter++;
                                    console.log(media+" "+h);
                                }
                            }
                    }
                    if (counter!=0){
                        chosenmonth.addRows([[h, media/counter]]);
                    }

                    else{
                        chosenmonth.addRows([[h, 0]]);
                    }
                }
                chart.draw(chosenmonth, options);
                status="month";
            }
        }
        
        day.addColumn('string', 'Time of Day');
        day.addColumn('number', 'PH');

        var size = dayArray.length;
        
        for (var h=0; h<24; h++){
            var counter=0;
            var media=0;
                for (var i=0; i<size; i++){
                    if (today.getDate()==dayArray[i]){
                        
                        if (hrArrayphora[i]==h){
                            var res = phArrayphora[i].replace(",", ".");
                            media+= parseFloat(res);
                            counter++;
                            console.log(media+" "+h);
                        }
                    }
            }
            if (counter!=0){
                day.addRows([[h+':00', media/counter]]);
            }
            
            else{
                day.addRows([[h+':00', 0]]);
            }
        }
        
        function selectHandler() {
            
            if (status=="day"){
            //get by day
            hour.addColumn('string', 'Time of Day');
            hour.addColumn('number', 'PH');
            
            size = hrArrayphora.length;
            
            var selectedItem = chart.getSelection()[0];
                if (selectedItem) {
                    var value = selectedItem.row;
            }
            
            for (var i=0; i<size; i++){
            
                if (hrArrayphora[i]==value && today.getDate()==dayArray[i]){
                    min = minArray[i];
                    var res = phArrayphora[i].replace(",", ".");
                    ph = parseFloat(res);     
                    hour.addRows([[value+":"+min, ph]]);
                }
               
            }
            //end get by day
            
            chart.draw(hour, options);
            status="hour";
            }
        }
         
        var formatter = new google.visualization.NumberFormat({fractionDigits: 2});
        formatter.format(day, 1);

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
        chart.draw(day, options);
    }
