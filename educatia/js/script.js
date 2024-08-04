let toggleBtn = document.getElementById('toggle-btn');
let body = document.body;
let darkMode = localStorage.getItem('dark-mode');

const enableDarkMode = () =>{
   toggleBtn.classList.replace('fa-sun', 'fa-moon');
   body.classList.add('dark');
   localStorage.setItem('dark-mode', 'enabled');
}

const disableDarkMode = () =>{
   toggleBtn.classList.replace('fa-moon', 'fa-sun');
   body.classList.remove('dark');
   localStorage.setItem('dark-mode', 'disabled');
}

if(darkMode === 'enabled'){
   enableDarkMode();
}

toggleBtn.onclick = (e) =>{
   darkMode = localStorage.getItem('dark-mode');
   if(darkMode === 'disabled'){
      enableDarkMode();
   }else{
      disableDarkMode();
   }
}

let profile = document.querySelector('.header .flex .profile');

document.querySelector('#user-btn').onclick = () =>{
   profile.classList.toggle('active');
   search.classList.remove('active');
}

let search = document.querySelector('.header .flex .search-form');

document.querySelector('#search-btn').onclick = () =>{
   search.classList.toggle('active');
   profile.classList.remove('active');
}

let sideBar = document.querySelector('.side-bar');

document.querySelector('#menu-btn').onclick = () =>{
   sideBar.classList.toggle('active');
   body.classList.toggle('active');
}

document.querySelector('#close-btn').onclick = () =>{
   sideBar.classList.remove('active');
   body.classList.remove('active');
}

window.onscroll = () =>{
   profile.classList.remove('active');
   search.classList.remove('active');

   if(window.innerWidth < 1200){
      sideBar.classList.remove('active');
      body.classList.remove('active');
   }
}

document.addEventListener('DOMContentLoaded', function() {
      // Get the canvas element
    var ctx = document.getElementById('lineChart').getContext('2d');

    // Define the data for the chart
    var data = {
    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
    datasets: [{
        label: 'My Dataset',
        backgroundColor: 'rgba(255, 99, 132, 0.2)', // Background color for the area under the line
        borderColor: 'rgba(255, 99, 132, 1)', // Border color for the line
        borderWidth: 2,
        data: [10, 20, 15, 25, 30, 20, 35] // Data points for the line chart
    }]
    };

    // Configure the options for the chart
    var options = {
    responsive: true,
    maintainAspectRatio: false,
    scales: {
        yAxes: [{
        ticks: {
            beginAtZero: true
        }
        }]
    }
    };

    // Create the line chart
    var lineChart = new Chart(ctx, {
    type: 'line',
    data: data,
    options: options
    });

});

/* Set the width of the side navigation to 250px */
function openNav() {
   document.getElementById("mySidenav").style.width = "250px";
}

/* Set the width of the side navigation to 0 */
function closeNav() {
   document.getElementById("mySidenav").style.width = "0";
}
 
