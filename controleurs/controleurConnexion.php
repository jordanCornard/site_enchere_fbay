<?php

//connexion avec les autres classes
include 'modeles/profil.php';
include CHEMIN_LIB.'pdo2.php';
include CHEMIN_LIB.'fonctions.php';


if (!isset($_REQUEST['action']))
{
    $_REQUEST['action'] = 'demandeConnexion'; 
}

$action = $_REQUEST['action'];

switch ($action){
  
    case 'demandeConnexion':{
        $categorie = new Categorie();
        $lesCategories = $categorie->chargerCategorie();
        include "vues/vueElementMenuConnexion.php";
        break;
    }   
    case 'valideConnexion':{
        if (isset ($_REQUEST['user']) && isset($_REQUEST['mdp']))
        {    
			// valeurs saisie par l'utilisateur dans le formulaire de la vue connexion
            $user=$_REQUEST['user'];
            $mdp=$_REQUEST['mdp'];
            
			//déclaration et instanciation d'un objet 
            $unUtilisateur = new Utilisateur();
			
			//recupere les valeurs de la fonction
            $resultat=$unUtilisateur->connexion($user);
            
			//teste entre les valeurs de la base et celles saisies par l'utilisateur
            if($resultat['identifiant']==$user && $mdp==$resultat['mdp'])
            {
                
                // cas ou l'utilisateur est admin
                if($resultat['idProfil']==1)
                {
                    
                   include"vues/vueElementMenuAdmin";
                }
				
				//cas ou l'utilisateur est normale
                else
                {
                    
                    include"vues/vueElementMenuMembre.php";
                }
                
            }

			else
			{
					//affichage d'un message d'erreur Java script
					echo '<script language="Javascript">alert (" Mauvais identifiant ou mauvais mot de passe " )</script>';
			}
			
			//si l'utilisateur à cliquer sur déconnexion
			case 'deconnexion':{
            
            session_destroy();
            header("Location: index.php");
        }
        break;
   
            }
        }       
        case 'deconnexion':{
            
            session_destroy();
            header("Location: index.php");
        }
        break;
}
?>
 