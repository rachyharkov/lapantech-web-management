<div>
    <div class="container">
        <div class="col-md-8 m-auto">
            @if ($submitted == true)
                <div class="alert alert-success">
                    Terima kasih atas feedback anda, kami akan pertimbangkan feedback anda untuk meningkatkan kualitas
                    pelayanan kami.
                </div>
            @else
                <form wire:submit.prevent="sendFeedback">
                    <div class="card mb-4">
                        <div class="card-body">

                            @if ($errors->any())
                                <div class="alert alert-danger mt-2 mb-4">
                                    <h5 class="alert-heading">Terjadi Kesalahan</h5>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <input type="text" class="form-control mb-3" placeholder="Name" wire:model="name">
                            <select class="form-control mb-3" wire:model="sektor">
                                <option value="">- Pilih Sektor Asal -</option>
                                <option value="1">Komersil</option>
                                <option value="2">Pribadi</option>
                                <option value="3">Lainnya</option>
                            </select>

                            <input type="text" class="form-control mb-3" placeholder="Token Feedback"
                                wire:model="token">

                            <div class="alertnya" wire:ignore>

                            </div>

                            <div class="d-flex flex-column justify-content-center align-items-center mb-4">
                                <span style="font-size:22px;">Seberapa Puas Anda Dengan Pelayanan Kami?</span>
                                <div id="rate1" style="margin-top:8px;" wire:ignore></div>
                            </div>
                            <textarea class="form-control mb-3" placeholder="Komentar" rows="5" wire:model="komentar"></textarea>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary" type="submit" wire:loading.remove>Submit</button>
                        </div>
                    </div>
                </form>
            @endif
        </div>
    </div>
    @push('js')
        <script type="text/javascript">
            $(document).ready(function() {
                function initAnu() {
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
                }
                window.livewire.on('feedbackFormHydrated', () => {
                    console.log('feedbackFormHydrated');
                    initAnu();
                })

                initAnu();

                window.livewire.on('feedbackFormSubmitted', param => {
                    alert('Feedback berhasil dikirim');
                })
            })
        </script>
    @endpush

</div>
