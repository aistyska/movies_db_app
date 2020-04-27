<?php
if (isset($_GET['id'])) {
    if (isset($_GET['delete']) && $_GET['delete'] == "yes") {
        deleteCategory(htmlspecialchars($_GET['id']));
    } else { ?>
        <h2 class="mt-4"> Ar tikrai norite ištrinti šį žanrą?</h2>

        <a class="btn btn-danger" href="?p=delete_category&id=<?=htmlspecialchars($_GET['id'])?>&delete=yes" role="button"><i class="fas fa-trash-alt"></i> Ištrinti</a>
        <a class="btn btn-danger" href="?p=categories_control" role="button"><i class="fas fa-ban"></i> Atšaukti</a>
    <?php }
}
?>
