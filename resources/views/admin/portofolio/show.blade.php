<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV - {{ $portofolio->nama_lengkap }}</title>
    <!-- Volt CSS / Bootstrap -->
    <link type="text/css" href="{{ asset('assets-admin/css/volt.css') }}" rel="stylesheet">
    <style>
        body {
            background-color: #e5e5e5;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .cv-container {
            max-width: 850px;
            margin: 40px auto;
            background: #fff;
            box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.15);
            display: flex;
            min-height: 1100px;
        }
        /* Sidebar Kiri (Warna Hijau/Teal ala template) */
        .cv-sidebar {
            width: 34%;
            background-color: #6c9a91;
            color: #fff;
            padding: 40px 25px;
        }
        .profile-img-container {
            text-align: center;
            margin-bottom: 30px;
        }
        .profile-img {
            width: 140px;
            height: 140px;
            object-fit: cover;
            border-radius: 50%;
            border: 4px solid #ffffff;
        }
        .sidebar-section {
            margin-bottom: 35px;
        }
        .sidebar-title {
            font-size: 1.1rem;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            border-bottom: 2px solid rgba(255, 255, 255, 0.5);
            padding-bottom: 6px;
            margin-bottom: 15px;
            font-weight: bold;
        }
        .sidebar-content, .sidebar-content p {
            font-size: 0.9rem;
            color: #f8f9fa;
            word-break: break-word;
        }

        /* Area Utama Kanan */
        .cv-main {
            width: 66%;
            padding: 50px 40px;
            color: #333;
        }
        .cv-header {
            margin-bottom: 35px;
            border-bottom: 2px solid #eaeaea;
            padding-bottom: 25px;
        }
        .cv-name {
            font-size: 2.3rem;
            font-weight: 800;
            color: #2c3e50;
            line-height: 1.2;
            text-transform: uppercase;
        }
        .cv-title {
            font-size: 1.2rem;
            color: #6c9a91;
            font-weight: 600;
            margin-top: 5px;
            letter-spacing: 1px;
        }
        .main-section {
            margin-bottom: 30px;
        }
        .main-title {
            font-size: 1.1rem;
            text-transform: uppercase;
            letter-spacing: 1.2px;
            color: #2c3e50;
            border-bottom: 2px solid #2c3e50;
            padding-bottom: 5px;
            margin-bottom: 15px;
            font-weight: bold;
        }
        .main-content {
            font-size: 0.95rem;
            color: #555;
            line-height: 1.6;
            white-space: pre-line;
        }

        /* Tombol Cetak / Kembali (Hilang saat diprint) */
        @media print {
            body { background-color: #fff; }
            .cv-container { box-shadow: none; margin: 0; width: 100%; max-width: 100%; }
            .d-print-none { display: none !important; }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Tombol Aksi Atas -->
        <div class="py-3 text-end d-print-none">
            <a href="{{ route('portofolio.index') }}" class="btn btn-secondary btn-sm me-2">&larr; Kembali ke List</a>
        </div>

        <!-- Layout Utama CV 2 Kolom -->
        <div class="cv-container">

            <!-- SIDEBAR KIRI -->
            <div class="cv-sidebar">
                <div class="profile-img-container">
                    @if($portofolio->foto)
                        <img src="{{ asset('images/portofolio/' . $portofolio->foto) }}" alt="Foto Profil" class="profile-img">
                    @else
                        <img src="{{ asset('assets-admin/img/team/profile-picture-3.jpg') }}" alt="Default Foto" class="profile-img">
                    @endif
                </div>

                <div class="sidebar-section">
                    <h6 class="sidebar-title">Contacts</h6>
                    <div class="sidebar-content">
                        <p class="mb-2"><strong>Phone:</strong><br>{{ $portofolio->telepon }}</p>
                        <p class="mb-2"><strong>Email:</strong><br>{{ $portofolio->email }}</p>
                        <p class="mb-0"><strong>Address:</strong><br>{{ $portofolio->alamat }}</p>
                    </div>
                </div>

                <div class="sidebar-section">
                    <h6 class="sidebar-title">Skills</h6>
                    <div class="sidebar-content">
                        <p>{{ $portofolio->skills }}</p>
                    </div>
                </div>
            </div>

            <!-- AREA UTAMA KANAN -->
            <div class="cv-main">
                <div class="cv-header">
                    <h1 class="cv-name">{{ $portofolio->nama_lengkap }}</h1>
                    <div class="cv-title">{{ $portofolio->job_title }}</div>
                </div>

                <div class="main-section">
                    <h6 class="main-title">About Me</h6>
                    <div class="main-content">{{ $portofolio->about_me }}</div>
                </div>

                <div class="main-section">
                    <h6 class="main-title">Work Experience</h6>
                    <div class="main-content">{{ $portofolio->pengalaman }}</div>
                </div>
            </div>

        </div>
    </div>
</body>
</html>
