<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=1080,height=1920,initial-scale=1.0">
<title>Vaktija - Zvornik</title>
<link rel="stylesheet" href="style.css">
</head>
<?php
date_default_timezone_set('Europe/Sarajevo');

/* GREGORIJANSKI DATUM - ručno zbog browser kompatibilnosti */
$months_bs_greg = [
    1 => "januar",
    2 => "februar",
    3 => "mart",
    4 => "april",
    5 => "maj",
    6 => "juni",
    7 => "juli",
    8 => "august",
    9 => "septembar",
    10 => "oktobar",
    11 => "novembar",
    12 => "decembar"
];

$gregorian_date =
    date('j') . ". " .
    $months_bs_greg[(int)date('n')] . " " .
    date('Y') . ".";

/* VAKTIJA.BA - Zvornik */
$url = "https://api.vaktija.ba/vaktija/v1/103";

$response = @file_get_contents($url);
$data = $response ? json_decode($response, true) : null;

if (!$data || !isset($data['vakat']) || count($data['vakat']) < 6) {
    $timings = [
        'Fajr'    => '--:--',
        'Sunrise' => '--:--',
        'Dhuhr'   => '--:--',
        'Asr'     => '--:--',
        'Maghrib' => '--:--',
        'Isha'    => '--:--'
    ];
} else {
    $timings = [
        'Fajr'    => $data['vakat'][0], // zora
        'Sunrise' => $data['vakat'][1], // izlazak sunca
        'Dhuhr'   => $data['vakat'][2], // podne
        'Asr'     => $data['vakat'][3], // ikindija
        'Maghrib' => $data['vakat'][4], // akšam
        'Isha'    => $data['vakat'][5]  // jacija
    ];
}

/* HIDŽRETSKI DATUM */
$hijri_date = 'Hijretski datum nije dostupan';

$hijri_url = "https://api.aladhan.com/v1/gToH?date=" . date('d-m-Y');
$hijri_response = @file_get_contents($hijri_url);
$hijri_data = $hijri_response ? json_decode($hijri_response, true) : null;

if ($hijri_data && isset($hijri_data['data']['hijri'])) {
    $hijri = $hijri_data['data']['hijri'];

    $months_bs_hijri = [
        1 => "muharrem",
        2 => "safer",
        3 => "rebiu-l-evvel",
        4 => "rebiu-l-ahir",
        5 => "džumade-l-ula",
        6 => "džumade-l-uhra",
        7 => "redžeb",
        8 => "ša'ban",
        9 => "ramazan",
        10 => "ševval",
        11 => "zul-kade",
        12 => "zul-hidždže"
    ];

    $month_number = (int)$hijri['month']['number'];
    $month_bs = $months_bs_hijri[$month_number] ?? '';

    $hijri_date = $hijri['day'] . ". " . $month_bs . " " . $hijri['year'] . ".";
}

/* SABAH DŽEMAT = 45 minuta prije izlaska sunca */
$sabah_time = '--:--';

if ($timings['Sunrise'] !== '--:--') {
    $sunrise = trim($timings['Sunrise']);

    if (preg_match('/^(\d{1,2}):(\d{2})$/', $sunrise, $matches)) {
        $h = (int)$matches[1];
        $m = (int)$matches[2];

        $minutes = ($h * 60 + $m) - 45;

        if ($minutes < 0) {
            $minutes += 24 * 60;
        }

        $sabah_hour = floor($minutes / 60);
        $sabah_min  = $minutes % 60;

        $sabah_time = $sabah_hour . ':' . sprintf('%02d', $sabah_min);
    }
}
?>

<!DOCTYPE html>
<html lang="bs">
<head>
<meta charset="UTF-8">
<title>Vaktija - Zvornik</title>
<link rel="stylesheet" href="style.css">
</head>

<body class="rotated">

<div class="header">
    <img src="img/logo_iz2.png" alt="Logo">

    <div class="div">
        <div class="clock" id="clock"></div>

        <div class="date-wrapper">
            <div class="date-box">
                <?= htmlspecialchars($gregorian_date, ENT_QUOTES, 'UTF-8'); ?>
            </div>

            <div class="date-box">
                <?= htmlspecialchars($hijri_date, ENT_QUOTES, 'UTF-8'); ?>
            </div>
        </div>
    </div>
