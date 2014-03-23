<?php
error_reporting(-1);
// Start session, shopping cart is stored in session
session_name('shoppingcart');
session_start();

// Get the action that controlls what will happen
$action = empty($_GET['action']) ? null : $_GET['action'];


// Create the shopping cart in the session if it does not exists.
if ($action === 'clear' || !isset($_SESSION['cart'])) {
  $_SESSION['cart'] = array('sum'=> 0, 'numitems' => 0, 'items'=>array());    
}

// Include webshop content.
include('content.php');

// Action to add item in shopping cart
if ($action === 'add' && !empty($_POST['itemid'])) {
  $itemid = $_POST['itemid'];
  $price = $items[$itemid]['price'];
  $title = $items[$itemid]['title'];

  if(isset($_SESSION['cart']['items'][$itemid])) {
    $_SESSION['cart']['items'][$itemid]['numitems']++;
    $_SESSION['cart']['items'][$itemid]['sum'] += $price;
  } else {
    $_SESSION['cart']['items'][$itemid] = array('numitems' => 1, 'sum' => $price, 'title' => $title);
  }

  $_SESSION['cart']['numitems']++;
  $_SESSION['cart']['sum'] += $price;
}

// Draw html table of items  by using a view/template file
$items = $_SESSION['cart']['items'];

$rows = null;
foreach($items as $key => $val) {
  $rows .= "<tr><td class=\"title\">{$val['title']}</td><td>{$val['numitems']}</td><td>{$val['sum']} <span class=\"small\">SEK</span></td></tr>\n";
}

// Print out html code
$items = $_SESSION['cart']['content'] = <<<EOD
<table>
  <tr><th width="170px">Vara</th><th>Antal</th><th>Summa</th></tr>
  {$rows}
</table>
EOD;

// Print out the content of the shopping cart
echo json_encode($_SESSION['cart']);