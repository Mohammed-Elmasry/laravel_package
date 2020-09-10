<?php


namespace Masry\Lighthouse\tests\Unit;


use Illuminate\Support\Facades\Mail;
use Masry\Lighthouse\Mail\WelcomeMail;
use Masry\Lighthouse\Models\Post;
use Masry\Lighthouse\tests\TestCase;

class WelcomeMailTest extends TestCase
{
    /** @test */
    public function it_sends_a_welcome_email()
    {
        Mail::fake();

        $post = factory(Post::class)->create(["title" => "Fake Title"]);

        Mail::assertNothingSent();

        Mail::to("test@example.com")->send(new WelcomeMail($post));

        Mail::assertSend(WelcomeMail::class, function ($mail) use ($post) {
            return $mail->post->id === $post->id && $mail->post->title === "Fake Title";
        });
    }
}
