@extends('layouts.master')

@section('content')
    <table class="table table-striped">
        <tr>
            <th class="col-md-2">Element</th>
            <th class="col-md-2">Annual Budget</th>
            <th class="col-md-2">Annual Estimate</th>
            <th class="col-md-2">YTD Actual</th>
            <th class="col-md-2">YTD Surplus</th>
            <th class="col-md-2">YTD Remaining</th>
        </tr>    
            @foreach ($elements as $element)
                @include ('dashboard.regulartable')
            @endforeach
    </table>
@endsection
