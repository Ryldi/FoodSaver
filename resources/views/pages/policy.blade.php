@extends('layouts.master')

@section('content')
<div class="bg-neutral text-primary relative mt-20 py-10">
    <div class="container mx-auto px-4">
        <h1 class="text-primary text-4xl font-bold text-center mb-8">Kebijakan & Privasi</h1>
        
        <div class="space-y-8">
            <!-- 1. Latar Belakang dan Tujuan -->
            <section>
                <h2 class="text-2xl font-semibold text-primary mb-4">1. Latar Belakang dan Tujuan</h2>
                <p class="text-orimary leading-relaxed">
                    Website ini didirikan dengan tujuan mengurangi limbah makanan, mendukung keberlanjutan lingkungan, dan memberikan akses makanan berkualitas dengan harga yang terjangkau. Kami menjual makanan sisa yang masih layak konsumsi sesuai standar kesehatan dan keamanan pangan.
                </p>
            </section>

            <!-- 2. Definisi Makanan Sisa -->
            <section>
                <h2 class="text-2xl font-semibold text-primary mb-4">2. Definisi Makanan Sisa</h2>
                <ul class="list-disc pl-6 text-primary">
                    <li>Makanan yang berasal dari restoran, toko roti, kafe, atau penyedia lainnya yang tidak habis terjual dalam hari yang sama.</li>
                    <li>Makanan yang telah mendekati tanggal kedaluwarsa, tetapi masih aman dikonsumsi.</li>
                    <li>Produk dalam kondisi baik tanpa kerusakan pada kemasan utama atau kontaminasi.</li>
                </ul>
            </section>

            <!-- 3. Keamanan dan Kualitas -->
            <section>
                <h2 class="text-2xl font-semibold text-primary mb-4">3. Keamanan dan Kualitas</h2>
                <p class="text-primary leading-relaxed">
                    Kami memastikan makanan yang dijual:
                </p>
                <ul class="list-disc pl-6 text-primary">
                    <li>Disimpan dan ditangani sesuai dengan pedoman kesehatan dan sanitasi yang berlaku.</li>
                    <li>Melalui proses seleksi ketat untuk memastikan kelayakan konsumsi.</li>
                    <li>Dikemas dengan baik untuk menjaga kualitas hingga diterima oleh pembeli.</li>
                </ul>
            </section>

            <!-- 4. Tanggung Jawab Konsumen -->
            <section>
                <h2 class="text-2xl font-semibold text-primary mb-4">4. Tanggung Jawab Konsumen</h2>
                <p class="text-primary leading-relaxed">
                    Konsumen wajib memeriksa detail produk sebelum membeli, termasuk tanggal kedaluwarsa dan informasi alergi.
                </p>
                <ul class="list-disc pl-6 text-primary">
                    <li>Konsumen diharapkan segera mengonsumsi makanan sesuai dengan saran waktu yang diberikan pada deskripsi produk.</li>
                    <li>Konsumen bertanggung jawab untuk menyimpan makanan dengan benar setelah diterima.</li>
                </ul>
            </section>

            <!-- 5. Pengembalian dan Refund -->
            <section>
                <h2 class="text-2xl font-semibold text-primary mb-4">5. Pengembalian dan Refund</h2>
                <p class="text-primary leading-relaxed">
                    Produk makanan tidak dapat dikembalikan, kecuali terdapat kerusakan yang diakibatkan oleh kesalahan pengemasan atau pengiriman.
                </p>
                <p class="text-primary leading-relaxed">
                    Pengajuan refund harus dilakukan dalam waktu 24 jam setelah produk diterima, dengan melampirkan bukti yang diperlukan seperti foto atau video.
                </p>
            </section>

            <!-- 6. Kebijakan Harga -->
            <section>
                <h2 class="text-2xl font-semibold text-primary mb-4">6. Kebijakan Harga</h2>
                <p class="text-primary leading-relaxed">
                    Harga makanan sisa lebih rendah dibandingkan harga aslinya untuk mendukung aksesibilitas. Diskon tambahan dapat diberikan untuk pembelian dalam jumlah tertentu atau program promosi tertentu.
                </p>
            </section>

            <!-- 7. Komitmen Lingkungan -->
            <section>
                <h2 class="text-2xl font-semibold text-primary mb-4">7. Komitmen Lingkungan</h2>
                <p class="text-primary leading-relaxed">
                    Kami berkomitmen untuk bekerja sama dengan mitra yang memiliki visi serupa dalam mengurangi limbah makanan dan mendukung keberlanjutan lingkungan. Setiap transaksi melalui platform kami berkontribusi pada misi ini.
                </p>
            </section>

            <!-- 8. Privasi dan Keamanan Data -->
            <section>
                <h2 class="text-2xl font-semibold text-primary mb-4">8. Privasi dan Keamanan Data</h2>
                <p class="text-primary leading-relaxed">
                    Kami menghormati privasi pengguna dan memastikan bahwa data pribadi pelanggan diproses sesuai dengan kebijakan privasi kami.
                </p>
            </section>

            <!-- 9. Perubahan Kebijakan -->
            <section>
                <h2 class="text-2xl font-semibold text-primary mb-4">9. Perubahan Kebijakan</h2>
                <p class="text-primary leading-relaxed">
                    Kami berhak mengubah kebijakan ini sewaktu-waktu sesuai dengan kebutuhan atau regulasi yang berlaku. Pengguna akan diberitahukan melalui pengumuman resmi di website.
                </p>
            </section>
        </div>
    </div>
</div>

<style>
    body {
        overflow-x: hidden;
    }
</style>
@endsection
