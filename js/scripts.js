/*!
    * Start Bootstrap - SB Admin v7.0.5 (https://startbootstrap.com/template/sb-admin)
    * Copyright 2013-2022 Start Bootstrap
    * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
    */
    // 
// Scripts
// 

window.addEventListener('DOMContentLoaded', event => {

    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
        //     document.body.classList.toggle('sb-sidenav-toggled');
        // }
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }

});

function create_chartRight(file_path, canvasId){
    console.log(file_path);
    fetch(file_path)
      .then(response => response.text())
      .then(data => {
        // Split the data into rows
        const rows = data.trim().split('\n');

        // Initialize arrays for each column
        const column1 = [];
        const column2 = [];
        const column3 = [];

        // Process each row and split into columns
        rows.forEach(row => {
          const columns = row.split(',');

          // Store values in respective columns
          column1.push(columns[0]);
          column2.push(columns[1]);
          column3.push(columns[2]);
        });

        // Create a chart using Chart.js
        const ctx = document.getElementById(canvasId).getContext('2d');
        new Chart(ctx, {
          type: 'line',
          data: {
            labels: Array.from({ length: column1.length }, (_, i) => i + 1),
            datasets: [
            {
                label: 'X Axis',
                data: column1,
                borderColor: 'red',
                fill: false
              },  
            {
                label: 'Y Axis',
                data: column2,
                borderColor: 'blue',
                fill: false
              },
              {
                label: 'Z Axis',
                data: column3,
                borderColor: 'green',
                fill: false
              }
            ]
          },
          options: {
            scales: {
              x: { 
                type: 'linear',
                display: true,
                beginAtZero: true
              },
              y: { 
                display: true
              }
            }
          }
        });
      })
      .catch(error => {
        console.log('Error:', error);
      });
}

function create_chartLeft(file_path, canvasId){
  console.log(file_path);
  fetch(file_path)
    .then(response => response.text())
    .then(data => {
      // Split the data into rows
      const rows = data.trim().split('\n');

      // Initialize arrays for each column
      const column1 = [];
      const column2 = [];
      const column3 = [];

      // Process each row and split into columns
      rows.forEach(row => {
        const columns = row.split(',');

        // Store values in respective columns
        column1.push(columns[3]);
        column2.push(columns[4]);
        column3.push(columns[5]);
      });

      // Create a chart using Chart.js
      const ctx = document.getElementById(canvasId).getContext('2d');
      new Chart(ctx, {
        type: 'line',
        data: {
          labels: Array.from({ length: column1.length }, (_, i) => i + 1),
          datasets: [
          {
              label: 'X Axis',
              data: column1,
              borderColor: 'red',
              fill: false
            },  
          {
              label: 'Y Axis',
              data: column2,
              borderColor: 'blue',
              fill: false
            },
            {
              label: 'Z Axis',
              data: column3,
              borderColor: 'green',
              fill: false
            }
          ]
        },
        options: {
          scales: {
            x: { 
              type: 'linear',
              display: true,
              beginAtZero: true
            },
            y: { 
              display: true
            }
          }
        }
      });
    })
    .catch(error => {
      console.log('Error:', error);
    });
}

function create_chart3D(file_path, canvasId){
  fetch(file_path)
      .then(response => response.text())
      .then(data => {
        const rows = data.trim().split('\n');
        const x = [];
        const y = [];
        const z = [];
        const x2 = [];
        const y2 = [];
        const z2 = [];

        rows.forEach(row => {
          const columns = row.split(',');
          x.push(parseFloat(columns[0]));
          y.push(parseFloat(columns[1]));
          z.push(parseFloat(columns[2]));
          x2.push(parseFloat(columns[3]));
          y2.push(parseFloat(columns[4]));
          z2.push(parseFloat(columns[5]));
        });

        const trace1 = {
          x: x,
          y: y,
          z: z,
          mode: 'markers',
          marker: {
            size: 5,
            color: 'blue'
          },
          name: 'Pinza Azul',
          type: 'scatter3d'
        };

        const trace2 = {
          x: x2,
          y: y2,
          z: z2,
          mode: 'markers',
          marker: {
            size: 5,
            color: 'red'
          },
          name: 'Pinza Roja',
          type: 'scatter3d'
        };

        const datos = [trace1, trace2];

        const layout = {
          scene: {
            xaxis: { title: 'X' },
            yaxis: { title: 'Y' },
            zaxis: { title: 'Z' }
          }
        };

        Plotly.newPlot(canvasId, datos, layout);
      })
      .catch(error => {
        console.log('Error:', error);
      });
}