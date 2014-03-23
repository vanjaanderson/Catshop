<?php
error_reporting(-1);

$heading = null;
$p = null;
$file = null;

date_default_timezone_set('Europe/Stockholm');

if(isset($_GET["page"])) { $p = $_GET["page"]; }

switch($p) {
  case "checkout": {  $heading = "CATSHOP &bull; kassa";     				  $file = "checkout.php"; } break;
  default: {          $heading = "CATSHOP &bull; bokshopen för kattälskare";  $file = "webshop.php"; }
}
?>

<h1 class="cs"><?=$heading;?></h1>

<?php include($file); ?>

<footer class="cs"><p>Copyright &copy; <?=date('Y');?> <strong>Catshop</strong> designed and powered by <a class="cs" href="http://vanjaanderson.com" target="_blank">Vanja Anderson</a></p></footer>

<!-- Change page title to fit page heading-->
<script>
  $('title').html('<?=$heading?>');
</script>