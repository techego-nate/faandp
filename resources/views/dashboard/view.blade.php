@extends('layouts.master_working_old')
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
                text-align:center;
            }
            a.element-link {
                text-decoration:none;
                color: #333;
                cursor: pointer;
            }
            a.table-link {
                text-decoration:none;
                color: #333;
                cursor: pointer;
            }
            h3 {font-weight:bold;}
        </style>
@section('content')
    <h1 class="m-b-md">ARSR View</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/home">Main Dashboard</a></li>
        <li class="breadcrumb-item"><a href="/home/{{ app('request')->input('from_element_url') }}" class="from-element"></a></li>
        <li class="breadcrumb-item active view-title"></li>
    </ol>
    <h3><span class="view-title"></span> Items</h3>
    <table class="table table-bordered" id="view-table"></table>
@stop

@push('scripts')
<script>
    function titleCase(str) {
      str = str.toLowerCase().split(' ');
      for (var i = 0; i < str.length; i++) {
        str[i] = str[i].charAt(0).toUpperCase() + str[i].slice(1); 
      }
      return str.join(' ');
    };
    var viewTitle = "{{ app('request')->input('view_title') }}";
    $( ".view-title" ).append( viewTitle );
    var fromElementURL = "{{ app('request')->input('from_element_url') }}";
    var fromElement = titleCase(fromElementURL.replace(/-/g, " "));
    $( ".from-element" ).append( fromElement );
    $(function() {
        var editor;
        $('#view-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: ({url: '/getViewData/{{ app('request')->input('view_id') }}', type: 'get' }),
    //        dom: 't',
            pageLength: 25,
            columns: [
                { title: 'Task', data: 'Task Number_title', name: 'Task Number_title' },
                { title: 'Object Class', data: 'OBJ Class_title', name: 'OBJ Class_title' },
                { title: 'Org', data: 'Org_title', name: 'Org_title' },
                { title: 'Type', data: 'Type_text', name: 'Type_text' },
                { title: 'GL Date', data: 'GL Date_startdate', name: 'GL Date_startdate' },
                { title: 'Vendor', data: 'Vendor_title', name: 'Vendor_title' },
                { title: 'Invoice #', data: 'Inv Num_title', name: 'Inv Num_title' },
                { title: 'Amount', data: 'Amount', name: 'Amount' }
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