function deleteRowJumat(r) {
    let i = r.parentNode.parentNode.rowIndex;
    document.getElementById("myTableJumat").deleteRow(i);
    let Table = document.getElementById("myTableJumat");
    let totalRowTable = Table.tBodies[0].rows.length;
    if (totalRowTable == 0) {
        let tombol = document.getElementById("tombolJumat");
        Table.remove();
        $('#tambah_jumat').hide();
        tombol.setAttribute("onclick","myFunctionJumat()")
        $('#errorInputJumat').html('');
    }

}
