<?php
if (!isset($_REQUEST['action']))
{
    $_REQUEST['action'] = 'listerLesCategories';
}

$action=$_REQUEST['action'];
$categorie = new Categorie();
switch ($action)
{
    case 'listerLesCategories';
        {
        include 'vues/vueNav.php';
        $lesCategories = $categorie->chargerCategorie();
        break;
        }   
}
        
?>