</div>

<div class="namaz-header">
    DNEVNA VAKTIJA - ZVORNIK
</div>

<div class="container">

    <div class="row" id="fajr">
        <div class="left">ZORA</div>
        <div class="center"><?= htmlspecialchars($timings['Fajr'], ENT_QUOTES, 'UTF-8'); ?></div>
        <div class="right">Fajr<br><span class="ar">الفجر</span></div>
    </div>

    <div class="row" id="sabah">
        <div class="left">SABAH<br>DŽEMAT</div>
        <div class="center"><?= htmlspecialchars($sabah_time, ENT_QUOTES, 'UTF-8'); ?></div>
        <div class="right">Salāt al-Fajr<br><span class="ar">صلاة الفجر</span></div>
    </div>

    <div class="row">
        <div class="left">IZLAZAK<br>SUNCA</div>
        <div class="center"><?= htmlspecialchars($timings['Sunrise'], ENT_QUOTES, 'UTF-8'); ?></div>
        <div class="right">Ash-Shuruq<br><span class="ar">الشروق</span></div>
    </div>

    <div class="row" id="dhuhr">
        <div class="left">PODNE</div>
        <div class="center"><?= htmlspecialchars($timings['Dhuhr'], ENT_QUOTES, 'UTF-8'); ?></div>
        <div class="right">Dhuhr<br><span class="ar">الظهر</span></div>
    </div>

    <div class="row" id="asr">
        <div class="left">IKINDIJA</div>
        <div class="center"><?= htmlspecialchars($timings['Asr'], ENT_QUOTES, 'UTF-8'); ?></div>
        <div class="right">Asr<br><span class="ar">العصر</span></div>
    </div>

    <div class="row" id="maghrib">
        <div class="left">AKŠAM</div>
        <div class="center"><?= htmlspecialchars($timings['Maghrib'], ENT_QUOTES, 'UTF-8'); ?></div>
        <div class="right">Maghrib<br><span class="ar">المغرب</span></div>
    </div>

    <div class="row" id="isha">
        <div class="left">JACIJA</div>
        <div class="center"><?= htmlspecialchars($timings['Isha'], ENT_QUOTES, 'UTF-8'); ?></div>
        <div class="right">Isha<br><span class="ar">العشاء</span></div>
    </div>

</div>

<div class="namaz-next">
    <div class="next" id="next"></div>
</div>

<div class="footer">
    Dobro došli u Džemat Vitinica
</div>

<audio id="ezan" src="ezan.mp3" preload="auto"></audio>

<script>
function cleanTime(str) {
    return String(str).split(' ')[0].trim();
}

function updateClock() {
    const now = new Date();

    document.getElementById("clock").innerHTML =
        now.toLocaleTimeString('bs-BA', {
            hour: '2-digit',
            minute: '2-digit',
            second: '2-digit'
        });
}

setInterval(updateClock, 1000);
updateClock();

const vakti = {
    fajr: cleanTime("<?= $timings['Fajr']; ?>"),
    sabah: cleanTime("<?= $sabah_time; ?>"),
    dhuhr: cleanTime("<?= $timings['Dhuhr']; ?>"),
    asr: cleanTime("<?= $timings['Asr']; ?>"),
    maghrib: cleanTime("<?= $timings['Maghrib']; ?>"),
    isha: cleanTime("<?= $timings['Isha']; ?>")
};

function timeToMinutes(timeStr) {
    if (!timeStr || timeStr === '--:--') return null;

    const [h, m] = timeStr.split(":").map(Number);

    if (isNaN(h) || isNaN(m)) return null;

    return h * 60 + m;
}

function timeToSeconds(timeStr) {
    if (!timeStr || timeStr === '--:--') return null;

    const [h, m] = timeStr.split(":").map(Number);

    if (isNaN(h) || isNaN(m)) return null;

    return h * 3600 + m * 60;
}

