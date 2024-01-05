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
            }   
    </style>


    <!--<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>-->

    <div class="py-12 container-fluid">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100" style="color: green">
                   <table>
                        <thead>
                            <tr>
                                <th colspan="5" style="padding: 10px; min-width: unset;" class="text-center">RECEIVED VOUCHERS</th>
                            </tr>
                            <tr>
                                <th style="padding: 10px; min-width: unset;">ACTION</th>
                                <th style="padding: 10px; min-width: unset;">PAYEE</th>
                                <th style="padding: 10px; min-width: unset;">PARTICULARS</th>
                                <th style="padding: 10px; min-width: unset;">AMOUNT</th>
                                <th style="padding: 10px; min-width: unset;">REMARKS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <form method="post" action="/save">@CSRF
                                    <td style="border: 1px solid #ddd; padding: 8px; text-align: left; container">
                                        <button class="btn">Submit</button>
                                    </td>
                                    <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">
                                        <input required class="container rounded" size="10" type="text" name="payee" placeholder="Basi pwede integrate tung payee something basta mag add dv" value="" style="color: black; padding-right: 3px; padding-left: 3px; text-align: center;">
                                        </input>    
                                    </td>           
                                    <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">
                                        <input required class="container rounded" size="10" type="text" name="particulars" placeholder="Particulars" value="" style="color: black; padding-right: 3px; padding-left: 3px; text-align: center;">
                                        </input>    
                                    </td>
                                    <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">
                                        <input required class="container rounded" size="10" type="number" name="amount" placeholder="Amount" value="" style="color: black; padding-right: 3px; padding-left: 3px; text-align: center;">
                                        </input>    
                                    </td>
                                    <td style="border: 1px solid #ddd; padding: 8px; text-align: left; container">
                                    </td>
                                </form>
                            </tr>
                            @foreach ($voucher as $data)
                            <tr>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;"></td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ ($data->payee ?? "") }}</td>           
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ ($data->particulars ?? "") }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ number_format ($data->amount ?? "",2) }}</td>
                                <td style="border: 1px solid #ddd; padding: 8px; text-align: left;">{{ ($data->remarks ?? "") }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--div class="container mt-3">
  <h2>Simple Collapsible</h2>
  <p>Click on the button to toggle between showing and hiding content.</p>
  <button type="button" class="btn btn-primary" data-bs-toggle="collapse" data-bs-target="#demo">Simple collapsible</button>
  <div id="demo" class="collapse">
    Lorem ipsum dolor sit amet, consectetur adipisicing elit,
    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
  </div>
</div-->   
</x-app-layout>
