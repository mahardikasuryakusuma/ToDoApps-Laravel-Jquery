function deleteRowSelasa(r) {
    let i = r.parentNode.parentNode.rowIndex;
    document.getElementById("myTableSelasa").deleteRow(i);
    let Table = document.getElementById("myTableSelasa");
    let totalRowTable = Table.tBodies[0].rows.length;
    if (totalRowTable == 0) {
        let tombol = document.getElementById("tombolSelasa");
        Table.remove();
        $('#tambah_selasa').hide();
        tombol.setAttribute("onclick","myFunctionSelasa()")
        $('#errorInputSelasa').html('');
    }

}
