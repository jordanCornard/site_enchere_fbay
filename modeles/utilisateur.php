<?php

class Utilisateur {
	private $id;
	private $nom;
	private $prenom;
	private $idProfil;
	private $identifiant;
	private $mdp;
	private $email;
	
	
function getId () 
{
	return $this->id;
}

function getNom() 
{
        return $this->nom;
}
function getPrenom() 
{
        return $this->prenom;
}
function getIdProfil() 
{
        return $this->idProfil;
}
function getIdentifiant() 
{
        return $this->identifiant;
}
function getMdp() 
{
        return $this->mdp;
}
function getEmail() 
{
        return $this->email;
}


function lire_infos_utilisateur($id)
 {

	$pdo = PDO2::getInstance();

	$requete = $pdo->prepare("SELECT *
                                  FROM Utilisateur
                                  WHERE id = :id");

	$requete->bindValue(':id', $id);
	
	
	try{
                $requete->execute();
                $ligne= $requete->fetch();
                return $ligne;
        }
        catch (Exception $e){
                    echo 'erreur. Impossible de r�cup�rer l\'intitul�'.$e;
                    return false;
        }   

	
 }
	



function ajouter_utilisateur_dans_bdd($nom,$prenom,$idProfil,$identifiant,$mdp,$email) {

	$pdo = PDO2::getInstance();

	$requete = $pdo->prepare("INSERT INTO profil Values(
                                                                                        nom=:nom
											prenom=:prenom
											idProfil=:idProfil
											identifiant=:identifiant
											md=:mdp
											email=:email
                                                            
                                                          
															:nom
															:prenom
															:idProfil
															:identifiant
															:mdp
															:email
															
															
                                    )");
	$requete->bindValue(':id', $id);
	$requete->bindValue(':nom', $nom);
	$requete->bindValue(':prenom', $prenom);
	$requete->bindValue(':idProfil', $idProfil);
	$requete->bindValue(':identifiant', $identifiant);
	$requete->bindValue(':mdp', $mdp);
	$requete->bindValue(':email', $email);
	
	
        try{
                $requete->execute() ;
                $dernierId = $pdo->lastInsertId();
                return $dernierId;
        }
        catch (Exception $e){
                    echo 'erreur. Impossible d\'ajouter l\'utilisateur'.$e;
                    return false;
        }   
}



function modifier_profil_dans_bdd($nom,$prenom,$idProfil,$identifiant,$mdp,$email) {

	$pdo = PDO2::getInstance();

	$requete = $pdo->prepare("UPDATE profil SET
                                    		
											
											nom=:nom
											prenom=:prenom
											idProfil=:idProfil
											identifiant=:identifiant
											md=:mdp
											email=:email
                                		where idProfil=:id");

	$requete->bindValue(':intitule', $intitule);
	
        $requete->bindValue(':id', $id);
		$requete->bindValue(':nom', $nom);
		$requete->bindValue(':prenom', $prenom);
		$requete->bindValue(':idProfil', $idProfil);
		$requete->bindValue(':identifiant', $identifiant);
		$requete->bindValue(':mdp', $mdp);
		$requete->bindValue(':email', $email);

	try{
                $requete->execute();
               
        }
        catch (Exception $e){
                    echo 'erreur. Impossible de modifier l\'utilisateur'.$e;
                   
        }   
}

function supprimer_utilisateur_dans_bdd($id) {

	$pdo = PDO2::getInstance();

	$requete = $pdo->prepare("DELETE FROM profil 
                                  where id=:id");

	
        $requete->bindValue(':id', $id);

	try{
                $requete->execute();
                
        }
        catch (Exception $e){
                    echo 'erreur. Impossible de supprimer l utilisateur'.$e;
                    
        }   
}



function chargerUtilisateur() {

	$pdo = PDO2::getInstance();

	$requete = $pdo->prepare("SELECT * FROM utilisateur");
	
	$requete->execute();
        
        
        try{
                $requete->execute();
                $tab = $requete->fetchAll();
		$requete->closeCursor();
                return $tab;
        }
        catch (Exception $e){
                    echo 'erreur. Impossible de r�cup�rer les utilisateurs'.$e;
                    return false;
        }   


}
function connexion($user)
{
    $pdo = PDO2::getInstance();

	$requete = $pdo->prepare("SELECT identifiant,mdp,idProfil
                                  FROM Utilisateur
                                  WHERE identifiant = :identifiant");

	
        $requete->bindValue(':identifiant', $user);
	
	
	try{
                $requete->execute();
                $ligne= $requete->fetch();
                return $ligne;
        }
        catch (Exception $e){
                    echo 'erreur. Impossible '.$e;
                    return false;
        }  
   
}

 }

?>
