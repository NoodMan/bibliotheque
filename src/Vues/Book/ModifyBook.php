<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Modify Book</title>

    <style>
        #form_controller {
            /* mise en forme formulaire*/
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-content: center;
            align-items: center;
            line-height: 3em;
        }

        .radius {
            border-radius: 10px;

        }
    </style>
    
</head>
<body>
    

    </div>
    <form action='<?= "/book/$id" ?>'method="POST" id="form_controller" style="height: 100vh;">

        <label for="title">TITRE: </label>
        <input type="text" class="radius" name="title" id="title" value="<?= $book->getTitle() ?>">

        <label for="n_isbn">NUMERO ISNB </label>
        <input type="number" class="radius" name="n_isbn" value="<?= $book->getNIsbn()?>" min="0" id="n_isbn">

        <label for="available">Dispo </label>
        <input type="number" class="radius" name="n_isbn" value="<?= $book->getAvailable()?>" min="0" id="available">

        

        <input type="submit" class="radius" value="ENREGISTRER les modification">
    </form>

    </body>
</html>