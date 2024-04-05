<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $subject }}</title>
        <style>
            p {
                font-family: "Century Gothic";
            }
        </style>
    </head>
    <body>
        <img src="https://magblogjapunmo.files.wordpress.com/2024/02/head-1.png" alt="Header Image" style="max-width:100%;">
        <p>Sir/Ma'am:</p>
        <p>Good day!</p>
            @if ($nature == '1')
                <p>Kindly see attached file for the List of Unclaimed Palawan Transactions as of {{ date('m/d/Y') }}.</p>
                <p>Please notify the beneficiaries to ensure that the transactions are claimed within the 60 day period from the date of posting (which can be found inside the file).</p>
            @elseif ($nature == '2')
                <p>Kindly see attached file for the List of Palawan Transactions that are subject for cancellation.</p>
                <p><strong style='font-style:italic'>The beneficiaries can claim this until {{ $newDateString }}.</strong></p>
                <p><strong style='font-style:italic'>Cancellation date will be on {{ $xnewDateString }}.</strong></p>
                <p>Please ensure that the beneficiaries are notified to avoid cancellation. Once cancelled, the amount will be <strong>refunded</strong> to DOLE XI and shall be remitted to the National Treasury.</p>
            @endif
        <p>To view the file, please enter <strong>"{{ $password }}"</strong> (without the quotation marks) as the file password.</p>
        <p>Furthermore, this is to remind you that the <strong>TRANSACTION CODES</strong> are <strong style='color:red'>STRICTLY CONFIDENTIAL</strong> in nature.</p><br>
        <p>Thank you and God Bless.</p>
        <p>Yours truly,</p>
        <br>
        <p><strong style='color:purple'>NOVIE JANE B. PANIAGUA</strong></p>

        {{-- You can include any dynamic content here using Blade syntax --}}
    </body>
</html>