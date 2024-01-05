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


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100" style="color: green">
                   <table>
                        <thead>
                            <tr>
                                <th colspan="4" style="padding: 10px; min-width: unset;">SOMETHING</th>
                            </tr>
                            <tr>
                                <th style="padding: 10px; min-width: unset;">CONTENDER</th>
                                <th style="padding: 10px; min-width: unset;">SCORE</th>
                                <th style="padding: 10px; min-width: unset;">RANKING</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"></td>           
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100" style="color: green">
                <iframe src="http://127.0.0.1:8000" width="800" height="800" frameborder="0"></iframe>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
