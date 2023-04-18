function deleteRow(r) {
    let i = r.parentNode.parentNode.rowIndex;
    document.getElementById("myTable").deleteRow(i);
    let Table = document.getElementById("myTable");
    let totalRowTable = Table.tBodies[0].rows.length;
    if (totalRowTable == 0) {
        let tombol = document.getElementById("tombol");
        Table.remove();
        $('#tambah_minggu').hide();
        tombol.setAttribute("onclick","myFunction()")
        $('#errorInput').html('');
    }

}
