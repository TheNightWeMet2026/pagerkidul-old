// Guard: Script ini juga menginisialisasi Leaflet map.
// Kalau Chart.js belum termuat (mis. halaman tertentu), jangan sampai throw error
// yang menghentikan eksekusi JS dan membuat map tidak terinisialisasi.
if (typeof Chart !== "undefined") {
    Chart.defaults.font.family = "Poppins";
    Chart.defaults.color = "#475569";
    Chart.defaults.borderColor = "#E5E7EB";
    Chart.defaults.responsive = true;
    Chart.defaults.maintainAspectRatio = false;
}
function createBarChart(id, labels, data, colors) {

    if (typeof Chart === "undefined") return;

    const canvas = document.getElementById(id);

    if (!canvas) return;

    return new Chart(canvas, {

        type: "bar",

        data: {

            labels,

            datasets: [{

                data,

                backgroundColor: colors,

                borderRadius: 12,

                borderSkipped: false,

                barThickness: 48

            }]

        },

        options: {

            plugins: {

                legend: {

                    display: false

                }

            },

            scales: {

                y: {

                    beginAtZero: true,

                    grid: {

                        color: "#ECECEC"

                    },

                    ticks: {

                        stepSize: 200

                    }

                },

                x: {

                    grid: {

                        display: false

                    }

                }

            },

            animation: {

                duration: 1200,

                easing: "easeOutQuart"

            }

        }

    });

}
createBarChart(

    "pendidikanChart",

    ["SD", "SMP", "SMA", "D3/S1"],

    [950, 700, 1200, 390],

    [

        "#4E7A52",

        "#7A9E7E",

        "#C3B091",

        "#8C6A43"

    ]

);
createBarChart(

    "pekerjaanChart",

    [

        "Petani",

        "Nelayan",

        "UMKM",

        "PNS",

        "Pelajar"

    ],

    [

        900,

        350,

        280,

        110,

        600

    ],

    [

        "#4E7A52",

        "#A7C4A0",

        "#D8C3A5",

        "#B08968",

        "#7A9E7E"

    ]

);
createBarChart(

    "umurChart",

    [

        "0-14",

        "15-24",

        "25-44",

        "45-59",

        "60+"

    ],

    [

        420,

        580,

        1030,

        720,

        490

    ],

    [

        "#BFD8B8",

        "#91B493",

        "#6C8E6B",

        "#D6B98C",

        "#A47149"

    ]

);
const genderCanvas = document.getElementById("genderChart");

if (genderCanvas && typeof Chart !== "undefined") {

    new Chart(genderCanvas, {

        type: "doughnut",

        data: {

            labels: [

                "Laki-laki",

                "Perempuan"

            ],

            datasets: [{

                data: [

                    1635,

                    1605

                ],

                backgroundColor: [

                    "#4E7A52",

                    "#D6B98C"

                ],

                borderWidth: 0,

                hoverOffset: 12

            }]

        },

        options: {

            cutout: "72%",

            plugins: {

                legend: {

                    position: "bottom",

                    labels: {

                        padding: 20,

                        usePointStyle: true

                    }

                }

            },

            animation: {

                duration: 1200

            }

        }

    });

}
document.querySelectorAll(".counter").forEach(counter => {

    const target = Number(counter.dataset.target);

    let value = 0;

    const update = () => {

        value += target / 60;

        if (value < target) {

            counter.textContent = Math.ceil(value).toLocaleString();

            requestAnimationFrame(update);

        }

        else {

            counter.textContent = target.toLocaleString();

        }

    }

    update();

});
const navbar = document.querySelector(".navbar");

