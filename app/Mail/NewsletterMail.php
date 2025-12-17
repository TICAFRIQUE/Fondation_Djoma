<?php


namespace App\Mail;

use Illuminate\Mail\Mailable;

class NewsletterMail extends Mailable
{
    public $subjectText;
    public $content;

    public function __construct($subjectText, $content)
    {
        $this->subjectText = $subjectText;
        $this->content = $content;
    }

    public function build()
    {
        return $this->subject($this->subjectText)
            ->view('backend.pages.newsLetters.email')
            ->with('content', $this->content);  // ✅ Passer le contenu
    }
}
