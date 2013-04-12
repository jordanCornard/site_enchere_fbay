<?php

if (!isset($_REQUEST['action']))
{
    $_REQUEST['action'] = 'ajoutObjet';
}

$action=$_REQUEST['action'];
$categorie = new Categorie();
switch ($action)
{
    case 'ajoutObjet';
        {
        include 'vues/vueNav.php';
        $lesCategories = $categorie->chargerCategorie();
        include 'vues/vueAjoutObjets.php';
        
        break;
        }   
}

?>
