<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - UNGS</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
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

        /* Overlay */
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.4);
            z-index: 2;
        }

        /* Top Header elements (same as landing page) */
        .header {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 2rem 4rem;
            z-index: 10;
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

        .logo-text::before {
             content: 'UNGS';
             position: absolute;
             left: 0;
             top: 0;
             color: rgba(255, 255, 255, 0.1);
             z-index: -1;
             -webkit-text-stroke: 0px;
        }

        .btn-login-top {
            background: rgba(255, 255, 255, 0.9);
            color: #1a1a1a;
            padding: 10px 35px;
            border-radius: 50px;
            font-size: 1.1rem;
            font-weight: 600;
            text-decoration: none;
        }

        /* Ghostly Text Behind */
        .ghost-text-container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100%;
            text-align: center;
            z-index: 3;
            pointer-events: none;
        }

        .ghost-text {
            font-size: 5vw;
            font-weight: 700;
            color: rgba(0, 0, 0, 0.2);
            line-height: 1.2;
            letter-spacing: -1px;
            text-shadow: 0 2px 10px rgba(0,0,0,0.5);
        }

        /* Login Box */
        .login-wrapper {
            position: relative;
            z-index: 20;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
            padding-top: 50px; /* Offset to center visually */
        }

        .login-box {
            background-color: #9cb09e; /* Exact sage green color from image */
            width: 450px;
            padding: 50px 40px;
            box-shadow: 0 20px 50px rgba(0,0,0,0.5);
            animation: fadeIn 0.6s ease-out;
            position: relative;
        }

        .login-box h2 {
            text-align: center;
            color: #1a1a1a;
            font-size: 2rem;
            font-weight: 500;
            margin-bottom: 40px;
            letter-spacing: -0.5px;
        }

        .input-group {
            position: relative;
            margin-bottom: 25px;
        }

        .input-group input {
            width: 100%;
            background-color: #e2e6e3;
            border: none;
            padding: 15px 50px 15px 15px;
            font-size: 1rem;
            color: #333;
            outline: none;
            transition: all 0.3s ease;
        }

        .input-group input::placeholder {
            color: #999;
            font-weight: 400;
        }

        .input-group input:focus {
            background-color: #ffffff;
            box-shadow: inset 0 0 0 2px #333;
        }

        .input-icon {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            width: 20px;
            height: 20px;
            cursor: pointer;
        }

        .input-icon svg {
            width: 100%;
            height: 100%;
            stroke: #1a1a1a;
            stroke-width: 1.5;
            fill: none;
        }

        /* Role Popup Bubble */
        .role-popup {
            position: absolute;
            right: -240px;
            top: -20px;
            background: #e2e6e3;
            border-radius: 15px;
            padding: 15px;
            width: 220px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            opacity: 0;
            visibility: hidden;
            transform: translateX(-10px);
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            z-index: 30;
        }

        /* Add the arrow */
        .role-popup::before {
            content: '';
            position: absolute;
            left: -8px;
            top: 35px;
            width: 0; 
            height: 0; 
            border-top: 8px solid transparent;
            border-bottom: 8px solid transparent; 
            border-right: 8px solid #e2e6e3; 
        }

        .role-popup.active {
            opacity: 1;
            visibility: visible;
            transform: translateX(0);
        }

        .role-option {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 10px;
            cursor: pointer;
            border-radius: 10px;
            transition: background 0.2s;
        }

        .role-option:hover {
            background: #d1d6d3;
        }

        .role-option svg {
            width: 24px;
            height: 24px;
            stroke: #333;
            fill: none;
            stroke-width: 1.5;
        }

        .role-option span {
            font-size: 0.95rem;
            color: #1a1a1a;
            font-weight: 500;
        }

        .btn-submit {
            width: 100%;
            background-color: #2b2b2b;
            color: #ffffff;
            border: none;
            padding: 15px;
            font-size: 1.1rem;
            font-weight: 500;
            margin-top: 10px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-submit:hover {
            background-color: #1a1a1a;
        }

        .links {
            text-align: center;
            margin-top: 30px;
        }

        .links a {
            color: #1a1a1a;
            text-decoration: none;
            font-size: 1rem;
            font-weight: 500;
            transition: color 0.3s;
        }

        .links a:hover {
            text-decoration: underline;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Alert styling for errors */
        .alert {
            background: rgba(255, 0, 0, 0.1);
            border: 1px solid rgba(255, 0, 0, 0.3);
            color: #d32f2f;
            padding: 10px;
            text-align: center;
            margin-bottom: 20px;
            font-size: 0.9rem;
        }

    </style>
</head>
<body>

    <div class="background"></div>
    <div class="overlay"></div>

    <header class="header">
        <div class="logo-container">
            <div class="logo-icon">
                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3 21h18v-2H3v2zm0-4h18v-2H3v2zm0-4h18v-2H3v2zm0-4h18V7H3v2zm10-7h-2v4h2V2z" opacity="0.3" fill="#fff"/>
                    <path d="M12 3L2 12h3v8h14v-8h3L12 3zm0 2.83l5 4.5V18H7v-7.67l5-4.5z" fill="#fff"/>
                    <rect x="10" y="14" width="4" height="4" fill="#fff"/>
                </svg>
            </div>
            <div class="logo-text">UNGS</div>
        </div>
        
        <a href="{{ route('login') }}" class="btn-login-top">Login</a>
    </header>

    <!-- The ghostly text in the background, exactly like the image -->
    <div class="ghost-text-container">
        <h1 class="ghost-text">
            Solusi Cerdas untuk<br>Manajemen Gudang
        </h1>
    </div>

    <div class="login-wrapper">
        <div class="login-box">
            <h2>Log in to ungss</h2>

            @if(session('error'))
                <div class="alert">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('login.process') }}" method="POST">
                @csrf
                
                <div class="input-group">
                    <!-- Note: The existing code expects "email" but image says "Username". I will use name="email" to keep backend logic working but visually display "Username" -->
                    <input type="text" name="email" id="username" placeholder="Username" required autocomplete="off">
                    
                    <div class="input-icon" id="user-icon">
                        <svg viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                        </svg>
                    </div>

                    <!-- Role Popup -->
                    <div class="role-popup" id="role-popup">
                        <div class="role-option" onclick="selectRole('Admin Gudang')">
                            <svg viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10.34 15.84c-.688-.06-1.386-.09-2.09-.09H7.5a4.5 4.5 0 00-4.5 4.5v2.25h13.5v-2.25a4.5 4.5 0 00-4.5-4.5h-.75m-3-7.5h.008v.008H7.5V8.25zm6 0h.008v.008H13.5V8.25z" />
                                <!-- Gear overlay -->
                                <circle cx="18" cy="18" r="3" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M18 13.5v1m0 7v1m3.5-4.5h-1m-7 0h-1m6.01-2.49l-.71.71m-4.24 4.24l-.71.71m5.66 0l-.71-.71m-4.24-4.24l-.71-.71" />
                            </svg>
                            <span>Admin Gudang</span>
                        </div>
                        <div class="role-option" onclick="selectRole('Manajer Gudang')">
                            <svg viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                                <!-- Tie overlay -->
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 15.75l-1.5 3 1.5 2.25 1.5-2.25-1.5-3z" />
                            </svg>
                            <span>Manajer Gudang</span>
                        </div>
                    </div>
                </div>

                <div class="input-group">
                    <input type="password" name="password" id="password" placeholder="Password" required>
                    <div class="input-icon" onclick="togglePassword()">
                        <svg id="lock-icon" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                        </svg>
                    </div>
                </div>

                <button type="submit" class="btn-submit">Log in</button>
            </form>

            <div class="links">
                <a href="#">Lost password?</a>
            </div>
        </div>
    </div>

    <script>
        // Toggle Password Visibility
        function togglePassword() {
            const input = document.getElementById("password");
            const icon = document.getElementById("lock-icon");
            
            if (input.type === "password") {
                input.type = "text";
                // Change to unlock icon
                icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5V6.75a4.5 4.5 0 119 0v3.75M3.75 21.75h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H3.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />';
            } else {
                input.type = "password";
                // Change back to lock icon
                icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />';
            }
        }

        // Toggle Role Popup
        const userIcon = document.getElementById('user-icon');
        const rolePopup = document.getElementById('role-popup');
        
        userIcon.addEventListener('click', (e) => {
            e.stopPropagation();
            rolePopup.classList.toggle('active');
        });

        // Close popup when clicking outside
        document.addEventListener('click', (e) => {
            if (!rolePopup.contains(e.target) && e.target !== userIcon) {
                rolePopup.classList.remove('active');
            }
        });

        // Select role function
        function selectRole(role) {
            // For now, it just closes the popup. 
            // You can add logic here to set a hidden input for the role if needed in the backend.
            const usernameInput = document.getElementById('username');
            // If you want it to set the username or just close:
            // usernameInput.value = role; 
            rolePopup.classList.remove('active');
        }
    </script>
</body>
</html>