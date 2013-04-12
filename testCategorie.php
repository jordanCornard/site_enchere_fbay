<?php

require_once 'global/config.php';

require_once CHEMIN_LIB.'pdo2.php';

require_once CHEMIN_MODELE.'profil.php';

function resultatTest($attendu, $obtenu){
    $resultat="échec";
    if ($attendu == $obtenu)
        $resultat ="réussite";
    return $resultat;
}

$categorie = new Categorie();

/*
 * TEST DE LA METHODE lire_infos_profil
 */
$id=1;
$attendu = ""; // a completer quand j'aurais vu la BDD

echo 'récupère l\'intitulé du profil numéro '.$id;

echo 'categorie attendu : '.$attendu.' / categorie récupérée : ';
$obtenu = $categorie->lire_infos_categorie($id);
echo $obtenu.' '. resultatTest($attendu, $obtenu).'<br/>';

// FIN TEST LIRE PROFIL

//TEST AJOUT
$dernierProfil = $categorie->ajouter_profil_dans_bdd('root');
echo $categorie->lire_infos_categorie($dernierProfil).'<br/>';

//TEST MODIFIER 
$categorie->modifier_categorie_dans_bdd('admin',1);
echo $categorie->lire_infos_categorie(1).'<br>';

//TEST SUPPRESION
$categorie->supprimer_categorie_dans_bdd(3);
echo $categorie->lire_infos_categorie(3).'<br/>';

//LISTER LES CATEGORIES
$lesCategories = $categorie->chargerCategorie();
foreach ($lesCategories as $uneCategorie)
{
    echo $uneCategorie['id'].' '.$uneCategorie['libelle'].'<br/>';
}
?>
