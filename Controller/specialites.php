<?php 

include_once __DIR__.'/../queries/specialite.php';
include_once __DIR__.'/../queries/annee.php';

function remplirOptionsSpecialite() {
    $listSpecialite = getSpecialites();
    foreach ($listSpecialite as $elem) {
        $idSpec = $elem->idSpecialite;
        $nomSpec = $elem->nomSpecialite;
        echo '<option value="'.htmlentities($idSpec,ENT_QUOTES,"ISO-8859-1").'">'.htmlentities($nomSpec,ENT_QUOTES,"ISO-8859-1").'</option>';
    }
}


function remplirSpeciaWithValue($id) {
    $listSpecialite = getSpecialites();
    foreach ($listSpecialite as $elem) {
        $idSpec = $elem->idSpecialite;
        $nomSpec = $elem->nomSpecialite;
        if ($idSpec==$id) {
            echo '<option value="'.htmlentities($idSpec,ENT_QUOTES,"ISO-8859-1").'" selected>'.htmlentities($nomSpec,ENT_QUOTES,"ISO-8859-1").'</option>';
        } else {
            echo '<option value="'.htmlentities($idSpec,ENT_QUOTES,"ISO-8859-1").'">'.htmlentities($nomSpec,ENT_QUOTES,"ISO-8859-1").'</option>';
        }
        
    }
}

function remplirTableSpecialite() {

    $listSpecia = getSpecialites();
    foreach ($listSpecia as $elem) {
        $id = $elem->idSpecialite;
        $nom = htmlentities($elem->nomSpecialite,ENT_QUOTES,"ISO-8859-1");
        $annee = getAnneeById($elem->anneeDebut);
        $cycle = $annee->cycleEtud;
        $anneeDeb =$annee->annee;
        
        $msgConfirm = "return confirm('Voulez-vous vraiment supprimer cet élément ?');";

        echo '<tr>
        <th scope="row">'.$id.'</th>
        <td>'.$nom.'</td>
        <td>'.$cycle.'</td>
        <td>'.$anneeDeb.'</td>
        <td>
            <a href="edit.php?id='.$id.'"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="rgb(15, 111, 221)" class="bi bi-pencil-square pointer" viewBox="0 0 16 16">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                </svg></a>
            <a href="delete.php?id='.$id.'" onclick="'.$msgConfirm.'"><svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="rgb(231, 34, 7)" class="bi bi-trash-fill" viewBox="0 0 16 16">
                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                </svg></a>
        </td>
    </tr>';
    }
    
}


function remplirSpecialiteFiche() {
    global $listSpecialite;
    if (!$listSpecialite) {
        echo 'bonjour';
    } else {
        echo '<h5 class="text-center mb-5">Classez les spécialités et validez vos voeux</h5>
        <div class="container px-5">
            <div class="row p-1 d-flex align-items-center justify-content-between myDiv">
                <div class="col-5 col-md-4">
                    <h5 class="monTitre text-start">Nom spécialité</h5>
                </div>
                <div class="col-3 col-md-4">
                    <h5 class="monTitre text-center">Ordre</h5>
                </div>
                <div class="col-3 col-md-4">
                    <h5 class="monTitre text-end">Programme détaillé</h5>
                </div>
            </div>
            <form method="POST" action="index.php">';

        echo '<div class="row p-1  d-flex align-items-center myDiv">
        <div class="form-check col-5 col-md-4 ms-4">
            <input class="form-check-input" type="checkbox" value="" id="spec1" name="spec1">
            <label class="form-check-label" for="spec1">
                Informatique (M.I)
            </label>
        </div>
        <div class="col-3 ">
            <h5 class="text-center"><input class="text-center myInput" type="number" id="ordre1" name="ordre1" value="1" disabled></h5>
        </div>
        <div class="col-3 col-md-4 text-end">
            <a href="#" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#FF0000" class="bi bi-file-earmark-pdf" viewBox="0 0 16 16">
                    <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z" />
                    <path d="M4.603 14.087a.81.81 0 0 1-.438-.42c-.195-.388-.13-.776.08-1.102.198-.307.526-.568.897-.787a7.68 7.68 0 0 1 1.482-.645 19.697 19.697 0 0 0 1.062-2.227 7.269 7.269 0 0 1-.43-1.295c-.086-.4-.119-.796-.046-1.136.075-.354.274-.672.65-.823.192-.077.4-.12.602-.077a.7.7 0 0 1 .477.365c.088.164.12.356.127.538.007.188-.012.396-.047.614-.084.51-.27 1.134-.52 1.794a10.954 10.954 0 0 0 .98 1.686 5.753 5.753 0 0 1 1.334.05c.364.066.734.195.96.465.12.144.193.32.2.518.007.192-.047.382-.138.563a1.04 1.04 0 0 1-.354.416.856.856 0 0 1-.51.138c-.331-.014-.654-.196-.933-.417a5.712 5.712 0 0 1-.911-.95 11.651 11.651 0 0 0-1.997.406 11.307 11.307 0 0 1-1.02 1.51c-.292.35-.609.656-.927.787a.793.793 0 0 1-.58.029zm1.379-1.901c-.166.076-.32.156-.459.238-.328.194-.541.383-.647.547-.094.145-.096.25-.04.361.01.022.02.036.026.044a.266.266 0 0 0 .035-.012c.137-.056.355-.235.635-.572a8.18 8.18 0 0 0 .45-.606zm1.64-1.33a12.71 12.71 0 0 1 1.01-.193 11.744 11.744 0 0 1-.51-.858 20.801 20.801 0 0 1-.5 1.05zm2.446.45c.15.163.296.3.435.41.24.19.407.253.498.256a.107.107 0 0 0 .07-.015.307.307 0 0 0 .094-.125.436.436 0 0 0 .059-.2.095.095 0 0 0-.026-.063c-.052-.062-.2-.152-.518-.209a3.876 3.876 0 0 0-.612-.053zM8.078 7.8a6.7 6.7 0 0 0 .2-.828c.031-.188.043-.343.038-.465a.613.613 0 0 0-.032-.198.517.517 0 0 0-.145.04c-.087.035-.158.106-.196.283-.04.192-.03.469.046.822.024.111.054.227.09.346z" />
                </svg></a>
        </div>

        
    </div>
    ';

    echo '<div class="form-group my-3 text-center">
    <button class="btn btn-primary" type="submit">Valider</button>
    <h6 class="msgError mt-3" id="errorMsgAddFiche"><?= $errorMsg ?></h6>
</div>
</form>
</div>';
    }
    


}
