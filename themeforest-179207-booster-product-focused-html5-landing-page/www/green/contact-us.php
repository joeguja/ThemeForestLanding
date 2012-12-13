<?php
/*
 * Booster v1.0 - simple email contact script
 * (c) Web factory Ltd
**/

/* Enter the email address on which you want to receive the contat form data
**/
  $myEmail = '';

/* Enter the subject of the email with contact form data
**/
  $emailSubject = 'New Booster form submission';

/**** DO NOT EDIT BELOW THIS LINE ****/
/**** DO NOT EDIT BELOW THIS LINE ****/
  ob_start();

  function response($responseStatus, $responseMsg) {
    $out = json_encode(array('responseStatus' => $responseStatus, 'responseMsg' => $responseMsg));

    ob_end_clean();
    die($out);
  }

  // only AJAX calls allowed
  if (!isset($_SERVER['X-Requested-With']) && !isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
    response('err', 'ajax');
  }

  // prepare headers
  $headers  = "MIME-Version: 1.0\n";
  $headers .= "Content-type: text/plain; charset=UTF-8\n";
  $headers .= "X-Mailer: PHP " . PHP_VERSION . "\n";
  $headers .= "From: {$myEmail}\n";
  $headers .= "Return-Path: {$myEmail}";
  
  // construct the message
  $tmp = date('r');
  $message = "The form was submited from {$_SERVER["HTTP_HOST"]} on $tmp by a person who's IP is: {$_SERVER['REMOTE_ADDR']}\n";
  foreach ($_POST as $field => $value) {
    $message .= $field . ': ' . $value . "\n";
  }
  $message .= "\nHave a good one!";
  
  
  if (@mail($myEmail, $emailSubject, $message, $headers)) {
    response('ok', 'sent');
  } else {
    response('err', 'notsent');
  }
  
  response('err', 'undefined');
?>