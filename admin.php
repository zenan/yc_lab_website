<?php 

date_default_timezone_set('America/New_York');

define('INCLUDE_GUARD', true);

require_once('includes/orm.php');

$client_name = $_SERVER["SSL_CLIENT_S_DN_CN"];
$remote_addr = $_SERVER["REMOTE_ADDR"];
$ssl_verify = $_SERVER["SSL_CLIENT_VERIFY"];

if ($ssl_verify != "SUCCESS") {
  die ('SSL verification failed');
}

$t = array(); 

if (isset($_GET['view_announcements'])) {
  $announcement = new Announcement(array());
  $t['content'] .= $announcement->viewall();
  finish();
}
if (isset($_GET['create_announcement'])) {
  $announcement = new Announcement(array('date'=>date('M j, Y')));
  $t['content'] .= $announcement->create();
  finish();
}
if (isset($_GET['edit_announcement'])) {
  $announcement = new Announcement('id', $_REQUEST['id']);
  $t['content'] .= $announcement->edit();
  finish();
}
if (isset($_POST['update_announcement'])) {
  $announcement = new Announcement('post');
  $announcement->update('id', $_REQUEST['id']);
  header('Location: admin.php?view_announcements');
}
if (isset($_POST['insert_announcement'])) {
  $announcement = new Announcement('post');
  $announcement->insert_front();
  header('Location: admin.php?view_announcements');
}
if (isset($_REQUEST['delete_announcement'])) {
  $announcement = new Announcement(array());
  $announcement->delete('id', $_REQUEST['id']);
  header('Location: admin.php?view_announcements');
}

if (isset($_GET['view_articles'])) {
  $article = new Article(array());
  $t['content'] .= $article->viewall();
  finish();
}
if (isset($_GET['create_article'])) {
  $article = new Article(array());
  $article->set('order', $article->get_max_order()+1);
  $t['content'] .= $article->create();
  finish();
}
if (isset($_GET['edit_article'])) {
  $article = new Article('id', $_REQUEST['id']);
  $t['content'] .= $article->edit();
  finish();
}
if (isset($_POST['update_article'])) {
  $article = new Article('post');
  $article->update('id', $_REQUEST['id']);
  header('Location: admin.php?view_articles');
  die();
}
if (isset($_POST['insert_article'])) {
  $article = new Article('post');
  $article->insert_front();
  header('Location: admin.php?view_articles');
}
if (isset($_REQUEST['delete_article'])) {
  $article = new Article(array());
  $article->delete('id', $_REQUEST['id']);
  header('Location: admin.php?view_articles');
}
if (isset($_REQUEST['sort_articles'])) { 
  $article = new Article(array());
  $article->sort('descending');
  header('Location: admin.php?view_articles');
}


if (isset($_GET['view_conferences'])) {
  $conference = new Conference(array());
  $t['content'] .= $conference->viewall();
  finish();
}
if (isset($_GET['create_conference'])) {
  $conference = new Conference(array());
  $conference->set('order', $conference->get_max_order()+1);
  $t['content'] .= $conference->create();
  finish();
}
if (isset($_GET['edit_conference'])) {
  $conference = new Conference('id', $_REQUEST['id']);
  $t['content'] .= $conference->edit();
  finish();
}
if (isset($_POST['update_conference'])) {
  $conference = new Conference('post');
  $conference->update('id', $_REQUEST['id']);
  header('Location: admin.php?view_conferences');
  die();
}
if (isset($_POST['insert_conference'])) {
  $conference = new Conference('post');
  $conference->insert_front();
  header('Location: admin.php?view_conferences');
}
if (isset($_REQUEST['delete_conference'])) {
  $conference = new Conference(array());
  $conference->delete('id', $_REQUEST['id']);
  header('Location: admin.php?view_conferences');
}
if (isset($_REQUEST['sort_conferences'])) { 
  $conference = new Conference(array());
  $conference->sort('descending');
  header('Location: admin.php?view_conferences');
}


