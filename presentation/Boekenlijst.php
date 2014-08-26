<!DOCTYPE HTML>
<html>
    <head>
        <meta charset=utf-8>
        <title>Boeken</title>
        <style>
            table { border-collapse: collapse; }
            td, th { border: 1px solid black; padding: 3px; }
            th { background-color: #ddd}
        </style>
    </head>
    <body>
        <h1>Boekenlijst</h1>
        <table>
            <tr>
                <th>Titel</th>
                <th>Genre</th>
            </tr>
            <?php
            foreach ($boekenLijst as $boek) {
            ?>
                <tr>
                    <td>
                        <a href="updateboek.php?id=<?php print($boek->getId());?>">
                        <?php print($boek->getTitel());?>
                        </a>
                    </td>
                    <td>
                        <?php
                        print($boek->getGenre()
                        ->getOmschrijving());?>
                    </td>
                    <td>
                        <a href="verwijderboek.php?id=<?php print($boek->getId());?>">Verwijder</a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
    </body>
</html>

