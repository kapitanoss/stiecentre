<?php
include('phpmailer.php');
class Mail extends PhpMailer
{
    // Set default variables for all new objects
    public $From     = 'noreply.centrekievmail@gmail.com';
    public $FromName = SITETITLE;
    public $Host     = 'smtp.gmail.com:465';
    public $Mailer   = 'smtp';
    public $SMTPAuth = true;
    public $Username = 'noreply.centrekievmail@gmail.com';
    public $Password = 'vcpkmail';
    public $SMTPSecure = 'ssl';
    public $WordWrap = 75;

    public function subject($subject)
    {
        $this->Subject = $subject;
    }

    public function body($body)
    {
        $this->Body = $body;
    }

    public function send()
    {
        $this->AltBody = strip_tags(stripslashes($this->Body))."\n\n";
        $this->AltBody = str_replace("&nbsp;", "\n\n", $this->AltBody);
        return parent::send();
    }
}
