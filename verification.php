<?php  session_start() ;
 
include ("fonctions_jp1.php");
include("connection_base.php");
$table="users";
echo'<!doctype html><html lang="fr"><head><meta charset="utf-8"><head> </head><body>';

//recuperation des données postées dans le formulaire initial

       if (isset($_POST['login']))
       {$login=$_POST['login']; 
       $login=strtolower($login);}
 
     
		
		
        if (isset($_POST['password']))
        {$password=$_POST['password']; 
        $password=strtolower($password);
        }
 echo" Valeurs postées <br>";
  
  echo $login,"<br>";
  echo $password,"<br>";
  
  
// ouverture de la base de données pour recuperation des données correspondant au login indiqué et verification du mot de passe 
   $sql= "SELECT * FROM $table WHERE login='$login' " ;
   echo $sql,"<br>";
   $res=mysqli_query($connect,$sql)or die (mysql_error());
     $tab=mysqli_fetch_array($res,MYSQL_ASSOC);
 
      $passtable = $tab['password'];
      $nom   =$tab['nom'];
      $prenom=$tab['prenom'];
     
 
/*
// verifications provisoires   
echo" Resultats de la table <br>";
      echo "Password soumis:",$password,"<br>";
      echo "Password table:",$passtable,"<br>";
     
      echo $nom,"<br>";
      echo $prenom,"<br>";
    
      

      
  // session de 10mn =600s    
    
      $maintenant=date("U");     
      $tempsinitial=$maintenant;
      $tempslimite=$maintenant+3600;   
         
 //echo "tempsinitial",$tempsinitial,"<br>";    
 
  
 //enregistrement des données de l'utilisateur comme variables de session         
      
    $_SESSION['tempsinitial']=$tempsinitial;
    $_SESSION['nom']=$nom;
    $_SESSION['prenom']=$prenom;
    $_SESSION['typeaut']=$typeaut;
    $_SESSION['region']=$region;
    $_SESSION['listeprogrammes']=$listeprogrammes;
  
    
  // echo " resultat entr&eacute;e ",$pass,"<br>";
  // echo " resultat table ",$passtable;
 
    // Verification du mot de passe et redirection en fonction du resultat
*/

   if($password==$passtable)
    
    {					  /*  
							echo"acceptation du mot de passe et validation d'une session de duree determinee";
							$sql="INSERT INTO session (IDSESSION,nom,prenom,tempslimite)
							values ('$tempsinitial','$nom','$prenom','$tempslimite')";
						 //   echo $sql,"<br>";
							$res=mysqli_query($sql)or die (mysql_error());
						*/	
	
		header("Location:accueil.php");
		exit;
    }   
 
        
   else {
		header("Location:refuse.php");
		exit;

        }
  echo'</body></html>';
?> 
     
     
     


