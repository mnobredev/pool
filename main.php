<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script type="text/javascript">
            google.charts.load('current', {packages: ['corechart']});
            google.charts.setOnLoadCallback(drawChart);
        </script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <title>Projecto Final ATEC</title>
    </head>
    <body>
        <?php
            
        include 'chave.php';
        
        $rawphreading = []; //recieves all readings from current month
        $rawclreading = []; //recieves all readings from current month
        $rawday = []; //recieves all day readings from current month
        $rawhour = []; //recieves all hour readings from current month
        $rawminute = []; //recieves all minute readings from current month
        $phideal = [];
        $clideal = [];
        
        $sql = "SELECT ph_status, chlorine_status,DAY(date) as day, HOUR(date) as hour, MINUTE(date) as minute FROM readings where MONTH(date)=MONTH(NOW())";
        $rs_result = mysqli_query ($conn, $sql);
        
        while ($row = mysqli_fetch_assoc($rs_result)) {
                array_push($rawphreading,$row['ph_status']);
                array_push($rawclreading,$row['chlorine_status']);
                array_push($rawday, $row['day']);
                array_push($rawhour, $row['hour']);
                array_push($rawminute, $row['minute']);
                array_push($phideal,"7.2");
                array_push($clideal,"1");
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
          <a class="navbar-brand" href="#">ATEC - Projecto Final</a>
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
     
        <div class="col-md-12">
          <h2 id="phtitle">PH</h2>
          <div class="ct-chart ct-golden-section" id="phchart"></div>
          <button class="btn btn-default" type="submit" id="phback">Back</button>

        </div>
        <div class="col-md-6">
          <h2>Cloro</h2>
          <div class="ct-chart ct-golden-section" id="clchart"></div>
        </div>
      </div>
        
        <div class="dropdown">
            <button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown Example
                <span class="caret"></span></button>
            <ul class="dropdown-menu">
                    <li><a href="#">HTML</a></li>
                    <li><a href="#">CSS</a></li>
                    <li><a href="#">JavaScript</a></li>
            </ul>
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
            var dayArray = [];
            var phArrayphora = [];
            var hrArrayphora = [];
            var hrArrayphora =<?php echo json_encode($rawhour); ?>;
            var phArrayphora =<?php echo json_encode($rawphreading); ?>;
            var dayArray =<?php echo json_encode($rawday); ?>;
            var phArray =<?php echo json_encode($ph); ?>;
            var clArray =<?php echo json_encode($rawclreading); ?>;   
            var hrArray =<?php echo json_encode($hour); ?>;
            var minArray =<?php echo json_encode($rawminute); ?>;
            var phIdealArray =<?php echo json_encode($phideal); ?>;
            var clIdealArray =<?php echo json_encode($clideal); ?>;
        </script>
        <script src="phtable.js"></script>
        <!--
        <script src="cltable.js"></script>
        -->
    </body>
</html>
