<h2 class="mt-4">Filmų valdymas</h2>
<p>Pridėkite, redaguokite ar šalinkite filmus</p>

<a class="btn btn-success mb-3" href="?p=add_movie" role="button"><i class="fas fa-plus"></i> Pridėti filmą</a>

<div class="table-responsive">
    <table class="table table-hover">
        <thead class="thead-light">
        <tr>
            <th scope="col">Filmo ID</th>
            <th scope="col">Pavadinimas</th>
            <th scope="col" class="w-25">Aprašymas</th>
            <th scope="col">Išleidimo metai</th>
            <th scope="col">Režisierius</th>
            <th scope="col">IMDB reitingas</th>
            <th scope="col">Žanras</th>
            <th scope="col" class="w-25">Veiksmai</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach (getAllMovies() as $movie):?>
            <tr>
                <th scope="row"><?=$movie['id']?></th>
                <td><?=$movie['title']?></td>
                <td><?=$movie['about']?></td>
                <td><?=$movie['year']?></td>
                <td><?=$movie['director']?></td>
                <td><?=$movie['imdb']?></td>
                <td><?=$movie['category']?></td>
                <td>
                    <a class="btn btn-info mb-2 text-nowrap" href="?p=edit_movie&id=<?=$movie['id']?>" role="button"><i class="fas fa-edit"></i> Redaguoti</a>
                    <a class="btn btn-danger mb-2 text-nowrap" href="?p=delete_movie&id=<?=$movie['id']?>&title=<?=$movie['title']?>" role="button"><i class="fas fa-trash-alt"></i> Šalinti</a>
                </td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
</div>