    <?php
            $cloro = $_REQUEST['clr'];
            $cloro = str_replace("%",".",$cloro);
            $ph = $_REQUEST['ph'];
            $ph = str_replace("%",".",$ph);
            $mac = $_REQUEST['mac'];
            $mac = str_replace("%",".",$mac);
            
            echo "Valor do PH: $ph <br>Valor do Cloro: $cloro";

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
            
            $sql = "INSERT INTO readings (reading_device_id, chlorine_status, ph_status, date) VALUES ('$mac', '$cloro', '$ph', NOW());"; 
            mysqli_query ($conn, $sql);
            
            $sql = "SELECT ph_status, chlorine_status FROM readings where reading_device_id=$mac order by reading_id desc limit 3;";
            $rs_result = mysqli_query ($conn, $sql);
            $phalarmstatus = TRUE;
            $clalarmstatus = TRUE;
            while ($row = mysqli_fetch_assoc($rs_result)) {
                echo "<br>";
                echo $row["ph_status"];
                
                if (($row["ph_status"]>=7 && $row["ph_status"]<=7.5)){
                    $phalarmstatus = FALSE;
                }
                if ($row["chlorine_status"]>=0.5 && $row["chlorine_status"]<=2){
                    $clalarmstatus = FALSE;
                }
            }
            if ($phalarmstatus==TRUE || $clalarmstatus==TRUE){
                    $alarmid="alarm.php?";
                            if ($phalarmstatus==TRUE){
                                $alarmid.="ph=0";
                                if ($clalarmstatus==TRUE){
                                    $alarmid.="&cl=0";
                                }
                            }
                            else {
                                $alarmid.="cl=0";
                            }
                            
                            header("Location: $alarmid");
                }
            
        ?>
