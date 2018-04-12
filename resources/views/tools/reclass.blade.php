@extends('layouts.master')
    @section('content')
        <style>
            #reclassSplit .selectize-input{
                display: inline-block;
                vertical-align: middle;
            }
            #reclassSplit table.split-even-cols th, #reclassSplit table.split-even-cols td{
                 width:25%;
            }
            #reclassSplit .modal-lg{
                width:1045px;
            }
            .tab-content{
                padding:20px 5px 5px 5px;
                background: #fff;
                border: 1px solid #ddd;
                border-top:0px;
            }
            .top-row-2{
                position:relative;
                top:10px;
            }

        </style>
            <div>
                <h3>Reclass</h3>
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#flagged" aria-controls="flagged" role="tab" data-toggle="tab">
                            Newly Flagged
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#approval" aria-controls="approval" role="tab" data-toggle="tab">
                            Awaiting Approval
                        </a>
                    </li>
                    <li role="presentation" class="dropdown">
                        <a href="#" class="dropdown-toggle" id="form-list" data-toggle="dropdown" aria-controls="myTabDrop1-contents" aria-expanded="false">
                            Approved - Forms <span class="caret"></span>
                        </a> 
                        <ul class="dropdown-menu" aria-labelledby="form-list" id="form-list-contents"> 
                            <li>
                                <a href="#ldr" role="tab" id="form-ldr" data-toggle="tab" aria-controls="form-ldr">LDR</a>
                            </li> 
                            <li>
                                <a href="#other" role="tab" id="form-other" data-toggle="tab" aria-controls="form-other">Other</a>
                            </li> 
                        </ul> 
                    </li>
                </ul>
                
                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="flagged">
                        {!! $newReclassTable->html()->table(['id' => 'newReclassTable', 'class' => 'table'], true) !!}
                    </div>
                    <div role="tabpanel" class="tab-pane" id="approval">
                        Awaiting Approval Table - Coming Soon...
                    </div>
                    <div role="tabpanel" class="tab-pane" id="ldr">
                        LDR Form Table - Coming Soon...
                    </div>
                    <div role="tabpanel" class="tab-pane" id="other">
                        Other Form Table - Coming Soon...
                    </div>
                </div>

            </div>
             
            <!-- $approvalReclassTable->html()->table(['id' => 'approvalReclassTable']) -->
            
            <div class="modal fade" id="reclassSplit" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" style="font-size:34px;" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h3 class="modal-title">Split & Reclass Line Item</h3>
                    </div>
                    <div class="modal-body">
                        <h4>Current Values</h4>
                        <table class="table dataTable no-footer split-even-cols">
                            <tr>
                                <th>Project Number</th>
                                <th>Task</th>
                                <th>Org</th>
                                <th>Obj Class</th>
                                <th>Amount</th>
                            </tr>
                            <tr>
                                <td><span class="current-line-project"></span></td>
                                <td><span class="current-line-task"></span></td>
                                <td><span class="current-line-org"></span></td>
                                <td><span class="current-line-objclass"></span></td>
                                <td><span class="current-line-amount"></span></td>
                            </tr>
                        </table>
                        <hr/>
                        <h4>Split Details</h4>
                        <div style="display:inline-block;">
                            <div class="input-group" style="width:250px;">
                                <span class="input-group-addon">Number of Splits</span>
                                <input id="split-count" type="number" min="2" max="10" class="form-control" aria-label="Amount (to the nearest dollar)" value="2" required>
                            </div>
                        </div>
                        <div style="display:inline-block;">
                            <div class="input-group" style="width:250px;">
                                <span class="input-group-addon">Amount to Split:</span>
                                <input class="form-control current-line-amount" id="split-line-amount" readonly>
                            </div>
                        </div>
                        <div style="display:inline-block;">
                            <div class="input-group" style="width:250px;">
                                <span class="input-group-addon">Total from Splits:</span>
                                <input class="form-control" id="total-split-amount" readonly>
                            </div>
                        </div>
                        <div style="display:inline-block;">
                            <div class="input-group" style="width:250px;">
                                <span class="input-group-addon">Remaining Amount:</span>
                                <input class="form-control" id="remaining-split-amount" readonly>
                            </div>
                        </div>
                        <hr/>
                        <div id="all-split-rows">
                            <table class="table dataTable no-footer split-even-cols">
                                <tr class="split-headers">
                                    <th>Change Project Number To</th>
                                    <th>Change Task To</th>
                                    <th>Change Org To</th>
                                    <th>Change Obj Class To</th>
                                    <th>Change Amount To</th>
                                </tr>
                                <!--jquery appends / removes table rows here-->

                                <!--                           
                                <tr class="split-row" id="splitRowNum">
                                    <td>
                                        <select class="selectSplitProject"></select>
                                    </td>
                                    <td>
                                        <select class="selectSplitTask"></select>
                                    </td>
                                    <td>
                                        <select class="selectSplitOrg"></select>
                                    </td>
                                    <td>
                                        <select class="selectSplitObjClass"></select>
                                    </td>
                                    <td>
                                        <div class="input-group" style="width:175px;">
                                            <span class="input-group-addon">$</span>
                                            <input type="number" class="form-control splitAmount" >
                                        </div>
                                    </td>
                                </tr>
                            -->
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Split</button>
                    </div>
                  </div>
                </div>
            </div>
            <script>
                $.fn.dataTable.Api.register( 'sum()', function ( ) {
                    return this.flatten().reduce( function ( a, b ) {
                        if ( typeof a === 'string' ) {
                            a = a.replace(/[^\d.-]/g, '') * 1;
                        }
                        if ( typeof b === 'string' ) {
                            b = b.replace(/[^\d.-]/g, '') * 1;
                        }

                        return a + b;
                    }, 0 );
                } );
            </script>
            <script>
                $(function() {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': '{{csrf_token()}}'
                        }
                    });
                    var projectDropdown = <?php echo $projectDropdownOptionsJSON ?>;
                    var taskDropdown = <?php echo $taskDropdownOptionsJSON ?>;
                    var orgDropdown = <?php echo $orgDropdownOptionsJSON ?>;
                    var objClassDropdown = <?php echo $objClassDropdownOptionsJSON ?>;
                    var newEditor = new $.fn.dataTable.Editor({
                        ajax: "/reclass",
                        table: "#newReclassTable",
                        display: "bootstrap",
                        idSrc: "id",
                        fields: [
                            {label: "Project Number", name: "arsr.Project Number", type: "display"},
                            {label: "Task", name: "arsr.Task Number_title", type: "display"},
                            {label: "Org", name: "arsr.Org_title", type: "display"},
                            {label: "Obj Class", name: "arsr.OBJ Class_title", type: "display"},
                            {label: "Amount", name: "arsr.Amount", type: "display"},
                            {label: "Reclass Approval", name: "Approval_title", type: "select", options: [ "", "No", "Yes" ]},
                            {label: "Change Project", name: "Change_project_title", type: "selectize", options: projectDropdown  },
                            {label: "Change Task", name: "Change_task_title", type: "selectize", options: taskDropdown },
                            {label: "Change Org", name: "Change_org_title", type: "selectize", options: orgDropdown },
                            {label: "Change Obj Class", name: "Change_obj_title", type: "selectize", options: objClassDropdown },
                            {label: "Change Amount", name: "Change_amount", attr: { type: "number"} }
                        ],
                        
                    });
