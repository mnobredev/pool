    google.charts.load('current', {packages: ['corechart', 'bar']});
    google.charts.setOnLoadCallback(drawToday);
    
    var tempstatus="day";
    var temptoday= new Date();
    var tempselectedDay = today.getDate();
    var tempselectedMonth = today.getMonth();
    var tempselectedYear = today.getFullYear();
    var month = ["Janeiro","Fevereiro","Março","Abril","Maio","Junho","Julho","Agosto","Setembro","Outubro","Novembro","Dezembro"];
    var tempoptions = {
            vAxis: {
                viewWindow: {
                min: 0,
                max: 40
            },
                title: 'Média de leitura'
            },
            legend: {position: 'none'},
            
        };
        
    var tempoptmonth = {
        vAxis: {
            viewWindow: {
                min: 0,
                max: 40
            },
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
    
    jQuery('.tempmonthlink').click(function(){

        var clickedID = $(this).attr('id'); 
        var xmlhttp = new XMLHttpRequest();
        var url = "handler/hvaloresmes.php?mesano="+clickedID+"&dev="+id;
        
        xmlhttp.onreadystatechange = function() {
            
            if (this.readyState == 4 && this.status == 200) {
            
                var myArr = JSON.parse(this.responseText);
                temphrArray = [];
                tempdayArray = [];
                tempArray = [];
                tempminArray = [];
                tempmyFunction(myArr);
            
                function tempmyFunction(arr) {
                    
                    var i;
                    for(i = 0; i < arr.length; i++) {
                        temphrArray[i]=arr[i].hour;
                        tempdayArray[i]=arr[i].day;
                        tempArray[i]=arr[i].temperature;
                        tempminArray[i]=arr[i].minute;
                    }
                }
            tempselectedMonth=parseInt(clickedID.substring(0, 2))-1;
            tempselectedYear=parseInt(clickedID.substring(3, 8));

            var chosenmonth = new google.visualization.DataTable();
            chosenmonth.addColumn('number', 'Day of the Month');
            chosenmonth.addColumn('number', 'Temperatura');
            chosenmonth.addColumn({type:'string', role:'style'});
            document.getElementById("temptitle").innerHTML = "Temperatura - Média por dia de "+month[tempselectedMonth]+" de "+tempselectedYear;
            var size = tempdayArray.length;
            for (var h=1; h<=31; h++){
                
                var counter=0;
                var media=0;
                for (var i=0; i<size; i++){
                        if (tempdayArray[i]==h){
                            var res = tempArray[i].replace(",", ".");
                            media+= parseFloat(res);
                            counter++;
                        }
                    }

                if (counter!=0){
                    if ((media/counter)<22||(media/counter)>32 )
                    chosenmonth.addRows([[h, media/counter, 'color:red']]);
                    else
                    chosenmonth.addRows([[h, media/counter, 'color:#3366cc']]); 
                }
                else{
                    chosenmonth.addRows([[h, 0, 'color:red']]);
                }
            }
            
            function selectHandler() {
            
                var selectedItem = tempchart.getSelection()[0];
                if (selectedItem) {
                    var value = selectedItem.row;
                }
                tempclicked(value); 
            }
            var tempformatter = new google.visualization.NumberFormat({fractionDigits: 2});
            tempformatter.format(chosenmonth, 1);
            var tempchart = new google.visualization.ColumnChart(document.getElementById('tempchart'));
            google.visualization.events.addListener(tempchart, 'select', selectHandler);
            tempchart.draw(chosenmonth,tempoptmonth);
            tempstatus="month";
        }
    };
    xmlhttp.open("GET", url, true);
    xmlhttp.send();
    
    })

    document.getElementById("tempback").onclick = function back(){
        var chosenday = new google.visualization.DataTable();
        if (tempstatus=="hour"){

            chosenday.addColumn('string', 'Time of Day');
            chosenday.addColumn('number', 'Temperatura');
            chosenday.addColumn({type:'string', role:'style'});
            var size = tempdayArray.length;
            document.getElementById("temptitle").innerHTML = "Temperatura - Média por hora de dia "+tempselectedDay+"/"+(parseInt(tempselectedMonth)+1)+"/"+tempselectedYear;
            for (var h=0; h<24; h++){

                var counter=0;
                var media=0;

                    for (var i=0; i<size; i++){
                        if (tempselectedDay==tempdayArray[i] && temphrArray[i]==h){
                            var res = tempArray[i].replace(",", ".");
                            media+= parseFloat(res);
                            counter++;
                        }
                    }

                if (counter!=0){
                    if ((media/counter)<22||(media/counter)>32 )
                    chosenday.addRows([[h+':00', media/counter, 'color:red']]);
                    else
                    chosenday.addRows([[h+':00', media/counter, 'color:#3366cc']]); 
                }
                else{
                    chosenday.addRows([[h+':00', 0, 'color:red']]);
                }
            }

            function selectHandler() {

                var selectedItem = tempchart.getSelection()[0];
                    if (selectedItem) {
                        var value = selectedItem.row;
                    }
                tempclicked(value); 
            }
            var tempformatter = new google.visualization.NumberFormat({fractionDigits: 2});
            tempformatter.format(chosenday, 1);
            var tempchart = new google.visualization.ColumnChart(document.getElementById('tempchart'));
            google.visualization.events.addListener(tempchart, 'select', selectHandler);
            tempchart.draw(chosenday, tempoptions);
            tempstatus="day";
        }

        else if (tempstatus=="day"){
            
            document.getElementById("tempother").style.display = "block";
            document.getElementById("tempback").style.display = "none";

            var chosenmonth = new google.visualization.DataTable();
            chosenmonth.addColumn('number', 'Day of the Month');
            chosenmonth.addColumn('number', 'Temperatura');
            chosenmonth.addColumn({type:'string', role:'style'});
            document.getElementById("temptitle").innerHTML = "Temperatura - Média por dia de "+month[tempselectedMonth]+" de "+tempselectedYear;
            var size = tempdayArray.length;
            for (var h=1; h<=31; h++){

                var counter=0;
                var media=0;
                for (var i=0; i<size; i++){
                        if (tempdayArray[i]==h){
                            var res = tempArray[i].replace(",", ".");
                            media+= parseFloat(res);
                            counter++;
                        }
                }

                if (counter!=0){
                    if ((media/counter)<22||(media/counter)>32 )
                    chosenmonth.addRows([[h, media/counter, 'color:red']]);
                    else
                    chosenmonth.addRows([[h, media/counter, 'color:#3366cc']]); 
                }
                else{
                    chosenmonth.addRows([[h, 0, 'color:red']]);
                }
            }
            
            function selectHandler() {
            
                var selectedItem = tempchart.getSelection()[0];
                if (selectedItem) {
                    var value = selectedItem.row;
                }
                tempclicked(value); 
            }
            var tempformatter = new google.visualization.NumberFormat({fractionDigits: 2});
            tempformatter.format(chosenmonth, 1);
            var tempchart = new google.visualization.ColumnChart(document.getElementById('tempchart'));
            google.visualization.events.addListener(tempchart, 'select', selectHandler);
            tempchart.draw(chosenmonth,tempoptmonth);
            tempstatus="month";
        }
    }
        
    function drawToday() {
        
        var day = new google.visualization.DataTable();
        day.addColumn('string', 'Time of Day');
        day.addColumn('number', 'Temperatura');
        day.addColumn({type:'string', role:'style'});
        document.getElementById("temptitle").innerHTML = "Temperatura - Média por hora do dia "+tempselectedDay+"/"+(parseInt(tempselectedMonth)+1)+"/"+tempselectedYear;
        var size = tempdayArray.length;
        
        for (var h=0; h<24; h++){
            var counter=0;
            var media=0;
            for (var i=0; i<size; i++){
                if (temptoday.getDate()==tempdayArray[i] && temphrArray[i]==h){
                    var res = tempArray[i].replace(",", ".");
                    media+= parseFloat(res);
                    counter++;
                }
            }
            if (counter!=0){
                if ((media/counter)<22||(media/counter)>32 )
                day.addRows([[h+':00', media/counter, 'color:red']]);
                else
                day.addRows([[h+':00', media/counter, 'color:#3366cc']]); 
            }
            else{
                day.addRows([[h+':00', 0, 'color:red']]);
            }
        }
        
        function selectHandler() {
            
            var selectedItem = tempchart.getSelection()[0];
            if (selectedItem) {
                var value = selectedItem.row;
            }
            tempclicked(value); 
        }
        var tempformatter = new google.visualization.NumberFormat({fractionDigits: 2});
        tempformatter.format(day, 1);
        var tempchart = new google.visualization.ColumnChart(document.getElementById('tempchart'));
        google.visualization.events.addListener(tempchart, 'select', selectHandler);
        tempchart.draw(day, tempoptions);
    }
    
    function tempclicked(value){
        
        if (tempstatus=="day"){
           
            var hour = new google.visualization.DataTable();
            
            //get by day
            hour.addColumn('string', 'Time of Day');
            hour.addColumn('number', 'Temperatura');
            hour.addColumn({type:'string', role:'style'});
            document.getElementById("temptitle").innerHTML = "Temperatura - Leituras do dia "+tempselectedDay+"/"+(parseInt(tempselectedMonth)+1)+"/"+tempselectedYear+" às "+value+" horas";
            
            var size = temphrArray.length;
            
            for (var i=0; i<size; i++){
            
                if (temphrArray[i]==value && tempselectedDay==tempdayArray[i]){
                    min = tempminArray[i];
                    var res = tempArray[i].replace(",", ".");
                    temp = parseFloat(res);
                    if (temp<22 || temp>32)
                    hour.addRows([[value+":"+min, temp, 'color:red']]);
                    else 
                    hour.addRows([[value+":"+min, temp, 'color:#3366cc']]); 
                }
               
            }
            
            var tempformatter = new google.visualization.NumberFormat({fractionDigits: 2});
            tempformatter.format(hour, 1);
            var tempchart = new google.visualization.ColumnChart(document.getElementById('tempchart'));
            tempchart.draw(hour, tempoptions);
            tempstatus="hour";
            }
            
        else if (tempstatus=="month"){
            document.getElementById("tempother").style.display = "none";
            document.getElementById("tempback").style.display = "block";
        var day = new google.visualization.DataTable();
        day.addColumn('string', 'Time of Day');
        day.addColumn('number', 'Temperatura');
        day.addColumn({type:'string', role:'style'});
        document.getElementById("temptitle").innerHTML = "Temperatura - Média por hora do dia "+tempselectedDay+"/"+(parseInt(tempselectedMonth)+1)+"/"+tempselectedYear;
        var size = tempdayArray.length;
        
        for (var h=0; h<24; h++){
            var counter=0;
            var media=0;
            for (var i=0; i<size; i++){
                if (value+1==tempdayArray[i] && temphrArray[i]==h){
                    var res = tempArray[i].replace(",", ".");
                    media+= parseFloat(res);
                    counter++;
                }
            }
            if (counter!=0){
                if ((media/counter)<22||(media/counter)>32 )
                day.addRows([[h+':00', media/counter, 'color:red']]);
                else
                day.addRows([[h+':00', media/counter, 'color:#3366cc']]); 
            }
            else{
                day.addRows([[h+':00', 0, 'color:red']]);
            }
        }
        
        function selectHandler() {
            
            var selectedItem = tempchart.getSelection()[0];
            if (selectedItem) {
                var value = selectedItem.row;
            }
            tempclicked(value); 
        }
        tempstatus="day";
        tempselectedDay=value+1;
        var tempformatter = new google.visualization.NumberFormat({fractionDigits: 2});
        tempformatter.format(day, 1);
        var tempchart = new google.visualization.ColumnChart(document.getElementById('tempchart'));
        google.visualization.events.addListener(tempchart, 'select', selectHandler);
        tempchart.draw(day, tempoptions);
        }           
    }

