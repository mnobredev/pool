<?php
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
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Entrou como <?php echo $sessionName;?> <span class="caret"></span></button>
                    <ul class="dropdown-menu col-xs-12">
                        <li><a href="profile.php"><span class="glyphicon glyphicon-user" aria-label="profile"></span>   Perfil</a></li>
                        <li><a href="main.php"><span class="glyphicon glyphicon-dashboard" aria-label="readings"></span>   Leituras</a></li>
                        <li><a href="store.php"><span class="glyphicon glyphicon-shopping-cart" aria-label="store"></span>   Loja</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="tools/logout.php"><span class="glyphicon glyphicon-log-out" aria-label="logout"></span>   Logout</a></li>
                    </ul>
                </div>
            <a href="tools/logout.php"  class="btn btn-danger"><span class="glyphicon glyphicon-log-out" aria-label="Logout"></span></a>
        </form>
    </div>
  </div>
</nav>