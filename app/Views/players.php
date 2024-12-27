<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Gestion des Joueurs</title>
    <link rel="stylesheet" href="/DungeonXplorer/public/css/players_styles.css">
</head>
<body>
    <div class="container">
        <h1>Administration - Gestion des Joueurs</h1>
        <div class = "tab"></div>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom d'utilisateur</th>
                </tr>
            </thead>
            <tbody>
                <?php

                foreach ($AllUsers as $user): ?>
                    <tr>
                        <td><?= $user->getId(); ?></td>
                        <td><?= $user->getNom();; ?></td>
                        <td>
                            <form method="post" action="delete_player.php">
                                <input type="hidden" name="id">
                                <button type="submit" class="delete-btn">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    </div>
</body>
</html>
