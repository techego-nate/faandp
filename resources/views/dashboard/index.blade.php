@extends('layouts.master')

@section('content')
    <style>
        .table-container{
            margin-top:20px;
            padding:5px;
            background-color:#fff;
            border-radius:5px;
        }
        .table-container h3{
            margin-top:0px;
        }
        .table-container .dataTables_wrapper .btn-group{
            margin-bottom:10px;
        }


        </style>
    <div>
        <h1 class="text-center">ARSR O&M: Financial Operations Dashboard</h1>
        <hr style="border-top: 3px solid #ddd;"/>
        <h2>Elements Dashboard</h2>
        
        <div class="table-container overall">
            {!! $overallTable->html()->table(['id' => 'overallTable', 'class' => 'table table-bordered'], false) !!}
        </div>
        <div class="table-container element-l1lm">
            {!! $element_l1lmTable->html()->table(['id' => 'element_l1lmTable', 'class' => 'table table-bordered'], false) !!}
        </div>
        
        <div class="table-container element-2le">
            {!! $element_2leTable->html()->table(['id' => 'element_2leTable', 'class' => 'table table-bordered'], false) !!}
        </div>
        
        <div class="table-container element-utilities">
            {!! $element_utilitiesTable->html()->table(['id' => 'element_utiliiesTable', 'class' => 'table table-bordered'], false) !!}
        </div>
        
        <div class="table-container element-logistics">
            {!! $element_logisticsTable->html()->table(['id' => 'element_logisticsTable', 'class' => 'table table-bordered'], false) !!}
        </div>
        
        <div class="table-container element-uis">  
            {!! $element_uisTable->html()->table(['id' => 'element_uisTable', 'class' => 'table table-bordered'], false) !!}
        </div>
        
        <div class="table-container element-facilities">
            {!! $element_facilitiesTable->html()->table(['id' => 'element_facilitiesTable', 'class' => 'table table-bordered'], false) !!}
        </div>
        
        <div class="table-container element-training">
            {!! $element_trainingTable->html()->table(['id' => 'element_trainingTable', 'class' => 'table table-bordered'], false) !!}
        </div>

        <hr style="border-top: 3px solid #ddd; margin-top:30px;"/>
        <h2>Management Reserves</h2>
        <h3><a class="element-link" href="#">Coming Soon!</a></h3>

        <hr style="border-top: 3px solid #ddd; margin-top:30px;"/>
        <h2>Orphans</h2>
        <h3><a class="element-link" href="#">Coming Soon!</a></h3>
    </div>  

    <script>    
        $(function() {
            {{$overallTable->html()->generateScripts()}}
            {{$element_l1lmTable->html()->generateScripts()}}
            {{$element_2leTable->html()->generateScripts()}}
            {{$element_utilitiesTable->html()->generateScripts()}}
            {{$element_logisticsTable->html()->generateScripts()}}
            {{$element_uisTable->html()->generateScripts()}}
            {{$element_facilitiesTable->html()->generateScripts()}}
            {{$element_trainingTable->html()->generateScripts()}}
            
            $( ".overall div.inject-header" ).html('<h3>Overall</h3>');
            $( ".element-l1lm div.inject-header" ).html('<h3><a class="element-link" href="/home/1st-level-maintenance">1st Level Maintenance</a></h3>');
            $( ".element-2le div.inject-header" ).html('<h3><a class="element-link" href="/home/2nd-level-engineering">2nd Level Engineering</a></h3>');
            $( ".element-utilities div.inject-header" ).html('<h3><a class="element-link" href="/home/utilities">Utilities</a></h3>');
            $( ".element-logistics div.inject-header" ).html('<h3><a class="element-link" href="/home/logistics">Logistics</a></h3>');
            $( ".element-uis div.inject-header" ).html('<h3><a class="element-link" href="/home/uis">UIS</a></h3>');
            $( ".element-facilities div.inject-header" ).html('<h3><a class="element-link" href="/home/facility-support">Facility Support</a></h3>');
            $( ".element-training div.inject-header" ).html('<h3><a class="element-link" href="/home/training">Training</a></h3>');
        });
    </script>
    </body>
@endsection

@push('scripts')
        <!--Buttons-->
        <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.bootstrap.min.js"></script>
        <script src="/vendor/datatables/buttons.server-side.js"></script>
@endpush