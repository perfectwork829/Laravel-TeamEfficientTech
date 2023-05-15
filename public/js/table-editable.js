var TableEditable = function () {
    var oTable;
    var jobTypes = [];
    var handleTable = function () {        
        $.get("/admin/tasks/view/getTimeWorkType", function(data, status){            
            jobTypes = data;  
        });

        function restoreRow(oTable, nRow) {
            var aData = oTable.fnGetData(nRow);
            var jqTds = $('>td', nRow);

            for (var i = 0, iLen = jqTds.length; i < iLen; i++) {
                oTable.fnUpdate(aData[i], nRow, i, false);
            }

            oTable.fnDraw();
        }

        function editRow(oTable, nRow, task_id) {
            console.log('edit Row====>', nRow);
            var aData = oTable.fnGetData(nRow);
            var jqTds = $('>td', nRow);
            jqTds[0].innerHTML = '<input type="text" class="" value="' + aData[0] + '">';  //client name
            jqTds[1].innerHTML = '<input type="text" class="f" value="' + aData[1] + '">';  //site address/location

            jqTds[2].innerHTML = '<select id="jobtype" class=""></select>';       // job type             
            $.each(jobTypes['timeworktype'], function(index, value){                
                if(aData[2] == value.name)
                    $('#jobtype').append('<option value="' + value.id + '" selected data-value="' + value.name + '">' + value.name+ '</option>');
                else
                    $('#jobtype').append('<option value="' + value.id + '" data-value="' + value.name + '">' + value.name + '</option>');
            })
                
            jqTds[3].innerHTML = '<input type="text" class="" value="' + aData[3] + '">';  //notes
            jqTds[4].innerHTML = '<input type="text" class="" value="' + aData[4] + '">';  //start time

            jqTds[5].innerHTML = '<select id="engineer" class=""></select>';  // Engineer
            $.each(jobTypes['engineer'], function(index, value){
                if(aData[5] == value.name)
                    $('#engineer').append('<option value="' + value.id + '" selected data-value="' + value.name + '">' + value.name+ '</option>');
                else
                    $('#engineer').append('<option value="' + value.id + '" data-value="' + value.name + '">' + value.name + '</option>');
            })
            var checkIn = 0; var checkOut = 0;
            var checkedIn = ''; var checkedOut = '';
            if($(nRow).find("#checkIn").is(":checked")){
                checkIn = 1; 
                checkedIn='checked';
            }else{
                checkIn = 0; 
                checkedIn ='';
            }
                
            if($(nRow).find("#checkOut").is(":checked")){
                checkOut = 1; checkedOut = 'checked';
            }else{
                checkOut = 0; checkedOut = '';
            }                

            console.log('checkIN=>>>>>>>>>', checkIn);
            console.log('checkOut=>>>>>>>>>', checkOut);

            jqTds[6].innerHTML = '<input type="checkbox" id="checkIn" name="checkIn" value="' + checkIn + '" ' + checkedIn + '>'; 
            jqTds[7].innerHTML = '<input type="checkbox" id="checkOut" name="checkOut" value="'+ checkOut +'" ' + checkedOut + '>'; 
                        
            jqTds[8].innerHTML = '<a class="edit btn btn-xs btn-info" href="" data-id="'+task_id +'">Save</a>';
            jqTds[9].innerHTML = '<a class="cancel  btn btn-xs btn-danger" href="" data-id="'+task_id +'">Cancel</a>';            
            oTable.fnDraw();
        }

        function saveRow(oTable, nRow, task_id) {
            var jqInputs = $('input', nRow);
            var jqEngineer = $('select#engineer option[selected] ', nRow);            
            var jqJobtype = $('select#jobtype option[selected]', nRow);            

            var jobType_id = Number($(nRow).find("#jobtype").val());
            var engineer_id = Number($(nRow).find("#engineer").val());
            var jobType_value = Number($(nRow).find("#jobtype").text());
            var engineer_value = Number($(nRow).find("#engineer").text());
            var checkIn = $(nRow)
            console.log('jobType_value====>', jobType_value);
            console.log('engineer_value====>', engineer_value);

            
            var checkIn = 0; var checkOut = 0;
            var checkedIn = ''; var checkedOut='';
            if($(nRow).find("#checkIn").is(":checked")){
                checkIn = 1;
                checkedIn = 'checked';
            }else{
                checkIn = 0;
                checkedIn='';
            }                

            if($(nRow).find("#checkOut").is(":checked")){
                checkOut = 1;
                checkedOut='checked';
            }else{
                checkOut = 0;
                checkedOut='';
            }                

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var formData = {
                'clientName' : jqInputs[0].value,
                'siteAddress': jqInputs[1].value,
                'jobType_id' : jobType_id,
                'description': jqInputs[2].value,
                'starttime': jqInputs[3].value,
                'assigned_to_id': engineer_id,
                'checkIn': checkIn,
                'checkOut':checkOut,
           };                        
            $.ajax({
                type: 'POST',
                url: '/admin/tasks/' + task_id +'/updateTask',
                data: formData,
                dataType: 'JSON',
                encode: true,
                success: function(response, status, xhr) {
                    console.log('success');
                },
                error: function(xhr, status, error) {
                    console.log('error', error);
                }
            });
            
            oTable.fnUpdate(jqInputs[0].value, nRow, 0, false);
            oTable.fnUpdate(jqInputs[1].value, nRow, 1, false);

            oTable.fnUpdate(jobType_value, nRow, 2, false);

            oTable.fnUpdate(jqInputs[2].value, nRow, 3, false);
            oTable.fnUpdate(jqInputs[3].value, nRow, 4, false);

            oTable.fnUpdate(engineer_value, nRow, 5, false);            

            oTable.fnUpdate('<input type="checkbox" name="checkIn" value="'+ checkIn + '" id="checkIn"' + checkedIn +' >', nRow, 6, false);
            oTable.fnUpdate('<input type="checkbox" name="checkOut" value="'+ checkOut + '" id="checkOut"' + checkedOut + '>', nRow, 7, false);
            oTable.fnUpdate('<a class="edit btn btn-xs btn-info" href="" data-id="'+task_id +'">Edit</a>', nRow, 8, false);
            oTable.fnUpdate('<a class="delete  btn btn-xs btn-danger" href="" data-id="'+task_id +'">Delete</a>', nRow, 9, false);
            oTable.fnDraw();

        }

        function cancelEditRow(oTable, nRow) {
            var jqInputs = $('input', nRow);
            oTable.fnUpdate(jqInputs[0].value, nRow, 0, false);
            oTable.fnUpdate(jqInputs[1].value, nRow, 1, false);
            oTable.fnUpdate(jqInputs[2].value, nRow, 2, false);
            oTable.fnUpdate(jqInputs[3].value, nRow, 3, false);
            oTable.fnUpdate(jqInputs[4].value, nRow, 4, false);
            oTable.fnUpdate(jqInputs[5].value, nRow, 5, false);
            oTable.fnUpdate(jqInputs[6].value, nRow, 6, false);
            oTable.fnUpdate(jqInputs[7].value, nRow, 7, false);            
            oTable.fnUpdate('<a class="edit btn btn-xs btn-info" href="">Edit</a>', nRow, 8, false);
            oTable.fnDraw();
        }

        var table = $('#daily_task_table');

        oTable = table.dataTable({

            // Uncomment below line("dom" parameter) to fix the dropdown overflow issue in the datatable cells. The default datatable layout
            // setup uses scrollable div(table-scrollable) with overflow:auto to enable vertical scroll(see: assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js). 
            // So when dropdowns used the scrollable div should be removed. 
            //"dom": "<'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r>t<'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>",

            // "lengthMenu": [
            //     [5, 15, 20, -1],
            //     [5, 15, 20, "All"] // change per page values here
            // ],

            // Or you can use remote translation file
            //"language": {
            //   url: '//cdn.datatables.net/plug-ins/3cfcc339e89/i18n/Portuguese.json'
            //},

            // set the initial value
            // ajax: {
            //     url: "/admin/tasks/view/getTasks", dataSrc:""
            // },
            // columns: [
            //     { data: 'clientName' },
            //     { data: 'siteAddress' },
            //     { data: 'jobType_id' },
            //     { data: 'description' },
            //     { data: 'starttime' },
            //     { data: 'assigned_to_id' },
            //     { data: 'checkIn' },
            //     { data: 'checkOut' },
            //     { data: 'checkIn' },                
            //     { data: 'checkOut' } 
            // ],
            "pageLength": 10,

            "language": {
                "lengthMenu": " _MENU_ records"
            },
            "autoWidth" : false,
            "scrollX" : true,
            "scrollCollapse" : true,
            "autoWidth": true,  
            "columnDefs": [{ // set default column settings
                'orderable': true,
                'targets': [0],
                
            }, {
                "searchable": true,
                "targets": [0]
            },            
            { "width": "5%", "targets": 0 },
            { "width": "15%", "targets": 1 },
            { "width": "10%", "targets": 2 },
            { "width": "10%", "targets": 3 },
            { "width": "10%", "targets": 4 },
            { "width": "10%", "targets": 5 },
            { "width": "10%", "targets": 6 },
            { "width": "10%", "targets": 7 }
        ],
            "order": [
                [0, "asc"]
            ] // set first column as a default sort by asc
        });
        

        var tableWrapper = $("#daily_task_table_wrapper");

        tableWrapper.find(".dataTables_length select").select2({
            showSearchInput: true //hide search box with special css class
        }); // initialize select2 dropdown

        var nEditing = null;
        var nNew = false;

        $('#daily_task_table_new').click(function (e) {
            e.preventDefault();

            if (nNew && nEditing) {
                if (confirm("Previose row not saved. Do you want to save it ?")) {
                    saveRow(oTable, nEditing, 0); // save
                    $(nEditing).find("td:first").html("Untitled");
                    nEditing = null;
                    nNew = false;

                } else {
                    oTable.fnDeleteRow(nEditing); // cancel
                    nEditing = null;
                    nNew = false;
                    
                    return;
                }
            }

            var aiNew = oTable.fnAddData(['', '', '', '', '', '', '', '', '', '']);
            var nRow = oTable.fnGetNodes(aiNew[0]);
            editRow(oTable, nRow, 0);
            nEditing = nRow;
            nNew = true;
        });

        table.on('click', '.delete', function (e) {
            e.preventDefault();

            if (confirm("Are you sure to delete this row ?") == false) {
                return;
            }

            var nRow = $(this).parents('tr')[0];
            var task_id = $(this).data('id');         

            oTable.fnDeleteRow(nRow);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var formData = {
                'id': task_id
           };                        
            $.ajax({
                type: 'POST',
                url: '/admin/tasks/' + task_id +'/delTask',
                data: formData,
                dataType: 'JSON',
                encode: true,
                success: function(response, status, xhr) {
                    console.log('success');
                },
                error: function(xhr, status, error) {
                    console.log('error', error);
                }
            });
        });

        table.on('click', '.cancel', function (e) {
            e.preventDefault();
            if (nNew) {
                oTable.fnDeleteRow(nEditing);
                nEditing = null;
                nNew = false;
            } else {
                restoreRow(oTable, nEditing);
                nEditing = null;
            }
        });

        table.on('click', '.edit', function (e) {            
            e.preventDefault();
            //$('#apple-tree').data('id');
            
            var nRow = $(this).parents('tr')[0];
            var task_id = $(this).data('id');            

            if (nEditing !== null && nEditing != nRow) {                                
                restoreRow(oTable, nEditing);
                editRow(oTable, nRow, task_id);
                nEditing = nRow;
            } else if (nEditing == nRow && this.innerHTML == "Save") {                
                /* Editing this row and want to save it */
                nEditing =  $(this).parents('tr')[0];
                
                saveRow(oTable, nEditing, task_id);                
                  nEditing = null;
                
            } else {
                /* No edit in progress - let's start one */                
                editRow(oTable, nRow, task_id);
                nEditing = nRow;                
            }
        });
        oTable.fnDraw();
    }

    return {

        //main function to initiate the module
        init: function () {            
            handleTable();
            oTable.fnDraw();
        }

    };

}();