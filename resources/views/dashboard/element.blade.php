@extends('layouts.master')
      
@section('content')
    <h1 class="text-center">ARSR O&M: Financial Operations Dashboard</h1>  
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/home">Main Dashboard</a></li>
        <li class="breadcrumb-item active"><span class="element-name"></span></li>
    </ol>
    <hr style="border-top: 3px solid #ddd;"/>
    <h3><span class="element-name"></span></h3>
    <div class="table-container elementData">
        {!! $elementData->html()->table(['id' => 'elementData', 'class' => 'table table-bordered'], false) !!}
    </div>
    <h4>Service Areas</h4>
    <div class="table-container elementData">
        {!! $elementServiceAreasTable->html()->table(['id' => 'elementServiceAreasTable', 'class' => 'table table-bordered'], false) !!}
    </div>

    <script>
        function titleCase(str) {
          str = str.toLowerCase().split(' ');
          for (var i = 0; i < str.length; i++) {
            str[i] = str[i].charAt(0).toUpperCase() + str[i].slice(1); 
          }
          return str.join(' ');
        };
        var elementNameURL = "{{ Request::route('element_name') }}";
        var elementName = (elementNameURL.replace(/-/g, " "));
        var capitalizedElementName = titleCase(elementName);
        if(capitalizedElementName == "Uis"){
            capitalizedElementName = "UIS";
            elementName = "UIS";
        }
        $( ".element-name" ).append( elementName );
    </script>
@endsection

@push('scripts')
<script>
    {{$elementData->html()->generateScripts()}}
    {{$elementServiceAreasTable->html()->generateScripts()}}
</script>
@endpush