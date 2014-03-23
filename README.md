Catshop - Webshop managed in PHP, jQuery and AJAX
=================================================
This is an assignment with shopping cart and checkout page, created in the course "javascript" on Blekinge Tekniska Högskola (Blekinge Institute of Technology), Sweden.

Requirements
------------
To run this framework, you need a web server (Apache) with PHP version of 5.3 or higher. 

Instructions for installation
-----------------------------
1. Download framework from git hub: [https://github.com/vanjaanderson/Catshop](https://github.com/vanjaanderson/Catshop). Or clone it with command: `git clone git://github.com/vanjaanderson/Catshop.git` from your terminal.

2. You can use the whole package on your web server. Url to your catshop will then be `http://yourdomain.com/Catshop`. Otherwise, you put the content inside root directory directly on the webserver. 

3. To implement the Catshop in an existing website, open the index.php in root directory and copy the links and scripts in head-tag, to your own websites' head-tag. 
	<pre>
&lt;!-- Catshop links and scripts -->
	&lt;link rel="stylesheet" type="text/css" href="webshop/style/catshop.css">
	&lt;link rel="apple-touch-icon" href="webshop/images/apple-touch-icon.png" />
	&lt;link rel="shortcut icon"  href="webshop/images/favicon.ico" />
	&lt;script src="webshop/script/modernizr-2.7.1.js">&lt;/script>
	&lt;script src="webshop/script/jquery-1.11.0.js">&lt;/script>
	&lt;script src="webshop/script/main.js">&lt;/script>
	&lt;title>Catshop &copy; Vanja Anderson | http://vanjaanderson.com&lt;/title>
&lt;!-- End Catshop links and scripts--></pre>

	You place the catshop inside a div with id "catshop" anywhere on your site. Copy and paste the code, see below:
	<pre>
&lt;div id="catshop">
 	&lt;?php include('webshop/index.php'); ?>
&lt;/div></pre>

4. All books are gathered in the file content.php. Just continue with book 4 or create your own products.
	<pre>
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
					&lt;/p>&lt;p>Jackson Galaxy, star of Animal Planet\'s &lt;em>My Cat from Hell&lt;/em>, with Joel Derfner.', 
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
);</pre>

5. Enjoy!


To-Do
-----
* Implement MySql database.
* Printing HTML with Ajax instead of PHP.
* More to come...

Change Log
----------------
* v1.0 - 23 March 2014 - first release!