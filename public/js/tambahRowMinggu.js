function myFunction() {
    let jumbo = document.getElementById("content");
    let cont = document.getElementById("addJadwalMinggu");
    let buton = document.getElementById("tombol");
    let box = document.createElement("div");
    let table = document.createElement("table");
    let tra = document.createElement("tr");
    let td1 = document.createElement("td");
    let td2 = document.createElement("td");
    let td3 = document.createElement("td");
    let td4 = document.createElement("td");
    let tBody = document.createElement("tbody");
    let button = document.createElement("button");
    let button1 = document.createElement("button");
    let icon1 = document.createElement("i");
    let icon2 = document.createElement("i");
    let iconTop = document.createElement("i");
    let inputText = document.createElement("input");
    let inputTime = document.createElement("input");
    let inputHidden = document.createElement("input");

    let formCover = document.getElementById("cover-input-minggu");
    let form = document.getElementById("tambah_minggu");
    icon1.classList.add("fas");
    icon1.classList.add("fa-check");

    icon2.classList.add("fa-solid");
    icon2.classList.add("fa-circle-xmark");

    iconTop.classList.add("fas");
    iconTop.classList.add("fa-plus-circle");

    button1.setAttribute("onclick", "deleteRow(this)");
    button1.setAttribute("value","Delete");

    buton.setAttribute("onclick", "tambahrow1()");
    box.classList.add("container");
    box.setAttribute("id", "container");
    button.setAttribute("type", "submit");
    button.setAttribute("id", "saveBtn");
    button.setAttribute("value", "create");
    button.appendChild(icon1);
    table.setAttribute("id","myTable")

    tBody.setAttribute("id", "tambahData")
    inputText.setAttribute("type", "text");
    inputText.setAttribute("id", "jadwal");
    inputText.setAttribute("name", "jadwalMinggu"+'[]');
    inputText.setAttribute("required", "");
    inputText.setAttribute("maxlength", "40");

    inputTime.setAttribute("type", "time");
    inputTime.setAttribute("id", "waktu");
    inputTime.setAttribute("name", "waktuMinggu"+'[]');
    inputTime.setAttribute("required", "");

    td1.classList.add("waktu-jadwal");
    td2.classList.add("jadwal-jadwal");
    td4.classList.add("delete-input");

    inputHidden.setAttribute("type", "hidden");
    inputHidden.setAttribute("name", "id[]");
    inputHidden.setAttribute("value", " ");

    td1.appendChild(inputHidden);
    td1.appendChild(inputTime);
    td2.appendChild(inputText);
    button1.appendChild(icon2);
    td4.appendChild(button1);
    tra.appendChild(td1);
    tra.appendChild(td2);
    tra.appendChild(td4);
    tBody.appendChild(tra);
    table.appendChild(tBody);
    formCover.appendChild(table);
    cont.appendChild(form);
    document.body.appendChild(jumbo);
    $('#tambah_minggu').show();
}
function tambahrow1() {
    // i++;
    let jumbo = document.getElementById("content");
    let tombol = document.getElementById("tombol");

    let buttonD = document.getElementById("submitMinggu");
    let bodyTabel = document.getElementById("tambahData");
    let form = document.getElementById("input");
    let tra = document.createElement("tr");
    let td1 = document.createElement("td");
    let td2 = document.createElement("td");
    let td3 = document.createElement("td");
    let td4 = document.createElement("td");
    let button = document.createElement("button");
    let button1 = document.createElement("button");
    let inputText = document.createElement("input");
    let inputTime = document.createElement("input");
    let inputHidden = document.createElement("input");
    let icon1 = document.createElement("i");
    let icon2 = document.createElement("i");

    icon1.classList.add("fas");
    icon1.classList.add("fa-check");

    icon2.classList.add("fa-solid");
    icon2.classList.add("fa-circle-xmark");

    button1.setAttribute("onclick", "deleteRow(this)");
    button1.setAttribute("value","Delete");

    td1.classList.add("waktu-jadwal");
    td2.classList.add("jadwal-jadwal");
    td4.classList.add("delete-input");

    inputText.setAttribute("type", "text");
    inputText.setAttribute("id", "jadwal");
    inputText.setAttribute("name", "jadwalMinggu"+'[]');
    inputText.setAttribute("required", "");
    inputText.setAttribute("maxlength", "40");

    inputTime.setAttribute("type", "time");
    inputTime.setAttribute("id", "waktu");
    inputTime.setAttribute("name", "waktuMinggu"+'[]');
    inputTime.setAttribute("required", "");

    inputHidden.setAttribute("type", "hidden");
    inputHidden.setAttribute("name", "id[]");
    inputHidden.setAttribute("value", " ");

    td1.appendChild(inputHidden);
    td1.appendChild(inputTime);
    td2.appendChild(inputText);
    button1.appendChild(icon2);
    td4.appendChild(button1);
    tra.appendChild(td1);
    tra.appendChild(td2);
    tra.appendChild(td4);
    bodyTabel.appendChild(tra);
    document.body.appendChild(jumbo);
}
