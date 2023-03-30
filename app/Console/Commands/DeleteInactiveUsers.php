<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\User;

class DeleteInactiveUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:inactive_users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'this command will delete all inactive users';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // User::where('status',0)->delete();
        // return Command::SUCCESS;
        // $name=$this->ask('what is your name');
        // $password=$this->secret('what is your password');
        // dd($password);
       
        User::where('status',0)->restore();
    }
}
