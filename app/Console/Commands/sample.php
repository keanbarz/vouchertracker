<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;

class sample extends Command
{
    /*
     *
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:sample';

    /*
     *
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /*
     *
     * Execute the console command.
     */
    public function handle()
    {
    }
}