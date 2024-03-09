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

    <ul>
        <?php foreach ($orders as $order) : ?>
            <!-- // Affiche l'état de la commande en français en utilisant une énumération OrderStatus
             $order->status est la valeur numérique représentant l'état de la commande
             OrderStatus::from($order->status) crée une instance de l'énumération OrderStatus à partir de la valeur numérique de l'état
             ->toFrench() traduit cette instance de l'énumération en français
             Le résultat est inclus dans la page HTML générée -->
            <li> <?= \Src\enum\OrderStatus::from($order->status)->toFrench() ?></li>
        <?php endforeach ?>
    </ul>


</body>

</html>