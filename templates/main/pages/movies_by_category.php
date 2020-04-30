<h2 class="mt-4">Filmai pagal žanrą</h2>

<p>Pasirinkite norimą filmų žanrą</p>

<form method="get" class="form-inline">
    <input type="hidden" name="p" value="by_category">
    <div class="input-group my-3 mr-2">
        <div class="input-group-prepend">
            <label class="input-group-text" for="selectCategory">Žanras</label>
        </div>
        <select class="custom-select" id="selectCategory" name="category">
            <?php foreach (getAllCategories() as $categories) :?>
                <option value="<?=$categories['id']?>"> <?=$categories['category']?> </option>
            <?php endforeach; ?>
        </select>
    </div>

    <button type="submit" name="search" class="btn btn-success mb-3 mb-sm-0">Filtruoti</button>
</form>

<?php
if (isset($_GET['search']) && isset($_GET['category'])) {
    $movies = getMoviesByCategory(htmlspecialchars($_GET['category']));
    if (empty($movies)) { ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            Apgailestaujame, filmų pagal pasirinktą žarą nėra
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
<?php
    } else { ?>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Pavadinimas</th>
                        <th scope="col">Aprašymas</th>
                        <th scope="col">Išleidimo metai</th>
                        <th scope="col">Režisierius</th>
                        <th scope="col">IMDB reitingas</th>
                        <th scope="col">Žanras</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($movies as $movie):?>
                    <tr>
                        <th scope="row"><?=$movie['title']?></th>
                        <td><?=$movie['about']?></td>
                        <td><?=$movie['year']?></td>
                        <td><?=$movie['director']?></td>
                        <td><?=$movie['imdb']?></td>
                        <td><?=$movie['category']?></td>
                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>
        </div>
<?php
    }
}
?>


