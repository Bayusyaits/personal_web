<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class TestUserRegisteredNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:slack';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test Slack New User Notification';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        User::first()->notify(new UserRegistered);
    }
}
