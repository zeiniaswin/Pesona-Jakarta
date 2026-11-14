/**
 * app.js - interaksi sisi klien PesonaJakarta (Vanilla JavaScript, tanpa jQuery).
 * Fitur: header & tombol ke atas, menu mobile/sidebar, animasi scroll, penghitung angka,
 *        live search + sorotan kata, auto-submit filter, tampil/sembunyi password,
 *        salin tautan, toast otomatis tutup, efek muncul gambar.
 * Author: Zeini Aswin Rangkuti | v2.0 | 08-11-2026
 */
document.addEventListener('DOMContentLoaded', function () {
    inisialisasiHeader();
    inisialisasiMenu();
    inisialisasiAnimasiScroll();
    inisialisasiGambar();
    inisialisasiLiveSearch();
    inisialisasiAutoSubmit();
    inisialisasiPassword();
    inisialisasiSalinTautan();
    inisialisasiToast();
    inisialisasiPreviewGambar();
});

/**
 * Deskripsi : Memberi bayangan pada header saat halaman di-scroll dan
 *             menampilkan tombol "kembali ke atas".
 * I.S.      : header tanpa bayangan, tombol tersembunyi.
 * F.S.      : tampilan berubah mengikuti posisi scroll.
 */
function inisialisasiHeader() {
    var header = document.querySelector('[data-header]');
    var keAtas = document.getElementById('toTop');

    function perbarui() {
        var turun = window.scrollY > 12;
        if (header) header.classList.toggle('header-bayangan', turun);
        if (keAtas) keAtas.classList.toggle('hidden', window.scrollY < 500);
    }
    window.addEventListener('scroll', perbarui, { passive: true });
    perbarui();

    if (keAtas) keAtas.addEventListener('click', function () { window.scrollTo({ top: 0, behavior: 'smooth' }); });
}

/**
 * Deskripsi : Membuka/menutup menu mobile (publik) dan sidebar (admin).
 * I.S.      : menu tertutup.
 * F.S.      : menu terbuka/tertutup setiap tombol diklik.
 */
function inisialisasiMenu() {
    var pasangan = [['menuToggle', 'menuMobile'], ['sidebarToggle', 'sidebar']];
    pasangan.forEach(function (p) {
        var tombol = document.getElementById(p[0]);
        var target = document.getElementById(p[1]);
        if (!tombol || !target) return;
        tombol.addEventListener('click', function () {
            target.classList.toggle('hidden');
            target.classList.toggle('flex');
        });
    });
}

/**
 * Deskripsi : Memunculkan elemen ".reveal" saat masuk layar dan menghitung
 *             naik angka ber-atribut [data-count].
 * I.S.      : elemen reveal transparan, angka 0.
 * F.S.      : elemen tampil halus, angka berhenti di nilai target.
 */
function inisialisasiAnimasiScroll() {
    var daftar = document.querySelectorAll('.reveal, [data-count]');
    if (!('IntersectionObserver' in window)) {
        daftar.forEach(function (el) { el.classList.add('is-visible'); if (el.dataset.count) el.textContent = el.dataset.count; });
        return;
    }

    var pengamat = new IntersectionObserver(function (entri) {
        entri.forEach(function (e) {
            if (!e.isIntersecting) return;
            e.target.classList.add('is-visible');
            if (e.target.hasAttribute('data-count')) hitungNaik(e.target);
            pengamat.unobserve(e.target);
        });
    }, { threshold: 0.15 });

    daftar.forEach(function (el) { pengamat.observe(el); });
}

/**
 * Deskripsi : Menganimasikan angka dari 0 sampai nilai pada data-count.
 * I.S.      : elemen berisi 0.
 * F.S.      : elemen berisi nilai akhir setelah ~0,9 detik.
 */
function hitungNaik(el) {
    var target = parseInt(el.getAttribute('data-count'), 10) || 0;
    var mulai = null;

    function langkah(waktu) {
        if (mulai === null) mulai = waktu;
        var progres = Math.min((waktu - mulai) / 900, 1);
        el.textContent = Math.round(target * (1 - Math.pow(1 - progres, 3)));
        if (progres < 1) requestAnimationFrame(langkah);
    }
    requestAnimationFrame(langkah);
}

/**
 * Deskripsi : Memunculkan gambar dengan efek fade setelah selesai dimuat.
 * I.S.      : gambar [data-img] transparan.
 * F.S.      : gambar tampil penuh saat siap.
 */
function inisialisasiGambar() {
    document.querySelectorAll('img.img-fade').forEach(function (img) {
        if (img.complete && img.naturalWidth > 0) { img.classList.add('loaded'); return; }
        img.addEventListener('load', function () { img.classList.add('loaded'); });
    });
}

/**
 * Deskripsi : Menyaring kartu/baris secara langsung saat mengetik dan menyorot kata cocok.
 *             Input : [data-live-search]   Target : [data-live-item] + data-live-text
 *             Judul : [data-live-title] (diberi sorotan).
 * I.S.      : semua item tampil.
 * F.S.      : hanya item yang cocok tampil; jumlah & pesan kosong diperbarui.
 */
