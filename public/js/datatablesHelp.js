
//////////////////////////////////////////////////////////////////////////////////
// Deletes a row from a DataTable
//////////////////////////////////////////////////////////////////////////////////
$('table.dataTable').on('click', 'button.dt-rowRemove', function(){
    $table = $(this).closest('table');
    if(!$table.length) return false;

    $table.DataTable().row($(this).parents('tr')).remove().draw();
});
