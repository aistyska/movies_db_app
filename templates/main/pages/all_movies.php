<h2 class="mt-4">Visi filmai</h2>
<p>Informacija apie visus saugomus filmus</p>

<div class="table-responsive">
    <table class="table table-hover">
        <thead class="thead-light">
            <tr>
                <th scope="col">Filmo ID</th>
                <th scope="col">Pavadinimas</th>
                <th scope="col">Aprašymas</th>
                <th scope="col">Išleidimo metai</th>
                <th scope="col">Režisierius</th>
                <th scope="col">IMDB reitingas</th>
                <th scope="col">Žanras</th>
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
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
</div>