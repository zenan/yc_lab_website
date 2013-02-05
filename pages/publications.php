<?php if (!defined('INCLUDE_GUARD')) { header("HTTP/1.0 403 Forbidden"); die(); } ?>

<div id="publication-switcher" class="clearfix">
  <h3 id="journal-publications" class="active">Journal Articles</h3>
  <h3 id="conference-publications">Conference Publications</h3>
  <h3 id="book-chapters">Books &amp; Other Press</h3>
</div>

<form id="publications-form">
  <table>
    <tr>
      <td>
        <select id="select-year">
          <option value="">Year</option>
          <optgroup label='-'>
          </optgroup>
        </select>
      </td>
      <td>
        <select id="select-author">
          <option value="">Author</option>
          <optgroup label='-'></optgroup>
        </select>
      </td>
      <td>
        <select id="select-journal">
          <option value="">Journal</option>
          <optgroup label='-'></optgroup>
        </select>
      </td>
      <td><input type="text" id="input-keyword" value="Keyword" /></td>
      <td><a class="btn" onclick="resetFilters()">Reset</a></td>
    </tr>
  </table>
</form>

<div id="publication-switcher-wrapper">
  
<div id="articles-wrapper" class="clearfix">  
  
<div id="articles" class="articles">
<?php
  
foreach ($publications['articles'] as $index => $article) {
  echo render_article($index, $article);
}
    
?>
  <p id="notfound" style="display:none"><strong>No articles found matching filter.</strong></p>
</div>

</div>

