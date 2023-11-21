<x-app-layout>
    @if (Auth::user()->role === 'admin')
    <x-slot name="header">
        <div class="flex">
            <div class="flex">
                <div class="flex">
                    <div class="">
                        <h5 style="color:green">Register Participant<h5>
                        <form method="post" action="/addparticipant">
                            {{ csrf_field() }}
                            <input class="in" type="text" name="name" placeholder="Name" value="" required/>
                            <select class="in" name="office" required>
                                <option value="" disabled selected>Office</option>
                                <option value="DNFO">DNFO</option>
                                <option value="DSFO">DSFO</option>
                                <option value="DOCFO">DOCFO</option>
                                <option value="DORFO">DORFO</option>
                                <option value="DOFO">DOFO</option>
                                <option value="DCFO">DCFO</option>
                            </select>
                            <select class="in" name="gender" required>
                                <option value="" disabled selected>Gender</option>
                                <option value="M">Male</option>
                                <option value="F">Female</option>
                            </select>
                            <select class="in" name="contest" required>
                                <option value="" disabled selected>Contest</option>
                                <option value="mmg">Mr. and Ms. GIP 2023</option>
                                <option value="gmdc">GIP Modern Dance Contest</option>
                                <option value="gcqb">GIP Congress Quiz Bee</option>
                                <option value="mge">My GIP Experience</option>
                            </select>
                            <button type="submit" class="btn">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
    @endif

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
        .up {
            background-color: green;
            color: white;
            min-width: 80px;
            padding: 8px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 10px;
            
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
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8 container">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg box">
                <div class="p-6 text-gray-900 dark:text-gray-100" style="color: green">
                   <table>
                        <thead>
                            <tr>
                                @if (Auth::user()->role === 'admin')
                                <th colspan="4" style="padding: 10px; min-width: unset;">MR. AND MS. GIP 2023</th>
                                @else
                                <th colspan="3" style="padding: 10px; min-width: unset;">MR. AND MS. GIP 2023</th> 
                                @endif
                            </tr>
                            <tr>
                                @if (Auth::user()->role === 'admin')
                                <th style="padding: 10px; min-width: unset;">ACTION</th>
                                @endif
                                <th style="padding: 10px; min-width: unset;">Name</th>
                                <th style="padding: 10px; min-width: unset;">Gender</th>
                                <th style="padding: 10px; min-width: unset;">Office</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mmg as $mmg)
                            <tr>
                                @if (Auth::user()->role === 'admin')
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><form method="post" action="/contestants/{{$mmg->id}}">@csrf<input name="contest" type="hidden" value="mmg"><button type="submit" class="up">Update</button></form></td>           
                                @endif
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $mmg->name }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $mmg->gender }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $mmg->office }}</td></form>
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
                                <th colspan="4" style="padding: 10px; min-width: unset;">GIP MODERN DANCE CONTEST</th>
                            </tr>
                            <tr>
                                @if (Auth::user()->role === 'admin')
                                <th style="padding: 10px; min-width: unset;">ACTION</th>
                                @endif
                                <th style="padding: 10px; min-width: unset;">Name</th>
                                <th style="padding: 10px; min-width: unset;">Gender</th>
                                <th style="padding: 10px; min-width: unset;">Office</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($gmdc as $gmdc)
                            <tr>
                                @if (Auth::user()->role === 'admin')
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><form method="post" action="/contestants/{{$gmdc->id}}">@csrf<input name="contest" type="hidden" value="gmdc"><button type="submit" class="up">Update</button></form></td>           
                                @endif
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $gmdc->name }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $gmdc->gender }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $gmdc->office }}</td>
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
                                <th colspan="4" style="padding: 10px; min-width: unset;">GIP CONGRESS QUIZ BEE</th>
                            </tr>
                            <tr>
                                @if (Auth::user()->role === 'admin')
                                <th style="padding: 10px; min-width: unset;">ACTION</th>
                                @endif
                                <th style="padding: 10px; min-width: unset;">Name</th>
                                <th style="padding: 10px; min-width: unset;">Gender</th>
                                <th style="padding: 10px; min-width: unset;">Office</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($gcqb as $gcqb)
                            <tr>
                                @if (Auth::user()->role === 'admin')
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><form method="post" action="/contestants/{{$gcqb->id}}">@csrf<input name="contest" type="hidden" value="gcqb"><button type="submit" class="up">Update</button></form></td>           
                                @endif
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $gcqb->name }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $gcqb->gender }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $gcqb->office }}</td>
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
                                <th colspan="4" style="padding: 10px; min-width: unset;">MY GIP EXPERIENCE</th>
                            </tr>
                            <tr>
                                @if (Auth::user()->role === 'admin')
                                <th style="padding: 10px; min-width: unset;">ACTION</th>
                                @endif
                                <th style="padding: 10px; min-width: unset;">Name</th>
                                <th style="padding: 10px; min-width: unset;">Gender</th>
                                <th style="padding: 10px; min-width: unset;">Office</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mge as $mge)
                            <tr>
                                @if (Auth::user()->role === 'admin')
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><form method="post" action="/contestants/{{$mge->id}}">@csrf<input name="contest" type="hidden" value="mge"><button type="submit" class="up">Update</button></form></td>           
                                @endif
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $mge->name }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $mge->gender }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ $mge->office }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
