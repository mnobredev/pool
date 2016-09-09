<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" crossorigin="anonymous">
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" crossorigin="anonymous">
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script type="text/javascript">
            google.charts.load('current', {packages: ['corechart']});
            google.charts.setOnLoadCallback(drawChart);
        </script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <title>ATEC Pool App</title>
    </head>
    <body>
        <?php
            
            $servername="localhost";
            $username="root";
            $password="";

            $conn = mysqli_connect($servername, $username, $password);
            //Verificar se ligou
            if(!$conn){
                die("Erro".mysqli_connect_error());
            }
            mysqli_select_db($conn,"pooldb");
            mysqli_set_charset($conn, "utf8_general_ci");
        
        $phreading = [];
        $clreading = [];
        $hora = [];
        $minuto = [];
        $phideal = [];
        $clideal = [];
        
        $sql = "SELECT ph_status, chlorine_status, HOUR(date) as hour, MINUTE(date) as minute FROM readings where DATE(date)=DATE(NOW())";
        $rs_result = mysqli_query ($conn, $sql);
        
        while ($row = mysqli_fetch_assoc($rs_result)) {
                array_push($phreading,$row['ph_status']);
                array_push($clreading,$row['chlorine_status']);
                array_push($hora, $row['hour']);
                array_push($minuto, $row['minute']);
                array_push($phideal,"7.2");
                array_push($clideal,"1");
            }
            
        $hour=[];
        $ph=[];
        
        for ($hours=0; $hours<24; $hours++){
            
            $counter=0;
            $media=0;
            $hour[$hours]=$hours;
            
            for ($index=0; $index<count($hora);$index++) {
                if ($hora[$index]==$hours){
                    $phreading[$index] = str_replace(",",".",$phreading[$index]);
                    $media+= $phreading[$index];
                    $counter++;
                }
            }
                
            if ($counter!=0){
                $ph[$hours]=$media/$counter;
            }
            
            else{
                $ph[$hours]=0;
            }
        }
        ?>
        
        <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">ATEC Pool App</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <form class="navbar-form navbar-right">
            <div class="form-group">
              <input type="text" placeholder="Email" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Sign in</button>
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>
      
        
        
    <div class="jumbotron">
      <div class="container">
        <h1>Controlo de valores</h1>
      </div>
    </div>
    <div class="container">
     
        <div class="col-md-6">
          <h2>PH</h2>
          <div class="ct-chart ct-golden-section" id="phchart"></div>
        </div>
        <div class="col-md-6">
          <h2>Cloro</h2>
          <div class="ct-chart ct-golden-section" id="clchart"></div>
        </div>
      </div>

      <hr>

      <footer>
        <p>© 2016 ATEC - Academia de Formação</p>
      </footer>
    </div>
        <script type="text/javascript">
            var phArray = [];
            var hrArray = [];
            var minArray = [];
            var phArrayphora = [];
            var hrArrayphora = [];
            var hrArrayphora =<?php echo json_encode($hora); ?>;
            var phArrayphora =<?php echo json_encode($phreading); ?>;
            var phArray =<?php echo json_encode($ph); ?>;
            var clArray =<?php echo json_encode($clreading); ?>;   
            var hrArray =<?php echo json_encode($hour); ?>;
            var minArray =<?php echo json_encode($minuto); ?>;
            var phIdealArray =<?php echo json_encode($phideal); ?>;
            var clIdealArray =<?php echo json_encode($clideal); ?>;
        </script>
        <script src="phtable.js"></script>
        <!--
        <script src="cltable.js"></script>
        -->
    </body>
</html>
