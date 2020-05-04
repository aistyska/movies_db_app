<?php
require 'inc/session.php';
?>

<h2 class="mt-4">Filmo redagavimas</h2>

<?php

if (isset($_GET['id'])) {
    $movie = getMovieById(htmlspecialchars($_GET['id']));
    if (!empty($movie)){
        if (isset($_POST['save']) && !empty(validateAddMovieForm())) {
            foreach (validateAddMovieForm() as $er_value):?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= $er_value;?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php
            endforeach;
        } elseif (isset($_POST['save']) && empty(validateAddMovieForm())) {
            $movie['title'] = ucwords(htmlspecialchars($_POST['title']));
            $movie['about'] = htmlspecialchars($_POST['about']);
            $movie['year'] = htmlspecialchars($_POST['year']);
            $movie['director'] = ucwords(htmlspecialchars($_POST['director']));
            $movie['imdb'] = htmlspecialchars($_POST['imdb']);
            $movie['cat_id'] = htmlspecialchars($_POST['category']);
            updateMovie($movie);
        }?>

        <p>Šiame puslapyje galite pakeisti apie filmą saugomą informaciją</p>

        <form method="post" class="mb-4">
            <div class="form-row">
                <div class="form-group col-sm">
                    <label for="title">Filmo pavadinimas</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Filmo pavadinimas" value="<?=($movie['title'] ?? '')?>">
                </div>
                <div class="form-group col-sm">
                    <label for="director">Režisierius</label>
                    <input type="text" class="form-control" id="director" name="director" placeholder="Režisierius" value="<?=($movie['director'] ?? '')?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm">
                    <label for="category">Žanras</label>
                    <select class="custom-select" id="category" name="category">

                        <?php foreach (getAllCategories() as $categories) :?>
                            <?php if ($categories['category'] == $movie['category']) :?>
                                <option selected value="<?=$categories['id']?>"> <?=$categories['category']?> </option>
                            <?php else :?>
                                <option value="<?=$categories['id']?>"> <?=$categories['category']?> </option>
                            <?php endif;
                        endforeach; ?>

                    </select>
                </div>
                <div class="form-group col-sm">
                    <label for="year">Išleidimo metai</label>
                    <input type="number" class="form-control" min="1878" id="year" name="year" placeholder="Išleidimo metai" value="<?=($movie['year'] ?? '')?>">
                </div>
                <div class="form-group col-sm">
                    <label for="imdb">IMDB reitingas</label>
                    <input type="number" min="0" max="10" step="0.1" class="form-control" id="imdb" name="imdb" placeholder="IMDB reitingas" value="<?=($movie['imdb'] ?? '')?>">
                </div>
            </div>
            <div class="form-group">
                <label for="about">Filmo aprašymas</label>
                <textarea class="form-control" id="about" name="about" rows="3" placeholder="Parašykite, apie ką šis filmas..."><?=($movie['about'] ?? '')?></textarea>
            </div>
            <button type="submit" name="save" class="btn btn-success mb-3 mb-sm-0"><i class="fas fa-lock"></i> Išsaugoti</button>
            <a class="btn btn-danger mb-3 mb-sm-0" href="?p=movies_control" role="button"><i class="fas fa-ban"></i> Atšaukti</a>
        </form>

<?php
    } else { ?>
        <div class="alert alert-danger mt-4" role="alert">
            <h4>Filmo, kurį norite redaguoti <strong>NĖRA</strong>.</h4>
            <hr>
            <a class="btn btn-danger mb-3 mb-sm-0" href="?p=movies_control" role="button"><i class="fas fa-arrow-left"></i> Grįžti atgal</a>
        </div>
    <?php
    }
} ?>
