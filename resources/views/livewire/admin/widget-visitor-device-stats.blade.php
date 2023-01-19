<div class="card card-small h-100">
    <div class="card-header border-bottom">
        <h6 class="m-0">Users by device</h6>
    </div>
    <div class="card-body d-flex py-0">
        <canvas height="220" class="blog-users-by-device m-auto"></canvas>
    </div>
    <div class="card-footer border-top">
        <div class="row">
            <div class="col">
                <select class="custom-select custom-select-sm" style="max-width: 130px;">
                    <option selected>Last Week</option>
                    <option value="1">Today</option>
                    <option value="2">Last Month</option>
                    <option value="3">Last Year</option>
                </select>
            </div>
            <div class="col text-right view-report">
                <a href="#">Full report &rarr;</a>
            </div>
        </div>
    </div>

    @push('js')
        <script>
            var ctx = document.getElementsByClassName("blog-users-by-device");
            var chartDeviceVisitor = new Chart(ctx, {
                type: 'pie',
                options: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            boxWidth: 12,
                            padding: 20,
                            fontStyle: 'bold'
                        }
                    }
                }
            });

            var colors = [
                'rgba(0,123,255,0.9)',
                'rgba(0,123,255,0.5)',
                'rgba(0,123,255,0.3)'
            ];

            function updateChartDeviceVisitor() {
                @this.call('refreshVisitorDeviceStats').then(response => {
                    chartDeviceVisitor.data = response
                    chartDeviceVisitor.update();
                });
            }
            $(document).ready(function() {
                updateChartDeviceVisitor();
            });
        </script>
    @endpush
</div>
