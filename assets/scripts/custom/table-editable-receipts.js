var TableEditable = function () {

    return {

        //main function to initiate the module
        init: function () {
            function restoreRow(oTable, nRow) {
                var aData = oTable.fnGetData(nRow);
                var jqTds = $('>td', nRow);

                for (var i = 0, iLen = jqTds.length; i < iLen; i++) {
                    oTable.fnUpdate(aData[i], nRow, i, false);
                }

                oTable.fnDraw();
            }

            function editRow(oTable, nRow) {
                var aData = oTable.fnGetData(nRow);
                var jqTds = $('>td', nRow);
                jqTds[1].innerHTML = '<input id="names" type="text" class="form-control" value="' + aData[1] + '">';
                jqTds[3].innerHTML = '<a id="save" class="edit" href="">Save</a>';
                jqTds[4].innerHTML = '<a class="cancel" href="">Cancel</a>';
            }

            function saveRow(oTable, nRow) {
                var jqInputs = $('input', nRow);
                oTable.fnUpdate(jqInputs[1].value, nRow, 1, false);
                oTable.fnUpdate('<a class="edit" href="">Edit</a>', nRow, 3, false);
                oTable.fnUpdate('<a class="delete" href="">Deactivate</a>', nRow, 4, false);
                oTable.fnDraw();
            }

            function cancelEditRow(oTable, nRow) {
                var jqInputs = $('input', nRow);
                oTable.fnUpdate(jqInputs[1].value, nRow, 1, false);
                oTable.fnUpdate('<a class="edit" href="">Edit</a>', nRow, 3, false);
                oTable.fnUpdate('<a class="delete" href="">Delete</a>', nRow, 4, false);
                oTable.fnDraw();
            }

            var oTable = $('#sample_editable_1').dataTable({
                "aLengthMenu": [
                    [150, 200, 300, -1],
                    [150, 200, 300, "All"] // change per page values here
                ],
                // set the initial value
                "iDisplayLength": 5,
                
                "sPaginationType": "bootstrap",
                "oLanguage": {
                    "sLengthMenu": "_MENU_ records",
                    "oPaginate": {
                        "sPrevious": "Prev",
                        "sNext": "Next"
                    }
                },
                "aoColumnDefs": [{
                        'bSortable': false,
                        'aTargets': [0]
                    }
                ]
            });

            jQuery('#sample_editable_1_wrapper .dataTables_filter input').addClass("form-control input-medium input-inline"); // modify table search input
            jQuery('#sample_editable_1_wrapper .dataTables_length select').addClass("form-control input-small"); // modify table per page dropdown
            jQuery('#sample_editable_1_wrapper .dataTables_length select').select2({
                showSearchInput : false //hide search box with special css class
            }); // initialize select2 dropdown

            var nEditing = null;

            $('#sample_editable_1_new').click(function (e) {
                e.preventDefault();
                var aiNew = oTable.fnAddData(['', '', '',
                        '<a class="edit" href="">Edit</a>', '<a class="cancel" data-mode="new" href="">Cancel</a>'
                ]);
                var nRow = oTable.fnGetNodes(aiNew[0]);
                editRow(oTable, nRow);
                nEditing = nRow;
            });
            $('#sample_editable_1 a.activate').live('click', function (e) {
                e.preventDefault();

                if (confirm("Are you sure to activate this page url?") == false) {
                    return;
                }
                   var nRow = $(this).parents('tr')[0];
                   var nRow1 = $(this).parents('tr')[0];
                var aData = oTable.fnGetData(nRow);
                var jqTds = $('>td', nRow);
                jqTds[4].innerHTML = '<a class="delete" href="">Deactivate</a>';
                $(document).ready(function ()
    {
           var url =  nRow1.cells[0].innerHTML;
           var status = 'active';

            var dataStr = 'url=' + url + '&status=' + status;
                $.ajax(
                        {
                            type: "POST", url: "active.php", data: dataStr,
                            cache: false,
                            success: function (result) {
                                alert(result);
                            }
                        });
            return false;
    }); 
                
            });

            $('#sample_editable_1 a.delete').live('click', function (e) {
                e.preventDefault();

                if (confirm("Are you sure to deactivate this page url?") == false) {
                    return;
                }
                   var nRow = $(this).parents('tr')[0];
                   var nRow1 = $(this).parents('tr')[0];
                var aData = oTable.fnGetData(nRow);
                var jqTds = $('>td', nRow);
                jqTds[4].innerHTML = '<a class="activate" href="">Activate</a>';
                $(document).ready(function ()
    {
           var url =  nRow1.cells[0].innerHTML;
           var status = 'inactive';
           
            var dataStr = 'url=' + url + '&status=' + status;
            
                $.ajax(
                        {
                            type: "POST", url: "active.php", data: dataStr,
                            cache: false,
                            success: function (result) {
                                alert(result);
                            }
                        });
            return false;
    }); 
                
            });
             $('#sample_editable_1 a.deac').live('click', function (e) {
                e.preventDefault();

                if (confirm("Are you sure to deactivate this account?") == false) {
                    return;
                }
                   var nRow = $(this).parents('tr')[0];
                   var nRow1 = $(this).parents('tr')[0];
                var aData = oTable.fnGetData(nRow);
                var jqTds = $('>td', nRow);
                jqTds[6].innerHTML = '<a class="act" href="javascript:;">Activate</a>';
                jqTds[3].innerHTML = 'Suspended';
                $(document).ready(function ()
    {
           var url =  nRow1.cells[0].innerHTML;
           var status = 'Suspended';
           
            var dataStr = 'url=' + url + '&status=' + status;
            
                $.ajax(
                        {
                            type: "POST", url: "activate_gl.php", data: dataStr,
                            cache: false,
                            success: function (result) {
                                alert(result);
                            }
                        });
            return false;
    }); 
                
            });
$('#sample_editable_1 a.act').live('click', function (e) {
                e.preventDefault();

                if (confirm("Are you sure to activate this account?") == false) {
                    return;
                }
                   var nRow = $(this).parents('tr')[0];
                   var nRow1 = $(this).parents('tr')[0];
                var aData = oTable.fnGetData(nRow);
                var jqTds = $('>td', nRow);
                jqTds[6].innerHTML = '<a class="deac" href="javascript:;">Deactivate</a>';
                jqTds[3].innerHTML = 'Active';
                $(document).ready(function ()
    {
           var url =  nRow1.cells[0].innerHTML;
           var status = 'Active';
           
            var dataStr = 'url=' + url + '&status=' + status;
            
                $.ajax(
                        {
                            type: "POST", url: "activate_gl.php", data: dataStr,
                            cache: false,
                            success: function (result) {
                                alert(result);
                            }
                        });
            return false;
    }); 
                
            });
            $('#sample_editable_1 a.cancel').live('click', function (e) {
                e.preventDefault();
                if ($(this).attr("data-mode") == "new") {
                    var nRow = $(this).parents('tr')[0];
                    oTable.fnDeleteRow(nRow);
                } else {
                    restoreRow(oTable, nEditing);
                    nEditing = null;
                }
            });

            $('#sample_editable_1 a.edit').live('click', function (e) {
                e.preventDefault();

                /* Get the row as a parent of the link that was clicked on */
                var nRow = $(this).parents('tr')[0];

                if (nEditing !== null && nEditing != nRow) {
                    /* Currently editing - but not this row - restore the old before continuing to edit mode */
                    restoreRow(oTable, nEditing);
                    editRow(oTable, nRow);
                    nEditing = nRow;
                } else if (nEditing == nRow && this.innerHTML == "Save") {
                    /* Editing this row and want to save it */
                    $(document).ready(function ()
    {
            var url =  nRow.cells[0].innerHTML;
            var menu =  nRow.cells[2].innerHTML;
            var name = $("#names").val();
            var dataStr = 'url=' + url + '&name=' + name + '&menu=' + menu;
            if (url === '' || name === '' || menu === '')
            {
                alert("fill all details");
            }
            else
            {
                $.ajax(
                        {
                            type: "POST", url: "enter_page.php", data: dataStr,
                            cache: false,
                            success: function (result) {
                                alert(result);
                                cancelEditRow(oTable, nRow);
                            }
                        });
            }
            return false;
    });
                } else {
                    /* No edit in progress - let's start one */
                    editRow(oTable, nRow);
                    nEditing = nRow;
                }
            });
        }

    };

}();