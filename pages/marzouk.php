<?php if (!defined('INCLUDE_GUARD')) { header("HTTP/1.0 403 Forbidden"); die(); } ?>

<?php
  
$homepage = file_get_contents('http://web.mit.edu/aeroastro/people/marzouk.html');

$start = strpos($homepage, '<div id="divtext">');
$end = strpos($homepage, '</div>', $start);

$divtext = substr($homepage, $start, $end-$start) . '</div>';  

echo $divtext;
  
?>