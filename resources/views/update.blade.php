<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Update Data') }}
        </h2>
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

        /* Style table data cells */
        /*td {
            border: 1px solid #ddd;  /* Add border to table data cells /
            padding: 8px;
            text-align: left;
        }*/

        /* Add some hover effect to table rows */
        tr:hover {
            background-color: blue;
        
        
        }
        .btn {
            background-color: green;
            color: white;
            min-width: 80px;
            padding: 8px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 10px;
            }
        .in {
            border-radius: 10px; 
            width: 300px;                     
            } 
    
    </style>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100" style="color: white">
                   <table>
                        <thead>
                            <tr>
                                <th style="padding: 10px; min-width: unset;">Action</th>
                                <th style="padding: 10px; min-width: unset;">Name</th>
                                <th style="padding: 10px; min-width: unset;">Gender</th>
                                <th style="padding: 10px; min-width: unset;">Office</th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                
                                    <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">
                                    <form method="post" action="/delete/{{$update->id}}">@csrf<input type="hidden" name="contest" value="{{ $update->contest }}" style="color: black"><button class="btn">Delete</button></form>
                                        <form method="post" action="/update/{{$update->id}}/save">
                                        @csrf
                                        <button class="btn">Save</button></td>
                                    <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><input type="text" name="name" value="{{ $update->name }}" style="color: black"></input></td>
                                    <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"><select class="in" name="gender" required style="color:black">
                                        <option value="" disabled selected>Gender</option>
                                        <option value="M">Male</option>
                                        <option value="F">Female</option>
                                    </select></td>
                                    <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">
                                        <select class="in" name="office" style="color:black" required>
                                            <option value="" disabled selected>Office</option>
                                            <option value="DNFO">DNFO/DIEO</option>
                                            <option value="DSFO">DSFO</option>
                                            <option value="DOCFO">DOCFO</option>
                                            <option value="DORFO">DORFO</option>
                                            <option value="DOFO">DOFO</option>
                                            <option value="DCFO">DCFO</option>
                                        </select><input type="hidden" name="contest" value="{{ $update->contest }}" style="color: black"></input></td>
                                    </form>
                                </tr>            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
