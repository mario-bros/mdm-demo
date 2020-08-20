<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<canvas id="doughnut" width="200" height="200"></canvas>
<script>
    $(function () {
        var config = {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: [
                        {{ $counts['male'] }},
                        {{ $counts['female'] }},
                        {{ $counts['unknown'] }}
                    ],
                    backgroundColor: [
                        'rgb(54, 162, 235)',
                        'rgb(255, 99, 132)',
                        'rgb(255, 205, 86)'
                    ]
                }],
                labels: [
                    'Male',
                    'Female',
                    'Unknown'
                ]
            },
            options: {
                maintainAspectRatio: false
            }
        };

        var ctx = document.getElementById('doughnut').getContext('2d');
        new Chart(ctx, config);
    });
</script>
