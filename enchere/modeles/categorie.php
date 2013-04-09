<?php
class Categorie {
	private $id;
	private $libelle;
        
function getId () {
	return $this->id;
}

function getLibelle() {
        return $this->libelle;
}

function lire_infos_categorie($id) {

	$pdo = PDO2::getInstance();

	$requete = $pdo->prepare("SELECT libelle
                                  FROM categorie
                                  WHERE id = :id");

	$requete->bindValue(':id', $id);
	
	
	try{
                $requete->execute();
                $ligne= $requete->fetch();
                return $ligne['libelle'];
        }
        catch (Exception $e){
                    echo 'erreur. Impossible de récupérer le libelle'.$e;
                    return false;
        }   
}

function ajouter_categorie_dans_bdd($libelle) {

	$pdo = PDO2::getInstance();

	$requete = $pdo->prepare("INSERT INTO profil Values(
                                                            null,
                                                            :libelle
                                    )");
	$requete->bindValue(':libelle', $libelle);
	
	
        try{
                $requete->execute() ;
                $dernierId = $pdo->lastInsertId();
                return $dernierId;
        }
        catch (Exception $e){
                    echo 'erreur. Impossible d\'ajouter le libelle'.$e;
                    return false;
        }   
}

function modifier_categorie_dans_bdd($libelle,$id) {

	$pdo = PDO2::getInstance();

	$requete = $pdo->prepare("UPDATE categorie SET
                                    		libelle=:libelle
                                		where id=:id");

	$requete->bindValue(':libelle', $libelle);
	
        $requete->bindValue(':id', $id);

	try{
                $requete->execute();
               
        }
        catch (Exception $e){
                    echo 'erreur. Impossible de modifier le libelle'.$e;
                   
        }   
}
function supprimer_categorie_dans_bdd($id) {

	$pdo = PDO2::getInstance();

	$requete = $pdo->prepare("DELETE FROM categorie 
                                  where id=:id");

	
        $requete->bindValue(':id', $id);

	try{
                $requete->execute();
                
        }
        catch (Exception $e){
                    echo 'erreur. Impossible de supprimer la categorie'.$e;
                    
        }   
}
function chargerCategorie() {

	$pdo = PDO2::getInstance();

	$requete = $pdo->prepare("SELECT id,libelle FROM categorie");
	
	$requete->execute();
        
        
        try{
                $requete->execute();
                $tab = $requete->fetchAll();
		$requete->closeCursor();
                return $tab;
        }
        catch (Exception $e){
                    echo 'erreur. Impossible de récupérer les categories'.$e;
                    return false;
        }   
	
}
}
?>
