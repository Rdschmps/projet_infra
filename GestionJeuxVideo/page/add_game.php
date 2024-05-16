<?php
include './../includes/header.html'
?>

<header>
<link rel="stylesheet" href="../css/style.css">

</header>


<main>
    <div class="container">
        <h2>AJOUTER UN JEU </h2>
        <form action="traitement_formulaire1.php" method="post">
           
            <label for="nom_jeu">Nom du jeu  :</label>
            <input type="text" id="nom_jeu" name="jeu"><br><br>
            
            <label for="text">Maison d'édition :</label>
            <input type="text" id="nom_editeur" name="editeur"><br><br>

            <label for="text">Note :</label>
            <input type="text" id="note" name="note"><br><br>

            <label for="text">Image :</label>
            <input type="text" id="image_jeu" name="image "><br><br>

            <button type="submit">Envoyer</button>
        </form>
    </div>

    
</main>




<?php
include './../includes/footer.html'
?>  