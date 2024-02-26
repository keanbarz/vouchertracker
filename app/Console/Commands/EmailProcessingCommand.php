<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;

class EmailProcessingCommand extends Command
{
    /*
     *
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:process';

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
        // Specify the root folder path within the storage directory
        $rootFolderPath = storage_path('app/Email');
        // Get all folders in the root folder
        $folders = File::directories($rootFolderPath);
        
        do {
            $nature = $this->ask('What is the nature of transaction?' . "\n" . '[1] Unclaimed' . "\n" . '[2] For Cancellation' . "\n" .  '(1 or 2)');
            
            if ($nature != '1' && $nature != '2') {
                $this->line('Invalid input. Please try again.');
            }
            if ($nature = '2') {
                $day = $this->ask('Will be cancelled in how many days?' .  "\n" .  '(1 - 5)');
                
            }
        } while ($nature != '1' && $nature != '2');

        $dateString = date('m/d/Y'); // Get current date in the desired format
        $timestamp = strtotime($dateString); // Convert date string to timestamp
        $newTimestamp = strtotime('+' . $day . 'days', $timestamp); // Add 2 days to the timestamp
        $newDateString = date('m/d/Y', $newTimestamp); // Convert the new timestamp back to desired format
        \Log::info($newDateString);
        $count = 01;

        // Loop through each folder
        foreach ($folders as $folder) {
            // Get the folder name
            $folderName = basename($folder);
            $subFolders = File::directories($folder);
            // Sub Loop           
            foreach ($subFolders as $subFolder){
                $subFolderName = basename($subFolder);

                // Specify the email address based on the folder name
                $destinationEmail = $this->getEmailForFolder($folderName, $subFolderName);
                $password = $subFolderName[0] . 'dole11' . strtolower($folderName) . date('mdy');
                
                // Get all files in the folder
                $files = File::allFiles($subFolder);
                
                // Process the contents and send email
               \Log::info($folderName . ' ' . $subFolderName . ' ' . $destinationEmail);
               $this->sendEmail($destinationEmail, $files, $password, $folderName, $subFolderName, $count, $nature, $newDateString);

                File::delete($files);
                
                $count = $count + 1;
            }
        }
        echo "Transactions emailed successfully.";
        echo "Press Enter to continue...";
        readline();
    }    

    /**
     * Get the email address based on the folder name.
     *
     * @param string
     * @return string
     */
    function getEmailForFolder($folderName, $subFolderName)
    {
        // Add your logic to map folder names to email addresses
        // You can use a switch statement, an array lookup, or any other method
        // based on your specific requirements.

        switch ($folderName) 
        {
            case 'DORFO':
                switch ($subFolderName)
                    {
                        case 'GIP':
                        case 'SPES':
                            return strtolower($folderName . $subFolderName . 'remittancedole11@gmail.com');
                        default:
                            return strtolower($subFolderName . 'remittance' . $folderName . 'dole11@gmail.com');
                    }
            case 'DCFO':
                switch ($subFolderName)
                    {
                        case 'GIP':
                        case 'SPES':
                        case 'TUPAD':
                            return strtolower($subFolderName . 'remit' . $folderName . 'dole11@gmail.com');
                            default:
                            return strtolower($subFolderName . 'remittance' . $folderName . 'dole11@gmail.com');
                    }
            case 'DSFO':
                            switch ($subFolderName)
                                {
                                    case 'GIP':
                                    case 'SPES':
                                        return strtolower($subFolderName . 'remit' . $folderName . 'dole11@gmail.com');
                                    default:
                                        return strtolower($subFolderName . 'remittance' . $folderName . 'dole11@gmail.com');
                                }                    
            case 'DNFO':
                switch ($subFolderName)
                    {
                        case 'TUPAD':
                            return strtolower($subFolderName . 'remittancedole11' . $folderName . '@gmail.com');
                        default:
                            return strtolower($subFolderName . 'remittance' . $folderName . 'dole11@gmail.com');
                    }
            case 'DIEO':
                switch ($subFolderName)
                    {
                        case 'GIP':
                            return strtolower($subFolderName . 'remit' . $folderName . 'dole11@gmail.com');
                        default:
                            return strtolower($subFolderName . 'remittance' . $folderName . 'dole11@gmail.com');
                    }
            case 'ROXI':
                switch ($subFolderName)
                    {
                        case 'SPES':
                        case 'GIP':
                            return 'employmentremittancerodole11@gmail.com';
                        default:
                            return strtolower($subFolderName . 'remittance' . $folderName . 'dole11@gmail.com');
                    }
                    
            default:
            return strtolower($subFolderName . 'remittance' . $folderName . 'dole11@gmail.com');
        }
    }

    /*
     * Send an email.
     *
     * @param string $destinationEmail
     * @param string $subject
     * @param string $content
     */
    function sendEmail($destinationEmail, $files, $password, $folderName, $subFolderName, $count, $nature, $newDateString)
    {
        // Check if the content is empty
        if (empty($files)) {
            // Log an error or handle it as needed
            $this->info(sprintf("%02d", $count) . '. ' . $folderName . '-' . $subFolderName . ' has no Transactions. Skipping sending email.');
            \Log::info($count);
            return;
        }

        $this->info(sprintf("%02d", $count) . '. Sending Transactions to ' . $folderName . '-' . $subFolderName . '...');

        $messageBody = 'Sir/Ma\'am' . PHP_EOL . PHP_EOL . 'Good day!' . PHP_EOL . PHP_EOL; // Concatenating strings with a new line

        switch ($nature) {
            case '1':
                $subject = $folderName . ' ' . $subFolderName . ' - Unclaimed Palawan Transaction/s as of ' . date('m/d/Y');  // Replace with your desired subject
                $messageBody .= 'Kindly see attached file for the List of Unclaimed Palawan Transactions as of ' . date('m/d/Y') . '.' . PHP_EOL; // Concatenating another string with a new line
                break;
            case '2':
                $subject = $folderName . ' ' . $subFolderName . ' - Palawan Transaction/s for cancellation as of ' . date('m/d/Y');  // Replace with your desired subject
                $messageBody .= 'Kindly see attached file for the List of Palawan Transactions that are subject for cancellation on ' . $newDateString . '.' . PHP_EOL; // Concatenating another string with a new line
                $messageBody .= 'Please ensure to notify the beneficiaries to avoid cancellation. Once cancelled, the amount will be refunded to DOLE XI and shall be remitted to the National Treasury.' . PHP_EOL; // Concatenating another string with a new line
                break;
            default:
                # code...
                break;
        }

        $messageBody .= 'To view the file, please enter "' . $password . '" as the file password.' . PHP_EOL . PHP_EOL;
        $messageBody .= 'Furthermore, this is to remind you that the TRANSACTION CODES are STRICTLY CONFIDENTIAL in nature.' . PHP_EOL . PHP_EOL;
        $messageBody .= 'Thank you and God Bless.' . PHP_EOL . PHP_EOL . PHP_EOL . 'Yours truly,' . PHP_EOL . PHP_EOL . 'NOVIE JANE B. PANIAGUA';

        Mail::raw($messageBody, function ($message) use ($destinationEmail, $subject, $files){
            $message->to($destinationEmail)->subject($subject);
    
            foreach ($files as $file) {
                // Attach each file to the email
                $message->attach($file);
            }
        });
    }
}
