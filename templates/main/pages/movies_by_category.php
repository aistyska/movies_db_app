<h2 class="mt-4">Filmai pagal žanrą</h2>

<p>Pasirinkite norimą filmų žanrą</p>

<form class="form-inline">
    <div class="input-group my-3 mr-2">
        <div class="input-group-prepend">
            <label class="input-group-text" for="selectCategory">Žanras</label>
        </div>
        <select class="custom-select" id="selectCategory">
            <option selected>Pasirinkite...</option>
            <option value="action">Veiksmo</option>
            <option value="drama">Drama</option>
            <option value="adventure">Nuotykių</option>
        </select>
    </div>

    <button type="submit" class="btn btn-success mb-3 mb-sm-0">Filtruoti</button>
</form>

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

        </tbody>
    </table>
</div>