//                    $('#newReclassTable').on('click', 'tbody td:not(:first-child)', function (e) {
//                        newEditor.inline(this);
//                    });
                    {{$newReclassTable->html()->generateScripts()}}
                    //{{$approvalReclassTable->html()->generateScripts()}}
                });
            </script>
            
            <!--Create Split Rows in Modal -->
            <script>
                $(function () {
                    updateSplitRows();
                    $("#split-count").change(updateSplitRows);
                });
                
                function updateSplitRows(){
                    var splitCount = $('#split-count').val();
                    
                    if(splitCount == ''){
                        $('#split-count').val(2);
                        splitCount = 2;
                    }
                    
                    if(splitCount > 10){
                        $('#split-count').val(10);
                        splitCount = 10;
                    }
                    
                    var currentRowCount = $('.split-row').length;
                    
                    var loopCount = splitCount - currentRowCount;
                    var deleteCount = currentRowCount - splitCount;
                    
                    var rowCount = currentRowCount+1;
                    
                    if(loopCount > 0){
                        for(i=0;i<loopCount;i++){
                            
                            $('#all-split-rows table').append('\
                                <tr class="split-row" id="splitRowNum">\n\
                                    <td>\n\
                                        <select class="selectSplitProject"></select>\n\
                                    </td>\n\
                                    <td>\n\
                                        <select class="selectSplitTask"></select>\n\
                                    </td>\n\
                                    <td>\n\
                                        <select class="selectSplitOrg"></select>\n\
                                    </td>\n\
                                    <td>\n\
                                        <select class="selectSplitObjClass"></select>\n\
                                    </td>\n\
                                    <td>\n\
                                        <div class="input-group" style="width:175px;">\n\
                                            <span class="input-group-addon">$</span>\n\
                                            <input type="number" class="form-control split-amount" >\n\
                                        </div>\n\
                                    </td>\n\
                                </tr>\n\
                            ');
                                                
                            rowCount++;

                        }   
                    };
                    
                    
                    if(deleteCount > 0){
                        for(i=0;i<deleteCount;i++){

                            $("#all-split-rows table tr.split-row:last-child").remove();

                        }   
                    }
                    
                    $("tr[id^='splitRowNum']").each(function(i) {
                        $(this).attr('id', "splitRowNum" + (i + 1));
                    });
                    
                    //Selectize Manually created inputs
                    
                    $('.selectSplitProject').each(function(i) {
                        $(this).selectize({
                            options: <?php echo $projectDropdownOptionsJSON ?>,
                            labelField: 'label',
                            valueField: 'value',
                            sortField: 'label'
                        });
                     });
                    $('.selectSplitTask').each(function(i) {
                        $(this).selectize({
                            options: <?php echo $taskDropdownOptionsJSON ?>,
                            labelField: 'label',
                            valueField: 'value',
                            sortField: 'label'
                        });
                    });
                    $('.selectSplitOrg').each(function(i) {
                        $(this).selectize({
                            options: <?php echo $orgDropdownOptionsJSON ?>,
                            labelField: 'label',
                            valueField: 'value',
                            sortField: 'label'
                        });
                    });
                    $('.selectSplitObjClass').each(function(i) {
                            $(this).selectize({
                                options: <?php echo $objClassDropdownOptionsJSON ?>,
                                labelField: 'label',
                                valueField: 'value',
                                sortField: 'label'
                            });     
                    });
                    
                    updateSplitTotalRemaining();
                };
                
                $(function () {
                    updateSplitTotalRemaining();
                    $(document).on('change', '.split-amount', updateSplitTotalRemaining);
                });
                
                function updateSplitTotalRemaining(){
                
                    var splitTotal = 0;
                
                    $('.split-amount').each(function(i) {
                        splitTotal += +$(this).val() || 0;
                    });
                    
                    $('#total-split-amount').val('$'+splitTotal.toFixed(2));
                    
                    var currentAmount = $('#split-line-amount').val();
                    
                    currentAmount = parseFloat(currentAmount.replace('$', ''));
                    
                    var remainingAmount = currentAmount - splitTotal;
                    
                    remainingAmount = (typeof(remainingAmount) == "number" ? remainingAmount : 0);
                    
                    $('#remaining-split-amount').val('$'+remainingAmount.toFixed(2));
                        
                };  
                
            </script>
            <script>
                $(function() {
                    var table = $('#newReclassTable').DataTable();
                    $('#newReclassTable').on( 'draw.dt', function () {
                        var tablesum = table.column("arsr.Amount:name").data().sum();
                        var alltablesum = table.column("arsr.Amount:name", {page: 'all'}).data().sum();
                        var amountIndex = table.column( "arsr.Amount:name" ).index();
//                        $( table.column( (amountIndex-1) ).footer() ).html(
//                            'Total:'
//                        );
                        $( table.column( "arsr.Amount:name" ).footer() ).html(
                            'Total: $' + (tablesum).toFixed(2) + ' of $' + ({!! $reclassTotal !!}).toFixed(2)
                        );
                    } );
                });
            </script>
    @endsection
    @push('scripts')
            <!--Buttons-->
            <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.bootstrap.min.js"></script>
            <script src="/vendor/datatables/buttons.server-side.js"></script>
    @endpush