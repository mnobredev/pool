    google.charts.load('current', {packages: ['corechart', 'bar']});
    google.charts.setOnLoadCallback(drawToday);
    
    var status="day";
    var today= new Date();
    var selectedDay = today.getDate();
    var selectedMonth = today.getMonth();
    var selectedYear = today.getFullYear();
    var month = ["Janeiro","Fevereiro","Março","Abril","Maio","Junho","Julho","Agosto","Setembro","Outubro","Novembro","Dezembro"];
    var options = {
            vAxis: {
                viewWindow: {
                    min: 0,
                    max: 2
                },
                ticks: [0.4, 0.8,1.2,1.6],
                title: 'Média de leitura'
            },
            legend: {position: 'none'},
            
        };
        
    var optmonth = {
        vAxis: {
            viewWindow: {
                min: 0,
                max: 2
            },
            ticks: [0.4, 0.8,1.2,1.6],
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
    
    jQuery('.monthlink').click(function(){

        var clickedID = $(this).attr('id'); 
        var xmlhttp = new XMLHttpRequest();
        var url = "handler/hvaloresmes.php?mesano="+clickedID;
        
        xmlhttp.onreadystatechange = function() {
            
            if (this.readyState == 4 && this.status == 200) {
            
                var myArr = JSON.parse(this.responseText);
                phArrayphora = [];
                hrArrayphora = [];
                dayArray = [];
                clArray = [];
                minArray = [];
                myFunction(myArr);
            
                function myFunction(arr) {
                    
                    var i;
                    for(i = 0; i < arr.length; i++) {
                        phArrayphora[i]=arr[i].ph_status;
                        hrArrayphora[i]=arr[i].hour;
                        dayArray[i]=arr[i].day;
                        clArray[i]=arr[i].chlorine_status;
                        minArray[i]=arr[i].minute;
                    }
                }
            selectedMonth=parseInt(clickedID.substring(0, 2))-1;
            selectedYear=parseInt(clickedID.substring(3, 8));

            var chosenmonth = new google.visualization.DataTable();
            chosenmonth.addColumn('number', 'Day of the Month');
            chosenmonth.addColumn('number', 'Cloro');
            chosenmonth.addColumn({type:'string', role:'style'});
            document.getElementById("cltitle").innerHTML = "Cloro - Média por dia de "+month[selectedMonth]+" de "+selectedYear;
            var size = dayArray.length;
            for (var h=1; h<=31; h++){
                
                var counter=0;
                var media=0;
                for (var i=0; i<size; i++){
                        if (dayArray[i]==h){
                            var res = clArray[i].replace(",", ".");
                            media+= parseFloat(res);
                            counter++;
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
            var chart = new google.visualization.ColumnChart(document.getElementById('clchart'));
            google.visualization.events.addListener(chart, 'select', selectHandler);
            chart.draw(chosenmonth,optmonth);
            status="month";
        }
    };
    xmlhttp.open("GET", url, true);
    xmlhttp.send();
    
    })

    document.getElementById("clback").onclick = function back(){
        var chosenday = new google.visualization.DataTable();
        if (status=="hour"){

            chosenday.addColumn('string', 'Time of Day');
            chosenday.addColumn('number', 'Clor');
            chosenday.addColumn({type:'string', role:'style'});
            var size = dayArray.length;
            document.getElementById("cltitle").innerHTML = "Cloro - Média por hora de dia "+selectedDay+"/"+(parseInt(selectedMonth)+1)+"/"+selectedYear;
            for (var h=0; h<24; h++){

                var counter=0;
                var media=0;

                    for (var i=0; i<size; i++){
                        if (selectedDay==dayArray[i] && clArray[i]==h){
                            var res = phArrayphora[i].replace(",", ".");
                            media+= parseFloat(res);
                            counter++;
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
            var chart = new google.visualization.ColumnChart(document.getElementById('clchart'));
            google.visualization.events.addListener(chart, 'select', selectHandler);
            chart.draw(chosenday, options);
            status="day";
        }

        else if (status=="day"){
            
            document.getElementById("clother").style.display = "block";
            document.getElementById("clback").style.display = "none";

            var chosenmonth = new google.visualization.DataTable();
            chosenmonth.addColumn('number', 'Day of the Month');
            chosenmonth.addColumn('number', 'Cloro');
            chosenmonth.addColumn({type:'string', role:'style'});
            document.getElementById("phtitle").innerHTML = "Cloro - Média por dia de "+month[selectedMonth]+" de "+selectedYear;
            var size = dayArray.length;
            for (var h=1; h<=31; h++){

                var counter=0;
                var media=0;
                for (var i=0; i<size; i++){
                        if (dayArray[i]==h){
                            var res = clArray[i].replace(",", ".");
                            media+= parseFloat(res);
                            counter++;
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
            var chart = new google.visualization.ColumnChart(document.getElementById('clchart'));
            google.visualization.events.addListener(chart, 'select', selectHandler);
            chart.draw(chosenmonth,optmonth);
            status="month";
        }
    }
        
    function drawToday() {
        
        var day = new google.visualization.DataTable();
        day.addColumn('string', 'Time of Day');
        day.addColumn('number', 'Cloro');
        day.addColumn({type:'string', role:'style'});
        document.getElementById("cltitle").innerHTML = "Cloro - Média por hora do dia "+selectedDay+"/"+(parseInt(selectedMonth)+1)+"/"+selectedYear;
        var size = dayArray.length;
        
        for (var h=0; h<24; h++){
            var counter=0;
            var media=0;
            for (var i=0; i<size; i++){
                if (today.getDate()==dayArray[i] && hrArrayphora[i]==h){
                    var res = clArray[i].replace(",", ".");
                    media+= parseFloat(res);
                    counter++;
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
        var chart = new google.visualization.ColumnChart(document.getElementById('clchart'));
        google.visualization.events.addListener(chart, 'select', selectHandler);
        chart.draw(day, options);
    }
    
    function clicked(value){
        
        if (status=="day"){
           
            var hour = new google.visualization.DataTable();
            
            //get by day
            hour.addColumn('string', 'Time of Day');
            hour.addColumn('number', 'Cloro');
            hour.addColumn({type:'string', role:'style'});
            document.getElementById("cltitle").innerHTML = "Cloro - Leituras do dia "+selectedDay+"/"+(parseInt(selectedMonth)+1)+"/"+selectedYear+" às "+value+" horas";
            
            var size = hrArrayphora.length;
            
            for (var i=0; i<size; i++){
            
                if (hrArrayphora[i]==value && selectedDay==dayArray[i]){
                    min = minArray[i];
                    var res = clArray[i].replace(",", ".");
                    ph = parseFloat(res);
                    if (ph<7 || ph>7.2)
                    hour.addRows([[value+":"+min, ph, 'color:red']]);
                    else 
                    hour.addRows([[value+":"+min, ph, 'color:#3366cc']]); 
                }
               
            }
            
            var formatter = new google.visualization.NumberFormat({fractionDigits: 2});
            formatter.format(hour, 1);
            var chart = new google.visualization.ColumnChart(document.getElementById('clchart'));
            chart.draw(hour, options);
            status="hour";
            }
            
        else if (status=="month"){
            document.getElementById("clother").style.display = "none";
            document.getElementById("clback").style.display = "block";
            console.log(value);
        var day = new google.visualization.DataTable();
        day.addColumn('string', 'Time of Day');
        day.addColumn('number', 'Cloro');
        day.addColumn({type:'string', role:'style'});
        document.getElementById("cltitle").innerHTML = "Cloro - Média por hora do dia "+selectedDay+"/"+(parseInt(selectedMonth)+1)+"/"+selectedYear;
        var size = dayArray.length;
        
        for (var h=0; h<24; h++){
            var counter=0;
            var media=0;
            for (var i=0; i<size; i++){
                if (value+1==dayArray[i] && hrArrayphora[i]==h){
                    var res = clArray[i].replace(",", ".");
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
        status="day";
        selectedDay=value+1;
        var formatter = new google.visualization.NumberFormat({fractionDigits: 2});
        formatter.format(day, 1);
        var chart = new google.visualization.ColumnChart(document.getElementById('clchart'));
        google.visualization.events.addListener(chart, 'select', selectHandler);
        chart.draw(day, options);
        }
            
    }