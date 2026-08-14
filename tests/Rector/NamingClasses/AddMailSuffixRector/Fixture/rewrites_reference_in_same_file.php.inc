<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class AccountActivated extends Mailable
{
}

class AccountMailer
{
    public function send($to): void
    {
        $to->send(new AccountActivated);
    }
}

?>
-----
<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class AccountActivatedMail extends Mailable
{
}

class AccountMailer
{
    public function send($to): void
    {
        $to->send(new \App\Mail\AccountActivatedMail);
    }
}

?>
