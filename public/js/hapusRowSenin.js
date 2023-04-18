function deleteRowSenin(r) {
    let i = r.parentNode.parentNode.rowIndex;
    document.getElementById("myTableSenin").deleteRow(i);
    let Table = document.getElementById("myTableSenin");
    let totalRowTable = Table.tBodies[0].rows.length;
    if (totalRowTable == 0) {
        let tombol = document.getElementById("tombolSenin");
        Table.remove();
        $('#tambah_senin').hide();
        tombol.setAttribute("onclick","myFunctionSenin()")
        $('#errorInputSenin').html('');
    }

}
