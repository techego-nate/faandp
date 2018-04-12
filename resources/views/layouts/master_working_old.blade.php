<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>FAA NDP - 7 Elements Dashboard</title>
        
        <!-- Bootstrap CSS -->
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
        
        <!--Buttons-->
<!--        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.0/css/buttons.bootstrap.min.css">
        <script src="https://cdn.datatables.net/buttons/1.5.0/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.0/js/buttons.colVis.min.js"></script>
        
        <script src="https://cdn.datatables.net/buttons/1.5.0/js/buttons.bootstrap.min.js"></script>
        
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
        <script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
        
        <script src="/plugins/js/buttons.server-side.js"></script>-->
        
<!--        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.0/css/buttons.bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/select/1.2.4/css/select.bootstrap.min.css">
        <link rel="stylesheet" href="/plugins/editor/css/dataTables.editor.css">
        <link rel="stylesheet" href="/plugins/editor/css/editor.bootstrap.css">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.0/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.0/js/buttons.colVis.min.js"></script>
        <script src="https://cdn.datatables.net/select/1.2.4/js/dataTables.select.min.js"></script>
        <script src="{{asset('plugins/editor/js/dataTables.editor.js')}}"></script>

        <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.0/js/buttons.bootstrap.min.js"></script>

        <script src="{{asset('plugins/editor/js/editor.bootstrap.min.js')}}"></script>
        
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
        <script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
        <script src="/plugins/js/buttons.server-side.js"></script>-->

        <!-- jQuery -->
        <script src="//code.jquery.com/jquery.js"></script>
        <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
<!--        <script src="//code.jquery.com/jquery-1.12.4.js"></script>
        <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="//editor.datatables.net/extensions/Editor/js/dataTables.editor.min.js"></script>
        <script src="//editor.datatables.net/extensions/Editor/js/editor.jqueryui.min.js"></script>-->
        <!-- DataTables -->
        <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
        <!-- Bootstrap JavaScript -->
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <!-- App scripts -->
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
            .table>thead>tr>th, .table>tbody>tr>th, .table>tfoot>tr>th, .table>thead>tr>td, .table>tbody>tr>td, .table>tfoot>tr>td {padding:4px!important;}
            table.dataTable.no-footer {border-bottom:0px!important;}
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