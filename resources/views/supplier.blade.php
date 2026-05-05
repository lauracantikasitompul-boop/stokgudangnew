<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Supplier - UNGS</title>
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

        .dashboard-container {
            padding: 50px 90px;
            overflow-y: auto;
        }

        /* Table Specific Styles */
        .table-wrapper {
            background-color: #e1e4e1; /* Lighter grey as per image */
            border-radius: 8px;
            padding: 15px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }

        .action-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #d2d5d2; /* Slightly darker than table wrapper */
            padding: 12px 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .btn-add {
            background-color: #72e06b;
            color: #000;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            font-weight: 500;
            font-size: 1rem;
            cursor: pointer;
        }

        .btn-add:hover { background-color: #61c65b; }

        .search-container {
            display: flex;
            gap: 15px;
            align-items: center;
        }

        .search-input {
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            outline: none;
            width: 250px;
            font-size: 1rem;
        }

        .btn-search {
            background-color: #72e06b;
            color: #000;
            border: none;
            padding: 8px 20px;
            border-radius: 4px;
            font-weight: 500;
            font-size: 1rem;
            cursor: pointer;
        }

        .btn-search:hover { background-color: #61c65b; }

        .supplier-table {
            width: 100%;
            border-collapse: collapse;
        }

        .supplier-table th {
            background-color: var(--card-bg);
            text-align: left;
            padding: 12px 20px;
            font-weight: 600;
            font-size: 1rem;
            color: #000;
        }

        .supplier-table th:first-child { border-top-left-radius: 6px; }
        .supplier-table th:last-child { border-top-right-radius: 6px; }

        .supplier-table td {
            padding: 15px 20px;
            border-bottom: 1px solid #7a7a7a;
            color: #1a1a1a;
            font-size: 0.95rem;
        }
        
        .supplier-table tr:last-child td {
            /* Removing border on last real row so it looks clean, 
               but in the image we see multiple empty rows with borders */
        }

        /* Empty rows styling to match the image lines */
        .empty-row td {
            height: 45px;
        }

        .btn-edit {
            background-color: #4df821; /* Bright green */
            color: #000;
            border: none;
            padding: 6px 16px;
            border-radius: 2px;
            cursor: pointer;
            font-weight: 600;
            margin-right: 10px;
        }

        .btn-delete {
            background-color: #f06a35; /* Orange red */
            color: #000;
            border: none;
            padding: 6px 12px;
            border-radius: 2px;
            cursor: pointer;
            font-weight: 600;
        }
        
        .action-cell {
            display: flex;
            gap: 10px;
        }

        /* Modal Styles */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        .modal-overlay.active {
            display: flex;
        }

        .modal-content {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            width: 400px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            border-bottom: 1px solid #e0e0e0;
            padding-bottom: 10px;
        }

        .modal-title {
            font-size: 1.2rem;
            font-weight: 600;
        }

        .close-btn {
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: #666;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: 500;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 1rem;
        }

        .modal-footer {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 20px;
        }

        .btn-cancel {
            background-color: #e0e0e0;
            color: #333;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 500;
        }

        .btn-save {
            background-color: #72e06b;
            color: #000;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 500;
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
            <a href="{{ route('dashboard') }}" class="nav-item">
                Dashboard
            </a>
            <a href="{{ route('supplier.index') }}" class="nav-item active">
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
            <h1 class="page-title">Data supplier</h1>
            
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
            <div class="table-wrapper">
                
                <!-- Action Bar (Add and Search) -->
                <div class="action-bar">
                    <button class="btn-add" id="openModalBtn">+ Tambah Data</button>
                    <div class="search-container">
                        <input type="text" class="search-input" placeholder="Search..">
                        <button class="btn-search">Search</button>
                    </div>
                </div>

                <!-- Data Table -->
                <table class="supplier-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Supplier</th>
                            <th>No Hp</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>PT.Unggss</td>
                            <td>08123455445</td>
                            <td>
                                <button class="btn-edit">Edit</button>
                                <button class="btn-delete">delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>PT.Jaya</td>
                            <td>08123455445</td>
                            <td>
                                <button class="btn-edit">Edit</button>
                                <button class="btn-delete">delete</button>
                            </td>
                        </tr>
                        <!-- Empty rows to simulate the bordered background in the image -->
                        <tr class="empty-row"><td></td><td></td><td></td><td></td></tr>
                        <tr class="empty-row"><td></td><td></td><td></td><td></td></tr>
                        <tr class="empty-row"><td></td><td></td><td></td><td></td></tr>
                        <tr class="empty-row"><td></td><td></td><td></td><td></td></tr>
                        <tr class="empty-row"><td></td><td></td><td></td><td></td></tr>
                        <tr class="empty-row"><td></td><td></td><td></td><td></td></tr>
                        <tr class="empty-row"><td></td><td></td><td></td><td></td></tr>
                        <tr class="empty-row" style="border-bottom: none;"><td></td><td></td><td></td><td></td></tr>
                    </tbody>
                </table>

            </div>
        </div>
    </main>

    <!-- Add Supplier Modal -->
    <div class="modal-overlay" id="addSupplierModal">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Tambah Data Supplier</h2>
                <button class="close-btn" id="closeModalBtn">&times;</button>
            </div>
            <form action="#" method="POST" id="addSupplierForm">
                @csrf
                <div class="form-group">
                    <label for="nama_supplier">Nama Supplier</label>
                    <input type="text" id="nama_supplier" name="nama_supplier" required placeholder="Masukkan nama supplier">
                </div>
                <div class="form-group">
                    <label for="no_hp">No HP</label>
                    <input type="text" id="no_hp" name="no_hp" required placeholder="Masukkan no HP">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-cancel" id="cancelModalBtn">Batal</button>
                    <button type="submit" class="btn-save">Simpan</button>
                </div>
            </form>
        </div>
    </div>

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

        // Modal Logic
        const addModal = document.getElementById('addSupplierModal');
        const openModalBtn = document.getElementById('openModalBtn');
        const closeModalBtn = document.getElementById('closeModalBtn');
        const cancelModalBtn = document.getElementById('cancelModalBtn');

        openModalBtn.addEventListener('click', () => {
            addModal.classList.add('active');
        });

        const closeModal = () => {
            addModal.classList.remove('active');
        };

        closeModalBtn.addEventListener('click', closeModal);
        cancelModalBtn.addEventListener('click', closeModal);

        // Close when clicking outside modal content
        addModal.addEventListener('click', (e) => {
            if (e.target === addModal) {
                closeModal();
            }
        });
    </script>
</body>
</html>
