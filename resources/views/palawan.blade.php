<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $subject }}</title>
    </head>
    <body>
        <img src="https://magblogjapunmo.files.wordpress.com/2024/02/head-1.png" alt="Header Image" style="max-width:100%;">
        <p>Good day!</p>
        <p>We would like to inform you that we deposited the total amount of <strong>{{  strtoupper($inwords)  }}</strong> (P{{ number_format($oAmount,2) }}) on {{ $newDateString }}, with payroll name/s and details provided in the summary attached to this email.</p>
        <p>Thank you.</p>
        <p>Keep safe and God Bless!</p>
        <p>Yours truly,</p>
        <br>
        <p><strong style='color:purple'>NOVIE JANE B. PANIAGUA</strong></p>

        {{-- You can include any dynamic content here using Blade syntax --}}
    </body>
</html>