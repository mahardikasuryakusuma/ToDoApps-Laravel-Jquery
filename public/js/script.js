
// Slider untuk halaman awal setelah login
{
    const home = document.querySelector('.homeContent');
    const slider = document.querySelector('.slider');
    const konten= document.querySelector('.content');
    slider.addEventListener('click', function(){
        konten.classList.add('show');
        let tombol = document.querySelector("button.tabledit-edit-button.btn.btn-sm.btn-default")
        let table = document.querySelectorAll("td.waktu-jadwal input")
        for (let i = 0; i < table.length; i++) {
            table[i].setAttribute("type","time");
        }
    })
    home.addEventListener('click', function(){
        konten.classList.remove('show');
    })
}
{
    const days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
    const months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'Augusts', 'September', 'October', 'November', 'December'];

    const today = new Date();
    const dayName = days[today.getDay()];
    const day = today.getDate();
    const monthName = months[today.getMonth()];
    const year = today.getFullYear();

    const formattedDate = `${dayName}, ${day} ${monthName} ${year}`;
    document.getElementById("tanggal").innerHTML = formattedDate
}
{

let months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
let myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
let date = new Date();
let day = date.getDate();
let month = date.getMonth();
let thisDay = date.getDay();
let thisDays = myDays[thisDay];
let yy = date.getYear();
let year = (yy < 1000) ? yy + 1900 : yy;
    const minggu = document.querySelector('.Minggu');
    const senin = document.querySelector('.Senin');
    const selasa = document.querySelector('.Selasa');
    const rabu = document.querySelector('.Rabu');
    const kamis = document.querySelector('.Kamis');
    const jumat = document.querySelector('.Jumat');
    const sabtu = document.querySelector('.Sabtu');

    const tampilMinggu = document.querySelector('.show-jadwal-minggu');
    const tampilSenin= document.querySelector('.show-jadwal-senin');
    const tampilSelasa= document.querySelector('.show-jadwal-selasa');
    const tampilRabu= document.querySelector('.show-jadwal-rabu');
    const tampilKamis= document.querySelector('.show-jadwal-kamis');
    const tampilJumat= document.querySelector('.show-jadwal-jumat');
    const tampilSabtu= document.querySelector('.show-jadwal-sabtu');

    const hSun = document.querySelector('.hMinggu');
    const hMon = document.querySelector('.hSenin');
    const hTue = document.querySelector('.hSelasa');
    const hWed = document.querySelector('.hRabu');
    const hThu = document.querySelector('.hKamis');
    const hFri = document.querySelector('.hJumat');
    const hSat = document.querySelector('.hSabtu');


    minggu.addEventListener('click', function(){
        tampilMinggu.classList.add('tampil');
        hSun.classList.add('aktif');
        hMon.classList.remove('aktif')
        hTue.classList.remove('aktif')
        hWed.classList.remove('aktif')
        hThu.classList.remove('aktif')
        hFri.classList.remove('aktif')
        hSat.classList.remove('aktif')
        tampilSenin.classList.remove('tampil');
        tampilSelasa.classList.remove('tampil');
        tampilRabu.classList.remove('tampil');
        tampilKamis.classList.remove('tampil');
        tampilJumat.classList.remove('tampil');
        tampilSabtu.classList.remove('tampil');
    })
    senin.addEventListener('click', function(){
        tampilSenin.classList.add('tampil');
        hMon.classList.add('aktif')
        hSun.classList.remove('aktif');
        hTue.classList.remove('aktif')
        hWed.classList.remove('aktif')
        hThu.classList.remove('aktif')
        hFri.classList.remove('aktif')
        hSat.classList.remove('aktif')
        tampilMinggu.classList.remove('tampil');
        tampilSelasa.classList.remove('tampil');
        tampilRabu.classList.remove('tampil');
        tampilKamis.classList.remove('tampil');
        tampilJumat.classList.remove('tampil');
        tampilSabtu.classList.remove('tampil');
    })
    selasa.addEventListener('click', function(){
        tampilSelasa.classList.add('tampil');
        hTue.classList.add('aktif');
        hSun.classList.remove('aktif');
        hMon.classList.remove('aktif');
        hWed.classList.remove('aktif');
        hThu.classList.remove('aktif');
        hFri.classList.remove('aktif');
        hSat.classList.remove('aktif');
        tampilSenin.classList.remove('tampil');
        tampilMinggu.classList.remove('tampil');
        tampilRabu.classList.remove('tampil');
        tampilKamis.classList.remove('tampil');
        tampilJumat.classList.remove('tampil');
        tampilSabtu.classList.remove('tampil');
    })
    rabu.addEventListener('click', function(){
        tampilRabu.classList.add('tampil');
        hWed.classList.add('aktif')
        hSun.classList.remove('aktif');
        hMon.classList.remove('aktif')
        hTue.classList.remove('aktif')
        hThu.classList.remove('aktif')
        hFri.classList.remove('aktif')
        hSat.classList.remove('aktif')
        tampilSenin.classList.remove('tampil');
        tampilSelasa.classList.remove('tampil');
        tampilMinggu.classList.remove('tampil');
        tampilKamis.classList.remove('tampil');
        tampilJumat.classList.remove('tampil');
        tampilSabtu.classList.remove('tampil');
    })
    kamis.addEventListener('click', function(){
        tampilKamis.classList.add('tampil');
        hThu.classList.add('aktif')
        hSun.classList.remove('aktif');
        hMon.classList.remove('aktif')
        hTue.classList.remove('aktif')
        hWed.classList.remove('aktif')
        hFri.classList.remove('aktif')
        hSat.classList.remove('aktif')
        tampilSenin.classList.remove('tampil');
        tampilSelasa.classList.remove('tampil');
        tampilRabu.classList.remove('tampil');
        tampilMinggu.classList.remove('tampil');
        tampilJumat.classList.remove('tampil');
        tampilSabtu.classList.remove('tampil');
    })
    jumat.addEventListener('click', function(){
        tampilJumat.classList.add('tampil');
        hFri.classList.add('aktif')
        hSun.classList.remove('aktif');
        hMon.classList.remove('aktif')
        hTue.classList.remove('aktif')
        hWed.classList.remove('aktif')
        hThu.classList.remove('aktif')
        hSat.classList.remove('aktif')
        tampilSenin.classList.remove('tampil');
        tampilSelasa.classList.remove('tampil');
        tampilRabu.classList.remove('tampil');
        tampilKamis.classList.remove('tampil');
        tampilMinggu.classList.remove('tampil');
        tampilSabtu.classList.remove('tampil');
    })
    sabtu.addEventListener('click', function(){
        tampilSabtu.classList.add('tampil');
        hSat.classList.add('aktif')
        hSun.classList.remove('aktif');
        hMon.classList.remove('aktif')
        hTue.classList.remove('aktif')
        hWed.classList.remove('aktif')
        hThu.classList.remove('aktif')
        hFri.classList.remove('aktif')
        tampilSenin.classList.remove('tampil');
        tampilSelasa.classList.remove('tampil');
        tampilRabu.classList.remove('tampil');
        tampilKamis.classList.remove('tampil');
        tampilJumat.classList.remove('tampil');
        tampilMinggu.classList.remove('tampil');
    })
    if(thisDays=="Senin"){
        tampilSenin.classList.add('tampil');
        hMon.classList.add('aktif')
    }
    else if(thisDays=="Selasa"){
        tampilSelasa.classList.add('tampil');
        hTue.classList.add('aktif');
    }
    else if(thisDays=="Rabu"){
        tampilRabu.classList.add('tampil');
        hWed.classList.add('aktif')
    }
    else if(thisDays=="Kamis"){
        tampilKamis.classList.add('tampil');
        hThu.classList.add('aktif')
    }
    else if(thisDays=="Jumat"){
        tampilJumat.classList.add('tampil');
        hFri.classList.add('aktif')
    }
    else if(thisDays=="Sabtu"){
        tampilSabtu.classList.add('tampil');
        hSat.classList.add('aktif')
    }
    else if(thisDays=="Minggu"){
        tampilMinggu.classList.add('tampil');
        hSun.classList.add('aktif');
    }
}

