<?php
require 'inc/session.php';
?>

<h2 class="mt-4">Kategorijų valdymas</h2>
<p>Pridėkite ar šalinkite filmų kategorijas/žanrus</p>

<a class="btn btn-success mb-3" href="?p=add_category" role="button"><i class="fas fa-plus"></i> Pridėti kategoriją</a>

<div class="table-responsive">
    <table class="table table-hover">
        <thead class="thead-light">
            <tr>
                <th scope="col">Kategorijos ID</th>
                <th scope="col">Pavadinimas</th>
                <th scope="col">Veiksmai</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach (getAllCategories() as $categories):?>
            <tr>
                <th scope="row"><?= $categories['id'] ?></th>
                <td><?= $categories['category'] ?></td>
                <td>
                    <a class="btn btn-danger btn-sm" href="?p=delete_category&id=<?=$categories['id']?>" role="button"><i class="fas fa-trash-alt"></i> Šalinti</a>
                </td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
</div>