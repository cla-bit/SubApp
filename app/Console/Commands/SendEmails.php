<?php

namespace App\Console\Commands;

use App\Models\Post;
use App\Models\Subscription;
use Illuminate\Console\Command;
// use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Queue;


class SendEmails extends Command
{
    /**
     * Console command name.
     *
     * @var string
     */
    // protected $signature = 'app:send-emails';
    protected $signature = 'send:emails';

    /**
     * Console command description.
     *
     * @var string
     */
    // protected $description = 'Command description';
    protected $description = 'send emails to subscribers about new posts';

    /**
     * The console command constructor. 
     */
    public function __construct(){
        parent::__construct();
    }

    /**
     * Handle the console command.
     */
    public function handle()
    {
        $subscriptions = Subscription::with('user', 'website.posts')
            ->get()
            ->groupBy('website_id');
        
        foreach ($subscriptions as $websiteId => $subs) {
            $posts = Post::where('website_id', $websiteId)->where('is_sent', false)->get();
            foreach ($posts as $post) {
                foreach ($subs as $subscription) {
                    // Mail::raw("New post Alert: {$post->title}\n{$post->description}", function ($message) use ($subscription){
                    //     $message->to($subscription->user->email)
                    //     ->subject('NewPost Notification');
                    // });
                    Queue::push(new SendEmailJob($subscription->user, $post));
                }

                $post->is_sent = true;
                $post->save();
            }
        }
    }
}