function inisialisasiLiveSearch() {
    var input = document.querySelector('[data-live-search]');
    if (!input) return;

    var items = Array.prototype.slice.call(document.querySelectorAll('[data-live-item]'));
    var pesanKosong = document.getElementById('liveEmpty');
    var penghitung = document.getElementById('liveCount');

    function saring() {
        var kata = input.value.trim().toLowerCase();
        var tampil = 0;

        items.forEach(function (el) {
            var cocok = (el.getAttribute('data-live-text') || '').indexOf(kata) !== -1;
            el.classList.toggle('hidden', !cocok);
            if (cocok) tampil++;
            var judul = el.querySelector('[data-live-title]');
            if (judul) sorot(judul, cocok ? kata : '');
        });

        if (pesanKosong) pesanKosong.classList.toggle('hidden', tampil !== 0);
        if (penghitung) penghitung.textContent = tampil;
    }

    input.addEventListener('input', saring);
    if (input.value.trim() !== '') saring();
}

/**
 * Deskripsi : Menyorot kata kunci pada teks (aman dari XSS karena memakai textContent).
 * I.S.      : elemen berisi teks asli.
 * F.S.      : bagian teks yang cocok dibungkus <mark>; kata kosong mengembalikan teks asli.
 */
function sorot(el, kata) {
    var asli = el.getAttribute('data-orig');
    if (asli === null) { asli = el.textContent; el.setAttribute('data-orig', asli); }

    el.textContent = '';
    var posisi = kata ? asli.toLowerCase().indexOf(kata) : -1;
    if (posisi === -1) { el.textContent = asli; return; }

    var tanda = document.createElement('mark');
    tanda.textContent = asli.slice(posisi, posisi + kata.length);
    el.appendChild(document.createTextNode(asli.slice(0, posisi)));
    el.appendChild(tanda);
    el.appendChild(document.createTextNode(asli.slice(posisi + kata.length)));
}

/**
 * Deskripsi : Mengirim form otomatis saat dropdown [data-autosubmit] berubah.
 * I.S.      : pengguna memilih opsi lain.
 * F.S.      : form filter terkirim.
 */
function inisialisasiAutoSubmit() {
    document.querySelectorAll('[data-autosubmit]').forEach(function (el) {
        el.addEventListener('change', function () { if (el.form) el.form.submit(); });
    });
}

/**
 * Deskripsi : Tombol mata untuk menampilkan/menyembunyikan password.
 * I.S.      : password tersembunyi.
 * F.S.      : tipe input & ikon berganti.
 */
function inisialisasiPassword() {
    document.querySelectorAll('[data-toggle-password]').forEach(function (tombol) {
        var input = document.getElementById(tombol.getAttribute('data-toggle-password'));
        var ikon = tombol.querySelector('i');
        if (!input) return;
        tombol.addEventListener('click', function () {
            var tampak = input.type === 'text';
            input.type = tampak ? 'password' : 'text';
            if (ikon) ikon.className = tampak ? 'ph-bold ph-eye' : 'ph-bold ph-eye-slash';
        });
    });
}

/**
 * Deskripsi : Menyalin alamat halaman ke clipboard saat tombol [data-copy] diklik.
 * I.S.      : label tombol normal.
 * F.S.      : label berubah "Tersalin!" selama 2 detik.
 */
function inisialisasiSalinTautan() {
    document.querySelectorAll('[data-copy]').forEach(function (tombol) {
        tombol.addEventListener('click', function () {
            var label = tombol.querySelector('[data-copy-label]');
            var awal = label ? label.textContent : '';
            var selesai = function () {
                if (label) label.textContent = 'Tersalin!';
                setTimeout(function () { if (label) label.textContent = awal; }, 2000);
            };
            if (navigator.clipboard) navigator.clipboard.writeText(window.location.href).then(selesai);
            else selesai();
        });
    });
}

/**
 * Deskripsi : Menutup notifikasi [data-toast] otomatis setelah 4 detik atau saat diklik.
 * I.S.      : toast tampil.
 * F.S.      : toast memudar lalu dihapus dari halaman.
 */
function inisialisasiToast() {
    document.querySelectorAll('[data-toast]').forEach(function (toast) {
        function tutup() {
            toast.classList.add('keluar');
            setTimeout(function () { toast.remove(); }, 400);
        }
        toast.addEventListener('click', tutup);
        setTimeout(tutup, 4000);
    });
}

/**
 * Deskripsi : Menampilkan preview gambar secara langsung saat admin mengetik/paste URL
 *             pada input [data-preview-url]. Preview tersembunyi jika URL kosong atau gagal dimuat.
 * I.S.      : input URL kosong atau berisi URL lama.
 * F.S.      : kotak preview muncul dengan gambar dari URL yang dimasukkan.
 */
function inisialisasiPreviewGambar() {
    document.querySelectorAll('[data-preview-url]').forEach(function (input) {
        var kotak = input.closest('div').querySelector('[data-preview-box]');
        var gambar = input.closest('div').querySelector('[data-preview-img]');
        if (!kotak || !gambar) return;

        var timer = null;

        function perbaruiPreview() {
            var url = input.value.trim();
            if (!url) {
                kotak.classList.add('hidden');
                gambar.src = '';
                return;
            }
            // Tunda 600ms agar tidak request setiap ketikan
            clearTimeout(timer);
            timer = setTimeout(function () {
                gambar.onload  = function () { kotak.classList.remove('hidden'); };
                gambar.onerror = function () { kotak.classList.add('hidden'); };
                gambar.src = url;
            }, 600);
        }

        input.addEventListener('input', perbaruiPreview);
        input.addEventListener('paste', function () {
            setTimeout(perbaruiPreview, 0);
        });
    });
}
