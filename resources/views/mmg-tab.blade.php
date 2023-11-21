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
        background-color: yellow;
        }
    </style>
    <style>/*Buttons*/
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
    <script>/*Show Tables */
        function showTable(tableId) {
            $('table').hide(); // Hide all tables
            $('#' + tableId).show(); // Show the selected table
        }
    </script>
    @if (Auth::user()->contest === 'all' || Auth::user()->contest === 'mmg')
    <x-slot name="header"><!-- Table Switcher -->
    <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex">
            <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
                <button onclick="showTable('pna');" active="true" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-700 focus:outline-none focus:text-gray-700 dark:focus:text-gray-300 focus:border-gray-300 dark:focus:border-gray-700 transition duration-150 ease-in-out">
                    {{ __('Production Number and Attire') }}
                </button>
                <button onclick="showTable('bca')" active="true" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-700 focus:outline-none focus:text-gray-700 dark:focus:text-gray-300 focus:border-gray-300 dark:focus:border-gray-700 transition duration-150 ease-in-out">
                    {{ __('Business Casual Attire') }}
                </button>
                <button onclick="showTable('lgfa')" active="request()->routeIs('/tally/mmg')" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-700 focus:outline-none focus:text-gray-700 dark:focus:text-gray-300 focus:border-gray-300 dark:focus:border-gray-700 transition duration-150 ease-in-out">
                    {{ __('Long Gown and Formal Attire') }}
                </button>
                <button onclick="showTable('qna')" active="request()->routeIs('/tally/mmg')" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-700 focus:outline-none focus:text-gray-700 dark:focus:text-gray-300 focus:border-gray-300 dark:focus:border-gray-700 transition duration-150 ease-in-out">
                    {{ __('Question and Answer') }}
                </button>
            </div>
        </div>
    </div>
    </x-slot>
    @endif

    <div class="py-12">
        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-9">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100" style="color: green">
                    <!-- Prod Num -->
                    @if (Auth::user()->contest === 'all' || Auth::user()->contest === 'mmg')
                    <table id="pna">
                        <thead>
                            <tr>
                                <th style="padding: 10px; min-width: unset;">ACTION</th>
                                <th style="padding: 10px; min-width: unset;">Office</th>
                                <th style="padding: 10px; min-width: unset;">Candidate Name</th>
                                @if (Auth::User()->role === 'admin')
                                <th colspan="3" style="padding: 10px; min-width: unset;">Beauty and Poise (30%)</th>
                                <th colspan="3" style="padding: 10px; min-width: unset;">Stage Presence (30%)</th>
                                <th colspan="3" style="padding: 10px; min-width: unset;">Overall Appearance (30%)</th>
                                <th colspan="3" style="padding: 10px; min-width: unset;">Audience Impact (10%)</th>
                                <th style="padding: 10px; min-width: unset;">TOTAL (100%)</th>
                                @else
                                <th colspan="1" style="padding: 10px; min-width: unset;">Beauty and Poise (30%)</th>
                                <th colspan="1" style="padding: 10px; min-width: unset;">Stage Presence (30%)</th>
                                <th colspan="1" style="padding: 10px; min-width: unset;">Overall Appearance (30%)</th>
                                <th colspan="1" style="padding: 10px; min-width: unset;">Audience Impact (10%)</th>
                                @endif
                            </tr>
                        </thead>
                        <thead>
                            <tr>
                                <th style="padding: 10px; min-width: unset;">PNA</th>
                                <th style="padding: 10px; min-width: unset;"></th>
                                <th style="padding: 10px; min-width: unset;"></th>
                                @if (Auth::User()->role === 'admin')
                                <th style="padding: 8px; text-align: center;">Judge 1</th>
                                <th style="padding: 8px; text-align: center;">Judge 2</th>
                                <th style="padding: 8px; text-align: center;">Judge 3</th>
                                <th style="padding: 8px; text-align: center;">Judge 1</th>
                                <th style="padding: 8px; text-align: center;">Judge 2</th>
                                <th style="padding: 8px; text-align: center;">Judge 3</th>
                                <th style="padding: 8px; text-align: center;">Judge 1</th>
                                <th style="padding: 8px; text-align: center;">Judge 2</th>
                                <th style="padding: 8px; text-align: center;">Judge 3</th>
                                <th style="padding: 8px; text-align: center;">Judge 1</th>
                                <th style="padding: 8px; text-align: center;">Judge 2</th>
                                <th style="padding: 8px; text-align: center;">Judge 3</th>
                                <th style="padding: 8px; text-align: center;">(sum of average per criteria)</th>
                                @elseif (Auth::User()->role === 'judge1')
                                <th style="padding: 8px; text-align: center;">Judge 1</th>
                                <th style="padding: 8px; text-align: center;">Judge 1</th>
                                <th style="padding: 8px; text-align: center;">Judge 1</th>
                                <th style="padding: 8px; text-align: center;">Judge 1</th>
                                @elseif (Auth::User()->role === 'judge2')
                                <th style="padding: 8px; text-align: center;">Judge 2</th>
                                <th style="padding: 8px; text-align: center;">Judge 2</th>
                                <th style="padding: 8px; text-align: center;">Judge 2</th>
                                <th style="padding: 8px; text-align: center;">Judge 2</th>
                                @elseif (Auth::User()->role === 'judge3')
                                <th style="padding: 8px; text-align: center;">Judge 3</th>
                                <th style="padding: 8px; text-align: center;">Judge 3</th>
                                <th style="padding: 8px; text-align: center;">Judge 3</th>
                                <th style="padding: 8px; text-align: center;">Judge 3</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contestant->zip($scoreA,$scoreB,$scoreC,$scoreD) as [$contestant, $scoreA, $scoreB,$scoreC,$scoreD]) 
                            <tr>            
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">
                                <form method="post" action="/tabulate/mmg/pna/{{ $scoreA->id }}">@csrf
                                @if (Auth::user()->status === 'open')
                                <button class="dropbtn">Update</button>
                                @else {{ __('TALLY CLOSED') }}
                                @endif</form></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $contestant->office }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $contestant->name }}</td>
                                @if (Auth::User()->role === 'admin')
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $scoreA->judge1 }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $scoreA->judge2 }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $scoreA->judge3 }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $scoreB->judge1 }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $scoreB->judge2 }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $scoreB->judge3 }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $scoreC->judge1 }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $scoreC->judge2 }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $scoreC->judge3 }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $scoreD->judge1 }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $scoreD->judge2 }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $scoreD->judge3 }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{number_format((($contestant->totalpna)/.2),2)}}</td>
                                @elseif (Auth::User()->role === 'judge1')
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $scoreA->judge1 }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $scoreB->judge1 }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $scoreC->judge1 }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $scoreD->judge1 }}</td>
                                @elseif (Auth::User()->role === 'judge2')
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $scoreA->judge2 }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $scoreB->judge2 }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $scoreC->judge2 }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $scoreD->judge2 }}</td>
                                @elseif (Auth::User()->role === 'judge3')
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $scoreA->judge3 }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $scoreB->judge3 }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $scoreC->judge3 }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $scoreD->judge3 }}</td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- Bus Cas -->
                    <table id="bca" style="display: none">
                        <thead>
                            <tr>
                                <th style="padding: 10px; min-width: unset;">ACTION</th>
                                <th style="padding: 10px; min-width: unset;">Office</th>
                                <th style="padding: 10px; min-width: unset;">Candidate Name</th>
                                @if (Auth::User()->role === 'admin')
                                <th colspan="3" style="padding: 10px; min-width: unset;">Beauty and Poise (30%)</th>
                                <th colspan="3" style="padding: 10px; min-width: unset;">Stage Presence (30%)</th>
                                <th colspan="3" style="padding: 10px; min-width: unset;">Overall Appearance (30%)</th>
                                <th colspan="3" style="padding: 10px; min-width: unset;">Audience Impact (10%)</th>
                                <th style="padding: 10px; min-width: unset;">TOTAL (100%)</th>
                                @else
                                <th colspan="1" style="padding: 10px; min-width: unset;">Beauty and Poise (30%)</th>
                                <th colspan="1" style="padding: 10px; min-width: unset;">Stage Presence (30%)</th>
                                <th colspan="1" style="padding: 10px; min-width: unset;">Overall Appearance (30%)</th>
                                <th colspan="1" style="padding: 10px; min-width: unset;">Audience Impact (10%)</th>
                                @endif
                            </tr>
                        </thead>
                        <thead>
                            <tr>
                                <th style="padding: 10px; min-width: unset;">BCA</th>
                                <th style="padding: 10px; min-width: unset;"></th>
                                <th style="padding: 10px; min-width: unset;"></th>
                                @if (Auth::User()->role === 'admin')
                                <th style="padding: 8px; text-align: center;">Judge 1</th>
                                <th style="padding: 8px; text-align: center;">Judge 2</th>
                                <th style="padding: 8px; text-align: center;">Judge 3</th>
                                <th style="padding: 8px; text-align: center;">Judge 1</th>
                                <th style="padding: 8px; text-align: center;">Judge 2</th>
                                <th style="padding: 8px; text-align: center;">Judge 3</th>
                                <th style="padding: 8px; text-align: center;">Judge 1</th>
                                <th style="padding: 8px; text-align: center;">Judge 2</th>
                                <th style="padding: 8px; text-align: center;">Judge 3</th>
                                <th style="padding: 8px; text-align: center;">Judge 1</th>
                                <th style="padding: 8px; text-align: center;">Judge 2</th>
                                <th style="padding: 8px; text-align: center;">Judge 3</th>
                                <th style="padding: 8px; text-align: center;">(sum of average per criteria)</th>
                                @elseif (Auth::User()->role === 'judge1')
                                <th style="padding: 8px; text-align: center;">Judge 1</th>
                                <th style="padding: 8px; text-align: center;">Judge 1</th>
                                <th style="padding: 8px; text-align: center;">Judge 1</th>
                                <th style="padding: 8px; text-align: center;">Judge 1</th>
                                @elseif (Auth::User()->role === 'judge2')
                                <th style="padding: 8px; text-align: center;">Judge 2</th>
                                <th style="padding: 8px; text-align: center;">Judge 2</th>
                                <th style="padding: 8px; text-align: center;">Judge 2</th>
                                <th style="padding: 8px; text-align: center;">Judge 2</th>
                                @elseif (Auth::User()->role === 'judge3')
                                <th style="padding: 8px; text-align: center;">Judge 3</th>
                                <th style="padding: 8px; text-align: center;">Judge 3</th>
                                <th style="padding: 8px; text-align: center;">Judge 3</th>
                                <th style="padding: 8px; text-align: center;">Judge 3</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($contestantB->zip($scoreE,$scoreF,$scoreG,$scoreH) as [$contestantB, $scoreE, $scoreF,$scoreG,$scoreH]) 
                            <tr>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">
                                <form method="post" action="/tabulate/mmg/bca/{{ $scoreE->id }}">@csrf
                                @if (Auth::user()->status === 'open')
                                <button class="dropbtn">Update</button>
                                @else {{ __('TALLY CLOSED') }}
                                @endif</form></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $contestantB->office }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $contestantB->name }}</td>
                                @if (Auth::User()->role === 'admin')
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $scoreE->judge1 }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $scoreE->judge2 }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $scoreE->judge3 }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $scoreF->judge1 }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $scoreF->judge2 }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $scoreF->judge3 }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $scoreG->judge1 }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $scoreG->judge2 }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $scoreG->judge3 }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $scoreH->judge1 }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $scoreH->judge2 }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $scoreH->judge3 }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{number_format((($contestantB->totalbca)/.2),2)}}</td>
                                @elseif (Auth::User()->role === 'judge1')
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $scoreE->judge1 }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $scoreF->judge1 }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $scoreG->judge1 }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $scoreH->judge1 }}</td>
                                @elseif (Auth::User()->role === 'judge2')
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $scoreE->judge2 }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $scoreF->judge2 }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $scoreG->judge2 }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $scoreH->judge2 }}</td>
                                @elseif (Auth::User()->role === 'judge3')
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $scoreE->judge3 }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $scoreF->judge3 }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $scoreG->judge3 }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $scoreH->judge3 }}</td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- Long Gown and Formal -->
                    <table id="lgfa" style="display: none">
                        <thead>
                            <tr>
                                <th style="padding: 10px; min-width: unset;">ACTION</th>
                                <th style="padding: 10px; min-width: unset;">Office</th>
                                <th style="padding: 10px; min-width: unset;">Candidate Name</th>
                                @if (Auth::User()->role === 'admin')
                                <th colspan="3" style="padding: 10px; min-width: unset;">Beauty and Poise (30%)</th>
                                <th colspan="3" style="padding: 10px; min-width: unset;">Stage Presence (30%)</th>
                                <th colspan="3" style="padding: 10px; min-width: unset;">Overall Appearance (30%)</th>
                                <th colspan="3" style="padding: 10px; min-width: unset;">Audience Impact (10%)</th>
                                <th style="padding: 10px; min-width: unset;">TOTAL (100%)</th>
                                @else
                                <th colspan="1" style="padding: 10px; min-width: unset;">Beauty and Poise (30%)</th>
                                <th colspan="1" style="padding: 10px; min-width: unset;">Stage Presence (30%)</th>
                                <th colspan="1" style="padding: 10px; min-width: unset;">Overall Appearance (30%)</th>
                                <th colspan="1" style="padding: 10px; min-width: unset;">Audience Impact (10%)</th>
                                @endif
                            </tr>
                        </thead>
                        <thead>
                            <tr>
                                <th style="padding: 10px; min-width: unset;">LGFA</th>
                                <th style="padding: 10px; min-width: unset;"></th>
                                <th style="padding: 10px; min-width: unset;"></th>
                                @if (Auth::User()->role === 'admin')
                                <th style="padding: 8px; text-align: center;">Judge 1</th>
                                <th style="padding: 8px; text-align: center;">Judge 2</th>
                                <th style="padding: 8px; text-align: center;">Judge 3</th>
                                <th style="padding: 8px; text-align: center;">Judge 1</th>
                                <th style="padding: 8px; text-align: center;">Judge 2</th>
                                <th style="padding: 8px; text-align: center;">Judge 3</th>
                                <th style="padding: 8px; text-align: center;">Judge 1</th>
                                <th style="padding: 8px; text-align: center;">Judge 2</th>
                                <th style="padding: 8px; text-align: center;">Judge 3</th>
                                <th style="padding: 8px; text-align: center;">Judge 1</th>
                                <th style="padding: 8px; text-align: center;">Judge 2</th>
                                <th style="padding: 8px; text-align: center;">Judge 3</th>
                                <th style="padding: 8px; text-align: center;">(sum of average per criteria)</th>
                                @elseif (Auth::User()->role === 'judge1')
                                <th style="padding: 8px; text-align: center;">Judge 1</th>
                                <th style="padding: 8px; text-align: center;">Judge 1</th>
                                <th style="padding: 8px; text-align: center;">Judge 1</th>
                                <th style="padding: 8px; text-align: center;">Judge 1</th>
                                @elseif (Auth::User()->role === 'judge2')
                                <th style="padding: 8px; text-align: center;">Judge 2</th>
                                <th style="padding: 8px; text-align: center;">Judge 2</th>
                                <th style="padding: 8px; text-align: center;">Judge 2</th>
                                <th style="padding: 8px; text-align: center;">Judge 2</th>
                                @elseif (Auth::User()->role === 'judge3')
                                <th style="padding: 8px; text-align: center;">Judge 3</th>
                                <th style="padding: 8px; text-align: center;">Judge 3</th>
                                <th style="padding: 8px; text-align: center;">Judge 3</th>
                                <th style="padding: 8px; text-align: center;">Judge 3</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($contestantC->zip($scoreI,$scoreJ,$scoreK,$scoreL) as [$contestantC, $scoreI, $scoreJ,$scoreK,$scoreL]) 
                            <tr>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">
                                <form method="post" action="/tabulate/mmg/lgfa/{{ $scoreI->id }}">@csrf
                                @if (Auth::user()->status === 'open')
                                <button class="dropbtn">Update</button>
                                @else {{ __('TALLY CLOSED') }}
                                @endif</form></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $contestantC->office }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $contestantC->name }}</td>
                                @if (Auth::User()->role === 'admin')
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $scoreI->judge1 }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $scoreI->judge2 }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $scoreI->judge3 }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $scoreJ->judge1 }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $scoreJ->judge2 }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $scoreJ->judge3 }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $scoreK->judge1 }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $scoreK->judge2 }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $scoreK->judge3 }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $scoreL->judge1 }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $scoreL->judge2 }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $scoreL->judge3 }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{number_format((($contestantC->totallgfa)/.2),2)}}</td>
                                @elseif (Auth::User()->role === 'judge1')
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $scoreI->judge1 }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $scoreJ->judge1 }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $scoreK->judge1 }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $scoreL->judge1 }}</td>
                                @elseif (Auth::User()->role === 'judge2')
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $scoreI->judge2 }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $scoreJ->judge2 }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $scoreK->judge2 }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $scoreL->judge2 }}</td>
                                @elseif (Auth::User()->role === 'judge3')
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $scoreI->judge3 }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $scoreJ->judge3 }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $scoreK->judge3 }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $scoreL->judge3 }}</td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- Question and Answer -->
                    <table id="qna" style="display: none">
                        <thead>
                            <tr>
                                <th style="padding: 10px; min-width: unset;">ACTION</th>
                                <th style="padding: 10px; min-width: unset;">Office</th>
                                <th style="padding: 10px; min-width: unset;">Candidate Name</th>
                                @if (Auth::User()->role === 'admin')
                                <th colspan="3" style="padding: 10px; min-width: unset;">Delivery/Confidence (40%)</th>
                                <th colspan="3" style="padding: 10px; min-width: unset;">Content of Answer (50%)</th>
                                <th colspan="3" style="padding: 10px; min-width: unset;">Audience Impact (10%)</th>
                                <th style="padding: 10px; min-width: unset;">TOTAL (100%)</th>
                                @else
                                <th colspan="1" style="padding: 10px; min-width: unset;">Delivery/Confidence (40%)</th>
                                <th colspan="1" style="padding: 10px; min-width: unset;">Content of Answer (50%)</th>
                                <th colspan="1" style="padding: 10px; min-width: unset;">Audience Impact (10%)</th>
                                @endif
                            </tr>
                        </thead>
                        <thead>
                            <tr>
                                <th style="padding: 10px; min-width: unset;">QNA</th>
                                <th style="padding: 10px; min-width: unset;"></th>
                                <th style="padding: 10px; min-width: unset;"></th>
                                @if (Auth::User()->role === 'admin')
                                <th style="padding: 8px; text-align: center;">Judge 1</th>
                                <th style="padding: 8px; text-align: center;">Judge 2</th>
                                <th style="padding: 8px; text-align: center;">Judge 3</th>
                                <th style="padding: 8px; text-align: center;">Judge 1</th>
                                <th style="padding: 8px; text-align: center;">Judge 2</th>
                                <th style="padding: 8px; text-align: center;">Judge 3</th>
                                <th style="padding: 8px; text-align: center;">Judge 1</th>
                                <th style="padding: 8px; text-align: center;">Judge 2</th>
                                <th style="padding: 8px; text-align: center;">Judge 3</th>
                                <th style="padding: 8px; text-align: center;">(sum of average per criteria)</th>
                                @elseif (Auth::User()->role === 'judge1')
                                <th style="padding: 8px; text-align: center;">Judge 1</th>
                                <th style="padding: 8px; text-align: center;">Judge 1</th>
                                <th style="padding: 8px; text-align: center;">Judge 1</th>
                                @elseif (Auth::User()->role === 'judge2')
                                <th style="padding: 8px; text-align: center;">Judge 2</th>
                                <th style="padding: 8px; text-align: center;">Judge 2</th>
                                <th style="padding: 8px; text-align: center;">Judge 2</th>
                                @elseif (Auth::User()->role === 'judge3')
                                <th style="padding: 8px; text-align: center;">Judge 3</th>
                                <th style="padding: 8px; text-align: center;">Judge 3</th>
                                <th style="padding: 8px; text-align: center;">Judge 3</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($contestantD->zip($scoreM,$scoreN,$scoreO) as [$contestantD, $scoreM, $scoreN,$scoreO]) 
                            <tr>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">
                                <form method="post" action="/tabulate/mmg/qna/{{ $scoreM->id }}">@csrf
                                @if (Auth::user()->status === 'open')
                                <button class="dropbtn">Update</button>
                                @else {{ __('TALLY CLOSED') }}
                                @endif</form></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $contestantD->office }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $contestantD->name }}</td>
                                @if (Auth::User()->role === 'admin')
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $scoreM->judge1 }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $scoreM->judge2 }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $scoreM->judge3 }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $scoreN->judge1 }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $scoreN->judge2 }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $scoreN->judge3 }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $scoreO->judge1 }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $scoreO->judge2 }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $scoreO->judge3 }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{number_format((($contestantD->totalqna)/.3),2)}}</td>
                                @elseif (Auth::User()->role === 'judge1')
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $scoreM->judge1 }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $scoreN->judge1 }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $scoreO->judge1 }}</td>
                                @elseif (Auth::User()->role === 'judge2')
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $scoreM->judge2 }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $scoreN->judge2 }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $scoreO->judge2 }}</td>
                                @elseif (Auth::User()->role === 'judge3')
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $scoreM->judge3 }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $scoreN->judge3 }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $scoreO->judge3 }}</td>
                                @endif
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
