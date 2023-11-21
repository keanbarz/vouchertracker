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

    <div class="py-12">
        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-9">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100" style="color: green">
                    @if (Auth::user()->contest === 'all' || Auth::user()->contest === 'mmg')
                    <table>
                        <thead>
                            <tr>
                                <th style="padding: 10px; min-width: unset;">ACTION</th>
                                <th style="padding: 10px; min-width: unset;">Office</th>
                                <th style="padding: 10px; min-width: unset;">Candidate Name</th>
                                @if (Auth::user()->role === 'admin')
                                <th colspan="3" style="padding: 10px; min-width: unset;">Beauty and Poise (30%)</th>
                                <th colspan="3" style="padding: 10px; min-width: unset;">Stage Presence (30%)</th>
                                <th colspan="3" style="padding: 10px; min-width: unset;">Overall Appearance (30%)</th>
                                <th colspan="3" style="padding: 10px; min-width: unset;">Audience Impact (10%)</th>
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
                                <th style="padding: 10px; min-width: unset;">{{strtoupper($scoreA->segment)}}</th>
                                <th style="padding: 10px; min-width: unset;"></th>
                                <th style="padding: 10px; min-width: unset;"></th>
                                @if (Auth::user()->role === 'admin')
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
                                @elseif (Auth::user()->role === 'judge1')
                                <th style="padding: 8px; text-align: center;">Judge 1</th>
                                <th style="padding: 8px; text-align: center;">Judge 1</th>
                                <th style="padding: 8px; text-align: center;">Judge 1</th>
                                <th style="padding: 8px; text-align: center;">Judge 1</th>
                                @elseif (Auth::user()->role === 'judge2')
                                <th style="padding: 8px; text-align: center;">Judge 2</th>
                                <th style="padding: 8px; text-align: center;">Judge 2</th>
                                <th style="padding: 8px; text-align: center;">Judge 2</th>
                                <th style="padding: 8px; text-align: center;">Judge 2</th>
                                @elseif (Auth::user()->role === 'judge3')
                                <th style="padding: 8px; text-align: center;">Judge 3</th>
                                <th style="padding: 8px; text-align: center;">Judge 3</th>
                                <th style="padding: 8px; text-align: center;">Judge 3</th>
                                <th style="padding: 8px; text-align: center;">Judge 3</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">
                                <form method="post" action="/tabulate/mmg/pna/save/{{$scoreA->id}}">@csrf<button class="dropbtn">Save</button></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $contestant->office }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $contestant->name }}</td>
                                @if (Auth::user()->role === 'admin')
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><input size="5" type="text" name="bnpj1" value="{{$scoreA->judge1}}" style="color: black; padding-right: 3px; padding-left: 3px; text-align: center;"></input></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><input size="5" type="text" name="bnpj2" value="{{$scoreA->judge2}}" style="color: black; padding-right: 3px; padding-left: 3px; text-align: center;"></input></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><input size="5" type="text" name="bnpj3" value="{{$scoreA->judge3}}" style="color: black; padding-right: 3px; padding-left: 3px; text-align: center;"></input></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><input size="5" type="text" name="spj1" value="{{$scoreB->judge1}}" style="color: black; padding-right: 3px; padding-left: 3px; text-align: center;"></input></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><input size="5" type="text" name="spj2" value="{{$scoreB->judge2}}" style="color: black; padding-right: 3px; padding-left: 3px; text-align: center;"></input></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><input size="5" type="text" name="spj3" value="{{$scoreB->judge3}}" style="color: black; padding-right: 3px; padding-left: 3px; text-align: center;"></input></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><input size="5" type="text" name="oaj1" value="{{$scoreC->judge1}}" style="color: black; padding-right: 3px; padding-left: 3px; text-align: center;"></input></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><input size="5" type="text" name="oaj2" value="{{$scoreC->judge2}}" style="color: black; padding-right: 3px; padding-left: 3px; text-align: center;"></input></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><input size="5" type="text" name="oaj3" value="{{$scoreC->judge3}}" style="color: black; padding-right: 3px; padding-left: 3px; text-align: center;"></input></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><input size="5" type="text" name="aij1" value="{{$scoreD->judge1}}" style="color: black; padding-right: 3px; padding-left: 3px; text-align: center;"></input></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><input size="5" type="text" name="aij2" value="{{$scoreD->judge2}}" style="color: black; padding-right: 3px; padding-left: 3px; text-align: center;"></input></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><input size="5" type="text" name="aij3" value="{{$scoreD->judge3}}" style="color: black; padding-right: 3px; padding-left: 3px; text-align: center;"></input></td>
                                @elseif (Auth::user()->role === 'judge1')
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><input size="5" type="text" name="bnpj1" value="{{$scoreA->judge1}}" style="color: black; padding-right: 3px; padding-left: 3px; text-align: center;"></input></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><input size="5" type="text" name="spj1" value="{{$scoreB->judge1}}" style="color: black; padding-right: 3px; padding-left: 3px; text-align: center;"></input></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><input size="5" type="text" name="oaj1" value="{{$scoreC->judge1}}" style="color: black; padding-right: 3px; padding-left: 3px; text-align: center;"></input></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><input size="5" type="text" name="aij1" value="{{$scoreD->judge1}}" style="color: black; padding-right: 3px; padding-left: 3px; text-align: center;"></input></td>
                                @elseif (Auth::user()->role === 'judge2')
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><input size="5" type="text" name="bnpj2" value="{{$scoreA->judge2}}" style="color: black; padding-right: 3px; padding-left: 3px; text-align: center;"></input></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><input size="5" type="text" name="spj2" value="{{$scoreB->judge2}}" style="color: black; padding-right: 3px; padding-left: 3px; text-align: center;"></input></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><input size="5" type="text" name="oaj2" value="{{$scoreC->judge2}}" style="color: black; padding-right: 3px; padding-left: 3px; text-align: center;"></input></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><input size="5" type="text" name="aij2" value="{{$scoreD->judge2}}" style="color: black; padding-right: 3px; padding-left: 3px; text-align: center;"></input></td>
                                @elseif (Auth::user()->role === 'judge3')
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><input size="5" type="text" name="bnpj3" value="{{$scoreA->judge3}}" style="color: black; padding-right: 3px; padding-left: 3px; text-align: center;"></input></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><input size="5" type="text" name="spj3" value="{{$scoreB->judge3}}" style="color: black; padding-right: 3px; padding-left: 3px; text-align: center;"></input></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><input size="5" type="text" name="oaj3" value="{{$scoreC->judge3}}" style="color: black; padding-right: 3px; padding-left: 3px; text-align: center;"></input></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><input size="5" type="text" name="aij3" value="{{$scoreD->judge3}}" style="color: black; padding-right: 3px; padding-left: 3px; text-align: center;"></input></td>
                                @endif
                                </form>
                            </tr>
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
