<?php
require_once __DIR__."/mail.php";
class ForgottenPwdMail extends Mail
{
    protected $subject = "Camagru: Mot de passe oublié";
    function __construct($to, $h_pwd) {
        parent::__construct($to);
        $this->message = "<html><body>Please follow this url to reset you password:<br/><a href='http://localhost:8080/reset_pwd?hash=" . $h_pwd . "'>localhost:8080/reset_pwd?hash=" . $h_pwd . "</a></body></html>";
    }
}
?>