<div class="textMenu"> Chercher un objet : </div>
    <form action="index.php?useCase=listerLesCategories&action=listerLesCategories" method="post">
        <input type="text" name="intitule" placeholder="Que cherchez-vous ?"/> <br />
        <select>
            <?php 
            
            foreach ($lesCategories as $uneCategorie) 
                {
                   echo '<option value="'.$uneCategorie['id'].'">'.$uneCategorie['libelle'].'</option>';
                }
            ?>
        </select> <br />
        <input type="button" value="Rechercher"/>
    </form>