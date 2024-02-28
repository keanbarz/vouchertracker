<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $subject }}</title>
    </head>
    <body>
        <p>Sir/Ma'am:</p>
        <p>Good day!</p>
            @if ($nature == '1')
                <p>Kindly see attached file for the List of Unclaimed Palawan Transactions as of {{ date('m/d/Y') }}.</p>
            @elseif ($nature == '2')
                <p>Kindly see attached file for the List of Palawan Transactions that are subject for cancellation on {{ $newDateString }}.</p>
                <p>Please that the beneficiaries are notified to avoid cancellation. Once cancelled, the amount will be <strong>refunded</strong> to DOLE XI and shall be remitted to the National Treasury.</p>
            @endif
        <p>To view the file, please enter "{{ $password }}" as the file password.</p>
        <p>Furthermore, this is to remind you that the <strong>TRANSACTION CODES</strong> are <strong style='color:red'>STRICTLY CONFIDENTIAL</strong> in nature.</p><br>
        <p>Thank you and God Bless.</p>
        <p>Yours truly,</p>
        <br>
        <p><strong style='color:purple'>NOVIE JANE B. PANIAGUA</strong></p>

        {{-- You can include any dynamic content here using Blade syntax --}}
    </body>
</html>