const list = document.querySelectorAll('.list');
const task = document.getElementById('taskRes');
const schedule = document.getElementById('scheduleRes');
const taskDis = document.getElementById('taskDis');
const scheduleDis = document.getElementById('scheduleDis');
function activeLink(){
    list.forEach((item)=>
    item.classList.remove('active'));
    this.classList.add('active');

}
list.forEach((item)=>
item.addEventListener('click',activeLink))

task.addEventListener('click', function(){
    taskDis.classList.add('active')
    scheduleDis.classList.remove('active')
})
schedule.addEventListener('click', function(){
    scheduleDis.classList.add('active')
    taskDis.classList.remove('active')
})
