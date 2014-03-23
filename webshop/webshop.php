<?php
// The webshops content in a separate file, could optionally be stored in database.
include('content.php');

// Store items in variable. Data from content.php.
$books = null;
foreach($items as $key => $val) {
  $books .= "<tr><td><img src=\"{$val['url']}\" class=\"shadow\" /></td><td class=\"infocell\"><h4 class=\"cs\">{$val['title']}</h4><p class=\"author\">{$val['author']}</p>
  <div class=\"textbox\"><p>{$val['text']}</p></div><p class=\"price\">{$val['price']} <span class=\"unit\">SEK</span></p><button id=\"{$val['id']}\" class=\"purchase\">Köp</button></td></tr>\n";
}
?>
  
<!-- Shopping cart div -->
<div id='cart'>
  <img class="cart" src="webshop/images/cart.png" width="60px"><h2 class="cart">Kundvagn</h2>

  <!-- div#content will hold shopping cart json data. -->
  <div id='content'></div>

  <p id="numbox">Varor i kundvagnen: <span id="numitems">0</span></p>
  <p id="sumbox"><strong>Totalt: <span id="sum">0</span> SEK</strong></p>
  <input id="clear" type="button" value="Töm" />  <span id="status">Kundvagnen är tom.</span>
  <input id="pay" class="buy" type="button" value="Till kassan" onclick="location.href='?page=checkout'" />
</div>

<!-- Finally show variable data, books in html. -->
<table>
  <?=$books;?>
</table>