@extends('layouts.master')

@section('content')
    <h1 class="m-b-md">7 Elements Dashboard</h2>
    {{ route('overall') }}
    <!--@include('dashboard.l1lm')-->
    
<!--    <h3><a class="element-link" href="/home/2nd-level-engineering">2nd Level Engineering</a></h3>
    {{$dataTable->table(['id' => '2le'])}}
    <h3><a class="element-link" href="/home/utilities">Utilities</a></h3>
    {{$dataTable->table(['id' => 'utilities'])}}
    <h3><a class="element-link" href="/home/logistics">Logistics</a></h3>
    {{$dataTable->table(['id' => 'logistics'])}}
    <h3><a class="element-link" href="/home/uis">UIS</a></h3>
    {{$dataTable->table(['id' => 'uis'])}}
    <h3><a class="element-link" href="/home/facility-support">Facility Support</a></h3>
    {{$dataTable->table(['id' => 'facility'])}}
    <h3><a class="element-link" href="/home/training">Training</a></h3>
    {{$dataTable->table(['id' => 'training'])}}-->

    <script>
//        $(function() {
//            $.ajaxSetup({
//                headers: {
//                    'X-CSRF-TOKEN': '{{csrf_token()}}'
//                }
//            });
//
//            {{$dataTable->generateScripts()}}
//        });
    
//$(function() {
//    $('#overall-table').dataTable({
//        processing: true,
//        serverSide: true,
//        ajax: ({url: '/overallData', type: 'get' }),
//        searching: false,
//        dom: 't',
//        ordering: false,
//        columns: [
//            { data: 'Annual Budget', name: 'Annual Budget' },
//            { data: 'Annual Estimate', name: 'Annual Estimate' },
//            { data: 'YTD Actual', name: 'YTD Actual' },
//            { data: 'YTD Surplus', name: 'YTD Surplus' },
//            { data: 'YTD Remaining', name: 'YTD Remaining' }
//        ],
//    });
//});
//$(function() {
//    $('#l1lm-table').DataTable({
//        processing: true,
//        serverSide: true,
//        ajax: ({url: '/elementsData/1st Level Maintenance', type: 'get' }),
//        searching: false,
//        dom: 't',
//        ordering: false,
//        columns: [
//            { data: 'Budget_amount', name: 'Budget_amount' },
//            { data: 'YTD Estimate_amount', name: 'YTD Estimate_amount' },
//            { data: 'YTD Actual', name: 'YTD Actual' },
//            { data: 'Surplus', name: 'Surplus' },
//            { data: 'Remaining', name: 'Remaining' }
//        ],
//    });
//});
//$(function() {
//    $('#2le-table').DataTable({
//        processing: true,
//        serverSide: true,
//        ajax: ({url: '/elementsData/2nd Level Engineering', type: 'get' }),
//        searching: false,
//        dom: 't',
//        ordering: false,
//        columns: [
//            { data: 'Budget_amount', name: 'Budget_amount' },
//            { data: 'YTD Estimate_amount', name: 'YTD Estimate_amount' },
//            { data: 'YTD Actual', name: 'YTD Actual' },
//            { data: 'Surplus', name: 'Surplus' },
//            { data: 'Remaining', name: 'Remaining' }
//        ],
//    });
//});
//$(function() {
//    $('#utilities-table').DataTable({
//        processing: true,
//        serverSide: true,
//        ajax: ({url: '/elementsData/Utilities', type: 'get' }),
//        searching: false,
//        dom: 't',
//        ordering: false,
//        columns: [
//            { data: 'Budget_amount', name: 'Budget_amount' },
//            { data: 'YTD Estimate_amount', name: 'YTD Estimate_amount' },
//            { data: 'YTD Actual', name: 'YTD Actual' },
//            { data: 'Surplus', name: 'Surplus' },
//            { data: 'Remaining', name: 'Remaining' }
//        ],
//    });
//});
//$(function() {
//    $('#logistics-table').DataTable({
//        processing: true,
//        serverSide: true,
//        ajax: ({url: '/elementsData/Logistics', type: 'get' }),
//        searching: false,
//        dom: 't',
//        ordering: false,
//        columns: [
//            { data: 'Budget_amount', name: 'Budget_amount' },
//            { data: 'YTD Estimate_amount', name: 'YTD Estimate_amount' },
//            { data: 'YTD Actual', name: 'YTD Actual' },
//            { data: 'Surplus', name: 'Surplus' },
//            { data: 'Remaining', name: 'Remaining' }
//        ],
//    });
//});
//$(function() {
//    $('#uis-table').DataTable({
//        processing: true,
//        serverSide: true,
//        ajax: ({url: '/elementsData/UIS', type: 'get' }),
//        searching: false,
//        dom: 't',
//        ordering: false,
//        columns: [
//            { data: 'Budget_amount', name: 'Budget_amount' },
//            { data: 'YTD Estimate_amount', name: 'YTD Estimate_amount' },
//            { data: 'YTD Actual', name: 'YTD Actual' },
//            { data: 'Surplus', name: 'Surplus' },
//            { data: 'Remaining', name: 'Remaining' }
//        ],
//    });
//});
//$(function() {
//    $('#facility-table').DataTable({
//        processing: true,
//        serverSide: true,
//        ajax: ({url: '/elementsData/Facility Support', type: 'get' }),
//        searching: false,
//        dom: 't',
//        ordering: false,
//        columns: [
//            { data: 'Budget_amount', name: 'Budget_amount' },
//            { data: 'YTD Estimate_amount', name: 'YTD Estimate_amount' },
//            { data: 'YTD Actual', name: 'YTD Actual' },
//            { data: 'Surplus', name: 'Surplus' },
//            { data: 'Remaining', name: 'Remaining' }
//        ],
//    });
//});
//$(function() {
//    $('#training-table').DataTable({
//        processing: true,
//        serverSide: true,
//        ajax: ({url: '/elementsData/Training', type: 'get' }),
//        searching: false,
//        dom: 't',
//        ordering: false,
//        columns: [
//            { data: 'Budget_amount', name: 'Budget_amount' },
//            { data: 'YTD Estimate_amount', name: 'YTD Estimate_amount' },
//            { data: 'YTD Actual', name: 'YTD Actual' },
//            { data: 'Surplus', name: 'Surplus' },
//            { data: 'Remaining', name: 'Remaining' }
//        ],
//    });
//});
    </script>
@endsection