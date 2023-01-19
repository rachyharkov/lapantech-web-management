<div>
    <div class="main-content-container container-fluid px-4">
        <!-- Page Header -->
        <div class="page-header row no-gutters py-4">
            <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Dashboard</span>
                <h3 class="page-title">Blog Overview</h3>
            </div>
        </div>
        <!-- End Page Header -->
        <!-- Small Stats Blocks -->

        <livewire:admin.widget-small-stats />
        <!-- End Small Stats Blocks -->
        <div class="row">
            <!-- Users Stats -->
            <div class="col-lg-8 col-md-12 col-sm-12 mb-4">
                <livewire:admin.widget-visitor-stats />
            </div>
            <!-- End Users Stats -->
            <!-- Users By Device Stats -->
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <livewire:admin.widget-visitor-device-stats />
            </div>
            <!-- End Users By Device Stats -->
            <!-- New Draft Component -->
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <!-- Quick Post -->
                <div class="card card-small h-100">
                    <div class="card-header border-bottom">
                        <h6 class="m-0">New Draft</h6>
                    </div>
                    <livewire:admin.widget-quick-create-draft />
                </div>
                <!-- End Quick Post -->
            </div>
            <!-- End New Draft Component -->
            <!-- Discussions Component -->
            <div class="col-lg-5 col-md-12 col-sm-12 mb-4">
                <livewire:admin.widget-discussions-management />
            </div>
            <!-- End Discussions Component -->
            <!-- Top Referrals Component -->
            <div class="col-lg-3 col-md-12 col-sm-12 mb-4">
                <div class="card card-small">
                    <div class="card-header border-bottom">
                        <h6 class="m-0">Top Referrals</h6>
                    </div>
                    <div class="card-body p-0">
                        <ul class="list-group list-group-small list-group-flush">
                            <li class="list-group-item d-flex px-3">
                                <span class="text-semibold text-fiord-blue">GitHub</span>
                                <span class="ml-auto text-right text-semibold text-reagent-gray">19,291</span>
                            </li>
                            <li class="list-group-item d-flex px-3">
                                <span class="text-semibold text-fiord-blue">Stack Overflow</span>
                                <span class="ml-auto text-right text-semibold text-reagent-gray">11,201</span>
                            </li>
                            <li class="list-group-item d-flex px-3">
                                <span class="text-semibold text-fiord-blue">Hacker News</span>
                                <span class="ml-auto text-right text-semibold text-reagent-gray">9,291</span>
                            </li>
                            <li class="list-group-item d-flex px-3">
                                <span class="text-semibold text-fiord-blue">Reddit</span>
                                <span class="ml-auto text-right text-semibold text-reagent-gray">8,281</span>
                            </li>
                            <li class="list-group-item d-flex px-3">
                                <span class="text-semibold text-fiord-blue">The Next Web</span>
                                <span class="ml-auto text-right text-semibold text-reagent-gray">7,128</span>
                            </li>
                            <li class="list-group-item d-flex px-3">
                                <span class="text-semibold text-fiord-blue">Tech Crunch</span>
                                <span class="ml-auto text-right text-semibold text-reagent-gray">6,218</span>
                            </li>
                            <li class="list-group-item d-flex px-3">
                                <span class="text-semibold text-fiord-blue">YouTube</span>
                                <span class="ml-auto text-right text-semibold text-reagent-gray">1,218</span>
                            </li>
                            <li class="list-group-item d-flex px-3">
                                <span class="text-semibold text-fiord-blue">Adobe</span>
                                <span class="ml-auto text-right text-semibold text-reagent-gray">827</span>
                            </li>
                        </ul>
                    </div>
                    <div class="card-footer border-top">
                        <div class="row">
                            <div class="col">
                                <select class="custom-select custom-select-sm">
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
                </div>
            </div>
            <!-- End Top Referrals Component -->
        </div>
    </div>
</div>
