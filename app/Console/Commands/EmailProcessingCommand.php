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
            $subFolders = File::directories($folder);           
            foreach ($subFolders as $subFolder){
                $subFolderName = basename($subFolder);

                // Specify the email address based on the folder name
                $destinationEmail = $this->getEmailForFolder($folderName, $subFolderName);
                $password = $subFolderName[0] . 'dole11' . strtolower($folderName) . date('mdy');
                
                // Get all files in the folder
                $files = File::allFiles($subFolder);
                
                // Process the contents and send email
                $subject = $folderName . ' ' . $subFolderName . ' - Unclaimed Palawan Transaction/s as of ' . date('m/d/Y');  // Replace with your desired subject
                $this->sendEmail($destinationEmail, $subject, $files, $password);

                if ($destinationEmail != 'dolexiremittance@gmail.com'){
                    File::delete($files);
                }

            }
        }
    }    

    /**
     * Get the email address based on the folder name.
     *
     * @param string $folderName
     * @return string
     */
    function getEmailForFolder($folderName, $subFolderName)
    {
        // Add your logic to map folder names to email addresses
        // You can use a switch statement, an array lookup, or any other method
        // based on your specific requirements.

        switch ($folderName) 
        {
            case 'ROXI':
                switch ($subFolderName){
                    case 'TUPAD':
                    return 'dolexiremittance@gmail.com';
                    case 'SPES':
                    return 'dolexiremittance@gmail.com';
                    case 'GIP':
                    return 'dolexiremittance@gmail.com';
                }
            case 'DCFO':
                switch ($subFolderName){
                    case 'TUPAD':
                    return 'tupadremitdcfodole11@gmail.com';
                    case 'SPES':
                    return 'spesremitdcfodole11@gmail.com';
                    case 'GIP':
                    return 'dolexiremittance@gmail.com';
                }
            case 'DNFO':
                switch ($subFolderName){
                    case 'TUPAD':
                    return 'dolexiremittance@gmail.com';
                    case 'SPES':
                    return 'dolexiremittance@gmail.com';
                    case 'GIP':
                    return 'gipremittancednfodole11@gmail.com';
                }
            case 'DIEO':
                switch ($subFolderName){
                    case 'TUPAD':
                    return 'dolexiremittance@gmail.com';
                    case 'SPES':
                    return 'dolexiremittance@gmail.com';
                    case 'GIP':
                    return 'dolexiremittance@gmail.com';
                }
            case 'DORFO':
                switch ($subFolderName){
                    case 'TUPAD':
                    return 'tupadremittancedorfodole11@gmail.com';
                    case 'GIP':
                    return 'dorfogipremittancedole11@gmail.com';
                    case 'SPES':
                    return 'dorfospesremittancedole11@gmail.com';
                }
            case 'DOFO':
                switch ($subFolderName){
                    case 'TUPAD':
                    return 'dolexiremittance@gmail.com';
                    case 'SPES':
                    return 'spesremitdsfodole11@gmail.com';
                    case 'GIP':
                    return 'gipremittancedofodole11@gmail.com';
                }
            case 'DSFO':
                switch ($subFolderName){
                    case 'TUPAD':
                    return 'tupadremittancedsfodole11@gmail.com';
                    case 'SPES':
                    return 'spesremittancedsfodole11@gmail.com';
                    case 'GIP':
                    return 'gipremittancedsfodole11@gmail.com';
                }       
            case 'DOCFO':
                switch ($subFolderName){
                    case 'TUPAD':
                    return 'dolexiremittance@gmail.com';
                    case 'SPES':
                    return 'dolexiremittance@gmail.com';
                    case 'GIP':
                    return 'dolexiremittance@gmail.com';
                }                 
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
    function sendEmail($destinationEmail, $subject, $files, $password)
    {
       // Check if the content is empty
    if (empty($files)) {
        // Log an error or handle it as needed
        \Log::error('Email content is empty. Skipping sending email.');
        return;
    }

    // Replace this with your email sending logic using Laravel's Mail facade
    // This is just a basic example, and you need to configure your email settings
    // in Laravel before using this in a production environment.

    $messageBody = 'Sir/Ma\'am' . PHP_EOL . PHP_EOL . 'Good day!'; // Concatenating strings with a new line
    $messageBody .= 'Kindly see attached file for the List of Unclaimed Palawan Transactions as of ' . date('m/d/Y') . '.' . PHP_EOL; // Concatenating another string with a new line
    $messageBody .= 'To view the file, please enter "' . $password . '" as the file password.' . PHP_EOL . PHP_EOL;
    $messageBody .= 'Furthermore, this is to remind you that the TRANSACTION CODES are STRICTLY CONFIDENTIAL in nature.' . PHP_EOL . PHP_EOL;
    $messageBody .= 'Thank you and God Bless.' . PHP_EOL . PHP_EOL . PHP_EOL . 'Yours truly,' . PHP_EOL . PHP_EOL . 'NOVIE JANE B. PANIAGUA';


    Mail::raw($messageBody, function ($message) use ($destinationEmail, $subject, $files) {
        $message->to($destinationEmail)
                ->subject($subject);
    
        foreach ($files as $file) {
            // Attach each file to the email
            $message->attach($file);
    }});
    }
}
