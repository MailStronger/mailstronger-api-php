# MailStronger Php Library

This is the documentation for the MailStronger Php Client.

#Installation and Quickstart

You will need to have a USER_ID and a USER_KEY MailStronger.

You will have to create a Contact List with ListCreate or in MailStronger manager.

After you have create a account on MailStronger and Install the library on your server, you can start to test with this little script.
```php
<?php

include_once('mailstronger.php');

/** This will initiate the API with the endpoint and your access key.  **/

$mailstronger = new MailStronger('https://api.mailstronger.net','USER_ID','USER_KEY');

/** EmailSend : Send a email with mandatory parameters **/ 

$data = array (

"to" => array ("to@email.net" => "Test"),
"from" => "marco@polo.com",
"from_name" => "Marco",
"subject" => "My first message",
"reply_to" => array ("reply-to@site.net" => "Reply-to"),
"html_content" => "<html><body>my first <b>test html</b></body></html>",
"text_content" =>"",
"pool_name" => "",
"list_id" => list_id,
"attached_files" =>  array ("http://www.monsite.com/1.pdf")

);
var_dump ($mailstronger->EmailSend($data));

?>
```
# Functions

List of all functions available :

* API
* ApiConnect
* UserInfo
* ListList
* ListInfo($list_id)
* ListCreate
* ListDelete($list_id)
* ListActivity($list_id)
* ListBounce($list_id)
* ListAbuse($list_id)
* BlacklistEmailList($list_id)
* BlacklistEmailAdd
* IpList
* PoolList
* PoolIpList ($pool_name)
* SmtpInfo
* SmtpDetail
* SmtpAdd
* SmtpDelete
* EmailSend
* EmailAdd
* EmailInfo
* EmailDelete
* EmailAddUnsubscribe
* EmailSearch
* EventList
* EventEmail
* SmsCheck
* SmsSend
* SmsInfo
* SmsCampaign
* SmsCampaignList
* SmsCampaignListList
* SmsCampaignStat
* SmsCampaignReport
