    google.charts.load('current', {packages: ['corechart', 'bar']});
    google.charts.setOnLoadCallback(drawToday);
    
    var clstatus="day";
    var cltoday= new Date();
    var clselectedDay = today.getDate();
    var clselectedMonth = today.getMonth();
    var clselectedYear = today.getFullYear();
    var month = ["Janeiro","Fevereiro","Março","Abril","Maio","Junho","Julho","Agosto","Setembro","Outubro","Novembro","Dezembro"];
    var cloptions = {
            vAxis: {
                viewWindow: {
                    min: 0,
                    max: 2
                },
                ticks: [0.4, 0.8, 1.2, 1.6, 2],
                title: 'Média de leitura'
            },
            legend: {position: 'none'},
            
        };
        
    var cloptmonth = {
        vAxis: {
            viewWindow: {
                min: 0,
                max: 2
            },
            ticks: [0.4, 0.8, 1.2, 1.6, 2],
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
    
    jQuery('.clmonthlink').click(function(){

        var clickedID = $(this).attr('id'); 
        var xmlhttp = new XMLHttpRequest();
        var url = "handler/hvaloresmes.php?mesano="+clickedID+"&dev="+id;
        
        xmlhttp.onreadystatechange = function() {
            
            if (this.readyState == 4 && this.status == 200) {
            
                var myArr = JSON.parse(this.responseText);
                clhrArray = [];
                cldayArray = [];
                clArray = [];
                clminArray = [];
                clmyFunction(myArr);
            
                function clmyFunction(arr) {
                    
                    var i;
                    for(i = 0; i < arr.length; i++) {
                        clhrArray[i]=arr[i].hour;
                        cldayArray[i]=arr[i].day;
                        clArray[i]=arr[i].chlorine_status;
                        clminArray[i]=arr[i].minute;
                    }
                }
            clselectedMonth=parseInt(clickedID.substring(0, 2))-1;
            clselectedYear=parseInt(clickedID.substring(3, 8));

            var chosenmonth = new google.visualization.DataTable();
            chosenmonth.addColumn('number', 'Day of the Month');
            chosenmonth.addColumn('number', 'Cloro');
            chosenmonth.addColumn({type:'string', role:'style'});
            document.getElementById("cltitle").innerHTML = "Cloro - Média por dia de "+month[clselectedMonth]+" de "+clselectedYear;
            var size = cldayArray.length;
            for (var h=1; h<=31; h++){
                
                var counter=0;
                var media=0;
                for (var i=0; i<size; i++){
                        if (cldayArray[i]==h){
                            var res = clArray[i].replace(",", ".");
                            media+= parseFloat(res);
                            counter++;
                        }
                    }

                if (counter!=0){
                    if ((media/counter)<0.5||(media/counter)>1 )
                    chosenmonth.addRows([[h, media/counter, 'color:red']]);
                    else
                    chosenmonth.addRows([[h, media/counter, 'color:#3366cc']]); 
                }
                else{
                    chosenmonth.addRows([[h, 0, 'color:red']]);
                }
            }
            
            function selectHandler() {
            
                var selectedItem = clchart.getSelection()[0];
                if (selectedItem) {
                    var value = selectedItem.row;
                }
                clclicked(value); 
            }
            var clformatter = new google.visualization.NumberFormat({fractionDigits: 2});
            clformatter.format(chosenmonth, 1);
            var clchart = new google.visualization.ColumnChart(document.getElementById('clchart'));
            google.visualization.events.addListener(clchart, 'select', selectHandler);
            clchart.draw(chosenmonth,cloptmonth);
            clstatus="month";
        }
    };
    xmlhttp.open("GET", url, true);
    xmlhttp.send();
    
    })

    document.getElementById("clback").onclick = function back(){
        var chosenday = new google.visualization.DataTable();
        if (clstatus=="hour"){

            chosenday.addColumn('string', 'Time of Day');
            chosenday.addColumn('number', 'Cloro');
            chosenday.addColumn({type:'string', role:'style'});
            var size = cldayArray.length;
            document.getElementById("cltitle").innerHTML = "Cloro - Média por hora de dia "+clselectedDay+"/"+(parseInt(clselectedMonth)+1)+"/"+clselectedYear;
            for (var h=0; h<24; h++){

                var counter=0;
                var media=0;

                    for (var i=0; i<size; i++){
                        if (clselectedDay==cldayArray[i] && clhrArray[i]==h){
                            var res = clArray[i].replace(",", ".");
                            media+= parseFloat(res);
                            counter++;
                        }
                    }

                if (counter!=0){
                    if ((media/counter)<0.5||(media/counter)>1 )
                    chosenday.addRows([[h+':00', media/counter, 'color:red']]);
                    else
                    chosenday.addRows([[h+':00', media/counter, 'color:#3366cc']]); 
                }
                else{
                    chosenday.addRows([[h+':00', 0, 'color:red']]);
                }
            }

            function selectHandler() {

                var selectedItem = clchart.getSelection()[0];
                    if (selectedItem) {
                        var value = selectedItem.row;
                    }
                clclicked(value); 
            }
            var clformatter = new google.visualization.NumberFormat({fractionDigits: 2});
            clformatter.format(chosenday, 1);
            var clchart = new google.visualization.ColumnChart(document.getElementById('clchart'));
            google.visualization.events.addListener(clchart, 'select', selectHandler);
            clchart.draw(chosenday, cloptions);
            clstatus="day";
        }

        else if (clstatus=="day"){
            
            document.getElementById("clother").style.display = "block";
            document.getElementById("clback").style.display = "none";

            var chosenmonth = new google.visualization.DataTable();
            chosenmonth.addColumn('number', 'Day of the Month');
            chosenmonth.addColumn('number', 'PH');
            chosenmonth.addColumn({type:'string', role:'style'});
            document.getElementById("cltitle").innerHTML = "Cloro - Média por dia de "+month[clselectedMonth]+" de "+clselectedYear;
            var size = cldayArray.length;
            for (var h=1; h<=31; h++){

                var counter=0;
                var media=0;
                for (var i=0; i<size; i++){
                        if (cldayArray[i]==h){
                            var res = clArray[i].replace(",", ".");
                            media+= parseFloat(res);
                            counter++;
                        }
                }

                if (counter!=0){
                    if ((media/counter)<0.5||(media/counter)>1 )
                    chosenmonth.addRows([[h, media/counter, 'color:red']]);
                    else
                    chosenmonth.addRows([[h, media/counter, 'color:#3366cc']]); 
                }
                else{
                    chosenmonth.addRows([[h, 0, 'color:red']]);
                }
            }
            
            function selectHandler() {
            
                var selectedItem = clchart.getSelection()[0];
                if (selectedItem) {
                    var value = selectedItem.row;
                }
                clclicked(value); 
            }
            var clformatter = new google.visualization.NumberFormat({fractionDigits: 2});
            clformatter.format(chosenmonth, 1);
            var clchart = new google.visualization.ColumnChart(document.getElementById('clchart'));
            google.visualization.events.addListener(clchart, 'select', selectHandler);
            clchart.draw(chosenmonth,cloptmonth);
            clstatus="month";
        }
    }
        
    function drawToday() {
        
        var day = new google.visualization.DataTable();
        day.addColumn('string', 'Time of Day');
        day.addColumn('number', 'Cloro');
        day.addColumn({type:'string', role:'style'});
        document.getElementById("cltitle").innerHTML = "Cloro - Média por hora do dia "+clselectedDay+"/"+(parseInt(clselectedMonth)+1)+"/"+clselectedYear;
        var size = cldayArray.length;
        
        for (var h=0; h<24; h++){
            var counter=0;
            var media=0;
            for (var i=0; i<size; i++){
                if (cltoday.getDate()==cldayArray[i] && clhrArray[i]==h){
                    var res = clArray[i].replace(",", ".");
                    media+= parseFloat(res);
                    counter++;
                }
            }
            if (counter!=0){
                if ((media/counter)<0.5||(media/counter)>1 )
                day.addRows([[h+':00', media/counter, 'color:red']]);
                else
                day.addRows([[h+':00', media/counter, 'color:#3366cc']]); 
            }
            else{
                day.addRows([[h+':00', 0, 'color:red']]);
            }
        }
        
        function selectHandler() {
            
            var selectedItem = clchart.getSelection()[0];
            if (selectedItem) {
                var value = selectedItem.row;
            }
            clclicked(value); 
        }
        var clformatter = new google.visualization.NumberFormat({fractionDigits: 2});
        clformatter.format(day, 1);
        var clchart = new google.visualization.ColumnChart(document.getElementById('clchart'));
        google.visualization.events.addListener(clchart, 'select', selectHandler);
        clchart.draw(day, cloptions);
    }
    
    function clclicked(value){
        
        if (clstatus=="day"){
           
            var hour = new google.visualization.DataTable();
            
            //get by day
            hour.addColumn('string', 'Time of Day');
            hour.addColumn('number', 'Cloro');
            hour.addColumn({type:'string', role:'style'});
            document.getElementById("cltitle").innerHTML = "Cloro - Leituras do dia "+clselectedDay+"/"+(parseInt(clselectedMonth)+1)+"/"+clselectedYear+" às "+value+" horas";
            
            var size = clhrArray.length;
            
            for (var i=0; i<size; i++){
            
                if (clhrArray[i]==value && clselectedDay==cldayArray[i]){
                    min = clminArray[i];
                    var res = clArray[i].replace(",", ".");
                    cl = parseFloat(res);
                    if (cl<0.5 || cl>1)
                    hour.addRows([[value+":"+min, cl, 'color:red']]);
                    else 
                    hour.addRows([[value+":"+min, cl, 'color:#3366cc']]); 
                }
               
            }
            
            var clformatter = new google.visualization.NumberFormat({fractionDigits: 2});
            clformatter.format(hour, 1);
            var clchart = new google.visualization.ColumnChart(document.getElementById('clchart'));
            clchart.draw(hour, cloptions);
            clstatus="hour";
            }
            
        else if (clstatus=="month"){
            document.getElementById("clother").style.display = "none";
            document.getElementById("clback").style.display = "block";
        var day = new google.visualization.DataTable();
        day.addColumn('string', 'Time of Day');
        day.addColumn('number', 'Cloro');
        day.addColumn({type:'string', role:'style'});
        document.getElementById("cltitle").innerHTML = "Cloro - Média por hora do dia "+clselectedDay+"/"+(parseInt(clselectedMonth)+1)+"/"+clselectedYear;
        var size = cldayArray.length;
        
        for (var h=0; h<24; h++){
            var counter=0;
            var media=0;
            for (var i=0; i<size; i++){
                if (value+1==cldayArray[i] && clhrArray[i]==h){
                    var res = clArray[i].replace(",", ".");
                    media+= parseFloat(res);
                    counter++;
                }
            }
            if (counter!=0){
                if ((media/counter)<0.5||(media/counter)>1 )
                day.addRows([[h+':00', media/counter, 'color:red']]);
                else
                day.addRows([[h+':00', media/counter, 'color:#3366cc']]); 
            }
            else{
                day.addRows([[h+':00', 0, 'color:red']]);
            }
        }
        
        function selectHandler() {
            
            var selectedItem = clchart.getSelection()[0];
            if (selectedItem) {
                var value = selectedItem.row;
            }
            clclicked(value); 
        }
        clstatus="day";
        clselectedDay=value+1;
        var clformatter = new google.visualization.NumberFormat({fractionDigits: 2});
        clformatter.format(day, 1);
        var clchart = new google.visualization.ColumnChart(document.getElementById('clchart'));
        google.visualization.events.addListener(clchart, 'select', selectHandler);
        clchart.draw(day, cloptions);
        }           
    }