function getNextPrayer() {
    const now = new Date();
    const current = now.getHours() * 60 + now.getMinutes();

    const prayers = [
        { name: "Zora", time: vakti.fajr },
        { name: "Sabah džemat", time: vakti.sabah },
        { name: "Podne", time: vakti.dhuhr },
        { name: "Ikindija", time: vakti.asr },
        { name: "Akšam", time: vakti.maghrib },
        { name: "Jacija", time: vakti.isha }
    ].filter(p => timeToMinutes(p.time) !== null);

    for (const p of prayers) {
        const t = timeToMinutes(p.time);

        if (t > current) {
            return p;
        }
    }

    return prayers.length ? prayers[0] : null;
}

function updateNext() {
    const nextEl = document.getElementById("next");
    const next = getNextPrayer();

    if (!next) {
        nextEl.innerHTML = "Vakta trenutno nema";
        return;
    }

    const now = new Date();

    const current =
        now.getHours() * 3600 +
        now.getMinutes() * 60 +
        now.getSeconds();

    let target = timeToSeconds(next.time);

    let diff = target - current;

    if (diff < 0) {
        diff += 86400;
    }

    const hh = Math.floor(diff / 3600);
    const mm = Math.floor((diff % 3600) / 60);
    const ss = diff % 60;

    nextEl.innerHTML =
        next.name + " namaz za " +
        String(hh).padStart(2, '0') + ":" +
        String(mm).padStart(2, '0') + ":" +
        String(ss).padStart(2, '0');
}

setInterval(updateNext, 1000);
updateNext();

function highlightPrayer() {
    const now = new Date();
    const current = now.getHours() * 60 + now.getMinutes();

    const prayers = [
        { id: "fajr", time: vakti.fajr },
        { id: "sabah", time: vakti.sabah },
        { id: "dhuhr", time: vakti.dhuhr },
        { id: "asr", time: vakti.asr },
        { id: "maghrib", time: vakti.maghrib },
        { id: "isha", time: vakti.isha }
    ].filter(p => timeToMinutes(p.time) !== null);

    prayers.forEach(p => {
        const el = document.getElementById(p.id);

        if (el) {
            el.classList.remove("active");
        }
    });

    let activePrayer = null;

    for (let i = prayers.length - 1; i >= 0; i--) {
        const t = timeToMinutes(prayers[i].time);

        if (current >= t) {
            activePrayer = prayers[i];
            break;
        }
    }

    if (!activePrayer && prayers.length) {
        activePrayer = prayers[prayers.length - 1];
    }

    if (activePrayer) {
        const el = document.getElementById(activePrayer.id);

        if (el) {
            el.classList.add("active");
        }
    }
}

setInterval(highlightPrayer, 1000);
highlightPrayer();

let playedToday = {};

function playAdhanCheck() {
    const now = new Date();

    const current =
        String(now.getHours()).padStart(2, '0') + ":" +
        String(now.getMinutes()).padStart(2, '0');

    const prayers = {
        sabah: vakti.sabah,
        dhuhr: vakti.dhuhr,
        asr: vakti.asr,
        maghrib: vakti.maghrib,
        isha: vakti.isha
    };

    for (const key in prayers) {
        if (current === prayers[key] && !playedToday[key]) {
            const ezan = document.getElementById("ezan");

            ezan.currentTime = 0;
            ezan.play().catch(function(error) {
                console.log("Browser je blokirao automatsko puštanje zvuka:", error);
            });

            playedToday[key] = true;
        }
    }
}

setInterval(playAdhanCheck, 10000);
playAdhanCheck();

function resetAfterMidnight() {
    const now = new Date();

    if (now.getHours() === 0 && now.getMinutes() === 1) {
        playedToday = {};
        location.reload();
    }
}

setInterval(resetAfterMidnight, 60000);

setInterval(() => {
    location.reload();
}, 36000000);

function toggleFullscreen() {
    if (!document.fullscreenElement) {
        document.documentElement.requestFullscreen?.().catch(() => {});
    } else {
        document.exitFullscreen?.().catch(() => {});
    }
}

document.body.addEventListener("touchstart", toggleFullscreen, { passive: true });
document.body.addEventListener("dblclick", toggleFullscreen);
</script>

</body>
</html>