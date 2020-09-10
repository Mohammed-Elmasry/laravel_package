<?php


namespace Masry\Lighthouse\Mail;


use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Masry\Lighthouse\Models\Post;

class WelcomeMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var Post
     */
    public $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function build()
    {
        return $this->view("lighthouse::emails.welcome");
    }
}
