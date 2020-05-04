<?php
$error = "";

if (isset($_POST['login'])) {
    if (htmlspecialchars($_POST['username'] == "admin") && htmlspecialchars($_POST['password']) == "labas") {
        $_SESSION['username'] = htmlspecialchars($_POST['username']);
    } else {
        $error = "Neteisingas vartotojo vardas arba slaptažodis";
    }
}
?>

<?php if (isset($_SESSION['username']) && $_SESSION['username'] == "admin") :?>

    <h2 class="mt-4">Sveiki!</h2>
    <p>Jūs sėkmingai prisjungėte. Jums prieinamos administratoriaus funkcijos: </p>

    <div class="list-group">
        <?php foreach ($navigation['top']['Veiksmai'] as $link => $title) :?>
        <a href="?p=<?=$link;?>" class="list-group-item list-group-item-action"><?=$title?></a>
        <?php endforeach;?>
    </div>


<?php else :?>
    <form method="post">
        <h2 class="mt-4">Vartotojo prisijungimas</h2>

        <?php if ($error != ""):?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?=$error?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php endif;?>

        <div class="form-group">
            <label for="username">Vartotojo vardas</label>
            <input type="text" id="username" name="username" class="form-control" placeholder="Vartotojo vardas" required="" autofocus="">
        </div>
        <div class="form-group">
            <label for="password">Slaptažodis</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="Slaptažodis" required="">
        </div>

        <button class="btn btn-primary " type="submit" name="login">Prisijungti</button>
    </form>

<?php endif;?>








