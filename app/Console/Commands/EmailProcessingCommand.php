<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;

class EmailProcessingCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:process';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Specify the root folder path within the storage directory
        $rootFolderPath = storage_path('app/Email');
        // Get all folders in the root folder
        $folders = File::directories($rootFolderPath);
        \Log::info('Folders: ' . print_r($folders, true));
        // Loop through each folder
        foreach ($folders as $folder) {
            // Get the folder name
            $folderName = basename($folder);

            // Specify the email address based on the folder name
            $destinationEmail = $this->getEmailForFolder($folderName);
            
            \Log::info($folder);

            // Get all files in the folder
            $files = File::allFiles($folder);
            \Log::info($files);
            
            // Process the contents and send email
            $subject = 'Unclaimed Transaction as of ' . date('m/d/Y') . ' (EXPERIMENTAL!)';  // Replace with your desired subject
            $this->sendEmail($destinationEmail, $subject, $files);
        }
    }    

    /**
     * Get the email address based on the folder name.
     *
     * @param string $folderName
     * @return string
     */
    function getEmailForFolder($folderName)
    {
        // Add your logic to map folder names to email addresses
        // You can use a switch statement, an array lookup, or any other method
        // based on your specific requirements.

        switch ($folderName) 
        {
            case 'ROXI':
                return 'dolexiremittance@gmail.com';
            case 'sent':
                return 'sent@example.com';
            // Add more cases as needed
            default:
                return 'default@example.com';
        }
    }

    /**
     * Send an email.
     *
     * @param string $destinationEmail
     * @param string $subject
     * @param string $content
     */
    function sendEmail($destinationEmail, $subject, $files)
    {
       // Check if the content is empty
    /*if (empty($files)) {
        // Log an error or handle it as needed
        \Log::error('Email content is empty. Skipping sending email.');
        return;
    }*/

    // Replace this with your email sending logic using Laravel's Mail facade
    // This is just a basic example, and you need to configure your email settings
    // in Laravel before using this in a production environment.

    Mail::raw('', function ($message) use ($destinationEmail, $subject, $files) {
        $message->to($destinationEmail)
                ->subject($subject);
    
        foreach ($files as $file) {
            // Attach each file to the email
            $message->attach($file);
    }});
    }
}