<div id="conferences-wrapper">
<div id="conferences">
<h4 id="refereed">Refereed Conference Publications</h4>
<ol>
  <li>Coles, T., Najm, H., Marzouk, Y.M. &ldquo;CSP simplification of chemical kinetic systems under uncertainty.&rdquo; International Workshop on Model Reduction in Reacting Flow/13th International Conference on Numerical Combustion. Corfu, Greece; 2011. [<a href="http://iwmrrf2011.ntua.gr/submission/iw013.pdf">link</a>]</li>
  <li>Lowry, N., Mangoubi, R., Desai, M., Marzouk, Y.M., Sammak, P. &ldquo;A unified approach to expectation maximization and level set segmentation applied to stem cell and brain MRI images.&rdquo; IEEE Symposium on Biomedical Imaging. Chicago, IL; 2011. [<a href="http://ieeexplore.ieee.org/xpls/abs_all.jsp?arnumber=5872672&amp;tag=1">link</a>]</li>
  <li>Huan, X., Marzouk, Y.M. &ldquo;Optimal Bayesian experimental design for combustion kinetics.&rdquo; 49th AIAA Aerospace Sciences Meeting. Orlando, FL;  2011. AIAA paper 2011–0513. [<a href="http://www.aiaa.org/content.cfm?pageid=413">link</a>]</li>
  <li>Debusschere, B., Rhoads, B., Najm, H. Marzouk, Y.M., Goussis, D., Valorani, M., Frenklach, M. &ldquo;Time integration of chemical kinetics with computational singular perturbation and tabulation.&rdquo; <em>Western States Section of the Combustion Institute</em>, <em>Fall Meeting, </em>Irvine, CA; 2009.</li>
  <li>Marzouk, Y.M., Debusschere, B., Najm, H., Goussis, D., Valorani, M., Frenklach, M. &ldquo;Time integration of reacting flows with CSP tabulation.&rdquo; <em>Second International Workshop on Model Reduction in Reacting Flows</em>, Notre Dame, IN; 2009.</li>
  <li>Najm, H.N., Safta, C., Marzouk, Y.M., Ray, J., Valorani, M., Goussis, D. &ldquo;High-order AMR computations of reacting flow with adaptive reduction of chemical stiffness.&rdquo; SciDAC 2008, Seattle, WA. Journal of Physics: Conference Series <strong>125</strong> (2008) 012032. [<a href="http://iopscience.iop.org/1742-6596/125/1/012032">link</a>]</li>
  <li>Ray, J., Marzouk, Y.M. &ldquo;A Bayesian method for inferring transmission chains in a partially observed epidemic.&rdquo; <em>Proceedings of the 2008 Joint Statistical Meetings</em>; Denver, CO; American Statistical Association (2008).</li>
  <li>Ray, J., Marzouk, Y.M., Najm, H.N., Kraus, M., Fast, P. &ldquo;Estimating bioterror attacks from patient data: a Bayesian approach.&rdquo; <em>RAND/ASA Conference on Quantitative Methods &amp; Statistical Applications in Defense and National Security</em>. Santa Monica, CA. 2006 Proceedings of the American Statistical Association.</li>
  <li>Marzouk, Y.M., Ghoniem, A.F. &ldquo;Actuating transverse jets via nozzle-edge vortical perturbations.&rdquo; <em>AIAA paper 2006-1492 </em>(2006). [<a href="http://www.aiaa.org/content.cfm?pageid=413">link</a>]</li>
  <li>Marzouk, Y.M., Najm, H.N., Rahn, L.A. &ldquo;Stochastic spectral methods for efficient Bayesian solution of inverse problems.&rdquo; <em>Bayesian Inference and Maximum Entropy Methods in Science and Engineering</em>. San Jose, CA. American Institute of Physics, CP803: 104–110 (2005). [<a href="http://link.aip.org/link/?APCPCS/803/104/1">link</a>]</li>
  <li>Speth, R.L., Marzouk, Y.M., Ghoniem, A.F. &ldquo;A quasi-one-dimensional unsteady laminar flame formulation with independent strain rate and curvature.&rdquo; <em>Third MIT Conference on Computational Fluid and Solid Mechanics, </em>K.J. Bathe, ed., Elsevier (2005).</li>
  <li>Marzouk, Y.M., Ghoniem, A.F. &ldquo;Simulations of high Reynolds number transverse jets and analysis of the underlying vortical structures.&rdquo; <em>AIAA paper 2005-0308. Invited session </em>(2005).</li>
  <li>Wee, D.H., Marzouk, Y.M., Ghoniem, A.F. &ldquo;Lagrangian simulation of a jet in crossflow at finite Reynolds number.&rdquo; <em>AIAA paper 2005-0291 </em>(2005). [<a href="http://www.aiaa.org/content.cfm?pageid=413">link</a>]</li>
  <li>Speth, R.L., Marzouk, Y.M., Ghoniem, A.F. &ldquo;Impact of hydrogen addition on flame response to stretch and curvature.&rdquo;<em> AIAA paper 2005-0143</em> (2005). [<a href="http://www.aiaa.org/content.cfm?pageid=413">link</a>]</li>
  <li>Marzouk, Y.M., Ghoniem, A.F. &ldquo;Vorticity formulation for an actuated jet in crossflow.&rdquo; <em>AIAA paper 2004-0094</em> (2004). [<a href="http://www.aiaa.org/content.cfm?pageid=413">link</a>]</li>
  <li>Marzouk, Y.M., Ghoniem, A.F. &ldquo;Vorticity generation mechanisms and correct boundary conditions for transverse jet simulation.&rdquo; <em>Proceedings of the Second MIT Conference on Computational Fluid and Solid Mechanics</em>, K. J. Bathe, ed., Elsevier (2003).</li>
  <li>Marzouk, Y.M., Ghoniem, A.F. &ldquo;Mechanism of streamwise vorticity formation in a transverse jet.&rdquo; <em>AIAA paper 2002-1063 </em>(2002). [<a href="http://www.aiaa.org/content.cfm?pageid=413">link</a>]</li>
  <li>Marzouk, Y.M., Ghoniem, A.F., Najm, H.N. &ldquo;Can a one-dimensional strained flame model flame-vortex interactions?&rdquo; <em>Proceedings of the Second Mediterranean Combustion Symposium:</em> 372–383 (2002).</li>
  <li>Marzouk, Y.M., Ghoniem, A.F., Najm, H.N. &ldquo;A flame embedding model for turbulent combustion simulation.&rdquo; <em>AIAA paper 2000-0866</em> (2000). [<a href="http://www.aiaa.org/content.cfm?pageid=413">link</a>]</li>
</ol>
</div>
</div>


