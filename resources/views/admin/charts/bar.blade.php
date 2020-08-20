<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<canvas id="myChart" width="400" height="100"></canvas>
<script>
$(function () {
    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["New", "Proposed", "Approved", "Certified", "Rejected"],
            datasets: [{
                label: 'Bar Order Status',
                data: [{{ $new }}, {{ $proposed }}, {{ $approved }}, {{ $certified }}, {{ $rejected }}],
                "borderColor":[
                    "rgb(191, 25, 232)",
                    "rgb(191, 25, 232)",
                    "rgb(191, 25, 232)",
                    "rgb(191, 25, 232)",
                    "rgb(255, 99, 132)",
                    "rgb(255, 159, 64)",
                    "rgb(255, 205, 86)",
                    "rgb(75, 192, 192)",
                    "rgb(54, 162, 235)",
                    "rgb(153, 102, 255)",
                    "rgb(201, 203, 207)",
                    "rgb(181, 147, 50)",
                    "rgb(232, 130, 81)",
                ],
                "borderWidth":1
            }, {
                label: 'Line Order Status',
                data: [{{ $new }}, {{ $proposed }}, {{ $approved }}, {{ $certified }}, {{ $rejected }}],
                // Changes this dataset to become a line
                "fill":false,
                "backgroundColor":"purple",
                "borderColor":"purple",
                "borderWidth":1,
                type: 'line'
            }],
        },
        options: {
            responsive: true,
            layout: {
                padding: {
                    left: 10,
                    right: 10,
                    top: 0,
                    bottom: 0
                }
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });
});
</script>


<br>