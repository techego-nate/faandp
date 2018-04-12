   
<tr>
    <td class="col-md-2"><a href="/elementsData/{{$element['Element Name']}}"><strong>{{ $element['Element Name'] }}</strong></a></td>
    <td class="col-md-2">{{ number_format($element['Budget_amount'],2) }}</td>
    <td class="col-md-2">{{ number_format($element['YTD Estimate_amount'],2) }}</td>
    <td class="col-md-2">{{ number_format($element['YTD Actual'],2) }}</td>
    <td class="col-md-2">{{ number_format($element['Surplus'],2) }}</td>
    <td class="col-md-2">{{ number_format($element['Remaining'],2) }}</td>
</tr>
