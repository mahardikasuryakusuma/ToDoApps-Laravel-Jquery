function deleteRowKamis(r) {
    let i = r.parentNode.parentNode.rowIndex;
    document.getElementById("myTableKamis").deleteRow(i);
    let Table = document.getElementById("myTableKamis");
    let totalRowTable = Table.tBodies[0].rows.length;
    if (totalRowTable == 0) {
        let tombol = document.getElementById("tombolKamis");
        Table.remove();
        $('#tambah_kamis').hide();
        tombol.setAttribute("onclick","myFunctionKamis()")
        $('#errorInputKamis').html('');
    }

}
