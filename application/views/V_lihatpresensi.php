<table class="table table-sm table-hover ml-4 mt-4 mr-4 mb-4">
  <?php
  $k = 1;
  $b = 1;
  foreach ($worksheet->getRowIterator() as $row) {
    $cellIterator = $row->getCellIterator();
    $cellIterator->setIterateOnlyExistingCells(false);

    if($b < 2) {
      // Header
      echo "<thead>";
      echo "<tr>";
      foreach ($cellIterator as $cell) { 
        echo "<th>". $cell->getValue() ."</th>"; 
        if($k++ >= $kolom) break;
      }
      echo "</tr>";
      echo "</thead>";
    } else {
      // Body
      echo "<tbody>";
      echo "<tr>";
      foreach ($cellIterator as $cell) { 
        echo "<td>". $cell->getFormattedValue() ."</td>"; 
        if($k++ >= $kolom) break;
      }
      echo "</tr>";
      echo "</tbody>";
    }
  
    $k = 1;
    if($b++ >= $baris) break;
  }
?>
</table>