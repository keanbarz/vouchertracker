<x-app-layout>
    <style>
        /* Define styles for the table */
        table {
            width: 100%;
            border-collapse: collapse;
            font-family: Arial, sans-serif;
            border: 1px solid #ddd; /* Add border to the entire table */
            }

        /* Style table headers */
        th {
            
            border: 1px solid #ddd; /* Add border to table header cells */
            }

        /* Style table data cells 
            td {
            border: 1px solid #ddd;   //Add border to table data cells 
            padding: 8px;
            text-align: left;
            }*/

        /* Add some hover effect to table rows */
        tr:hover {
            background-color: blue;
            }
    </style>
    <style>
        .dropbtn {
            background-color: green;
            color: white;
            min-width: 80px;
            padding: 8px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 10px;
            }

        .dropdown {
            position: relative;
            display: inline-block;
            }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f1f1f1;
            min-width: 80px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            }

        .dropdown-content form {
            color: black;
            padding: 12px ;
            text-decoration: none;
            border: 1px solid #ddd;
            display: block;
            }
        .dropdown-content a {
            color: black;
            padding: 12px ;
            text-decoration: none;
            border: 1px solid #ddd;
            display: block;
            }    
        .dropdown-content form:hover {
            background-color: #ddd;
            }
        .dropdown-content button:hover {
            background-color: #ddd;
            }
        .dropdown:hover .dropdown-content {
            display: block; background-color:white
            }
        .dropdown:hover .dropbtn {
            background-color: #3e8e41;
            }

    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Check if the flash message exists
            if ($("#flash-message").length > 0) {
                // Automatically hide the flash message after 3 seconds (adjust the time as needed)
                setTimeout(function() {
                    $("#flash-message").slideUp();
                }, 3000); // 3000 milliseconds = 3 seconds
            }
        });
    </script>

    @if (Auth::user()->role === 'admin')
    <a href="/tally/mmg/close"><button class="dropbtn">Close Tally</button></a>
    <a href="/tally/mmg/open"><button class="dropbtn">Open Tally</button></a>
    @endif
    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100" style="color: white;">
                @if (Auth::user()->contest === 'all' || Auth::user()->contest === 'mmg')
                    <table>
                        <thead>
                            <tr>
                                <th style="padding: 10px; min-width: unset;">Office</th>
                                <th style="padding: 10px; min-width: unset;">Candidate Name</th>
                                <th style="padding: 10px; min-width: unset;">Production Number and Attire (20%)</th>
                                <th style="padding: 10px; min-width: unset;">Business Casual Attire (20%)</th>
                                <th style="padding: 10px; min-width: unset;">Long Gown and Formal Attire (20%)</th>
                                <th style="padding: 10px; min-width: unset;">Question and Answer (30%)</th>
                                <th style="padding: 10px; min-width: unset;">Audience Impact (10%)</th>
                                <th style="padding: 10px; min-width: unset;">TOTAL (100%)</th>
                                <th style="padding: 10px; min-width: unset;">RANKING</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mcon->zip($mranks) as [$mcon,$mranks])
                            <tr>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $mcon->office ?? "" }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $mcon->name ?? "" }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ number_format(($mcon->totalpna ?? "0"),2) }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ number_format(($mcon->totalbca ?? "0"),2) }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ number_format(($mcon->totallgfa ?? "0"),2) }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ number_format(($mcon->totalqna ?? "0"),2) }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ number_format(($mcon->totalai ?? "0"),2) }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ number_format(($mcon->overall ?? "0"),2)}}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $mranks->ranking }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div></br>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100" style="color: white;">
                    <table>
                        <thead>
                            <tr>
                                <th style="padding: 10px; min-width: unset;">Office</th>
                                <th style="padding: 10px; min-width: unset;">Candidate Name</th>
                                <th style="padding: 10px; min-width: unset;">Production Number and Attire (20%)</th>
                                <th style="padding: 10px; min-width: unset;">Business Casual Attire (20%)</th>
                                <th style="padding: 10px; min-width: unset;">Long Gown and Formal Attire (20%)</th>
                                <th style="padding: 10px; min-width: unset;">Question and Answer (30%)</th>
                                <th style="padding: 10px; min-width: unset;">Audience Impact (10%)</th>
                                <th style="padding: 10px; min-width: unset;">TOTAL (100%)</th>
                                <th style="padding: 10px; min-width: unset;">RANKING</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($fcon->zip($franks) as [$fcon,$franks])
                            <tr>
                            <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $fcon->office ?? "" }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $fcon->name ?? "" }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ number_format(($fcon->totalpna ?? "0"),2) }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ number_format(($fcon->totalbca ?? "0"),2) }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ number_format(($fcon->totallgfa ?? "0"),2) }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ number_format(($fcon->totalqna ?? "0"),2) }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ number_format(($fcon->totalai ?? "0"),2) }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ number_format(($fcon->overall ?? "0"),2)}}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{$franks->ranking}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <p style="text-align: center;">ACCESS DENIED<p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
