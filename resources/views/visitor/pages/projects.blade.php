<div>
    <link rel="stylesheet" href="{{ asset('assets/css/gallery.css') }}">
    <section id="main-hero" class="mb-0">
        <div class="container text-center">
            <h1 class="main-hero-title">Project Lapan Tech</h1>
            <p class="main-hero-subtitle">Berikut adalah project yang kami kerjakan, beberapa sedang berjalan dan diberi
                label <span class="badge badge-warning">On Progress</span> dan yang sudah selesai diberi label <span
                    class="badge badge-success">Completed</span></p>
        </div>
    </section>

    <section id="gallery-portofolio">
        <ul class="gallery">
            @foreach ($projects as $item)
                <li>
                    <div class="overlay"></div>

                    <div class="info">

                        <h2>{{ $item->title }}</h2>
                        <p>{{ $item->subtitle }}</p>
                        <button class="btn btn-outline" style="background: transparent;">See Description</button>

                        <div class="description">
                            <p>
                                {{ $item->description }}
                            </p>
                        </div><!-- /.description-->
                    </div>
                    <!--/.info -->

                    <div class="bg-img">
                        @php
                            $pictures = json_decode($item->pictures);
                        @endphp
                        <img src="{{ $pictures[0] }}">
                    </div>
                </li>
            @endforeach
        </ul>
    </section>
    <script>
        $('.description').hide();

        function showFullHeight() {

            $('.gallery li').each(function() {

                $(this).find('.btn').click(function(e) {

                    console.log('Botão clicado');

                    e.preventDefault();

                    //NO MATTER WHAT WE CLOSE ALL OPEN SLIDES
                    $('.description').slideUp('normal');

                    //IF THE NEXT SLIDE WASN'T OPEN THEN OPEN IT
                    if ($(this).next().is(':hidden') == true) {

                        //ADD THE ON CLASS TO THE BUTTON
                        $(this).addClass('on');

                        //OPEN THE SLIDE
                        $(this).next().slideDown('normal');
                    }
                }); //click
            }); //each
        } //function

        //load the function when the doc is ready
        showFullHeight();
    </script>
</div>
