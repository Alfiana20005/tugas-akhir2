<?= $this->extend('landingPage/template baru'); ?>
<?= $this->section('content'); ?>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Source+Serif+4:ital,wght@0,300;0,400;0,600;1,300&display=swap');

    :root {
        --maroon: #850000;
        --maroon-dark: #5c0000;
        --gold: #c9a84c;
        --gold-light: #e8c97a;
        --cream: #fdf8f2;
        --ink: #1a1208;
        --ink-soft: #3d2f1f;
        --border: #e8ddd0;
    }

    body {
        background-color: var(--cream);
    }

    .linktree-area {
        min-height: 70vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 60px 20px 80px;
    }

    .linktree-inner {
        width: 100%;
        max-width: 480px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .logo-ornament {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 36px;
    }

    .ornament-line {
        width: 60px;
        height: 1px;
        background: linear-gradient(90deg, transparent, var(--gold), transparent);
    }

    .ornament-icon {
        width: 54px;
        height: 54px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--maroon-dark), var(--maroon));
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 20px rgba(133, 0, 0, 0.25);
        border: 2px solid rgba(201, 168, 76, 0.4);
        font-size: 1.4rem;
    }

    .section-label {
        font-family: 'Playfair Display', serif;
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--maroon);
        text-align: center;
        margin-bottom: 8px;
    }

    .section-desc {
        font-size: 0.9rem;
        color: var(--ink-soft);
        text-align: center;
        margin-bottom: 40px;
        opacity: 0.8;
    }

    .link-buttons {
        width: 100%;
        display: flex;
        flex-direction: column;
        gap: 16px;
    }

    .link-btn {
        display: flex;
        align-items: center;
        gap: 16px;
        width: 100%;
        padding: 18px 24px;
        border-radius: 6px;
        text-decoration: none;
        border: 2px solid var(--border);
        background: #fff;
        color: var(--ink);
        transition: all 0.28s ease;
        box-shadow: 0 2px 8px rgba(133, 0, 0, 0.05);
        position: relative;
        overflow: hidden;
    }

    .link-btn::before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        width: 4px;
        background: var(--maroon);
        transition: width 0.28s ease;
    }

    .link-btn:hover {
        border-color: var(--maroon);
        box-shadow: 0 6px 24px rgba(133, 0, 0, 0.14);
        transform: translateY(-2px);
        color: var(--ink);
        text-decoration: none;
    }

    .btn-icon {
        width: 42px;
        height: 42px;
        border-radius: 50%;
        background: #fdf4ec;
        border: 1.5px solid var(--border);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1rem;
        color: var(--maroon);
        transition: all 0.28s ease;
        flex-shrink: 0;
        position: relative;
        z-index: 1;
    }

    .link-btn:hover .btn-icon {
        background: var(--maroon);
        color: #fff;
    }

    .btn-text {
        flex: 1;
        position: relative;
        z-index: 1;
    }

    .btn-text strong {
        display: block;
        font-family: 'Playfair Display', serif;
        font-size: 1.05rem;
        color: var(--maroon);
        margin-bottom: 2px;
    }

    .btn-text span {
        font-size: 0.82rem;
        color: var(--ink-soft);
        opacity: 0.75;
    }

    .btn-arrow {
        font-size: 1.1rem;
        color: var(--gold);
        position: relative;
        z-index: 1;
        transition: transform 0.2s;
    }

    .link-btn:hover .btn-arrow {
        transform: translateX(4px);
    }

    .ornament-divider {
        text-align: center;
        color: var(--gold);
        font-size: 1.1rem;
        letter-spacing: 12px;
        margin-top: 48px;
        opacity: 0.5;
    }

    @keyframes fadeUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .link-btn:nth-child(1) {
        animation: fadeUp 0.5s ease 0.1s both;
    }

    .link-btn:nth-child(2) {
        animation: fadeUp 0.5s ease 0.22s both;
    }

    .link-btn:nth-child(3) {
        animation: fadeUp 0.5s ease 0.34s both;
    }
</style>

<!-- Banner -->
<section class="about-banner relative">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">Tautan Penting</h1>
                <p class="text-white link-nav">
                    <a href="/home">Home</a>
                    <span class="fa fa-chevron-right"></span>
                    <a href="#">Tautan Penting</a>
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Linktree Content -->
<section class="linktree-area">
    <div class="linktree-inner">
        <h2 class="section-label">Tautan Penting</h2>
        <p class="section-desc">Pilih salah satu tautan di bawah ini untuk melanjutkan</p>

        <div class="link-buttons">

            <a href="/ketentuan-lomba-melukis-caping-2026" class="link-btn">
                <div class="btn-icon"><i class="fa fa-paint-brush"></i></div>
                <div class="btn-text">
                    <strong>Lomba Melukis Caping</strong>
                    <span>Ketentuan & formulir pendaftaran</span>
                </div>
                <span class="btn-arrow fa fa-chevron-right"></span>
            </a>

            <a href="/ketentuan-lomba-ethnic-dance-2026" class="link-btn">
                <div class="btn-icon"><i class="fa fa-music"></i></div>
                <div class="btn-text">
                    <strong>Lomba Modern Ethnic Dance</strong>
                    <span>Ketentuan & formulir pendaftaran</span>
                </div>
                <span class="btn-arrow fa fa-chevron-right"></span>
            </a>

            <a href="/ketentuan-lomba-got-talent-2026" class="link-btn">
                <div class="btn-icon"><i class="fa fa-star"></i></div>
                <div class="btn-text">
                    <strong>Lomba Museum Got Talent</strong>
                    <span>Ketentuan & formulir pendaftaran</span>
                </div>
                <span class="btn-arrow fa fa-chevron-right"></span>
            </a>

        </div>

        <div class="ornament-divider">✦ ✦ ✦</div>

    </div>
</section>

<?= $this->endSection(); ?>