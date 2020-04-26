<h2 class="mt-4">Filmo pridėjimas</h2>
<p>Šiame puslapyje galite išsaugoti informaciją apie filmą</p>

<?php
if (isset($_POST['add_movie']) && !empty(validateAddMovieForm())) {
    foreach (validateAddMovieForm() as $er_value):?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= $er_value;?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php
    endforeach;
} elseif (isset($_POST['add_movie']) && empty(validateAddMovieForm())) {
    if (empty(getMovie(htmlspecialchars($_POST['title'])))) {
        $movie = [
            'title' => ucwords(htmlspecialchars($_POST['title'])),
            'about' => htmlspecialchars($_POST['about']),
            'year' => htmlspecialchars($_POST['year']),
            'director' => ucwords(htmlspecialchars($_POST['director'])),
            'imdb' => htmlspecialchars($_POST['imdb']),
            'cat_id' => htmlspecialchars($_POST['category'])
        ];
        createMovie($movie);
    } else { ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            Toks filmas jau yra duomenų bazėje
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
<?php }
}?>

<form method="post" class="mb-4">
    <div class="form-row">
        <div class="form-group col-sm">
            <label for="title">Filmo pavadinimas</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Filmo pavadinimas" value="<?=htmlspecialchars($_POST['title'] ?? '')?>">
        </div>
        <div class="form-group col-sm">
            <label for="director">Režisierius</label>
            <input type="text" class="form-control" id="director" name="director" placeholder="Režisierius" value="<?=htmlspecialchars($_POST['director'] ?? '')?>">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-sm">
            <label for="category">Žanras</label>
            <select class="custom-select" id="category" name="category">

                <?php foreach (getAllCategories() as $categories) :?>
                <option value="<?=$categories['id']?>"> <?=$categories['category']?> </option>
                <?php endforeach; ?>

            </select>
        </div>
        <div class="form-group col-sm">
            <label for="year">Išleidimo metai</label>
            <input type="number" class="form-control" min="1878" id="year" name="year" placeholder="Išleidimo metai" value="<?=htmlspecialchars($_POST['year'] ?? '')?>">
        </div>
        <div class="form-group col-sm">
            <label for="imdb">IMDB reitingas</label>
            <input type="number" min="0" max="10" step="0.1" class="form-control" id="imdb" name="imdb" placeholder="IMDB reitingas" value="<?=htmlspecialchars($_POST['imdb'] ?? '')?>">
        </div>
    </div>
    <div class="form-group">
        <label for="about">Filmo aprašymas</label>
        <textarea class="form-control" id="about" name="about" rows="3" placeholder="Parašykite, apie ką šis filmas..."><?=htmlspecialchars($_POST['about'] ?? '')?></textarea>
    </div>
    <button type="submit" name="add_movie" class="btn btn-success mb-3 mb-sm-0"><i class="fas fa-plus"></i> Pridėti filmą</button>
    <a class="btn btn-danger mb-3 mb-sm-0" href="?p=all_movies" role="button"><i class="fas fa-ban"></i> Atšaukti</a>
</form>