if (isset($_GET['view_events'])) {
  $event = new Event(array());
  $t['content'] .= $event->viewall();
  finish();
}
if (isset($_GET['create_event'])) {
  $event = new Event(array());
  $event->set('start_date', date('M d, Y'));
  $event->set('end_date', date('M d, Y'));
  $t['content'] .= $event->create();
  finish();
}
if (isset($_GET['edit_event'])) {
  $event = new Event('id', $_REQUEST['id']);
  $t['content'] .= $event->edit();
  finish();
}
if (isset($_POST['update_event'])) {
  $event = new Event('post');
  $event->update('id', $_REQUEST['id']);
  header('Location: admin.php?view_events');
}
if (isset($_POST['insert_event'])) {
  $event = new Event('post');
  $event->insert_front();
  header('Location: admin.php?view_events');
}
if (isset($_REQUEST['delete_event'])) {
  $event = new Event(array());
  $event->delete('id', $_REQUEST['id']);
  header('Location: admin.php?view_events');
}
if (isset($_REQUEST['sort_events'])) { 
  $event = new Event(array());
  $event->sort('ascending');
  header('Location: admin.php?view_events');
}

dashboard();

function dashboard() {
  global $t;
  $json_files = glob('json/*.json');
  $t['content'] .= '<h2>Administration Dashboard</h2>';
  $t['content'] .= '<div class="col-2-2">';
  $t['content'] .= '<h3>JSON Permissions</h3>';
  $t['content'] .= '<table class="status json-status">';
  $t['content'] .= '<tr><th>File</th><th>Perms</th><th>Read</th><th>Write</th></tr>';
  foreach (glob('json/*.json') as $file) {
    $readable = (is_readable($file)) ? '<td class="green"><i class="icon-ok"></i></td>' : '<td class="red"><i class="icon-remove"></i></td>';
    $writable = (is_writable($file)) ? '<td class="green"><i class="icon-ok"></i></td>' : '<td class="red"><i class="icon-remove"></i></td>';
    $perms = substr(sprintf('%o', fileperms($file)), -4);
    if ($perms != '0777') {
      $perms = '<td class="red"><i class="icon-warning-sign"></i> '.$perms.'</td>';
    } else {
      $perms = '<td class="green">'.$perms.'</td>';
    }
    $t['content'] .= sprintf('<tr><td>%s</td>%s%s%s</tr>',
      $file, $perms,$readable, $writable);
  }
  $t['content'] .= '</table>';
  $t['content'] .= '</div>';
  $t['content'] .= '<div class="col-1-2">';
  $t['content'] .= '<h3>Page Status</h3>';
  $t['content'] .= '<table class="status page-status">';
  $t['content'] .= '<tr><th>File</th><th>Page</th><th>Exists</th></tr>';
  foreach (json_decode(file_get_contents('json/pages.json'), true) as $page => $details) {
    $file = "pages/$page.php";
    $title = $details['title'];
    $exists = file_exists("pages/$page.php") ? '<td class="green"><i class="icon-ok"></i></td>' : '<td class="red"><i class="icon-remove"></i></td>';
    $t['content'] .= sprintf('<tr><td>%s</td><td>%s</td>%s</tr>',
      $file, $title, $exists);
  }
  $t['content'] .= '</table>';
  $t['content'] .= '</div><br style="clear: both;" />';
  $t['content'] .= '<h3>Quick Links</h3>';
  $t['content'] .= '<ul class="links"><li><a href="https://www.google.com/analytics/web/?hl=en&pli=1#report/visitors-overview/a38300402w66904103p68823002/">Google Analytics</a></li>';
  $t['content'] .= '<li><a href="https://github.com/chi-feng/uqgroup-website">GitHub Repository</a></li></ul>';
}

function finish() {
  include('includes/admin_template.php');
  die();
}


finish();

?>
