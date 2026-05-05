<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - UNGS</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            background-color: #ffffff;
            color: #1a1a1a;
            display: flex;
            height: 100vh;
            overflow: hidden;
        }

        /* Sidebar Variables */
        :root {
            --sidebar-bg: #859583;
            --active-bg: #e1e4e1;
            --card-bg: #aebfab;
            --text-dark: #000000;
        }

        /* Sidebar */
        .sidebar {
            width: 280px;
            background-color: var(--sidebar-bg);
            display: flex;
            flex-direction: column;
            border-right: 1px solid rgba(0,0,0,0.05);
        }

        .sidebar-header {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 30px 20px;
            border-bottom: 1px solid rgba(255,255,255,0.3);
        }

        .logo-circle {
            width: 80px;
            height: 80px;
            background-color: #e1e4e1;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 15px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        .logo-circle svg {
            width: 45px;
            height: 45px;
            fill: #333;
        }

        .logo-text {
            font-size: 1.2rem;
            font-weight: 600;
            color: #1a1a1a;
            letter-spacing: 1px;
        }

        .nav-links {
            flex-grow: 1;
            padding: 20px 0;
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .nav-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px 30px;
            color: #1a1a1a;
            text-decoration: none;
            font-weight: 500;
            font-size: 1.05rem;
            transition: background 0.2s;
            cursor: pointer;
        }

        .nav-item:hover {
            background-color: rgba(255,255,255,0.1);
        }

        .nav-item.active {
            background-color: var(--active-bg);
        }

        .nav-item.active:hover {
            background-color: var(--active-bg);
        }

        .nav-item .dropdown-icon {
            width: 12px;
            height: 12px;
            fill: #1a1a1a;
        }

        .sidebar-footer {
            background-color: var(--active-bg);
            padding: 20px 30px;
            display: flex;
            align-items: center;
            gap: 15px;
            margin-top: auto;
        }

        .user-icon-circle {
            width: 50px;
            height: 50px;
            background-color: #ffffff;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .user-icon-circle svg {
            width: 25px;
            height: 25px;
            stroke: #1a1a1a;
            fill: none;
            stroke-width: 2;
        }

        .user-name {
            font-weight: 600;
            font-size: 1.1rem;
            color: #1a1a1a;
        }

        /* Main Content */
        .main-content {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            background-color: #ffffff;
        }

        .top-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 30px 50px 15px 50px;
            border-bottom: 2px solid #e0e0e0;
            margin: 0 40px;
        }

        .page-title {
            font-size: 2.2rem;
            font-weight: 500;
            color: #1a1a1a;
        }

        .header-actions {
            position: relative;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .top-user-icon {
            width: 45px;
            height: 45px;
            cursor: pointer;
        }

        .top-user-icon svg {
            width: 100%;
            height: 100%;
            stroke: #1a1a1a;
            fill: none;
            stroke-width: 1.5;
        }

        /* Dropdown Popup in Header */
        .profile-popup {
            position: absolute;
            top: 50px;
            right: -100px;
            background-color: #e5e5e5;
            padding: 10px;
            border-radius: 4px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            display: none;
            flex-direction: column;
            gap: 5px;
            width: 120px;
            z-index: 100;
        }

        .profile-popup.active {
            display: flex;
        }

        .profile-popup::before {
            content: '';
            position: absolute;
            left: -15px;
            top: 15px;
            width: 40px; 
            height: 2px; 
            background: #1a1a1a;
        }
        
        .arrow-line {
            position: absolute;
            right: 50px;
            top: 20px;
            display: flex;
            align-items: center;
        }

        .arrow-line svg {
            width: 40px;
            height: 15px;
            stroke: #1a1a1a;
        }

        .popup-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 8px 10px;
            color: #333;
            text-decoration: none;
            font-size: 0.9rem;
            cursor: pointer;
            transition: background 0.2s;
        }

        .popup-item:hover {
            background-color: #d4d4d4;
        }

        .popup-item svg {
            width: 16px;
            height: 16px;
            fill: #333;
        }

        /* Dashboard Content */
        .dashboard-container {
            padding: 50px 90px;
            overflow-y: auto;
        }

        .cards-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
            max-width: 1000px;
        }

        .stat-card {
            background-color: var(--card-bg);
            padding: 30px 40px;
            position: relative;
            min-height: 200px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            transition: transform 0.3s;
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        .card-header {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .card-icon {
            width: 35px;
            height: 35px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card-icon svg {
            width: 100%;
            height: 100%;
            fill: none;
            stroke: #1a1a1a;
            stroke-width: 2;
        }

        /* Fill specifically for some icons */
        .icon-boxes svg { fill: transparent; stroke: #1a1a1a; stroke-width: 1.5; }
        .icon-down svg { fill: #1a1a1a; stroke: none; }
        .icon-up svg { fill: #1a1a1a; stroke: none; }
        .icon-warn svg { fill: transparent; stroke: #1a1a1a; }

        .card-title {
            font-size: 1.4rem;
            font-weight: 700;
            color: #1a1a1a;
        }

        .card-value {
            align-self: flex-end;
            font-size: 3.5rem;
            font-weight: 700;
            color: #1a1a1a;
            line-height: 1;
            margin-top: 20px;
        }

    </style>
</head>
<body>

    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="sidebar-header">
            <div class="logo-circle">
                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3 21h18v-2H3v2zm0-4h18v-2H3v2zm0-4h18v-2H3v2zm0-4h18V7H3v2zm10-7h-2v4h2V2z" opacity="0.3"/>
                    <path d="M12 3L2 12h3v8h14v-8h3L12 3zm0 2.83l5 4.5V18H7v-7.67l5-4.5z"/>
                    <rect x="10" y="14" width="4" height="4"/>
                </svg>
            </div>
            <div class="logo-text">UNGS</div>
        </div>

        <nav class="nav-links">
            <a href="{{ route('dashboard') }}" class="nav-item active">
                Dashboard
            </a>
            <a href="{{ route('supplier.index') }}" class="nav-item">
                Data Supplier
            </a>
            <div class="nav-item">
                Data Barang
                <svg class="dropdown-icon" viewBox="0 0 24 24">
                    <path d="M7 10l5 5 5-5H7z" />
                </svg>
            </div>
            <a href="#" class="nav-item">
                Mencetak laporan stok
            </a>
        </nav>

        <div class="sidebar-footer">
            <div class="user-icon-circle">
                <svg viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                </svg>
            </div>
            <span class="user-name">Admin 1</span>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
        <header class="top-header">
            <h1 class="page-title">Dashboard</h1>
            
            <div class="header-actions">
                <div class="top-user-icon" id="top-user-icon">
                    <svg viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                    </svg>
                </div>

                <!-- Custom arrow line exactly like image -->
                <div class="arrow-line">
                    <svg viewBox="0 0 40 10" preserveAspectRatio="none">
                        <path d="M0 5 L35 5 M30 0 L35 5 L30 10" fill="none" stroke="#1a1a1a" stroke-width="2"/>
                    </svg>
                </div>

                <!-- Dropdown Popup -->
                <div class="profile-popup" id="profile-popup">
                    <a href="#" class="popup-item">
                        <svg viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                        profil
                    </a>
                    <a href="{{ route('login') }}" class="popup-item">
                        <svg viewBox="0 0 24 24"><path d="M17 7l-1.41 1.41L18.17 11H8v2h10.17l-2.58 2.58L17 17l5-5zM4 5h8V3H4c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h8v-2H4V5z"/></svg>
                        logout
                    </a>
                </div>
            </div>
        </header>

        <div class="dashboard-container">
            <div class="cards-grid">
                
                <!-- Card 1: Total Barang -->
                <div class="stat-card">
                    <div class="card-header icon-boxes">
                        <div class="card-icon">
                            <svg viewBox="0 0 24 24">
                                <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                                <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                                <line x1="12" y1="22.08" x2="12" y2="12"></line>
                                <!-- Extra small box to simulate stack -->
                                <path d="M16 13l-4 2.5-4-2.5V8l4-2.5L16 8v5z" opacity="0.5"/>
                            </svg>
                        </div>
                        <h2 class="card-title">Total Barang</h2>
                    </div>
                    <div class="card-value">150</div>
                </div>

                <!-- Card 2: Barang Masuk -->
                <div class="stat-card">
                    <div class="card-header icon-down">
                        <div class="card-icon">
                            <svg viewBox="0 0 24 24">
                                <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zM12 18l-5-5h3V8h4v5h3l-5 5z"/>
                            </svg>
                        </div>
                        <h2 class="card-title">Barang Masuk</h2>
                    </div>
                    <div class="card-value">32</div>
                </div>

                <!-- Card 3: Barang Keluar -->
                <div class="stat-card">
                    <div class="card-header icon-up">
                        <div class="card-icon">
                            <svg viewBox="0 0 24 24">
                                <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zM12 6l5 5h-3v5h-4v-5H7l5-5z"/>
                            </svg>
                        </div>
                        <h2 class="card-title">Barang Keluar</h2>
                    </div>
                    <div class="card-value">50</div>
                </div>

                <!-- Card 4: Stok menipis -->
                <div class="stat-card">
                    <div class="card-header icon-warn">
                        <div class="card-icon">
                            <svg viewBox="0 0 24 24">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="12" y1="8" x2="12" y2="12"></line>
                                <line x1="12" y1="16" x2="12.01" y2="16"></line>
                            </svg>
                        </div>
                        <h2 class="card-title">Stok menipis</h2>
                    </div>
                    <div class="card-value">5</div>
                </div>

            </div>
        </div>
    </main>

    <script>
        // Profile Popup Toggle
        const userIcon = document.getElementById('top-user-icon');
        const profilePopup = document.getElementById('profile-popup');

        userIcon.addEventListener('click', (e) => {
            e.stopPropagation();
            profilePopup.classList.toggle('active');
        });

        // Close when clicking outside
        document.addEventListener('click', (e) => {
            if (!profilePopup.contains(e.target) && e.target !== userIcon) {
                profilePopup.classList.remove('active');
            }
        });
    </script>
</body>
</html>