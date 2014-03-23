<?php
// no error reporting
error_reporting(-1);
//session_start();
session_name('checkout-with-ajax');

// Include the personalized form, which uses CForm class.
include('form/catshop_form.php');
?>

<p class="cs">Följande summa kommer att belasta ditt kreditkort: <strong><span id='sum'></span> SEK</strong>.</p>
<!-- Div to output feedback -->
<div id='output'></div>
<!-- Show form in 2 column layout. Function in CForm class (CForm.php) -->
<?=$form->GetHTML(array('id' => 'form1', 'columns' => 2))?>
<button id="back" onclick="location.href='?p=default'">Tillbaka</button>