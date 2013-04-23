<html>
    <head>
        
        <meta charset="UTF-8">
        
    </head>
    <body>
        
    </body>
</html>
<?php

class Enchere {
	private $id;
	private $idObjet;
	private $idAcheteur;
	private $prix;
	
	
	
function getId () 
{
	return $this->id;
}

function getIdObjet() 
{
        return $this->idObjet;
}
function getIdAcheteur() 
{
        return $this->idAcheteur;
}
function getPrix() 
{
        return $this->prix;
}



 
 function lire_infos_enchere($id)
 {
        //connexion à la base de données
	$pdo = PDO2::getInstance();
        
        //requete
	$requete = $pdo->prepare("SELECT *
                                  FROM Enchere
                                  WHERE id = :id");

	$requete->bindValue(':id', $id);
	
	
	try{
            
            //execution de la requete
                $requete->execute();
                $ligne= $requete->fetch();
                return $ligne;
        }
        catch (Exception $e){
                    echo 'erreur. Impossible de recuperer l\'enchere'.$e;
                    return false;
        }   

	
 }
 
 //fonction qui donne les encheres pour un du nom d'un objet
function lire_infos_enchere_objet($nom)
 {

	$pdo = PDO2::getInstance();

	$requete = $pdo->prepare("SELECT * 
                                  FROM enchere
                                  INNER JOIN objet ON idObjet = objet.id
                                  WHERE objet.nom = nom:nom");

	$requete->bindValue(':nom', $nom);
	
	
	try{
                $requete->execute();
                $ligne= $requete->fetch();
                return $ligne;
        }
        catch (Exception $e){
                    echo 'erreur. Impossible de recuperer l\'enchere'.$e;
                    return false;
        }   

	
 }
 
 
 
 //ajout d'une enchere dans la bdd
 function ajouter_enchere_dans_bdd($idObjet,$idAcheteur,$prix) {

	$pdo = PDO2::getInstance();

	$requete = $pdo->prepare("INSERT INTO profil Values(                            null,
                                                                                        idObjet:idObjet
											idAcheteur:idAcheteur
											prix:prix
											
                                                            
                                                          
															
															
                                    )");
	
	$requete->bindValue(':idObjet', $idObjet);
	$requete->bindValue(':idAcheteur', $idAcheteur);
	$requete->bindValue(':prix', $prix);
	
	
	
        try{
                $requete->execute() ;
                $dernierId = $pdo->lastInsertId();
                return $dernierId;
        }
        catch (Exception $e){
                    echo 'erreur. Impossible d\'ajouter l\'enchere'.$e;
                    return false;
        }   
}

 
 //fonction qui donne toutes  les encheres pour le nom d'un objet
function Supprimer_enchere_objet($nom)
 {

	$pdo = PDO2::getInstance();

	$requete = $pdo->prepare("DELETE 
                                  FROM enchere
                                  INNER JOIN objet ON idObjet = objet.id
                                  WHERE objet.nom = nom:nom");

	$requete->bindValue(':nom', $nom);
	
	
	try{
                $requete->execute();
                $ligne= $requete->fetch();
                return $ligne;
        }
        catch (Exception $e){
                    echo 'erreur. Impossible de supprimer l\'enchere'.$e;
                    return false;
        }   

	
 }
 
 
 
 
}

?>