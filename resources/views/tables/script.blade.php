<!-- jQuery -->
        <script src="//code.jquery.com/jquery.js"></script>
        <!-- DataTables -->
        <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
        <!-- Bootstrap JavaScript -->
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <!-- App scripts -->
        <script>
            var editor;
            $(function() {
                if ( $.fn.dataTable.isDataTable( '#arsr-table' ) ) {
                        table = $('#arsr-table').DataTable();
                }
                else {
                        $('#arsr-table').DataTable({
                            processing: true,
                            serverSide: true,
                            ajax: '{{ route('/datatable/getarsrdata') }}',
                            searching: false,
                            columns: [
                                { data: 'Project Number', name: 'Project Number' },
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
                }
//                $('#arsr-table').DataTable({
//                    processing: true,
//                    serverSide: true,
//                    ajax: '{{ route('/datatable/getarsrdata') }}',
//                    searching: false,
//                    columns: [
//                        { data: 'Project Number', name: 'Project Number' },
//                        { data: 'Index_View_title', name: 'Index_View_title' },
//                        { data: 'Type_text', name: 'Type_text' },
//                        { data: 'BPAC_title', name: 'BPAC_title' },
//                        { data: 'Amount', name: 'Amount' }
//                    ],
//                });
            });
        </script>
