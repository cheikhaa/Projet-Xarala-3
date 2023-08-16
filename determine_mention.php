<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Détermination de la Mention</title>
  <!-- Ajouter les liens vers les fichiers CSS de Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    
    <form method="post" action="determine_mention.php">
      <div class="mb-3">
        <label for="moyenne" class="form-label">Entrez la moyenne obtenue au BAC :</label>
        <input type="number" step="0.01" name="moyenne" class="form-control" id="moyenne" required>
      </div>
      <button type="submit" class="btn btn-primary">Valider</button>
    </form>
    
    <?php
        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["moyenne"])) {
            // Récupérer la moyenne entrée par l'utilisateur
            $moyenne = floatval($_POST["moyenne"]);

            // Définir la variable de décision
            $decision = ($moyenne >= 10) ? "Admis" : "Éliminé";

            // Définir la variable de mention
            $mention = '';
            if ($moyenne >= 17) {
                $mention = "Excellent";
            } elseif ($moyenne >= 16) {
                $mention = "Très Bien";
            } elseif ($moyenne >= 14) {
                $mention = "Bien";
            } elseif ($moyenne >= 12) {
                $mention = "Assez Bien";
            } else {
                $mention = "Passable";
            }
    ?>

        <!-- Afficher la décision et la mention avec les classes de couleur Bootstrap -->
        <h2>Décision: <span class="<?php echo ($decision === 'Admis') ? 'text-success' : 'text-danger'; ?>"><?php echo $decision; ?></span></h2>
        <h2>Mention: <span class="fs-5 text-<?php echo ($mention === 'Excellent') ? 'success' : (($mention === 'Très Bien') ? 'primary' : (($mention === 'Bien') ? 'info' : (($mention === 'Assez Bien') ? 'warning' : 'secondary'))); ?>"><?php echo $mention; ?></span></h2>
    
    <?php
        }
    ?> 
  </div>

  <!-- Ajouter le lien vers le fichier JavaScript de Bootstrap (optionnel) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
