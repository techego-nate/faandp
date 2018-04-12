<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>FAA NDP - 7 Elements Dashboard</title>
        
        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">

        <!-- jQuery -->
        <script src="//code.jquery.com/jquery.js"></script>
        <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
        <script type="text/javascript" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
 
        <!-- jQuery UI -->
        <link href="https://code.jquery.com/ui/1.10.0/themes/base/jquery-ui.css" rel="stylesheet">
        <script src="https://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>
        
        <!-- Bootstrap  -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        
        <!-- Datatables -->
        <link rel="stylesheet" type="text/css" href="{{asset('plugins/datatables/datatables.min.css')}}"/>
        <script type="text/javascript" src="{{asset('plugins/datatables/datatables.min.js')}}"></script>

            <!-- Read only display Datatables Plugin --> 
            <script type="text/javascript" src="{{asset('plugins/datatables/editor.display.js')}}"></script>
            <!-- Selectize Datatables Plugin --> 
            <script type="text/javascript" src="{{asset('plugins/datatables/editor.selectize.js')}}"></script>
        
        <!-- Selectize -->
        <link href="//cdnjs.cloudflare.com/ajax/libs/selectize.js/0.9.0/css/selectize.css" rel="stylesheet">
        <script src="//cdnjs.cloudflare.com/ajax/libs/selectize.js/0.9.0/js/standalone/selectize.js"></script>
        
        <style>
            html {background: #003e7e;}
            body, div, p {font-family: 'Open Sans', sans-serif;}
            h1,h2,h3,h4 {font-family: 'Open Sans', sans-serif; font-weight:600!important;}
            .outer-container {background: #e9e9e9; padding-bottom:50px;}
            .container-box {
                background: #f6f6f6;
                padding-bottom:20px;
                margin-top:30px;
                margin-bottom:20px;
                border-radius: 6px;
            }
            .container-box table {background:#fff;}
            .container-box .h3 {}
            /*.table>thead>tr>th, .table>tbody>tr>th, .table>tfoot>tr>th, .table>thead>tr>td, .table>tbody>tr>td, .table>tfoot>tr>td {padding:4px!important;}*/
            /*table.dataTable.no-footer {border-bottom:0px!important;}*/
            
            /*REQUIRED FOR SELECTIZE*/
            div.selectize-dropdown {z-index: 2001; }
            
            .dataTables_length{
                padding-top:4px;
            }
            
            .dataTables_processing {
                z-index: 999;
            }
        </style>
    </head>
    

    <body>
        <div class="outer-container">
            @include ('layouts.nav')

            <div class="container container-box">
                @yield('content')
            </div>     
        
        </div>
        
        @stack('scripts')
    </body>
    @include ('layouts.footer')
</html>