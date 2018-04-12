<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ARSR Test</title>
<!--<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>-->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jqc-1.12.3/dt-1.10.16/b-1.5.1/sl-1.2.5/datatables.min.css"/>
        <link rel="stylesheet" href="{{asset('/plugins/editor/Editor-1.7.3/css/editor.dataTables.css')}}">
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jqc-1.12.3/dt-1.10.16/b-1.5.1/sl-1.2.5/datatables.min.js"></script>
        <script type="text/javascript" src="{{asset('plugins/editor/Editor-1.7.3/js/dataTables.editor.js')}}"></script>
        <link rel="stylesheet" href="{{asset('/plugins/editor/datatables.css')}}">
        <script type="text/javascript" src="{{asset('plugins/editor/datatables.js')}}"></script>
        
    </head>
    <body>
        <div class="container">
            {{$dataTable->table(['id' => 'arsr'])}}
        </div>
        <script>
            var editor;
            $(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': '{{csrf_token()}}'
                    }
                });
                editor = new $.fn.dataTable.Editor({
                    ajax: "/arsrtwo",
                    table: "#arsr",
                    processing: true,
                    serverSide: true,
                    fields: [
                        {label: "ID:", name: "id"},
                        {label: "Item ID:", name: "item_id"},
                        {label: "Project Number:", name: "Project Number"},
                        {label: "Amount:", name: "Amount"},      
                    ]
                });
                // Inline editing
                $('#arsr').on('click', 'tbody td:not(:first-child)', function (e) {
                    editor.inline(this);
                });
                {{$dataTable->generateScripts()}}
            })
        </script>
    </body>
</html>