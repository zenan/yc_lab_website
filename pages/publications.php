<?php
$template = Template::getInstance();
$template->title = 'Journal Publications';
$template->tab = 'Publications';
?>

<h2>Publications</h2>

<!--
<form id="publications-form">
  <table>
    <tr>
      <td><select id="select-year"><option value="">Year</option><optgroup label='-'></optgroup></select></td>
      <td><select id="select-author"><option value="">Author</option><optgroup label='-'></optgroup></select></td>
      <td><select id="select-journal"><option value="">Journal</option><optgroup label='-'></optgroup></select></td>
      <td><input type="text" id="input-keyword" value="Keyword" /></td>
      <td><a class="btn" onclick="resetFilters()">Reset</a></td>
    </tr>
  </table>
</form>
-->

<?php 

$categories = array(
  'Synthetic Biology and Biological Systems Engineering',
  'Cell-Based Immunotherapy Engineering'
);

echo '<ul class="bullets">';
for ($i = 0; $i < count($categories); $i++) {
  echo '<li><a href="#cat-' . $i .'">' . $categories[$i] .'</a></li>';
}
echo '</ul>';

$articles = json_decode(file_get_contents('json/articles.json'), true);

for ($i = 0; $i < count($categories); $i++) {
  $category = $categories[$i];
  echo '<h3 id="cat-'.$i.'">' . $category .'</h3>';
  echo '<div id="articles-wrapper" class="clearfix">';
  echo '<div id="articles" class="articles">';
  foreach ($articles as $index => $article) {
    if ($article['category'] == $category) {
      echo render_article($index, $article);
    }
  }
  echo '</div>';
  echo '</div>';
}
foreach ($categories as $category) {
  
}

?>
<p id="notfound" style="display:none"><strong>No articles found matching filter.</strong></p>



<script type="text/javascript" src="/js/jquery.simplemodal.js"></script>
<script type="text/javascript">
//<![CDATA[

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

function articleFilter() {
  
  var count = 0;
  
  var year = $('#select-year').val();
  var author = $('#select-author').val();
  var journal = $('#select-journal').val();
  var keyword = $('#input-keyword').val().toLowerCase();
  
  $.each(articles, function(index, article) {
    var selector = '#article-' + index;
    
    var allowed = true;    
    
    if (keyword != '' && keyword != 'keyword') {
      if (article.keywords == undefined) {
        allowed = false;
      } else if (article.keywords.toLowerCase().indexOf(keyword) != -1) { 
        allowed = true; 
      } else if (article.title.toLowerCase().indexOf(keyword) != -1) { 
        allowed = true; 
      } else if (article.journal.toLowerCase().indexOf(keyword) != -1) { 
        allowed = true; 
      } else {
        allowed = false;
      }
    } 
    
    if (year != '' && article.year.indexOf(year) == -1) { 
      allowed = false; 
    }
    if (author != '' && $.inArray(author, article.authors) == -1) {
      allowed = false; 
    }
    if (journal != '' && article.journal.indexOf(journal) == -1) { 
      allowed = false; 
    }

    
    if (allowed) {
      if (count == 0) {
        $('.articles').show();
        $('#notfound').hide();
      }
      $(selector).show();
      count = count + 1;
    } else {
      $(selector).hide();
    }
    
  });
  
  if (count == 0) {
    $('.articles').hide();
    $('#notfound').show();
  }
  
}

var articles = [];

$(document).ready(function() {
  
  $.getJSON('/json/articles.json', function(data) {
    articles = data;
    populateFilters(articles);
    articlesAttachHover();
    $("#publication-switcher-wrapper").height($('#articles').height() + 5);
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

  
  
});


//]]>
</script>
