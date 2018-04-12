@extends('layouts.master')
@section('content')
    <table id="arsr" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Project Number</th>
                <th>Element</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Project Number</th>
                <th>Element</th>
            </tr>
        </tfoot>
    </table>
    <div class="container">
        {{$dataTable->table(['id' => 'users'])}}
    </div>
     <script>
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                }
            });
            var editor = new $.fn.dataTable.Editor({
                ajax: "/test/arsr",
                table: "#ARSR",
                display: "bootstrap",
                fields: [
                    {label: "Project Number:", name: "Project Number"},
                    {label: "Element:", name: "Element"},
                ]
            });
            $('#ARSR').on('click', 'tbody td:not(:first-child)', function (e) {
                editor.inline(this);
            });
            {{$dataTable->generateScripts()}}
        })
    </script>
@endsection