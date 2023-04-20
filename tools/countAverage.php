<?php
function vypocetPrumeru($poleCisel) {
  $celkovaSuma = 0;
  $pocetCisel = count($poleCisel);
  
  foreach($poleCisel as $cislo) {
    $celkovaSuma += $cislo;
  }
  
  $prumer = $celkovaSuma / $pocetCisel;
  return $prumer;
}

$cisla = array(12, 16, 18, 20, 24);

$prumer = vypocetPrumeru($cisla);
echo "Průměr čísel " . implode(", ", $cisla) . " je " . $prumer;
?>
