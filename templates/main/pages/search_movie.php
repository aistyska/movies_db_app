<h2 class="mt-4">Filmų paieška</h2>

<p>Įveskite filmo pavadinimą</p>

<form method="get" class="form-inline">
    <input type="hidden" name="p" value="search">
    <input type="text" class="form-control my-3 mr-2" id="input_movie_name" name="movie_title" placeholder="Filmo pavadinimas">
    <button type="submit" class="btn btn-success mb-3 mb-sm-0"><i class="fas fa-search"></i> Ieškoti</button>
</form>

<?php
if (isset($_GET['movie_title'])) {
    $movie = getMovieByTitle(ucwords(htmlspecialchars($_GET['movie_title'])));
    if (empty($movie)){ ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            Apgailestaujame, rezultatų pagal paiešką <?=htmlspecialchars($_GET['movie_title'])?> nėra
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
            <tr>
                <th scope="row"><?=$movie['title']?></th>
                <td><?=$movie['about']?></td>
                <td><?=$movie['year']?></td>
                <td><?=$movie['director']?></td>
                <td><?=$movie['imdb']?></td>
                <td><?=$movie['category']?></td>
            </tr>
        </tbody>
    </table>
</div>
<?php
    }
}
?>

