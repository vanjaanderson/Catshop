<?php
// Path to images directory
$path = 'webshop/images/books/';
// Define the books in the bookshop
$items = array(
  'book1' => array(	
  					'id'     => 'book1',
  					'title'  => 'The Cat Whisperer',
  					'author' => 'Mieshelle Nagelschneider', 
  					'text'   => 'Why cats do what they do &mdash; and how to get them to do what YOU want.', 
  					'price'  => '499',
  					'url'    => $path . 'book1.jpg'
  				  ),
  'book2' => array(	
  					'id'     => 'book2',
  					'title'  => 'Cat Daddy',
  					'author' => 'Jackson Galaxy / Joel Derfner',           
  					'text'   => 'What the world\'s most incorrigible cat tought me about life, love and coming clean. 
                         </p><p>Jackson Galaxy, star of Animal Planet\'s <em>My Cat from Hell</em>, with Joel Derfner.', 
  					'price'  => '299',
  					'url'    => $path . 'book2.jpg'
  				  ),
  'book3' => array(	
  					'id'     => 'book3',
  					'title'  => 'Psycho Kitty',
  					'author' => 'Pam Johnson-Bennet',       
  					'text'   => 'Tips for solving your cat\'s behavior.',
  					'price'  => '389',
  					'url'    => $path . 'book3.jpg'
  				  ),
);
?>