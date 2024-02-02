<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
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
    {\Log::info('Command is running');
                // Specify the root folder path within the storage directory
        $rootFolderPath = 'C:/Users/User/Desktop/To Email';
        \Log::info('1');
        // Get all folders in the root folder
        $folders = Storage::directories($rootFolderPath);
        \Log::info('2');
        // Loop through each folder
        foreach ($folders as $folder) {
            // Get the folder name
            $folderName = basename($folder);
            // Specify the email address based on the folder name
            $destinationEmail = getEmailForFolder($folderName);

            // Get all files in the folder
            $files = Storage::allFiles($folder);

            // Check if the folder has any files
            if (!empty($files)) {
                // Loop through each file in the folder
                foreach ($files as $file) {
                    // Read the contents of the file
                    $contents = Storage::get($file);

                    // Process the contents and send email
                    $subject = 'CONFIDENTIAL (EXPERIMENTAL!)'; // Replace with your desired subject
                    sendEmail($destinationEmail, $subject, $contents);
                }
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

            switch ($folderName) {
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
         * @param string $to
         * @param string $subject
         * @param string $content
         */
        function sendEmail($to, $subject, $content)
        {
            // Replace this with your email sending logic using Laravel's Mail facade
            // This is just a basic example, and you need to configure your email settings
            // in Laravel before using this in a production environment.

            Mail::raw($content, function ($message) use ($to, $subject) {
                $message->to($to)
                        ->subject($subject);
            });
        }
    }
}
