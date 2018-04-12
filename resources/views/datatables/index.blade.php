@extends('dashboard')

@section('content')
    <table class="table table-bordered" id="arsr-table">
        <thead>
            <tr>
                <th>Project Number</th>
                <th>View</th>
                <th>Type</th>
                <th>BPAC</th>
                <th>Amount</th>
            </tr>
        </thead>
    </table>
@stop

@push('scripts')
    <script>
        $(function() {
            $('#arsr-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('datatables.data') !!}',
                columns: [
                    { data: 'Project_Number', name: 'Project_Number' },
                    { data: 'Index_View_title', name: 'Index_View_title' },
                    { data: 'Type_text', name: 'Type_text' },
                    { data: 'BPAC_title', name: 'BPAC_title' },
                    { data: 'Amount', name: 'Amount' }
                ],
                select: true,
                buttons: [
                    { extend: "create", editor: editor },
                    { extend: "edit",   editor: editor },
                    { extend: "remove", editor: editor }
                ]                
            });
        });
    </script>
@endpush