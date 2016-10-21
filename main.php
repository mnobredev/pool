<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.tesate
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <link rel="icon" href="/favicon.ico" type="image/x-icon">
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <title>Projecto Final ATEC</title>
    </head>
    <body>
        <?php
        
        include 'tools/checksession.php';           
        include 'tools/chave.php';
        
        $rawphreading = []; //recieves all readings from current month
        $rawclreading = []; //recieves all readings from current month
        $rawday = []; //recieves all day readings from current month
        $rawhour = []; //recieves all hour readings from current month
        $rawminute = []; //recieves all minute readings from current month
        $otherdates = []; //recieves all months where readings are found
        $rawtempreading = []; //recieves all temperatures where readings are found
        $phideal = [];
        $clideal = [];
        
        $getDevice = mysqli_query ($conn,"SELECT * from device where device_user_id=$id");
        while ($row = mysqli_fetch_assoc($getDevice)){
            $devid = $row['device_id'];

        }
        $sql = "SELECT ph_status, chlorine_status,DAY(date) as day, HOUR(date) as hour, MINUTE(date) as minute, temperature FROM readings where MONTH(date)=MONTH(NOW()) AND reading_device_id=$devid";
        $rs_result = mysqli_query ($conn, $sql);
        
        while ($row = mysqli_fetch_assoc($rs_result)) {
            array_push($rawphreading,$row['ph_status']);
            array_push($rawclreading,$row['chlorine_status']);
            array_push($rawday, $row['day']);
            array_push($rawhour, $row['hour']);
            array_push($rawminute, $row['minute']);
            array_push($rawtempreading, $row['temperature']);
        }
        $sql = "select distinct DATE_FORMAT(date, '%m-%Y') as mmyyyy from readings where reading_device_id=$devid";
        $rs_result = mysqli_query ($conn, $sql);
        while ($row = mysqli_fetch_assoc($rs_result)) {
             array_push($otherdates,$row['mmyyyy']);
        }
        include "tools/header.php"
        ?>
        <script language='Javascript'>var id = <?php echo $devid; ?>;</script>
        <div class="jumbotron">
            <div class="container">
                <h1>Controlo de valores</h1>
            </div>
        </div>
        <div class="container">
            <div class="col-md-12">
                <h2 id="phtitle">PH</h2>
                <div class="ct-chart ct-golden-section" id="phchart"></div>
                <button class="btn btn-default" style="display:block" type="submit" id="phback">Back</button>
                <div id="phother" class="dropdown" style="display:none">
                    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Escolha outro mês<span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <?php
                        foreach ($otherdates as $dates){
                            echo '<li id="'.$dates.'"><a class="monthlink" id="'.$dates.'">'.$dates.'</a></li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="col-md-12">
                <h2 id="cltitle">Cloro</h2>
                <div class="ct-chart ct-golden-section" id="clchart"></div>
                <button class="btn btn-default" style="display:block" type="submit" id="clback">Back</button>
                <div id="clother" class="dropdown" style="display:none">
                    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Escolha outro mês<span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <?php
                        foreach ($otherdates as $dates){
                            echo '<li id="'.$dates.'"><a class="clmonthlink" id="'.$dates.'">'.$dates.'</a></li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="col-md-12">
                <h2 id="temptitle">Temperatura</h2>
                <div class="ct-chart ct-golden-section" id="tempchart"></div>
                <button class="btn btn-default" style="display:block" type="submit" id="tempback">Back</button>
                <div id="tempother" class="dropdown" style="display:none">
                    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Escolha outro mês<span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <?php
                        foreach ($otherdates as $dates){
                            echo '<li id="'.$dates.'"><a class="tempmonthlink" id="'.$dates.'">'.$dates.'</a></li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
        <hr>
        <?php
            include 'tools/footer.php';
        ?>
        <script type="text/javascript">
            var phArrayphora = [];
            var hrArrayphora = [];
            var dayArray = [];
            var clArray = [];
            var minArray = [];
            var hrArrayphora =<?php echo json_encode($rawhour); ?>;
            var clhrArray =<?php echo json_encode($rawhour); ?>;
            var temphrArray =<?php echo json_encode($rawhour); ?>;
            var phArrayphora =<?php echo json_encode($rawphreading); ?>;
            var dayArray =<?php echo json_encode($rawday); ?>;
            var cldayArray =<?php echo json_encode($rawday); ?>;
            var tempdayArray =<?php echo json_encode($rawday); ?>;
            var clArray =<?php echo json_encode($rawclreading); ?>;   
            var minArray =<?php echo json_encode($rawminute); ?>;
            var clminArray =<?php echo json_encode($rawminute); ?>;
            var tempminArray =<?php echo json_encode($rawminute); ?>;
            var tempArray =<?php echo json_encode($rawtempreading); ?>;
        </script>
        <script src="js/phtable.js"></script>
        <script src="js/cltable.js"></script>
        <script src="js/temptable.js"></script>
    </body>
</html>
