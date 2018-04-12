@extends('layouts.master')
      <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
@section('content')
<h1 text-align="center">7 Elements</h1>
    <table class="table table-bordered" id="arsr-table">
        <thead>
            <tr>
                <th>Project Number</th>
                <th>Index_View_title</th>
                <th>Type_text</th>
                <th>BPAC_title</th>
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
            ajax: '{{ route('datatables.data') }}',
            searching: false,
            columns: [
                { data: 'Project Number', name: 'Project Number' },
                { data: 'Index_View_title', name: 'Index_View_title' },
                { data: 'Type_text', name: 'Type_text' },
                { data: 'BPAC_title', name: 'BPAC_title' },
                { data: 'Amount', name: 'Amount' }
            ],
        });
});
</script>
@endpush