<div class="card card-small">
    <div class="card-header border-bottom">
        <h6 class="m-0">Statistik Pengunjung</h6>
    </div>
    <div class="card-body pt-0">
        <div class="row border-bottom py-2 bg-light">
            <div class="col-12 col-sm-6">
                <div id="visitor-overview" class="input-group input-group-sm my-auto ml-auto mr-auto ml-sm-auto mr-sm-0" style="max-width: 350px;">
                    <input type="text" class="input-sm form-control" name="dateRange" placeholder="Masukan Tanggal Awal - Akhir" id="visitor-daterange" style="cursor: pointer;">
                    <span class="input-group-append">
                        <span class="input-group-text">
                            <i class="material-icons"></i>
                        </span>
                    </span>
                </div>
            </div>
            <div class="col-12 col-sm-6 d-flex mb-2 mb-sm-0">
                <button type="button" id="get_visitor_report" class="btn btn-sm btn-white ml-auto mr-auto ml-sm-auto mr-sm-0 mt-3 mt-sm-0" wire:click="getVisitorReport">View Full Report &rarr;</button>
            </div>
        </div>
        <div>
            <canvas height="130" style="max-width: 100% !important;" id="visitor-users"></canvas>
        </div>
    </div>
    @push('js')
        <script>
            var ctx = document.getElementById("visitor-users").getContext('2d');
            var chartVisitor = new Chart(ctx, {
                type: 'line',
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                fontColor: '#fff'
                            },
                            gridLines: {
                                display: false,
                                color: '#fff'
                            }
                        }],
                        xAxes: [{
                            ticks: {
                                fontColor: '#fff'
                            },
                            gridLines: {
                                display: false,
                                color: '#fff'
                            }
                        }]
                    },
                    legend: {
                        labels: {
                            fontColor: '#000000'
                        }
                    },
                    tooltips: {
                        mode: 'index',
                        intersect: false,
                    },
                    hover: {
                        mode: 'nearest',
                        intersect: true
                    },
                    responsive: true,
                    // add loading indicator to chart
                },
            });

            function getChartDataFirst() {
                @this.call('getLatestVisitorReport').then(function(response) {
                    chartVisitor.data = response;
                    chartVisitor.update();
                });
            }
            $(document).ready(function() {
                // init chart js to visitor-users
                getChartDataFirst();

                $("#visitor-daterange").flatpickr({
                    mode: "range",
                    maxDate: "today",
                    dateFormat: "Y-m-d",
                    onChange: function(selectedDates, dateStr, instance) {

                        dateRange = dateStr.split(" to ");

                        if (selectedDates.length == 2) {
                            @this.call('getDateRangeVisitorReport', dateRange[0], dateRange[1]).then(function(response) {
                                chartVisitor.data = response;
                                chartVisitor.update();
                            });
                        }

                    }
                });

                    // $("#get_visitor_report").click(function() {
                    //     @this.call('getVisitorReport');
                    // })
            });
        </script>
    @endpush
</div>
