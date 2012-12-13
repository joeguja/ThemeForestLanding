<?php
$apikey = 'Your API Key';
$listID = 'Your List';
 
if (isset($_POST['subscribe'])) {
	if (preg_match("(\w[-._\w]*\w@\w[-._\w]*\w\.\w{2,})", $_POST['email'])) {
		$email = $_POST['email'];
		//
		// process here the contact form data like name and message
		mail('your@mail.com', 'Subject: Example of Subscription', $_POST['some message here']); // example, replace with your own setting
		//
		if (!empty($_POST['newsletter'])) {
			$url = sprintf('http://api.mailchimp.com/1.2/?method=listSubscribe&apikey=%s&id=%s&email_address=%s&merge_vars[OPTINIP]=%s&merge_vars[MERGE1]=%s&output=json', $apikey, $listID, $email, $_SERVER['REMOTE_ADDR']);
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			$data = curl_exec($ch);
			curl_close($ch);
			$arr = json_decode($data, true);
			if ($arr == 1) {
				echo 'Check now your e-mail and confirm your subsciption.';
			} else {
				switch ($arr['code']) {
					case 214:
					echo 'You are already subscribed.';
					break;
					// check the MailChimp API for more options
					default:
					echo 'Unkown error...';
					break;			
				}
			}
		}
	}
}
?>