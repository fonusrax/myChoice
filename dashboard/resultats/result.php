<?php

include_once '../../Controller/checkConnexion.php';
include_once '../../Controller/specialites.php';
include_once '../../Controller/fiches.php';
include_once '../../Controller/utilisateur.php';
include_once '../../queries/utilisateurs.php';
$titrePage = "Admin - Résultats";
include_once '../../View/header.php';




?>

<div class="container p-3 mt-2 text-center">
    <h3 class="titrePage">Résultats</h3>
</div>
<div class="container-fluid p-5">

    <?php 
        if(isset($_GET['id'])) {
            $idFiche = $_GET['id'];
            $acheve = getEtatFiche($idFiche);

            if($acheve) {
                afficherEtudiants($idFiche);
            } else {
                if(ficheAchevee($idFiche)) {
                    orienterEtudiants($idFiche);
                    afficherEtudiants($idFiche);
                } else {
                    echo '<div class="container d-flex justify-content-center align-items-center monContainer flex-column shadow-lg p-3 mb-5 bg-body rounded">
                    <div class="mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="rgb(17, 128, 231)" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
                </svg>
                </div>
                <h3 class="text-center" style="height:100px">Cette fiche n\'est pas encore achevée</h3>
                
            
            </div>';
                }
            }
            
        }
    ?>
</div>


<?php
include_once '../../View/footer.php';
?>