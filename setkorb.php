<?php
 include("oben.php");
 
 if(!isset($_GET['id'])){
    die("Kein Produkt wurde ausgew�hlt.");
 }
 if(!isset($_SESSION['warenkorb']) || !in_array($_GET['id'], $_SESSION['warenkorb'])) {
    
       $_SESSION['warenkorb'][]=$_GET['id'];
    
   }

?>
<p>Das Produkt wurde dem Warenkorb hinzugef�gt.</p>
 <a href="korb.php?<?php print SID; ?>">Zum W.Korb</a>
 <a href="index.php?<?php print SID; ?>">Zu den Produkten</a>
 </div>
</body>
</html>