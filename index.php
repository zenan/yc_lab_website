<?php 

$p = (isset($_GET['p']) && !empty($_GET['p'])) ? $_GET['p'] : 'home';

$t = array();

$page = 'pages/' . $p . '.html';
if (file_exists($page)) {
  $t['content']  = file_get_contents($page);
  $t['title'] = $p;
} else {
  header('HTTP/1.0 404 Not Found');
  $t['content'] = '<h2>Error 404: Page Not Found</h2>';
  $t['title'] = 'Error 404';
}
  
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>UQGroup - <?=$t['title'];?></title>
  <link rel="shortcut icon" href="favicon.ico" />   
  <link href="css/screen.css" rel="stylesheet" type="text/css" media="screen" />
  <link href='http://fonts.googleapis.com/css?family=Titillium+Web:300' rel='stylesheet' type='text/css'>
  <link href="http://netdna.bootstrapcdn.com/font-awesome/3.0/css/font-awesome.css"  rel="stylesheet" type="text/css" />
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script type="text/javascript" src="http://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS-MML_HTMLorMML"></script>
</head>
<body id="top">
<div id="header-wrap">
  <div id="header" class="clearfix">
    <!--
    <div id="mitlogo">
      <a href="http://mit.edu"><img src="images/mitlogo.png" alt="mitlogo" /></a>
    </div>
    -->
    <div id="title">
      <h1><a href="home">Uncertainty Quantification Group</a></h1>
      <h2><a href="http://mit.edu">Massuchusetts Institute of Technology</a></h2>
    </div>
  </div> <!-- div#header -->
</div> <!-- div#header-wrap -->
<div id="nav-wrap" class="clearfix">
  <div id="nav" class="clearfix">
    <ul id="navbar">
<?php

$tabs = array(
  'home' => '<i class="icon-home"></i>',
  'people' => 'People',
  'research' => 'Research',
  'publications' => 'Publications',
  'software' => 'Software',
  'teaching' => 'Teaching',
  'contact' => 'Contact');

foreach ($tabs as $href => $text) {
  $active = ($p == $href) ? ' class="active"' : ''; 
  printf("      <li><a href=\"%s\"%s>%s</a></li>\n", $href, $active, $text);
}

?>
    
    <a class="totop" onclick="$('html, body').animate({scrollTop:0}, 500);">
      <i class="icon-circle-arrow-up"></i>
    </a>
    </ul>
  </div> <!-- div#nav -->
</div> <!-- div#nav-wrap -->
<div id="content-wrap" class="clearfix">
  <div id="sidebar-wrap">
    <div id="sidebar">
      <div class="sidebar-box">
        <a class="sidebar-collapse-btn"><i class="icon-minus"></i></a>
        <h2>News</h2>
        <div class="sidebar-content">
          <p><strong>Jan. 31</strong>
          Congratulations to Alessio, Andrew, and Naveen for passing their PhD qualifying exams!</p>
          <p><strong>Dec. 2012</strong>
          Prof. Marzouk becomes the director of the Aerospace Computational Design Laboratory.</p>
        </div>
      </div>
      <div class="sidebar-box">
        <a class="sidebar-collapse-btn"><i class="icon-minus"></i></a>
        <h2>Upcoming Events</h2>
        <div class="sidebar-content">
          <p><strong>Feb 8, 2013</strong><br /> 
            <a href="http://www.google.com/calendar/event?action=TEMPLATE&text=UQ%20Reading%20Group&dates=20130208T220000Z/20130208T233000Z&details=&location=&trp=true&sprop=&sprop=name:" target="_blank">
              <i class="icon-calendar"></i>
            </a>
            UQ Reading Group 5pm</p>
          <p><strong>Feb 25 - Mar 1</strong><br />
            SIAM CSE Conference, Boston
          <a href="http://www.siam.org/meetings/cse13/" target="_new"><i class="icon-external-link"></i></a>
            </p>
          <p><strong>Apr 2 - Apr 5</strong><br />
            SIAM UQ Conference, Raleigh
          <a href="http://www.siam.org/meetings/uq12/" target="_new"><i class="icon-external-link"></i></a>
            </p>
        </div>
      </div>    
      <div class="sidebar-box">
        <a class="sidebar-collapse-btn"><i class="icon-minus"></i></a>
        <h2>Links</h2>
        <div class="sidebar-content">
          <ul class="links">
            <li><a href="https://wikis.mit.edu/confluence/display/uqlab/Home" target="_new">Lab Wiki</a> <i class="icon-lock"></i></li>
            <li><a href="https://wikis.mit.edu/confluence/display/uqgroup/Home" target="_new">Reading Group Wiki</a> <i class="icon-lock"></i></li>
          </ul>
        </div>
      </div>    
    </div> <!-- div#sidebar -->
  </div> <!-- div#sidebar-wrap -->
<div id="content" class="column">
<?php
echo $t['content'];
?>
</div>
</div>
<div id="footer-wrap">
<div id="footer">
  <ul class="logos">
    <li><a href="http://mit.edu" target="_new"><img src="images/mitlogo.png" alt="mit" /></a></li>
    <li><a href="http://aeroastro.mit.edu" target="_new"><img src="images/aeroastro.png" alt="aeroastro" /></a></li>
    <li><a href="http://acdl.mit.edu" style="opacity:0.5" target="_new"><img src="images/acdl.png" alt="acdl"  /></a></li>
    <li><a href="http://computationalengineering.mit.edu" target="_new"><img src="images/cce.png" alt="cce" /></a></li>
  </ul>
  <br style="clear: both;" />
  <div class="designed-by">
    Site designed and maintained by <a href="http://chifeng.scripts.mit.edu">Chi Feng</a>
  </div>
  <div class="copyright">
    Copyright &copy;2013, MIT Uncertainty Quantification Group
  </div>
</div>
</div>
<script type="text/x-mathjax-config">
MathJax.Hub.Config({ tex2jax: {inlineMath: [['$','$'], ['\\(','\\)']]} });
</script>
<script type="text/javascript" src="js/uqgroup.js"></script>
</body>
</html>