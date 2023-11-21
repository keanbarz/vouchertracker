<x-app-layout>

    <style>/*Tables+Input Box+Button*/
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
        .in {
            border-radius: 10px; 
            width: 500px;                     
            } 
        .btn {
            background-color: green;
            color: white;
            min-width: 80px;
            height: 40px;
            padding: 8px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 10px;
            position: absolute;
            }   
    </style>
    <style>/*Containers*/
        .container {
                display: flex; /* Use flexbox for layout */
            }

            .box {
                width: 50%; /* Each div takes up 50% of the container's width */
                padding: 20px;
                margin-right: 50px;}

            /* Add a small margin to the right of the first div */    
    </style>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <div class="py-12">
        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-9">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100" style="color: white">
                    <p style="text-align: center; color:green"><b>SCORES IN NO PARTICULAR ORDER</b></p>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8 container">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg box">
                <div class="p-6 text-gray-900 dark:text-gray-100" style="color: green">
                   <table>
                        <thead>
                            <tr>
                                <th colspan="4" style="padding: 10px; min-width: unset;">MR. AND MS. GIP 2023 (MALE)</th>
                            </tr>
                            <tr>
                                <th style="padding: 10px; min-width: unset;">CONTENDER</th>
                                <th style="padding: 10px; min-width: unset;">SCORE</th>
                                <th style="padding: 10px; min-width: unset;">RANKING</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mmmg->zip($mranks) as [$mmmg, $mranks])
                            <tr>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $mmmg->npo }}</td>           
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ number_format(($mmmg->overall),2) }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $mranks->ranking }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg box">
                <div class="p-6 text-gray-900 dark:text-gray-100" style="color: green">
                   <table>
                        <thead>
                            <tr>
                                <th colspan="4" style="padding: 10px; min-width: unset;">MR. AND MS. GIP 2023 (FEMALE)</th>
                            </tr>
                            <tr>
                                <th style="padding: 10px; min-width: unset;">CONTENDER</th>
                                <th style="padding: 10px; min-width: unset;">SCORE</th>
                                <th style="padding: 10px; min-width: unset;">RANKING</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($fmmg->zip($franks) as [$fmmg, $franks])
                            <tr>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $fmmg->npo ?? "" }}</td>           
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ number_format(($fmmg->overall ?? "0"),2) }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $franks->ranking ?? ""}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="py-8">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8 container">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg box">
                <div class="p-6 text-gray-900 dark:text-gray-100" style="color: green">
                   <table>
                        <thead>
                            <tr>
                                <th colspan="4" style="padding: 10px; min-width: unset;">GIP MODERN DANCE CONTEST</th>
                            </tr>
                            <tr>
                                <th style="padding: 10px; min-width: unset;">CONTENDER</th>
                                <th style="padding: 10px; min-width: unset;">SCORE</th>
                                <th style="padding: 10px; min-width: unset;">RANKING</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($gmdc->zip($ranks) as [$gmdc, $rank])
                            <tr>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $gmdc->npo }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: center;">{{ number_format(($gmdc->total),2) }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: center;">{{ $rank->ranking }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg box">
                <div class="p-6 text-gray-900 dark:text-gray-100" style="color: green">
                   <table>
                        <thead>
                            <tr>
                                <th colspan="4" style="padding: 10px; min-width: unset;">GIP CONGRESS QUIZ BEE</th>
                            </tr>
                            <tr>
                                <th style="padding: 10px; min-width: unset;">CONTENDER</th>
                                <th style="padding: 10px; min-width: unset;">SCORE</th>
                                <th style="padding: 10px; min-width: unset;">RANKING</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($gcqb->zip($gcqbrank) as [$gcqb, $gcqbrank])
                            <tr>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $gcqb->npo }}</td>           
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: center;">{{ $gcqb->total }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: center;">{{ $gcqbrank->ranking }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </br>
    </br>
    <div class="py-8">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8 container">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg box">
                <div class="p-6 text-gray-900 dark:text-gray-100" style="color: green">
                    <table>
                        <thead>
                            <tr>
                                <th colspan="4" style="padding: 10px; min-width: unset;">MY GIP EXPERIENCE</th>
                            </tr>
                            <tr>
                                <th style="padding: 10px; min-width: unset;">CONTENDER</th>
                                <th style="padding: 10px; min-width: unset;">SCORE</th>
                                <th style="padding: 10px; min-width: unset;">RANKING</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mge->zip($mgerank) as [$mge, $mgerank])
                            <tr>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $mge->npo }}</td>           
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: center;">{{ number_format ($mge->total, 2) }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: center;">{{ $mgerank->ranking }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg box">
                <div class="p-6 text-gray-900 dark:text-gray-100" style="color: green">
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
