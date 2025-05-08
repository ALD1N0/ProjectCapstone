<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Contoh Klik Profil</title>
    <style>
        #loginText {
            display: none;
            margin-top: 10px;
            font-weight: bold;
            color: blue;
        }
        .profile-icon {
            cursor: pointer;
        }
    </style>
</head>
<body>
    <span>📍 Boyolali</span>
    <span>✉️</span>
    <span>🔔</span>
    <span class="profile-icon" id="profileIcon">👤</span>
    <span>▾</span>

    <div id="loginText">Login</div>

    <script>
        const profileIcon = document.getElementById('profileIcon');
        const loginText = document.getElementById('loginText');

        profileIcon.addEventListener('click', () => {
            // Toggle tampilan
            if (loginText.style.display === 'none') {
                loginText.style.display = 'block';
            } else {
                loginText.style.display = 'none';
            }
        });
    </script>
</body>
</html>
