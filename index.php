<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" type="text/css" href="styles/style.css"/>

    <body>
           <?php
		   
	// variable de sessions
    session_start();
	
	//appelle de pages
    include "global/config.php";
    include "vues/vueHeader.php";
    
    //test du $_Request
    if (!isset($_REQUEST['useCase']))
    {     
        $_REQUEST['useCase'] = 'gererConnexion'; 
    }
    
    $useCase = $_REQUEST['useCase'];
	
	//choix
    switch ($useCase){
        case 'gererConnexion':{
            include "controleurs/controleurConnexion.php";
            break;
            }
            //lol
        case 'gererObjets':{
            include "controleurs/controleurObjet.php";
            break;
        }
    }
    
    include "vues/vueFooter.php";

    ?>
    </body>
</html>