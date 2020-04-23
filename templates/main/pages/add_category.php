<h2 class="mt-4">Filmų kategorijos/žanro pridėjimas</h2>
<p>Šiame puslapyje galite sukurti naują kategoriją filmams.</p>

<?php
if (isset($_POST['add_category']) && !empty($_POST['input_category'])) {
    var_dump($_POST);
    createCategory(htmlspecialchars($_POST['input_category']));
} elseif (isset($_POST['add_category']) && empty($_POST['input_category'])) {;?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        Įveskite žanrą
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php
}
;?>

<form method="post">
    <div class="form-group">
        <input type="text" class="form-control" id="input_category" name="input_category" aria-describedby="categoryHelpBlock" placeholder="Žanro pavadinimas">
        <small id="categoryHelpBlock" class="form-text text-muted">Įveskite žanrą, kurį norite pridėti.</small>
    </div>
    <button type="submit" name="add_category" class="btn btn-success mb-3 mb-sm-0"><i class="fas fa-plus"></i> Pridėti kategoriją</button>
    <a class="btn btn-danger mb-3 mb-sm-0" href="?p=categories_control" role="button"><i class="fas fa-ban"></i> Atšaukti</a>
</form>

