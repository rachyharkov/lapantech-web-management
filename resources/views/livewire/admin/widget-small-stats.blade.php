<div class="row">
    <div class="col-lg col-md-6 col-sm-6 mb-4">
        <livewire:admin.widget-count-total-posts />
    </div>
    <div class="col-lg col-md-6 col-sm-6 mb-4">
        <livewire:admin.widget-count-post-categories />
    </div>
    <div class="col-lg col-md-4 col-sm-6 mb-4">
        <livewire:admin.widget-count-comments />
    </div>
    <div class="col-lg col-md-4 col-sm-6 mb-4">
        <livewire:admin.widget-count-users />
    </div>
    <div class="col-lg col-md-4 col-sm-12 mb-4">
        <livewire:admin.widget-count-subscribers />
    </div>
    <script>
        document.addEventListener('livewire:load', function () {

            function initiateGrowthIndicator(value, index) {
                var className = value > 0 ? 'stats-small__percentage--increase' : value < 0 ? 'stats-small__percentage--decrease' : 'stats-small__percentage' ;
                $('.stats-small--1').eq(index).find('.stats-small__percentage').addClass(className).text(value + '%');
            }

            // Options
            function boSmallStatsOptions(max) {
                return {
                    maintainAspectRatio: true,
                    responsive: true,
                    legend: {
                        display: false
                    },
                    tooltips: {
                        enabled: false,
                        custom: false
                    },
                    elements: {
                        point: {
                            radius: 0
                        },
                        line: {
                            tension: 0.3
                        }
                    },
                    scales: {
                        xAxes: [{
                            gridLines: false,
                            scaleLabel: false,
                            ticks: {
                                display: false
                            }
                        }],
                        yAxes: [{
                            gridLines: false,
                            scaleLabel: false,
                            ticks: {
                                display: false,
                                // Avoid getting the graph line cut of at the top of the canvas.
                                // Chart.js bug link: https://github.com/chartjs/Chart.js/issues/4790
                                suggestedMax: max
                            }
                        }],
                    },
                };
            }

            @this.call('getGrowthPercentage').then(function (data) {
                var boSmallStatsDatasets = data;
                // Generate the small charts
                boSmallStatsDatasets.map(function(el, index) {
                    var chartOptions = boSmallStatsOptions(Math.max.apply(Math, el.data) + 1);
                    var ctx = document.getElementsByClassName('blog-overview-stats-small-' + (index + 1));
                    new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: ["Label 1", "Label 2", "Label 3", "Label 4", "Label 5", "Label 6", "Label 7"],
                            datasets: [{
                                label: 'Today',
                                fill: 'start',
                                data: el.data,
                                backgroundColor: el.backgroundColor,
                                borderColor: el.borderColor,
                                borderWidth: 1.5,
                            }]
                        },
                        options: chartOptions
                    });
                    initiateGrowthIndicator(el.percentageGrowth, index);
                });
            });

        })
    </script>
</div>
