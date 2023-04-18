function myFunction() {
    let jumbo = document.getElementById("container");
    let newJadwal = document.getElementById("addSchedule")



    let cont = document.createElement("div");
    let cont_time = document.createElement("div");
    let text = document.createElement("INPUT");
    let time =document.createElement("INPUT");
    let label_text = document.createElement("label")
    let label_time = document.createElement("label");
    let content_label = document.createTextNode("Scedule")
    let content_time = document.createTextNode("Time");


    cont.classList.add('user-box');
    text.setAttribute("type", "text");
    text.setAttribute("id", "jadwalMinggu");
    text.setAttribute("name", "jadwalMinggu");
    text.setAttribute("required", "");
    label_text.setAttribute("for", "jadwalMinggu");
    label_text.appendChild(content_label);

    cont_time.classList.add("user-box");
    time.setAttribute("type", "time");
    time.setAttribute("id", "waktuMinggu");
    time.setAttribute("name", "waktuMinggu");
    time.setAttribute("required", "");
    label_time.setAttribute("for", "waktuMinggu");
    label_time.appendChild(content_time);

    cont_time.appendChild(time);
    cont_time.appendChild(label_time)

    cont.appendChild(text);
    cont.appendChild(label_text);
    newJadwal.appendChild(cont);
    newJadwal.appendChild(cont_time);
    document.body.appendChild(jumbo);
}
