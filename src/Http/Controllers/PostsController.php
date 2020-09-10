<?php


namespace Masry\Lighthouse\Http\Controllers;


use Illuminate\Support\Facades\Mail;
use Masry\Lighthouse\Mail\WelcomeMail;
use Masry\Lighthouse\Models\Post;

class PostsController extends Controller
{

    public function __construct()
    {
        //
    }

    public function index()
    {
        $posts = Post::all();
        return view("lighthouse::Posts.index", ["posts" => $posts]);
    }

    public function sendMail()
    {
        $post = Post::make(["title" => "Salma is the one and only"]);
        Mail::to("salmamostafameniawy@gmail.com")->send(new WelcomeMail($post));
    }

    public function mailView()
    {
        return view("lighthouse::emails.welcome");
    }

}
