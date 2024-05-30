document.addEventListener("DOMContentLoaded", function() {

// Aside Navbar

const nav = document.querySelector(".nav");
const navList = nav.querySelectorAll("li");
const totalNavList = navList.length;
const allSection = document.querySelectorAll(".section");
const totalSection = allSection.length;

// Loop through navigation links except the first one (usually homepage)
for (let i = 0; i < totalNavList; i++) {
  const a = navList[i].querySelector("a");

  a.addEventListener("click", function (event) {
    event.preventDefault(); // Prevent default anchor tag behavior

    // for (let i = 0; i < totalSection; i++) {
    //     allSection[i].classList.remove("back-section");
    //   }

    // Loop through all navigation links
    for (let j = 0; j < totalNavList; j++) {
        // if(navList[j].querySelector("a").classList.contains("active")){
        //     allSection[j].classList.add("back-section");
        // }
        navList[j].querySelector("a").classList.remove("active");
    }

    // Add active class to the clicked link
    this.classList.add("active");

    // Show corresponding section
    showSection(this);
  });
}

// function showSection(element) {
//   // Remove active class from all sections
//   for (let i = 0; i < totalSection; i++) {
//     allSection[i].classList.remove("active");
//   }

//   const target = element.getAttribute("href").split("#")[1];
//   document.querySelector("#" + target).classList.add("active");
// }

// const navToggleBtn = document.querySelector(".navbar-toggle");
// const aside = document.querySelector(".aside"); // Assuming this is the main aside element

// navToggleBtn.addEventListener("click", () => {
//   aside.classList.toggle("open"); // Toggle the "open" class on the aside element
// });
// function asideSectionToggleBtn(){
//     aside.classList.toggle("open")
// }


// Chart 1
const ctxLine = document.getElementById('myChart');

new Chart(ctxLine, {
    type: 'line',
    data: {
        labels: ['Mon', 'Tues', 'Wed', 'Thurs', 'Fri', 'Sat', 'Sun'],
        datasets: [{
                label: 'Brand',
                data: [3000, 2500, 3000, 5000, 4000, 3000, 3500],
                borderColor: '#FF66C4',
                borderWidth: 2
            },
            {
                label: 'Tools',
                data: [2000, 1500, 2000, 3000, 2000, 1500, 2400],
                borderColor: '#A375FF',
                borderWidth: 2
            },
            {
                label: 'Stock',
                data: [1000, 1500, 2000, 2500, 3000, 2000, 1000],
                borderColor: '#FF914D',
                borderWidth: 2
            }
        ]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'bottom',
                labels: {
                    color: 'white' // set legend text color to white
                  }
            }
        }
    }
});

// Chart 2
const ctxPie = document.getElementById('pieChart');

new Chart(ctxPie, {
    type: 'doughnut',
    data: {
        labels: ['Car Accesories', 'Oil', 'Degreaser', 'Auto Parts', 'Fluid'],
        datasets: [{
            label: 'My First Dataset',
            data: [300, 50, 100, 50, 20],
            backgroundColor: [
                '#FF66C4',
                '#A375FF',
                '#FF914D',
                '#FFBD59',
                '#5271FF'
            ],
            hoverOffset: 4
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'bottom',
                labels: {
                    color: 'white',
                  }
            }
        }
    }
});

// Products Section

const ctxBar = document.getElementById('barchart');

new Chart(ctxBar, {
    type: 'bar',
    data: {
        labels: ['Mon', 'Tues', 'Wed', 'Thurs', 'Fri', 'Sat', 'Sun'],
        datasets: [{
                label: 'Oil',
                data: [3000, 2500, 3000, 5000, 4000, 3000, 3500],
                borderColor: '#F1B356',
                borderWidth: 2
            },
            {
                label: 'Car Accesories',
                data: [2000, 1500, 2000, 3000, 2000, 1500, 2400],
                borderColor: '#A375FF',
                borderWidth: 2
            },
            {
                label: 'Fluid',
                data: [1000, 500, 2000, 2500, 3000, 2000, 1000],
                borderColor: '#7ED957',
                borderWidth: 2
            },
            {
                label: 'Auto Parts',
                data: [900, 5500, 3000, 4500, 6200, 2100, 1600],
                borderColor: '#FF66C4',
                borderWidth: 2
            }
        ]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'bottom',
                labels: {
                    color: 'white' // set legend text color to white
                  }
            }
        }
    }
});

// Sales Section

const ctxLine1 = document.getElementById('linechart');

new Chart(ctxLine1, {
    type: 'line',
    data: {
        labels: ['Mon', 'Tues', 'Wed', 'Thurs', 'Fri', 'Sat', 'Sun'],
        datasets: [{
                label: 'Brand',
                data: [3000, 2500, 3000, 5000, 4000, 3000, 3500],
                borderColor: '#FF66C4',
                borderWidth: 2
            },
            {
                label: 'Tools',
                data: [2000, 3500, 3500, 3000, 2000, 1500, 2400],
                borderColor: '#A375FF',
                borderWidth: 2
            },
            {
                label: 'Stock',
                data: [1000, 1500, 2000, 2500, 3000, 2000, 1000],
                borderColor: '#FF914D',
                borderWidth: 2
            }
        ]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'bottom',
                labels: {
                    color: 'white' // set legend text color to white
                  }
            }
        }
    }
});

const ctxPie1 = document.getElementById('pieschart');

new Chart(ctxPie1, {
    type: 'doughnut',
    data: {
        labels: ['Car Accesories', 'Oil', 'Degreaser', 'Auto Parts', 'Fluid'],
        datasets: [{
            label: 'My First Dataset',
            data: [300, 50, 100, 50, 20],
            backgroundColor: [
                '#FF66C4',
                '#A375FF',
                '#FF914D',
                '#FFBD59',
                '#5271FF'
            ],
            hoverOffset: 4
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'bottom',
                labels: {
                    color: 'white',
                  }
            }
        }
    }
});

// Preview for the picture

function previewImage() {
    var preview = document.getElementById('preview');
    var fileInput = document.getElementById('productImage');
    var file = fileInput.files[0];
    var reader = new FileReader();
  
    reader.onloadend = function () {
      preview.src = reader.result;
      preview.style.display = 'block'; // Display the image
    }
  
    if (file) {
      reader.readAsDataURL(file); // Read the file as a data URL
    } else {
      preview.src = ''; // Clear the preview if no file is selected
    }
  }

});