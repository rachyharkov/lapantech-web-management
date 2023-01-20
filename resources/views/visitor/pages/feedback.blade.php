<div>
    <section id="main-hero">
        <div class="container text-center">
            <h1 class="main-hero-title">Feedback</h1>
            <p class="main-hero-subtitle">Saran anda secara tidak langsung akan membangun kualitas kehidupan, pelayanan,
                dan produk kami.</p>
        </div>
    </section>

    <livewire:visitor.feedback-form />

    <script type="text/javascript">
        jQuery(function($) {

            $('#rate1').shieldRating({
                max: 5,
                step: 0.5,
                value: 0,
                markPreset: false,
                // increase size of the rating control
                layout: {
                    normal: {
                        width: 300,
                        height: 40
                    }
                },
                events: {
                    change: function(e) {
                        var rating = e.target.value();
                        if (rating == 0) {
                            $('.alertnya').html(
                                `<div class="alert alert-info">Rating tidak bisa kosong</div>`
                            );
                        } else {
                            if (rating < 3.5) {
                                $('.alertnya').html(`
<div class="alert alert-info mb-3" role="alert">
<i class="fa fa-sad-tear"></i>
<span class="ml-2">Mohon maaf atas ketidaknyamanan anda, silahkan sampaikan kepada kami apa yang membuat anda tidak puas dengan pelayanan kami melalui kolom komentar (sampaikan kritik dan saran)</span>
</div>
`);
                            } else {
                                $('.alertnya').html(`
<div class="alert alert-success mb-3" role="alert">
<i class="fa fa-smile"></i>
<span class="ml-2">Terima kasih atas kepuasan anda, silahkan sampaikan kepada kami apa yang membuat anda puas dengan pelayanan kami melalui kolom komentar (sampaikan kritik dan saran)</span>
</div>
`);
                            }
                        }
                    }
                }
            });

        });

        window.livewire.on('feedbackFormSubmitted', param => {
            alert('Feedback berhasil dikirim');
        })
        // initAnu();
    </script>
</div>
