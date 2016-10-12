<?php
session_start();
if (!$_SESSION["id"]){
    session_unset();
    session_destroy();
    header("location:admin.php");
}
else{
    $id = $_SESSION["id"];
    $sessionName = $_SESSION["name"];
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
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $sessionName; ?><span class="caret"></span></button>
                    <ul class="dropdown-menu col-xs-12">
                    </ul>
                </div>
                <button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-log-out" aria-label="Logout"></span></button>
            </form>
        </div><!--/.navbar-collapse -->
    </div>
</nav>