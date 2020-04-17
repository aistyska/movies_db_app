<div class="bg-light border-right" id="sidebar-wrapper">
    <div class="sidebar-heading">Filmų duomenų bazė</div>
    <div class="list-group list-group-flush">

        <?php
        require 'inc/nav.php';
        foreach ($navigation['side'] as $link => $title) :?>
        <a href="?p=<?=$link;?>" class="list-group-item list-group-item-action bg-light"><?=$title;?></a>
        <?php endforeach;?>

    </div>
</div>