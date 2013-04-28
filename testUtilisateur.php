<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    </head>
</html>
<?php


require_once 'global/config.php';

require_once CHEMIN_LIB.'pdo2.php';

require_once CHEMIN_MODELE.'utilisateur.php';

function resultatTest($attendu, $obtenu){
    $resultat="échec";
    if ($attendu == $obtenu)
        $resultat ="réussite";
    return $resultat;
}

$unUtilisateur = new Utilisateur();

echo" Test methode Lire_infos_Utilisateur";
/*
 * TEST DE LA METHODE lire_infos_profil
 */
$id=1;

$nomAttendu="laleau";

$nomObtenu= $unUtilisateur->lire_infos_utilisateur($id);
var_dump($nomObtenu['nom']);
if ($nomObtenu['nom']==$nomAttendu)
{
     echo " fonction valide ";
}
else
{    
    echo $nomObtenu['nom'];

    echo 'La fonction Lire_infos_Utilisateur est invalide';
}

?>
<br></br>

<?php

echo" Test de la methode connection ";
/*
 * Test de la methode connexion
 * 
 */
$user="aymelic";
$resultat=$unUtilisateur->connexion($user);

var_dump($resultat);
echo $resultat['mdp'];

if($resultat['identifiant']=='aymelic' )
{
    if  ($resultat['mdp']=='12345')
        
    {
        
        echo" La fonction est valide ";
    }
    else 
    {
        echo"erreur";
    }
}
else
{
    echo"erreur";
}


?>

<br></br>
<?php

echo"test de la fonction ajouter_utilisateur_dans_bdd.'";




        
$lesUtilisateurs = $unUtilisateur->chargerUtilisateur();

echo ' <br/> id       nom    prenom   identifiant     idProfil    mdp    email    ';
foreach ($lesUtilisateurs as $unUtilisateur)
{
    echo '<br/>'.$unUtilisateur["id"].'  '.$unUtilisateur["nom"].'  '.$unUtilisateur["prenom"].'  '.  $unUtilisateur["identifiant"].'  '.$unUtilisateur["idProfil"].'  '.$unUtilisateur["mdp"].'  '.$unUtilisateur["email"].'  '.'<br/>';
    
}


?>