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

    @if (Auth::user()->role === 'admin')
    <a href="/tally/mge/close"><button class="dropbtn">Close Tally</button></a>
    <a href="/tally/mge/open"><button class="dropbtn">Open Tally</button></a>
    @endif
    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100" style="color: white;">
                    @if (Auth::user()->contest === 'all' || Auth::user()->contest === 'mge')
                    <table>
                        <thead>
                            <tr>
                                <th style="padding: 10px; min-width: unset;">OFFICE</th>
                                <th style="padding: 10px; min-width: unset;">CONTENT AND RELEVANCE (60%)</th>
                                <th style="padding: 10px; min-width: unset;">CREATIVITY (40%)</th>
                                <th style="padding: 10px; min-width: unset;">TOTAL (100%)</th>
                                <th style="padding: 10px; min-width: unset;">RANKING</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mgescores->zip($ranks) as [$mgescore, $rank])
                            <tr>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $mgescore->office }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: center;">{{ number_format ($mgescore->acarj,2) }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: center;">{{ number_format ($mgescore->acrj,2) }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: center;">{{ number_format ($mgescore->total , 2) }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: center;">{{ $rank->ranking }}</td>
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
