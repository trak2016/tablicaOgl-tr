<?php
session_start();
class Logowanie {
    
   
    var $handle3;
//private $a = 10;
	function __construct($dbuser,$dbpass,$dbname,$dbhost){
		$this->handle3 = mysql_connect($dbhost,$dbuser,$dbpass) or die('zle dane do bazy');
		$tmp = mysql_select_db($dbname,$this->handle3) or die('zla baza danych');
               
	}

	function sprawdz_u($login,$haslo){
           
          $sql = "select * from uzytkownik where login = '$login'  and haslo= '$haslo'";
          
           $query= mysql_query($sql);
         $row=mysql_fetch_assoc($query);
         //echo ($row[id_u]);

       if ($row['haslo'] == $haslo){ $k="Witaj ".$login; 
      $_SESSION["id_u"]=$row['id_u'];
      $_SESSION["login"]=$row['login'];
               ;} else {$k= "blad logowania";}
          echo('<h3>');
          echo ($k);
          echo('</h3>');
$id_u=$row['id_u'];
return $id_u;
    }

    
function link(){   
    if (isset($_SESSION["id_u"])) {
            if ($_SESSION["id_u"] <> null) {
                return '<a href="index.php"> powrót do przeglądania ogłoszeń</a></br>
  <a href="indexOgloszeniaWlasne.php"> Edycja ogłoszeń</a></br><a href="Wyloguj.php">wyloguj</a> </br>
  <a href="indexZmienH.php"> zmiana hasła</a></br>
     <a href="IndexUsunUzytkownika.php">usuń</a> <h3>zalogowany  ' . $_SESSION["login"] . '</h3>';
    }}
            else {
                
       return ' <h2> logowanie</h2></br> <a href="index.php"> powrót do przeglądania ogłoszeń</a></br>
           <form action="indexLog.php?akcjaL=sprawdz_u" method="post">
 <label for="login">login</label>
 <input type="text" name="login" />
 <label for="haslo">hasło</label>
 <input type="password" name="haslo" />
 <input type="submit" value="Zaloguj" />
</form>  ';
                
            
        }
        // print_r ($_SESSION);
        }
 
	
	
	}

?>