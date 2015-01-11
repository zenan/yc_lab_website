<?php

$template = Template::getInstance();
$template->title = 'Publications';

?>

<h2>Journal Articles</h2>

<div id="articles-wrapper" class="clearfix">  
<div id="articles" class="articles">
<?php 
foreach ($articles as $index => $article) {
  echo render_article($index, $article);
}
?>
<p id="notfound" style="display:none"><strong>No articles found matching filter.</strong></p>
</div>
</div>
<div id="conferences-wrapper">
<div id="conferences">

<h2 id="refereed">Refereed Conference Publications</h2>
<?php
foreach ($conferences as $index => $conference) {
  echo render_conference($index, $conference);
}
?>
</div>
</div>

<div id="books-wrapper">
<div id="books">
<h2 id="books-and-chapters">Books and Book Chapters</h2>
<ol>
  <li>Frangos, M., Marzouk, Y.M., Willcox, K.E., van Bloemen Waanders, B. “Surrogate and reduced-order models for statistical inverse problems.” Chapter in Biegler, Biros, Ghattas, Heinkenschloss, Keyes, Mallick, Marzouk, Tenorio, van Bloemen Waanders, &amp; Willcox (eds.), Computational Methods for Large Scale Inverse Problems and Uncertainty Quantification, Wiley (2010).</li>
  <li>L. Biegler, G. Biros, O. Ghattas, M. Heinkenschloss, D. Keyes, B. Mallick, Y. Marzouk, L. Tenorio, B. van Bloemen Waanders, and K. Willcox, editors. <em>Computational Methods for Large Scale Inverse Problems and Uncertainty Quantification</em><em>. </em>Wiley (2010). </li>
</ol>

<h2 id="other-publications">Magazine Articles and Other Press</h2>
<ol>
  <li>Marzouk, Y.M., Willcox, K.E.,  &quot;Confronting energy and environment's toughest challenges with computational engineering.&quot; AeroAstro Magazine No. 7, 2009–2010. [<a href="http://web.mit.edu/aeroastro/news/magazine/aeroastro7/compu-engineering.html">link</a>]</li>
</ol>
</div>
</div>


<script type="text/javascript" src="/js/jquery.simplemodal.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    articlesAttachHover();
});
</script>
