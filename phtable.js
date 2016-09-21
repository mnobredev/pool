   
    google.charts.load('current', {packages: ['corechart', 'bar']});
    google.charts.setOnLoadCallback(drawToday);
    
    var status="day";
    var today= new Date();
    var selectedDay = today.getDate();
    var selectedMonth = today.getMonth();
    var selectedYear = today.getFullYear();
    var options = {
            vAxis: {
                viewWindow: {
                    min: 6,
                    max: 8
                },
                ticks: [6, 6.5,7,7.5,8],
                title: 'Média de leitura'
            },
            legend: {position: 'none'},
            
        };
        
    var optmonth = {
            vAxis: {
                viewWindow: {
                    min: 6,
                    max: 8
                },
                ticks: [6, 6.5,7,7.5,8],
                title: 'Média de leitura'
            },
            hAxis:{
                
                viewWindow: {         
                    min: 1,
                    max: 31
                },
                    ticks: [1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31],
                    title: 'Dia do mês',
                    gridlines: { color: 'white' }
            },
            legend: {position: 'none'},
            
        };
    
    var month = new Array();
    month[0] = "Janeiro";
    month[1] = "Fevereiro";
    month[2] = "Março";
    month[3] = "Abril";
    month[4] = "Maio";
    month[5] = "Junho";
    month[6] = "Julho";
    month[7] = "Agosto";
    month[8] = "Setembro";
    month[9] = "Outubro";
    month[10] = "Novembro";
    month[11] = "Dezembro";
    
    document.getElementsByClassName(".dropdown-menu li a").onclick = function month(){
        alert("Button clicked, id "+this.id+", text"+this.innerHTML);
    }

    document.getElementById("phback").onclick = function back(){
        
        var chosenday = new google.visualization.DataTable();
        if (status=="hour"){

            chosenday.addColumn('string', 'Time of Day');
            chosenday.addColumn('number', 'PH');
            chosenday.addColumn({type:'string', role:'style'});
            var size = dayArray.length;
            document.getElementById("phtitle").innerHTML = "PH - Média por hora de dia "+selectedDay+"/"+(parseInt(selectedMonth)+1)+"/"+selectedYear;
            for (var h=0; h<24; h++){

                var counter=0;
                var media=0;

                    for (var i=0; i<size; i++){
                        if (selectedDay==dayArray[i] && hrArrayphora[i]==h){
                            var res = phArrayphora[i].replace(",", ".");
                            media+= parseFloat(res);
                            counter++;
                            console.log(media+" "+h);
                        }
                    }

                if (counter!=0){
                    if ((media/counter)<7||(media/counter)>7.2 )
                    chosenday.addRows([[h+':00', media/counter, 'color:red']]);
                    else
                    chosenday.addRows([[h+':00', media/counter, 'color:#3366cc']]); 
                }
                else{
                    chosenday.addRows([[h+':00', 0, 'color:red']]);
                }
            }

            function selectHandler() {

                var selectedItem = chart.getSelection()[0];
                    if (selectedItem) {
                        var value = selectedItem.row;
                    }
                clicked(value); 
            }
            var formatter = new google.visualization.NumberFormat({fractionDigits: 2});
            formatter.format(chosenday, 1);
            var chart = new google.visualization.ColumnChart(document.getElementById('phchart'));
            google.visualization.events.addListener(chart, 'select', selectHandler);
            chart.draw(chosenday, options);
            status="day";
        }

        else if (status=="day"){
            
            document.getElementById("phother").style.visibility = "visible";
            document.getElementById("phback").style.visibility = "hidden";

            var chosenmonth = new google.visualization.DataTable();
            chosenmonth.addColumn('number', 'Day of the Month');
            chosenmonth.addColumn('number', 'PH');
            chosenmonth.addColumn({type:'string', role:'style'});
            document.getElementById("phtitle").innerHTML = "PH - Média por dia de "+month[selectedMonth]+" de "+selectedYear;
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
                        }
                    }
                }

                if (counter!=0){
                    if ((media/counter)<7||(media/counter)>7.2 )
                    chosenmonth.addRows([[h, media/counter, 'color:red']]);
                    else
                    chosenmonth.addRows([[h, media/counter, 'color:#3366cc']]); 
                }
                else{
                    chosenmonth.addRows([[h, 0, 'color:red']]);
                }
            }
            
            function selectHandler() {
            
                var selectedItem = chart.getSelection()[0];
                if (selectedItem) {
                    var value = selectedItem.row;
                }
                clicked(value); 
            }
            var formatter = new google.visualization.NumberFormat({fractionDigits: 2});
            formatter.format(chosenmonth, 1);
            var chart = new google.visualization.ColumnChart(document.getElementById('phchart'));
            google.visualization.events.addListener(chart, 'select', selectHandler);
            chart.draw(chosenmonth,optmonth);
            status="month";
        }
    }
        
    function drawToday() {
        
        var day = new google.visualization.DataTable();
        day.addColumn('string', 'Time of Day');
        day.addColumn('number', 'PH');
        day.addColumn({type:'string', role:'style'});
        document.getElementById("phtitle").innerHTML = "PH - Média por hora do dia "+selectedDay+"/"+(parseInt(selectedMonth)+1)+"/"+selectedYear;
        var size = dayArray.length;
        
        for (var h=0; h<24; h++){
            var counter=0;
            var media=0;
            for (var i=0; i<size; i++){
                if (today.getDate()==dayArray[i] && hrArrayphora[i]==h){
                    var res = phArrayphora[i].replace(",", ".");
                    media+= parseFloat(res);
                    counter++;
                    console.log(media+" "+h);
                }
            }
            if (counter!=0){
                if ((media/counter)<7||(media/counter)>7.2 )
                day.addRows([[h+':00', media/counter, 'color:red']]);
                else
                day.addRows([[h+':00', media/counter, 'color:#3366cc']]); 
            }
            else{
                day.addRows([[h+':00', 0, 'color:red']]);
            }
        }
        
        function selectHandler() {
            
            var selectedItem = chart.getSelection()[0];
            if (selectedItem) {
                var value = selectedItem.row;
            }
            clicked(value); 
        }
        var formatter = new google.visualization.NumberFormat({fractionDigits: 2});
        formatter.format(day, 1);
        var chart = new google.visualization.ColumnChart(document.getElementById('phchart'));
        google.visualization.events.addListener(chart, 'select', selectHandler);
        chart.draw(day, options);
    }
    
    function clicked(value){
        
        if (status=="day"){
           
            var hour = new google.visualization.DataTable();
            
            //get by day
            hour.addColumn('string', 'Time of Day');
            hour.addColumn('number', 'PH');
            hour.addColumn({type:'string', role:'style'});
            document.getElementById("phtitle").innerHTML = "PH - Leituras do dia "+selectedDay+"/"+(parseInt(selectedMonth)+1)+"/"+selectedYear+" às "+value+" horas";
            
            var size = hrArrayphora.length;
            
            for (var i=0; i<size; i++){
            
                if (hrArrayphora[i]==value && selectedDay==dayArray[i]){
                    min = minArray[i];
                    var res = phArrayphora[i].replace(",", ".");
                    ph = parseFloat(res);
                    if (ph<7 || ph>7.2)
                    hour.addRows([[value+":"+min, ph, 'color:red']]);
                    else 
                    hour.addRows([[value+":"+min, ph, 'color:#3366cc']]); 
                }
               
            }
            
            var formatter = new google.visualization.NumberFormat({fractionDigits: 2});
            formatter.format(hour, 1);
            var chart = new google.visualization.ColumnChart(document.getElementById('phchart'));
            chart.draw(hour, options);
            status="hour";
            }
            
        else if (status=="month"){
            document.getElementById("phother").style.visibility = "hidden";
            document.getElementById("phback").style.visibility = "visible";
            console.log(value);
        var day = new google.visualization.DataTable();
        day.addColumn('string', 'Time of Day');
        day.addColumn('number', 'PH');
        document.getElementById("phtitle").innerHTML = "PH - Média por hora do dia "+selectedDay+"/"+(parseInt(selectedMonth)+1)+"/"+selectedYear;
        var size = dayArray.length;
        
        for (var h=0; h<24; h++){
            var counter=0;
            var media=0;
            for (var i=0; i<size; i++){
                if (value+1==dayArray[i] && hrArrayphora[i]==h){
                    var res = phArrayphora[i].replace(",", ".");
                    media+= parseFloat(res);
                    counter++;
                    console.log(media+" "+h);
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
            
            var selectedItem = chart.getSelection()[0];
            if (selectedItem) {
                var value = selectedItem.row;
            }
            clicked(value); 
        }
        status="day";
        selectedDay=value+1;
        var formatter = new google.visualization.NumberFormat({fractionDigits: 2});
        formatter.format(day, 1);
        var chart = new google.visualization.ColumnChart(document.getElementById('phchart'));
        google.visualization.events.addListener(chart, 'select', selectHandler);
        chart.draw(day, options);
        }
            
    }