<div id="books-wrapper">
<div id="books">
<h4 id="books-and-chapters">Books and Book Chapters</h4>
<ol>
  <li>Frangos, M., Marzouk, Y.M., Willcox, K.E., van Bloemen Waanders, B. “Surrogate and reduced-order models for statistical inverse problems.” Chapter in Biegler, Biros, Ghattas, Heinkenschloss, Keyes, Mallick, Marzouk, Tenorio, van Bloemen Waanders, &amp; Willcox (eds.), Computational Methods for Large Scale Inverse Problems and Uncertainty Quantification, Wiley (2010).</li>
  <li>L. Biegler, G. Biros, O. Ghattas, M. Heinkenschloss, D. Keyes, B. Mallick, Y. Marzouk, L. Tenorio, B. van Bloemen Waanders, and K. Willcox, editors. <em>Computational Methods for Large Scale Inverse Problems and Uncertainty Quantification</em><em>. </em>Wiley (2010). </li>
</ol>
<h4 id="other-publications">Magazine Articles and Other Press</h4>
<ol>
  <li>Marzouk, Y.M., Willcox, K.E.,  &quot;Confronting energy and environment's toughest challenges with computational engineering.&quot; AeroAstro Magazine No. 7, 2009–2010. [<a href="http://web.mit.edu/aeroastro/news/magazine/aeroastro7/compu-engineering.html">link</a>]</li>
</ol>
</div>
</div>

</div>

<div id="other">
</div>

<script type="text/javascript">
//<![CDATA[

function copyToClipboard (selector) {
  window.prompt ("Copy to clipboard: Ctrl+C, Enter", $(selector).html());
}

function populateFilters(articles) {
  
  var d = new Date();
  var options = [];    
  for (var year = d.getFullYear(); year >= 1998; year--) {
    options.push('<option class="year" value="' + year + '">' + year + '</option>');
  }
  $('#select-year').append(options);
  
  var hash = {};
  var authors = []; 
  $.each(articles, function(key, article) {
    $.each(article.authors, function(key, val) {
      if (!hash.hasOwnProperty(val)) {
        hash[val] = true;
        authors.push(val);
      }
    });    
  });
  authors.sort();
  options = [];
  $.each(authors, function(key, val) {
    options.push('<option class="author" value="' + val + '">' + val + '</option>');
  });
  $('#select-author').append(options);

  hash = {};
  var journals = []; 
  $.each(articles, function(key, article) {
    if (!hash.hasOwnProperty(article.journal)) {
      hash[article.journal] = true;
      journals.push(article.journal);
    }   
  });
  journals.sort();
  options = [];
  $.each(journals, function(key, val) {
    options.push('<option value="' + val + '">' + val + '</option>');
  });
  $('#select-journal').append(options);
}

function resetFilters() {
  $('select').val('');
  $('input').val('Keyword');
  articleFilter();
}

function switchPane(header, left1, left2, left3, maxheight) {
  $('#publication-switcher h3').removeClass('active');
  $(header).addClass('active');
  $('#articles-wrapper').stop().animate({'left':left1}, 300);
  $('#conferences-wrapper').stop().animate({'left':left2}, 300);
  $('#books-wrapper').stop().animate({'left':left3}, 300);
  $("#publication-switcher-wrapper").height(maxheight);
  if (left1 == '0em') {
    $('#select-journal').removeAttr('disabled').removeClass('disabled');
  } else {
    $('#select-journal').attr('disabled', 'disabled').addClass('disabled');
  }
}

var articles = [];

$(document).ready(function() {
  
  $.getJSON('json/publications.json', function(data) {
    articles = data.articles; 
    populateFilters(articles);
    articlesAttachHover();
    $("#publication-switcher-wrapper").height($('#articles').height() + 30);
  });
    
  $("#publications-form select").change(function () {
    articleFilter();
  });
    
  $("#input-keyword").keyup(function (e) {
    articleFilter();
  });
    
  $("#input-keyword").blur(function () {
    if ($(this).val() == '') $(this).val('Keyword')
  });
    
  $("#input-keyword").focus(function () {
    if ($(this).val() == 'Keyword') $(this).val('');
  });
  
  $("#journal-publications").click(function() {
    switchPane($(this), '0em', '50em', '100em', $('#articles').height());
  });
  
  $("#conference-publications").click(function() {
    switchPane($(this), '-50em', '0em', '50em', $('#conferences').height());
  });
  
  $("#book-chapters").click(function() {
    switchPane($(this), '-100em', '-50em', '0em', $('#books').height());
  });
  
  
});


//]]>
</script>


