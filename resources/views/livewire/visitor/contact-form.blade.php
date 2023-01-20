<section id="feedback">
    <div class="container-fluid h-100 bg-light text-dark">
        <div class="row justify-content-center align-items-center">
            <h1>Feedback</h1>
        </div>
        <p style="text-align: center;">Silahkan isi form feedback dibawah ini.</p>
        <div class="row justify-content-center align-items-center h-100">
            <div class="col col-sm-6 col-md-6 col-lg-4 col-xl-5">
                <form class="form-feedback" wire:submit.prevent="submit">
                    <div class="form-group has-validation">
                        <label class="form-label" for="name">Nama</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" required wire:model.defer="name" />
                        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group has-validation">
                        <label class="form-label" for="email">Email</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" required wire:model.defer="email" />
                        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group has-validation">
                        <label class="form-label" for="phone">No. Telepon</label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" required wire:model.defer="phone" />
                        @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group has-validation">
                        <label class="form-label" for="message">Pesan</label>
                        <textarea class="form-control @error('message') is-invalid @enderror" required wire:model.defer="message" rows="5"></textarea>
                        @error('message') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="btn-group mb-3" style="float: right;">
                        <button type="reset" class="btn btn-secondary">Reset</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        window.addEventListener('load', function() {
            window.livewire.on('contactFormSubmitted', () => {
                window.alert('Feedback submitted');
            });
        })
    </script>
</section>
