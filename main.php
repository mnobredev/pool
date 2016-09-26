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
        /*
        include 'tools/checksession.php';
         */    
        include 'tools/chave.php';
        
        $rawphreading = []; //recieves all readings from current month
        $rawclreading = []; //recieves all readings from current month
        $rawday = []; //recieves all day readings from current month
        $rawhour = []; //recieves all hour readings from current month
        $rawminute = []; //recieves all minute readings from current month
        $otherdates = []; //recieves all months where readings are found
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
            }
        $sql = "select distinct DATE_FORMAT(date, '%m-%Y') as mmyyyy from readings";
        $rs_result = mysqli_query ($conn, $sql);
        while ($row = mysqli_fetch_assoc($rs_result)) {
             array_push($otherdates,$row['mmyyyy']);
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
            <div class="btn-group">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Entrou como António Silva <span class="caret"></span></button>
                <ul class="dropdown-menu col-xs-12">
                    <li><a href="#"><span class="glyphicon glyphicon-user" aria-label="Logout"></span>   Perfil</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-dashboard" aria-label="Logout"></span>   Leituras</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#"><span class="glyphicon glyphicon-log-out" aria-label="Logout"></span>   Logout</a></li>
                </ul>
            </div>
            <button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-log-out" aria-label="Logout"></span></button>
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
     
        <div class="col-md-12" id="ph_chart_div">
        <h2 id="phtitle">PH</h2>
        <div class="ct-chart ct-golden-section"></div>
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
                            echo '<li id="'.$dates.'"><a class="monthlink" id="'.$dates.'">'.$dates.'</a></li>';
                        }
                    ?>
                </ul>
        </div>
        </div>
      </div>

      <hr>
      
      <footer>
        <p>© 2016 ATEC - Academia de Formação</p>
      </footer>
    </div>
        <script type="text/javascript">
            var phArrayphora = [];
            var hrArrayphora = [];
            var dayArray = [];
            var clArray = [];
            var minArray = [];
            var hrArrayphora =<?php echo json_encode($rawhour); ?>;
            var phArrayphora =<?php echo json_encode($rawphreading); ?>;
            var dayArray =<?php echo json_encode($rawday); ?>;
            var clArray =<?php echo json_encode($rawclreading); ?>;   
            var minArray =<?php echo json_encode($rawminute); ?>;
        </script>
        <script src="phtable.js"></script>
        
    </body>
</html>
