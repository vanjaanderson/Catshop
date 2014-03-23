<?php
// Start session, shopping cart is stored in session
error_reporting(-1);

// Get the action that controlls what will happen
$action = empty($_GET['action']) ? null : $_GET['action'];

if($action === 'sum') {
  session_name('shoppingcart');
  session_start();
  echo json_encode( ( isset($_SESSION['cart']) ? $_SESSION['cart'] : array('sum'=>0) ) );
  exit;
}
else if($action === 'pay') {
  session_name('checkout-with-ajax');
  session_name('shoppingcart');
  session_start();
  
  include('form/catshop_form.php');

  // Fix that submit button is not included in form submit from JavaScript
  $_POST['doPay'] = true;
  $status = $form->Check();

  $output = "<p>Formuläret kunde inte skickas.</p>";
  $outputClass = 'error';
  $error = null;
  $payment = 0;
  if($status === true) {
    $payment = $form['payment']['value'];
    $output = "<p><strong>Betalningen lyckades.</strong> Tack för ditt köp, och välkommen åter!</p>";
    $outputClass = 'success';
  }
  else if($status === false){
    $output = "<p><strong>Formuläret innehåller felaktiga värden. Rätta till dessa och försök igen.</strong></p>";
    $error = $form->GetValidationErrors();
  }

  sleep(3);
  if(isset($_SESSION['cart'])) {
    //$_SESSION['cart']['sum'] = round(($_SESSION['cart']['sum'] - $payment) * 1.23, 2);
    $sum = $_SESSION['cart']['sum'];
  } else {
    $sum = 0;
  }

  echo json_encode(array('status' => $status, 'output' => $output, 'outputClass' => $outputClass, 'errors' => $error, 'sum' => $sum));
  exit;
}

echo "<p>Fyll i formuläret för att genomföra transaktionen.</p>"; 