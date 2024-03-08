<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HomePage</title>
</head>

<body>
    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.
        Cumque quam delectus illo beatae. Rem maxime soluta eaque
        expedita vitae excepturi voluptatum quas iusto odit ex.
        Aliquid optio iste et laudantium! Lorem ipsum dolor sit
        amet consectetur adipisicing elit. Necessitatibus saepe
        laudantium totam fugit, at officia, vitae minima non delectus
        obcaecati numquam, placeat quae rem? Fugit quidem dolorum temporibus
        voluptatem ut!</p>

    <table>
        <tr>
            <?php foreach ($users as $user) : ?>
                <?= $user->id ?>
                <?= $user->email ?>
            <?php endforeach ?>
        </tr>
    </table>
</body>

</html>