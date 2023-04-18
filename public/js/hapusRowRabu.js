function deleteRowRabu(r) {
    let i = r.parentNode.parentNode.rowIndex;
    document.getElementById("myTableRabu").deleteRow(i);
    let Table = document.getElementById("myTableRabu");
    let totalRowTable = Table.tBodies[0].rows.length;
    if (totalRowTable == 0) {
        let tombol = document.getElementById("tombolRabu");
        Table.remove();
        $('#tambah_rabu').hide();
        tombol.setAttribute("onclick","myFunctionRabu()")
        $('#errorInputRabu').html('');
    }

}
