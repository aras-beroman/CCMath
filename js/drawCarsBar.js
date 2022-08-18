
let barChart = null;

const getDataForBarChart = () => {
    let brands = [];
    let amount = [];
    $.ajax({
        url: "http://localhost:8000/cars-by-band",
        type: 'GET',
        dataType: 'json',
        success: function(result) {
            console.log(`success result - ${JSON.stringify(result)}`);
            Object.keys(result.data).map(function (key) {
                brands.push(result.data[key].brand);
                amount.push(result.data[key].amount);
            });

            drawBarChart(brands, amount);
        },
        error: function(result, status, error){
            console.log(`Error occurred - ${error}`)
        }
    });
}

const drawBarChart = (brands, amount) => {
    const ctx = document.getElementById('barChart').getContext('2d');
    barChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: brands,
            datasets: [{
                label: '# Of Car Brands',
                data: amount,
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgb(255, 205, 86)'

                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}

getDataForBarChart();