<?php 
    include '../tools/checkadminsession.php';
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
            <a class="navbar-brand" href="#">Aqua Quality Systems</a>
        </div>
            <div class="navbar-form navbar-right">
                    <button type="button" class="btn btn-default"><?php echo $sessionName; ?></button>
                    <a href="../tools/logout.php" type="button" class="btn btn-danger"><span class="glyphicon glyphicon-log-out" aria-label="Logout"></span></a>
        </div>
    </div>
</nav>