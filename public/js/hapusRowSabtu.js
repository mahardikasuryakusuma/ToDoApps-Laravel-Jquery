function deleteRowSabtu(r) {
    let i = r.parentNode.parentNode.rowIndex;
    document.getElementById("myTableSabtu").deleteRow(i);
    let Table = document.getElementById("myTableSabtu");
    let totalRowTable = Table.tBodies[0].rows.length;
    if (totalRowTable == 0) {
        let tombol = document.getElementById("tombolSabtu");
        Table.remove();
        $('#tambah_sabtu').hide();
        tombol.setAttribute("onclick","myFunctionSabtu()")
        $('#errorInputSabtu').html('');
    }

}
