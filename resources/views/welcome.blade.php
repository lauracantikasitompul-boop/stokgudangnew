<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UNGS - Manajemen Gudang</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;500;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2c3e50;
            --accent-color: #3498db;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Outfit', sans-serif;
        }

        body, html {
            height: 100%;
            width: 100%;
            overflow: hidden;
            background-color: #000;
        }

        /* Blurred Background */
        .background {
            position: absolute;
            top: -5%;
            left: -5%;
            width: 110%;
            height: 110%;
            background-image: url('https://images.unsplash.com/photo-1586528116311-ad8ed7c80880?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80');
            background-size: cover;
            background-position: center;
            filter: blur(12px) brightness(0.7);
            z-index: 1;
        }

        /* Overlay for better readability */
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(0,0,0,0.4) 0%, rgba(0,0,0,0.1) 100%);
            z-index: 2;
        }

        /* Main Content Container */
        .content {
            position: relative;
            z-index: 3;
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        /* Header / Navbar */
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 2rem 4rem;
            animation: fadeInDown 1s ease-out;
        }

        .logo-container {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .logo-icon {
            width: 60px;
            height: 60px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 16px;
            display: flex;
            justify-content: center;
            align-items: center;
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        }

        .logo-icon svg {
            width: 35px;
            height: 35px;
            fill: #ffffff;
        }

        .logo-text {
            font-size: 3rem;
            font-weight: 800;
            color: transparent;
            -webkit-text-stroke: 1.5px rgba(255, 255, 255, 0.8);
            letter-spacing: 2px;
            text-shadow: 0 4px 10px rgba(0,0,0,0.3);
            position: relative;
        }

        /* Let's fill the text slightly for a better look than purely transparent */
        .logo-text::before {
             content: 'UNGS';
             position: absolute;
             left: 0;
             top: 0;
             color: rgba(255, 255, 255, 0.1);
             z-index: -1;
             -webkit-text-stroke: 0px;
        }

        .btn-login {
            background: rgba(255, 255, 255, 0.9);
            color: #1a1a1a;
            padding: 10px 35px;
            border-radius: 50px;
            font-size: 1.1rem;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
            border: 2px solid transparent;
        }

        .btn-login:hover {
            background: #ffffff;
            transform: translateY(-3px);
            box-shadow: 0 15px 25px rgba(0,0,0,0.2);
        }

        /* Hero Section */
        .hero {
            flex-grow: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 0 2rem;
        }

        .hero-text {
            font-size: 5vw;
            font-weight: 700;
            color: rgba(255, 255, 255, 0.85);
            line-height: 1.2;
            letter-spacing: -1px;
            animation: fadeInUp 1.2s ease-out;
            text-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            /* Optional: subtle glass effect behind text */
            background: rgba(255, 255, 255, 0.03);
            padding: 40px 60px;
            border-radius: 30px;
            backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        .hero-text span {
            display: block;
            color: #ffffff;
            background: -webkit-linear-gradient(#fff, #d1d5db);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(40px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-40px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive */
        @media (max-width: 768px) {
            header {
                padding: 1.5rem 2rem;
            }
            .logo-text {
                font-size: 2rem;
            }
            .hero-text {
                font-size: 3rem;
                padding: 20px 30px;
            }
        }
    </style>
</head>
<body>

    <div class="background"></div>
    <div class="overlay"></div>

    <div class="content">
        <header>
            <div class="logo-container">
                <div class="logo-icon">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3 21h18v-2H3v2zm0-4h18v-2H3v2zm0-4h18v-2H3v2zm0-4h18V7H3v2zm10-7h-2v4h2V2z" opacity="0.3"/>
                        <path d="M12 3L2 12h3v8h14v-8h3L12 3zm0 2.83l5 4.5V18H7v-7.67l5-4.5z"/>
                        <rect x="10" y="14" width="4" height="4"/>
                    </svg>
                </div>
                <div class="logo-text">UNGS</div>
            </div>
            
            <a href="{{ route('login') }}" class="btn-login">Login</a>
        </header>

        <main class="hero">
            <h1 class="hero-text">
                Solusi Cerdas untuk
                <span>Manajemen Gudang</span>
            </h1>
        </main>
    </div>

</body>
</html>
