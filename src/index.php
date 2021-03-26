<?php require 'apiCall.php'?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Animaux</title>
</head>
<body>
<ul>
        <?php foreach ($animaux as $key => $value):?>
            <li>
                    <p>Nom : <?=$value->nom?></p>
                    <p>Race : <?=$value->type?></p>
            </li>
        <?php endforeach;?>
        
        <form action="" method="POST">
            <input type="text" name="nom" placeholder="nom" required>
            <select name="race">
                <?php foreach($race as $key => $value):?>
                    <option value=<?=$value->id?>><?=$value->type?></option>
                <?php endforeach;?>
            </select>
            <button class="du-css-pour-cyriak" type="submit">Soumettre</button>
        </form>

        <form action="" method="POST">
            <input type="text" name="newRace" placeholder="Ajouter nouvelle race..." required>
            <button class="du-css-pour-cyriak" type="sumbit">Soumettre</button>
        </form>
    </ul>
</body>
</html>