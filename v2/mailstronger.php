<?php

/*

MailStronger API REST
@Dan V2 11-2017

*/


class MailStronger
{
    public $key;
    public $user;	
    public $url;
	
	
    public function __construct($url,$user,$key)
    {
        $this->url = $url;
        $this->user = $user;
        $this->key = $key;
	}
	
	private function  curl_do_post($fct,$CHAINE)	
	{	  
	    $URL_ENVOI = $this->url;
	    if(!function_exists('curl_init')) 
        {
            throw new Exception('MailStronger : Curl Module is not Loaded');
        }
		
        if (strpos($URL_ENVOI,"?")<>false) 
        {		
	   $PARAMS = substr($URL_ENVOI,strpos($URL_ENVOI,"?")+1,strlen($URL_ENVOI)-(strpos($URL_ENVOI,"?")+1));
	   $URL_ENVOI = substr($URL_ENVOI,0,strpos($URL_ENVOI,"?"));
           $CHAINE = $CHAINE."&".$PARAMS;
        }
	    $host = "$URL_ENVOI";
	    $XPost = "&FK_USER_ID=".$this->user."&K_API_KEY=".$this->key."&fct=".$fct."&data=".$CHAINE;
	    $url = $host;
	    $ch = curl_init();// initialize curl handle
	    curl_setopt($ch, CURLOPT_URL,$url); // set url to post to
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER,true); // return into a variable
	    //curl_setopt($ch, CURLOPT_FAILONERROR,true);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	    curl_setopt($ch, CURLOPT_TIMEOUT, 40); // times out after 4s
	    curl_setopt($ch, CURLOPT_POSTFIELDS, $XPost); // add POST fields
	    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		
	    // curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
	    // curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	    // 	'Content-Type: application/x-www-form-urlencoded',
	    // 	"cache-control: no-cache",
	    // ));

   	   $result = curl_exec($ch);
		
	if(curl_errno($ch))
        {
            throw new Exception('CURL error: ' . curl_error($ch));
        }		
	    return $result;
	}
	

    // Connect to api
    public function ApiConnect()
    {
       return $this->curl_do_post("ApiConnect","");
    }
	
    // List all api user related info
    public function UserInfo()
    {
       return $this->curl_do_post("UserInfo","");
    }
	
    // List managment: 
    public function ListList()
    {
       return $this->curl_do_post("ListList","");
    }
	
    public function ListInfo($list_id)
    {
       return $this->curl_do_post("ListInfo", $list_id);
    }
		
    public function ListCreate($list_name)
    {
       return $this->curl_do_post("ListCreate", $list_name);
    }
	
    public function ListDelete($list_id)
    {
       return $this->curl_do_post("ListDelete", $list_id);
    }
	
    public function ListActivity($list_id)
    {
       return $this->curl_do_post("ListActivity",json_encode($list_id));
    }
	
    public function ListBounce($list_id)
    {
       return $this->curl_do_post("ListBounce",json_encode($list_id));
    }
	
    public function ListAbuse($list_id)
    {
       return $this->curl_do_post("ListAbuse",json_encode($list_id));
    }
	
    public function ListDetailedUnsub($list_id)
    {
	return $this->curl_do_post("ListDetailedUnsub", $list_id);
    }
	
    public function ListDetailedAbuse($list_id)
    {
	return $this->curl_do_post("ListDetailedAbuse", $list_id);
    }
	
    public function ListDetailedBlocked($list_id)
    {
        return $this->curl_do_post("ListDetailedBlocked", $list_id);
    }
	
    public function ListDetailedUndefined($list_id)
    {
	return $this->curl_do_post("ListDetailedUndefined", $list_id);
    }

    public function ListInvalidEmails($list_id)
    {
	return $this->curl_do_post("ListInvalidEmails", $list_id);
    }
	
    // IPs managment: 
    public function IpList()
    {
       return $this->curl_do_post("IpList","");
    }
	
    // Pool(IPs) managment
    public function PoolList()
    {
       return $this->curl_do_post("PoolList","");
    }
		
    public function PoolIpList($pool_name)
    {
       return $this->curl_do_post("PoolIpList",$pool_name);
    }
	
    // SMTP management : 
    public function SmtpInfo($smtp_id)
    {
       return $this->curl_do_post("SmtpInfo",json_encode($smtp_id));
    }
	
    public function SmtpDetail()
    {
       return $this->curl_do_post("SmtpDetail",json_encode());
    }
	
    public function SmtpAdd($data)
    {
       return $this->curl_do_post("SmtpAdd",json_encode($data));
    }
	
    public function SmtpDelete($data)
    {
       return $this->curl_do_post("SmtpDelete",json_encode($data));
    }
	
    // Emails management : 	
    public function EmailSend($data)
    {
       return $this->curl_do_post("EmailSend",urlencode(json_encode ($data)));
    }
	
    public function EmailAdd($data)
    {
       return $this->curl_do_post("EmailAdd",json_encode ($data));
    }
	
    public function EmailInfo($data)
    {
       return $this->curl_do_post("EmailInfo",json_encode ($data));
    }
	
    public function EmailDelete($data)
    {
       return $this->curl_do_post("EmailDelete",json_encode ($data));
    }
	
    public function EmailAddUnsubscribe($data)
    {
       return $this->curl_do_post("EmailAddUnsubscribe",json_encode ($data));
    }
    public function EmailSearch($data)
    {
       return $this->curl_do_post("EmailSearch",json_encode ($data));
    }
	
    public function EventList($data)
    {
       return $this->curl_do_post("EventList",json_encode ($data));
    }
	
    public function EventEmail($email)
    {
       return $this->curl_do_post("EventEmail",$email);
    }
	
    // SMS managment
    public function SmsCampaign($data)
    {
       return $this->curl_do_post("SmsCampaign",json_encode ($data));
    }
	
    public function SmsInfo($sms_id)
    {
       return $this->curl_do_post("SmsInfo",$sms_id);
    }

    public function SmsDelete($sms_id)
    {
       return $this->curl_do_post("SmsDelete",$sms_id);
    }
	
    public function SmsUpdateDate($data)
    {
       return $this->curl_do_post("SmsUpdateDate",json_encode($data));
    } 

    public function SmsCampaignListList($data)
    {
        return $this->curl_do_post("SmsCampaignListList",json_encode($data));
    }

    public function SmsCampaignList()
    {
       return $this->curl_do_post("SmsCampaignList","");
    }

    public function SmsCampaignStat($camp_id)
    {
       return $this->curl_do_post("SmsCampaignStat",json_encode($camp_id));
    }
	
    public function SmsCampaignReport($data)
    {
       return $this->curl_do_post("SmsCampaignReport",json_encode($data));
    }
	
    public function SmsSend($data)
    {
      return $this->curl_do_post("SmsSend",json_encode ($data));
    }

    public function TestTmp($data)
    {
       return $this->curl_do_post("TestTmp",urlencode(json_encode ($data)));
    }

    //Blacklist managment
    public function BlacklistEmailList($list_id)
    {
       return $this->curl_do_post("BlacklistEmailList",json_encode ($list_id));
    }

    public function BlacklistEmailAdd($data)
    {
       return $this->curl_do_post("BlacklistEmailAdd",json_encode ($data));
    }

    
    
}

?>
