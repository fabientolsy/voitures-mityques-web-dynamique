<?php
include "../configuration.php";
include CHEMIN_ACCESSEUR . "VoitureDAO.php";

$listeCategories = VoitureDAO::listerCategories();
$contenus = VoitureDAO::calculerContenu();
?>

<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE-Edge">
    <meta name="viewport" content="width=device-width, initiale-scale=1.0">
    <title>Page contenue</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>

<body>
    <a href="liste-voitures.php" title="">
        <button type="button" class="btn btn-danger">Retour au menu</button>
    </a>
    <table>
        <caption> </caption>
        <tr>
            <th>Catégorie</th>
            <th>Nombre</th>
            <th>Vente moyennes</th>
            <th>Ventes totales</th>
            <th>Ventes minimale</th>
            <th>Ventes maximale</th>
        </tr>

        <?php
        foreach ($listeCategories as $categories) {
        ?>
            <tr>
                <th><?= $categories["origine"] ?></th>
                <td><?= $categories["nombre"] ?></td>
                <td><?= $categories["ventesMoyennes"] ?></td>
                <td><?= $categories["ventesTotales"] ?></td>
                <td><?= $categories["plus_grande"] ?></td>
                <td><?= $categories["plus_petite"] ?></td>
            </tr>
        <?php
        }
        ?>
    </table>

    <?php
    foreach ($contenus as $contenu) {
    ?>
        <p>Nombre de ventes moyen: <?= floor($contenu["moyenne"]) . " de ventes" ?></p>
        <p>Ecart-type: <?= round($contenu["ecartType"], 1) ?></p>
    <?php
    }
    ?>

    <div class="chart-container" style="height:40vh; width:40vw">
        <canvas id="graphique"></canvas>
    </div>

    <script>
        <?php
        foreach ($listeCategories as $categories) {
            $categorie[] = "\"" . $categories['origine'] . "\"";
            $nombreParCategorie = $categories['nombre'];
        } ?>
        const donnees = [<?php echo implode(',', $nombreParCategorie) ?>]; // Tableau des données
        const etiquettes = [<?php echo implode(',', $categorie) ?>] // Tableau des étiquettes
        const couleurs = ['darkslateblue', 'red', 'purple'];
        const cible = document.getElementById('graphique').getContext('2d');
        const graphiqueLigne = new Chart(cible, {
            type: 'line',

            data: {
                labels: etiquettes,
                datasets: [{
                    label: 'Visite selon les mois',
                    backgroundColor: couleurs,
                    data: donnees
                }]
            },

            options: {
                responsive: true
            }
        });
    </script>


    <footer><span id="signature"></span></footer>
</body>

</html>