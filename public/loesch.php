<?php
require_once(__DIR__.'/../oben.php');

// Wenn kein Produkt ausgew�hlt wurde, oder
// das Produkt nicht im Warenkorb ist...
if (!isset($_GET['id']) ||
    !in_array($_GET['id'], $_SESSION['warenkorb'])) {

  print("Sie haben dieses Produkt noch nicht bestellt,
         oder kein Produkt ausgew&auml;hlt.");
}
else {
  foreach ($_SESSION['warenkorb'] as $id => $produkt) {
    if ($produkt == $_GET['id']) {
      unset($_SESSION['warenkorb'][$id]);
    }
  }
  print "<p>Das Produkt wurde aus dem Warenkorb gel&ouml;scht.</p>";
}
?>
<p><a href="korb.php">
	Zum Warenkorb</a></p>
  <p><a href="index.php">
    Zu den Produkten
  </a></p>
</div>
</body>
</html>
