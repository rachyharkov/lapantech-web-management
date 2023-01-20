<!-- FaQ -->
<section id="faq">
    <style>
        details {
            width: 100%;
            margin: 0 auto;
            margin-bottom: .5rem;
            box-shadow: 0 .1rem 1rem -.5rem rgba(0, 0, 0, .4);
            border-radius: 5px;
            overflow: hidden;
        }

        summary {
            padding: 1rem;
            display: block;
            color: black;
            padding-left: 2.2rem;
            position: relative;
            cursor: pointer;
        }

        details h3 {
            margin: 0;
            color: #040404;
            font-size: 1.2rem;
        }

        details p {
            padding: 0 1rem;
        }

        summary:before {
            content: '';
            border-width: .4rem;
            border-style: solid;
            border-color: transparent transparent transparent #040404;
            position: absolute;
            top: 1.3rem;
            left: 1rem;
            transform: rotate(0);
            transform-origin: .2rem 50%;
            transition: .25s transform ease;
        }

        /* THE MAGIC 🧙‍♀️ */
        details[open]>summary:before {
            transform: rotate(90deg);
        }
    </style>
    <div class="container ">
        <h2 style="text-align: center;margin-bottom: 2rem;">Pertanyaan yang sering di ajukan</h2>
        <details>
            <summary><h3>Berapa lama proses pemasangan?</h3></summary>
            <p>
                Estimasi waktu pemasangan 2-4 Jam, tetapi tergantung kondisi di lapangan.
            </p>
        </details>
        <details>
            <summary><h3>Apa merk CCTV yang digunakan?</h3></summary>
            <p>
                Merk yang digunakan adalah Hilook, Hik Vision, AHD, dan sesuai permintaan client.
            </p>
        </details>
        <details>
            <summary><h3>Berapa lama garansi layanan?</h3></summary>
            <p>
                Garansi kamera dan DVR 1 Tahun.
            </p>
        </details>
        <details>
            <summary><h3>Apakah ada biaya maintenance?</h3></summary>
            <p>
                Selama garansi masih ada, tidak ada biaya untuk maintenance. Jika garansi sudah habis, dikenakan biaya Rp800.000 / 2 Bulan.
            </p>
        </details>
        <details>
            <summary><h3>Paket CCTV apa yang cocok untuk toko?</h3></summary>
            <p>
                Kami sarankan untuk toko menggunakan 4 kamera sudah cukup.
            </p>
        </details>
        <details>
            <summary><h3>Apakah bisa akses CCTV diluar jaringan lokal?</h3></summary>
            <p>
                Bisa, syaratnya harus ada jaringan WI-FI dan Internet.
            </p>
        </details>
    </div>
</section>
