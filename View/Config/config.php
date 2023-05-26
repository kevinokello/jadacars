<?php
//session_start();
 session_start();

  define('SITEURL', 'http://localhost/jadacars/');

  define('LOCALHOST', 'localhost');
  define('ROOT', 'root');
  define('PASSWORD', '');
  define('DATABASE', 'jadacarsbd');
//define('SITEURL', 'http://carpoint.millerjuma.co.ke/');

//define('LOCALHOST', '127.0.0.1');
//define('ROOT', 'millerju_root');
//define('PASSWORD', 'Allowme@2023');
//define('DATABASE', 'millerju_jadacarsbd');

//  define('SITEURL', 'http://localhost/jadacars/');
//define('SITEURL', 'http://localhost:8000/');
//
//define('LOCALHOST', '127.0.0.1');
//define('ROOT', 'root');
//define('PASSWORD', 'Allowme@22');
//define('DATABASE', 'jadacarsbd');
//
define('PAYPAL_BASE_URL','https://api-m.sandbox.paypal.com/');
define('PAYPAL_CLIENT_ID','ARCD3SlLT5y7VSpWLe2SyW2_xAAmotrDUezTRDAXjvZCUfqcff8DJDT2hJNZWA5Ad0gndWOHCUje1eqQ');
define('PAYPAL_SECRET_KEY','EHt88Lpi-0qCT_wx7JIo2Brtjn1kCpCZQbTsSFxkWOpXfB_ACAtOB8kIq52V85MCFXircFGg0JjO6488');
//

$conn =  mysqli_connect(LOCALHOST, ROOT, PASSWORD, DATABASE) or die();
$db_select = mysqli_select_db($conn, DATABASE) or die();