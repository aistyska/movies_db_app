<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
    <button class="btn btn-primary" id="menu-toggle">Slėpti meniu</button>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">

            <?php
            require 'inc/nav.php';

            foreach ($navigation['top'] as $link => $title){

                if ($link == "Veiksmai"):?>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?=$link;?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                        <?php foreach ($title as $action => $name) :?>
                        <a class="dropdown-item" href="?p=<?=$action;?>"><?=$name;?></a>
                        <?php endforeach;?>

                    </div>
                </li>

            <?php else:?>

            <li class="nav-item">
                <a class="nav-link" href="?p=<?=$link;?>"><?=$title;?></a>
            </li>

            <?php endif;
            }?>

        </ul>
    </div>
</nav>