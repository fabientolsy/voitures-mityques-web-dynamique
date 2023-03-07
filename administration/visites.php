<?php
include "../configuration.php";
require CHEMIN_ACCESSEUR . "ClicDAO.php";

$jourDeLaSemaine = array("Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi");
$listeParJour = ClicDAO::listerStatsParJour();
$listeParLangue = ClicDAO::listerStatsParLangue();
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
    <table class="table-primary">
        <caption>Statistiques par jour</caption>
        <tr>
            <th scope="col">Jour</th>
            <th scope="col">Clics</th>
            <th scope="col">Visites</th>
        </tr>

        <?php
        foreach ($listeParJour as $jourEnregistre) {
        ?>
            <tr>
                <th scope="row">
                    <?php
                    echo $jourDeLaSemaine[$jourEnregistre['jour'] - 1];
                    ?>
                </th>
                <td><?= $jourEnregistre['clics'] ?></td>
                <td><?= $jourEnregistre['visites'] ?></td>
            </tr>
        <?php
        }
        ?>
    </table>

    <table class="table-warning">
        <caption>Tableau statistiques par langue</caption>
        <tr>
            <th scope="col">Langue</th>
            <th scope="col">Clics</th>
            <th scope="col">Visites</th>
        </tr>

        <?php
        foreach ($listeParLangue as $langueEnregistre) {
        ?>
            <tr>
                <th scope="row"><?= $langueEnregistre['langue'] ?></th>
                <td><?= $langueEnregistre['clics'] ?></td>
                <td><?= $langueEnregistre['visites'] ?></td>
            </tr>
        <?php
        }
        ?>
    </table>

    <div class="chart-container" style="height:40vh; width:50vw; margin: 50px auto;">
        <canvas id="graphique-jour"></canvas>
    </div>

    <script>
        <?php
        foreach ($listeParJour as $jourEnregistre) {
            $jour[] = "\"" . $jourDeLaSemaine[$jourEnregistre['jour'] - 1] . "\"";
            $nombreVisitesParJour[] = $jourEnregistre['visites'];
        }
        ?>
        const donnees = [<?php echo implode(',', $nombreVisitesParJour) ?>]; // Tableau des données
        const etiquettes = [<?php echo implode(',', $jour) ?>] // Tableau des étiquettes 
        const cible = document.getElementById('graphique-jour').getContext('2d');
        const graphiqueLigne = new Chart(cible, {
            type: 'line',

            data: {
                labels: etiquettes,
                datasets: [{
                    label: 'Visite selon les jours',
                    backgroundColor: 'rgb(255, 99, 132)',
                    borderColor: 'rgb(255, 99, 132)',
                    data: donnees
                }]
            },

            options: {
                responsive: true
            }
        });
    </script>
</body>

</html>