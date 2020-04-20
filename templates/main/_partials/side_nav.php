<div class="bg-light border-right" id="sidebar-wrapper">
    <div class="sidebar-heading"><?=SITE_TITLE?></div>
    <div class="list-group list-group-flush">

        <?php
        foreach ($navigation['side'] as $link => $title) :?>
        <a href="?p=<?=$link;?>" class="list-group-item list-group-item-action bg-light"><i class="fas <?=$title['icon']?>"></i> <?=$title['title']?></a>
        <?php endforeach;?>

    </div>
</div>