window.addEventListener("scroll", () => {

    navbar?.classList.toggle("scrolled", window.scrollY > 60);

});
document.querySelectorAll('a[href^="#"]').forEach(link => {

    link.onclick = e => {

        const href = link.getAttribute("href");

        if (!href || href === "#") return;

        e.preventDefault();

        const target = document.querySelector(href);

        if (!target) return;

        const offset = 90;

        window.scrollTo({

            top: target.offsetTop - offset,

            behavior: "smooth"

        });

    };

});
const mapElement = document.getElementById("map");
if (mapElement && typeof L !== "undefined") {
    // Pastikan Leaflet init sekali saja.
    // Masalah umum: Leaflet diinisialisasi sebelum tinggi container terhitung
    // atau terjadi init ganda (map variabel tidak ada / tile layer ditambah ke map yang belum dibuat).
    const coords = [-8.235525127926323, 111.34915231024438];

    const initMap = () => {
        // Hindari init ganda
        if (mapElement._leaflet_id) return;

        const map = L.map("map", { zoomControl: true }).setView(coords, 13);

        L.tileLayer(
            "https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png",
            { attribution: "© OpenStreetMap" }
        ).addTo(map);

        L.marker(coords)
            .addTo(map)
            .bindPopup("<b>Kantor Desa Pagerkidul</b>");

        // Refresh ukuran setelah render DOM selesai
        setTimeout(() => map.invalidateSize(), 200);
        setTimeout(() => map.invalidateSize(), 600);
        console.log('initMap');
    };

    // jalankan setelah load + beberapa frame supaya layout (Bootstrap/AOS) sudah stabil
    requestAnimationFrame(() => requestAnimationFrame(initMap));
    window.addEventListener("load", initMap, { once: true });
}

if (typeof GLightbox !== "undefined" && document.querySelector(".gallery-item")) {
    GLightbox({
        selector: ".gallery-item"
    });
}
/* =====================================================
   HOME REDESIGN — Hero slideshow (auto 3 detik)
   + count-up statistik singkat (17 Nov 2026)
===================================================== */
(function () {
    var slides = Array.prototype.slice.call(document.querySelectorAll('.hero-slide'));
    if (!slides.length) return;

    var dotsWrap = document.querySelector('.hero-dots');
    var cur = 0;
    var timer = null;

    slides.forEach(function (_, i) {
        var d = document.createElement('button');
        d.className = 'hero-dot' + (i === 0 ? ' active' : '');
        d.type = 'button';
        d.setAttribute('aria-label', 'Foto ' + (i + 1));
        d.addEventListener('click', function () { go(i); restart(); });
        if (dotsWrap) dotsWrap.appendChild(d);
    });
    var dots = Array.prototype.slice.call(document.querySelectorAll('.hero-dot'));

    function go(n) {
        slides[cur].classList.remove('active');
        if (dots[cur]) dots[cur].classList.remove('active');
        cur = (n + slides.length) % slides.length;
        slides[cur].classList.add('active');
        if (dots[cur]) dots[cur].classList.add('active');
    }
    function start() { timer = setInterval(function () { go(cur + 1); }, 3000); }
    function stop() { if (timer) clearInterval(timer); }
    function restart() { stop(); start(); }

    var prev = document.querySelector('.hero-prev');
    var next = document.querySelector('.hero-next');
    if (prev) prev.addEventListener('click', function () { go(cur - 1); restart(); });
    if (next) next.addEventListener('click', function () { go(cur + 1); restart(); });

    var hero = document.querySelector('.hero-full');
    if (hero) {
        hero.addEventListener('mouseenter', stop);
        hero.addEventListener('mouseleave', start);
    }
    start();
})();

(function () {
    var els = Array.prototype.slice.call(document.querySelectorAll('.stat-number[data-count]'));
    if (!els.length) return;

    function fmt(n) { return Math.round(n).toLocaleString('id-ID'); }
    function animate(el) {
        var target = parseInt(el.getAttribute('data-count'), 10) || 0;
        var dur = 1500;
        var t0 = null;
        function tick(t) {
            if (!t0) t0 = t;
            var p = Math.min((t - t0) / dur, 1);
            el.textContent = fmt(target * (1 - Math.pow(1 - p, 3)));
            if (p < 1) requestAnimationFrame(tick);
        }
        requestAnimationFrame(tick);
    }

    if ('IntersectionObserver' in window) {
        var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (e) {
                if (e.isIntersecting) { animate(e.target); io.unobserve(e.target); }
            });
        }, { threshold: 0.4 });
        els.forEach(function (el) { io.observe(el); });
    } else {
        els.forEach(animate);
    }
})();
