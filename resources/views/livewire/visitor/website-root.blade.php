<div>
    @include('visitor.partials.layouts.navbar')

    <div class='peeek-loading' wire:loading style="display: none;">
        <ul>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>


    @if ($page == 'home')

        @include('visitor.contents.website-hero')

        @include('visitor.contents.website-jasa-layanan')

        @include('visitor.contents.website-about')

        @include('visitor.contents.website-price-list')

        @include('visitor.contents.website-testimoni')

        @include('visitor.contents.website-contact')

        @include('visitor.contents.website-faq')

        <script>
            window.addEventListener('load', function () {
                initSplide();
            })
        </script>
    @elseif ($page == 'projects')
        @include('visitor.pages.projects')
    @elseif ($page == 'product_and_services')
        @include('visitor.pages.product_and_services')
    @elseif($page == 'feedback')
        @include('visitor.pages.feedback')
    @elseif ($page == 'contact')
        @include('visitor.pages.contact')
    @else
        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-12" style="height: 80vh;display: flex;flex-direction: column;justify-content: center;">
                        <h1 class="text-center">404</h1>
                        <h2 class="text-center">Halaman tidak ditemukan</h2>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @include('visitor.partials.layouts.footer')

    <div class="scrolltop"><img src="assets/img/scrollto.svg"></div>
    <div class="wa-icon"><a href="https://api.whatsapp.com/send?phone=6281280399097&text=Hallo,%20Saya%20ingin%20bertanya%20tentang%20produk%20anda"><img src="assets/img/wa_icon.svg"></a></div>

    @push('js')
        <script>
            function initSplide() {
                var splide = new Splide('#splide', {
                    autoplay: true,
                    rewind: true,
                    pauseOnHover: false,
                    perPage: 2
                });


                if(document.documentElement.clientWidth < 700 ){
                    var splide = new Splide('#splide', {
                        autoplay: true,
                        rewind: true,
                        pauseOnHover: false,
                        perPage: 1
                    });
                }
                splide.mount();
            }

            document.addEventListener('livewire:load', function () {
                window.livewire.on('urlChange', param => {
                    history.pushState(null, null, param);

                    $('.navbar #menu-' + param).addClass('active').siblings().removeClass('active');

                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });

                    if (param == 'home') {
                        initSplide();
                    }
                })
            })
        </script>
    @endpush
</div>
