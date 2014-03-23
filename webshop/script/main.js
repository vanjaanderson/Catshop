/**
 * Place your JS-code here.
 */
$(document).ready(function(){
  'use strict';

  // Function to update shopping cart
  var updateCart = function(data) {
    $('#content').html(data.content);
    $('#numitems').html(data.numitems);
    $('#sum').html(data.sum);
    $('#status').html('Kundvagnen uppdaterad.');
    // Write in consol for each item        
    $.each(data.items, function(){
      console.log('item.');
    });
    // Fade status message in/out
    setTimeout(function(){
      $('#status').fadeOut(function(){
        $('#status').html('').fadeIn();
      });
    }, 1000);
    console.log('Shopping cart updated.');
  };

  // Init shopping cart
  var initCart = function() {
    $.ajax({
      type: 'post',
      url: 'webshop/shop.php',
      dataType: 'json',
      success: function(data){
        updateCart(data);
        console.log('Ajax request returned successfully. Shopping cart initiated.');    
      },
      error: function(jqXHR, textStatus, errorThrown){
        console.log('Ajax request failed: ' + textStatus + ', ' + errorThrown);    
      }
    });   
  };
  initCart();

  // Callback when making a purchase
  $('.purchase').click(function() {
    var id = $(this).attr('id');
    $.ajax({
      type: 'post',
      url: 'webshop/shop.php?action=add',
      data: {
        itemid: id
      },
      dataType: 'json',
      success: function(data){
        updateCart(data);
        console.log('Ajax request returned successfully.');    
      },
      error: function(jqXHR, textStatus, errorThrown){
        console.log('Ajax request failed: ' + textStatus + ', ' + errorThrown);    
      },
    });
    console.log('Clicked to buy id: ' + id)
  });

  // Callback to clear all values in shopping cart
  $("#clear").click(function() {
    $.ajax({
      type: 'post',
      url: 'webshop/shop.php?action=clear',
      dataType: 'json',
      success: function(data){
        updateCart(data);
        console.log('Ajax request returned successfully.');    
      },
      error: function(jqXHR, textStatus, errorThrown){
        console.log('Ajax request failed: ' + textStatus + ', ' + errorThrown);    
      },
    });
    console.log('Clearing shopping cart.')
  });
  console.log('Ready to roll.');

  /*
  * Checkout
  */
  // Get the sum from the shopping cart
  $.ajax({
    type: 'post',
    url: 'webshop/checkout_page.php?action=sum',
    dataType: 'json',
    success: function(data){
      $('#sum').html(data.sum);
      console.log('Ajax request returned successfully. Sum updated.');    
    },
    error: function(jqXHR, textStatus, errorThrown){
      console.log('Ajax request failed: ' + textStatus + ', ' + errorThrown);    
    }
  }); 

  /**
   * Check if form is valid
   *
   */
  var theForm = $('#form1');
  theForm.on('submit', function(event) {
    var formData = theForm.serialize();
    //formData.push({ name: 'doPay', value: true });

    console.log("Form: " + theForm.serialize());
    console.log('form submitted, preventing default event');
    event.preventDefault();

    $('#output').removeClass().addClass('working').html('<img src="webshop/images/loader.gif"/> <p>Betalning genomförs, stäng INTE ner eller uppdatera sidan...</p>');

    $.ajax({
      type: 'post',
      url: 'webshop/checkout_page.php?action=pay',
      data: theForm.serialize(),
      dataType: 'json',
      success: function(data){
        var errors = '';

        $.each(data.errors || [], function(index, error) {
          errors += '<p>' + error.label + ' ' + error.message + '</p>';
        });

        $('#output').removeClass().addClass(data.outputClass).html('<p>' + data.output + '</p>' + errors);
        $('#sum').html(data.sum);

        console.log('Ajax request returned successfully. ' + data);    
      },
      error: function(jqXHR, textStatus, errorThrown){
        console.log('Ajax request failed: ' + textStatus + ', ' + errorThrown);
        $('#output').removeClass().addClass('error').html('<p>Tyvärr, tekniska problem på servern, som vi jobbar med att lösa. Försök igen senare...</p>');
      }
    }); 
    console.log('Form submitted, lets wait for a response.');
  });
  console.log('Everything is ready.');  
});