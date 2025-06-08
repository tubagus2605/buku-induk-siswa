@extends('layouts.base')

@section('content')
<div class="container-fluid px-4 py-5">
    <!-- Header with animated gradient -->
    <div class="hero-header rounded-4 shadow-lg mb-5" data-aos="fade-down">
        <div class="container py-5 text-center text-white">
            <h1 class="display-4 fw-bold mb-3"><i class="bi bi-person-circle me-2"></i> Data Induk Siswa</h1>
            <div class="d-flex justify-content-center gap-2 flex-wrap">
                <a href="/admin/print/{{$res->nisn}}" class="btn btn-light btn-lg px-4 py-2 rounded-pill shadow-sm hover-scale">
                    <i class="bi bi-printer-fill me-2"></i>Cetak
                </a>
                <a href="/admin/ayah/{{$res->ayah->uri}}" class="btn btn-success btn-lg px-4 py-2 rounded-pill shadow-sm hover-scale">
                    <i class="bi bi-pencil-fill me-2"></i>Ayah
                </a>
                <a href="/admin/ibu/{{$res->ibu->uri}}" class="btn btn-pink btn-lg px-4 py-2 rounded-pill shadow-sm hover-scale">
                    <i class="bi bi-pencil-fill me-2"></i>Ibu
                </a>
                <a href="/admin/biodata/{{$res->biodata->uri}}" class="btn btn-secondary btn-lg px-4 py-2 rounded-pill shadow-sm hover-scale">
                    <i class="bi bi-pencil-fill me-2"></i>Biodata
                </a>
                @if ($res->wali)
                <a href="/admin/wali/{{$res->wali->uri}}" class="btn btn-lime btn-lg px-4 py-2 rounded-pill shadow-sm hover-scale">
                    <i class="bi bi-pencil-fill me-2"></i>Wali
                </a>
                @endif
                <a href="/admin/mutasi/{{$res->nisn}}" class="btn btn-skyblue btn-lg px-4 py-2 rounded-pill shadow-sm hover-scale">
                    <i class="bi bi-arrow-left-right me-2"></i>Mutasi
                </a>
            </div>
        </div>
    </div>

    <!-- Student Profile Card -->
    <div class="row mb-5" data-aos="fade-up">
        <div class="col-lg-12">
            <div class="card profile-card shadow-lg border-0 overflow-hidden">
                <div class="card-body p-4">
                    <div class="row align-items-center">
                        <div class="col-lg-3 text-center">
                            <div class="profile-image-container">
                                <img src="@if ($res->foto === NULL) @if($res->jenis_kelamin === 'L') /images/male.png @else /images/female.png @endif @else {{asset('storage/'.$res->foto)}} @endif" 
                                     class="img-fluid rounded-circle profile-img shadow-lg" 
                                     alt="Student Photo">
                                <div class="profile-badge">
                                    <i class="bi bi-check-circle-fill"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <h2 class="fw-bold text-gradient mb-3">{{$res->nama_lengkap}}</h2>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="icon-container bg-primary me-3">
                                            <i class="bi bi-person-badge text-white"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0 text-muted">NISN</h6>
                                            <p class="mb-0 fw-bold">{{$res->nisn}}</p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="icon-container bg-success me-3">
                                            <i class="bi bi-person-vcard text-white"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0 text-muted">NIS</h6>
                                            <p class="mb-0 fw-bold">{{$res->nis}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="icon-container bg-warning me-3">
                                            <i class="bi bi-calendar-check text-white"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0 text-muted">Tahun Ajaran</h6>
                                            <p class="mb-0 fw-bold">{{$res->tahun_ajar->tahun_ajaran}}</p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="icon-container bg-info me-3">
                                            <i class="bi bi-gender-ambiguous text-white"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0 text-muted">Jenis Kelamin</h6>
                                            <p class="mb-0 fw-bold">{{$res->jenis_kelamin === 'L' ? 'Laki-laki' : 'Perempuan'}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Student Information Section -->
    <div class="row mb-5" data-aos="fade-up" data-aos-delay="100">
        <div class="col-lg-12">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white py-3">
                    <h3 class="mb-0"><i class="bi bi-info-circle me-2"></i> Keterangan Siswa</h3>
                </div>
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-6 p-4">
                            <div class="info-item hover-effect">
                                <div class="d-flex align-items-center mb-3">
                                    <i class="bi bi-geo-alt-fill text-primary me-2"></i>
                                    <h5 class="mb-0">Alamat</h5>
                                </div>
                                <p class="ps-4">{{$res->biodata->alamat}}</p>
                            </div>
                            <div class="info-item hover-effect">
                                <div class="d-flex align-items-center mb-3">
                                    <i class="bi bi-building text-primary me-2"></i>
                                    <h5 class="mb-0">Kota/Kabupaten</h5>
                                </div>
                                <p class="ps-4">{{$res->biodata->kota}}</p>
                            </div>
                            <div class="info-item hover-effect">
                                <div class="d-flex align-items-center mb-3">
                                    <i class="bi bi-house-door-fill text-primary me-2"></i>
                                    <h5 class="mb-0">Kecamatan</h5>
                                </div>
                                <p class="ps-4">{{$res->biodata->kecamatan}}</p>
                            </div>
                            <div class="info-item hover-effect">
                                <div class="d-flex align-items-center mb-3">
                                    <i class="bi bi-book-half text-primary me-2"></i>
                                    <h5 class="mb-0">Sekolah Asal</h5>
                                </div>
                                <p class="ps-4">{{$res->biodata->sekolah_asal}}</p>
                            </div>
                            <div class="info-item hover-effect">
                                <div class="d-flex align-items-center mb-3">
                                    <i class="bi bi-balloon-fill text-primary me-2"></i>
                                    <h5 class="mb-0">Tempat/Tanggal Lahir</h5>
                                </div>
                                <p class="ps-4">{{$res->biodata->tempat_lahir}}, {{$res->biodata->tanggal_lahir}}</p>
                            </div>
                        </div>
                        <div class="col-lg-6 p-4 bg-light">
                            <div class="info-item hover-effect">
                                <div class="d-flex align-items-center mb-3">
                                    <i class="bi bi-people-fill text-primary me-2"></i>
                                    <h5 class="mb-0">Anak ke-{{$res->biodata->anak_ke}} dari {{$res->biodata->jlh_saudara}} bersaudara</h5>
                                </div>
                            </div>
                            <div class="info-item hover-effect">
                                <div class="d-flex align-items-center mb-3">
                                    <i class="bi bi-translate text-primary me-2"></i>
                                    <h5 class="mb-0">Bahasa Sehari-hari</h5>
                                </div>
                                <p class="ps-4">{{$res->biodata->bahasa}}</p>
                            </div>
                            <div class="info-item hover-effect">
                                <div class="d-flex align-items-center mb-3">
                                    <i class="bi bi-star-fill text-primary me-2"></i>
                                    <h5 class="mb-0">Agama</h5>
                                </div>
                                <p class="ps-4">{{$res->biodata->agama}}</p>
                            </div>
                            <div class="info-item hover-effect">
                                <div class="d-flex align-items-center mb-3">
                                    <i class="bi bi-globe text-primary me-2"></i>
                                    <h5 class="mb-0">Kewarganegaraan</h5>
                                </div>
                                <p class="ps-4">{{$res->biodata->kewarganegaraan}}</p>
                            </div>
                            <div class="info-item hover-effect">
                                <div class="d-flex align-items-center mb-3">
                                    <i class="bi bi-heart-fill text-primary me-2"></i>
                                    <h5 class="mb-0">Kegemaran</h5>
                                </div>
                                <p class="ps-4">{{$res->biodata->hobi}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Additional Information Section -->
    <div class="row mb-5" data-aos="fade-up" data-aos-delay="150">
        <div class="col-lg-12">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white py-3">
                    <h3 class="mb-0"><i class="bi bi-heart-pulse-fill me-2"></i> Informasi Tambahan</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="stat-card bg-gradient-primary text-white rounded-4 p-4 mb-4 hover-scale">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-signpost-split-fill fs-1 me-3"></i>
                                    <div>
                                        <h5 class="mb-0">Jarak ke Sekolah</h5>
                                        <h2 class="mb-0 fw-bold">{{$res->biodata->jarak}} Km</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="stat-card bg-gradient-success text-white rounded-4 p-4 mb-4 hover-scale">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-phone-fill fs-1 me-3"></i>
                                    <div>
                                        <h5 class="mb-0">Nomor HP</h5>
                                        <h2 class="mb-0 fw-bold">{{$res->biodata->nomor_hp}}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="stat-card bg-gradient-info text-white rounded-4 p-4 mb-4 hover-scale">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-envelope-fill fs-1 me-3"></i>
                                    <div>
                                        <h5 class="mb-0">Alamat Email</h5>
                                        <h2 class="mb-0 fw-bold">{{$res->email}}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="stat-card bg-gradient-warning text-white rounded-4 p-4 mb-4 hover-scale">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-droplet-fill fs-1 me-3"></i>
                                    <div>
                                        <h5 class="mb-0">Golongan Darah</h5>
                                        <h2 class="mb-0 fw-bold">{{$res->biodata->goldar}}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="stat-card bg-gradient-danger text-white rounded-4 p-4 mb-4 hover-scale">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-arrow-up-right fs-1 me-3"></i>
                                    <div>
                                        <h5 class="mb-0">Tinggi Badan</h5>
                                        <h2 class="mb-0 fw-bold">{{$res->biodata->tinggi}} cm</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="stat-card bg-gradient-secondary text-white rounded-4 p-4 mb-4 hover-scale">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-arrow-down-right fs-1 me-3"></i>
                                    <div>
                                        <h5 class="mb-0">Berat Badan</h5>
                                        <h2 class="mb-0 fw-bold">{{$res->biodata->berat}} kg</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="info-item hover-effect bg-light rounded-4 p-4">
                                <div class="d-flex align-items-center mb-3">
                                    <i class="bi bi-clipboard2-pulse-fill text-primary me-2"></i>
                                    <h5 class="mb-0">Riwayat Penyakit</h5>
                                </div>
                                <p class="ps-4">{{$res->biodata->penyakit}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Parent Information Section -->
    <div class="row" data-aos="fade-up" data-aos-delay="200">
        <div class="col-lg-12">
            <div class="card shadow-lg border-0 mb-5">
                <div class="card-header bg-primary text-white py-3">
                    <h3 class="mb-0"><i class="bi bi-people-fill me-2"></i> Keterangan Orang Tua Siswa</h3>
                </div>
                <div class="card-body p-0">
                    <div class="row">
                        <!-- Father's Information -->
                        <div class="col-lg-6 p-4">
                            <div class="parent-card bg-light rounded-4 p-4 h-100 hover-scale">
                                <div class="d-flex align-items-center mb-4">
                                    <div class="parent-icon bg-primary text-white rounded-circle me-3">
                                        <i class="bi bi-gender-male fs-4"></i>
                                    </div>
                                    <h4 class="mb-0">Ayah</h4>
                                </div>
                                <div class="parent-info">
                                    <div class="info-item">
                                        <span class="label">Nama Lengkap</span>
                                        <span class="value">{{$res->ayah->nama}}</span>
                                    </div>
                                    <div class="info-item">
                                        <span class="label">Alamat</span>
                                        <span class="value">{{$res->ayah->alamat}}</span>
                                    </div>
                                    <div class="info-item">
                                        <span class="label">Tempat/Tanggal Lahir</span>
                                        <span class="value">{{$res->ayah->tempat_lahir}}, {{$res->ayah->tanggal_lahir}}</span>
                                    </div>
                                    <div class="info-item">
                                        <span class="label">Agama</span>
                                        <span class="value">{{$res->ayah->agama}}</span>
                                    </div>
                                    <div class="info-item">
                                        <span class="label">Kewarganegaraan</span>
                                        <span class="value">{{$res->ayah->kewarganegaraan}}</span>
                                    </div>
                                    <div class="info-item">
                                        <span class="label">Pekerjaan</span>
                                        <span class="value">{{$res->ayah->pekerjaan}}</span>
                                    </div>
                                    <div class="info-item">
                                        <span class="label">Pendidikan Terakhir</span>
                                        <span class="value">{{$res->ayah->pendidikan}}</span>
                                    </div>
                                    <div class="info-item">
                                        <span class="label">Penghasilan per Bulan</span>
                                        <span class="value">Rp. {{number_format($res->ayah->penghasilan, 2,',', '.')}}</span>
                                    </div>
                                    <div class="info-item">
                                        <span class="label">Nomor Telepon</span>
                                        <span class="value">{{$res->ayah->nomor_hp}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Mother's Information -->
                        <div class="col-lg-6 p-4">
                            <div class="parent-card bg-light rounded-4 p-4 h-100 hover-scale">
                                <div class="d-flex align-items-center mb-4">
                                    <div class="parent-icon bg-pink text-white rounded-circle me-3">
                                        <i class="bi bi-gender-female fs-4"></i>
                                    </div>
                                    <h4 class="mb-0">Ibu</h4>
                                </div>
                                <div class="parent-info">
                                    <div class="info-item">
                                        <span class="label">Nama Lengkap</span>
                                        <span class="value">{{$res->ibu->nama}}</span>
                                    </div>
                                    <div class="info-item">
                                        <span class="label">Alamat</span>
                                        <span class="value">{{$res->ibu->alamat}}</span>
                                    </div>
                                    <div class="info-item">
                                        <span class="label">Tempat/Tanggal Lahir</span>
                                        <span class="value">{{$res->ibu->tempat_lahir}}, {{$res->ibu->tanggal_lahir}}</span>
                                    </div>
                                    <div class="info-item">
                                        <span class="label">Agama</span>
                                        <span class="value">{{$res->ibu->agama}}</span>
                                    </div>
                                    <div class="info-item">
                                        <span class="label">Kewarganegaraan</span>
                                        <span class="value">{{$res->ibu->kewarganegaraan}}</span>
                                    </div>
                                    <div class="info-item">
                                        <span class="label">Pekerjaan</span>
                                        <span class="value">{{$res->ibu->pekerjaan}}</span>
                                    </div>
                                    <div class="info-item">
                                        <span class="label">Pendidikan Terakhir</span>
                                        <span class="value">{{$res->ibu->pendidikan}}</span>
                                    </div>
                                    <div class="info-item">
                                        <span class="label">Penghasilan per Bulan</span>
                                        <span class="value">Rp. {{number_format($res->ibu->penghasilan, 2,',', '.')}}</span>
                                    </div>
                                    <div class="info-item">
                                        <span class="label">Nomor Telepon</span>
                                        <span class="value">{{$res->ibu->nomor_hp}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add this to your head section -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<!-- Add this before closing body tag -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    // Initialize animations
    AOS.init({
        duration: 800,
        easing: 'ease-in-out',
        once: true
    });

    // Add hover effects
    document.querySelectorAll('.hover-scale').forEach(item => {
        item.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.02)';
            this.style.transition = 'transform 0.3s ease';
        });
        item.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)';
        });
    });
</script>

<style>
    /* Custom CSS */
    :root {
        --primary: #4361ee;
        --secondary: #6c757d;
        --success: #28a745;
        --info: #17a2b8;
        --warning: #ffc107;
        --danger: #dc3545;
        --light: #f8f9fa;
        --dark: #343a40;
        --pink: #ff6b9d;
        --lime: #a5de37;
        --skyblue: #4cc9f0;
    }
    
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f5f7ff;
    }
    
    .hero-header {
        background: linear-gradient(135deg, var(--primary), var(--info));
        background-size: 200% 200%;
        animation: gradientBG 8s ease infinite;
    }
    
    @keyframes gradientBG {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }
    
    .profile-card {
        border-radius: 1rem;
        overflow: hidden;
        transition: all 0.3s ease;
    }
    
    .profile-image-container {
        position: relative;
        display: inline-block;
    }
    
    .profile-img {
        width: 200px;
        height: 200px;
        object-fit: cover;
        border: 5px solid white;
        transition: all 0.3s ease;
    }
    
    .profile-badge {
        position: absolute;
        bottom: 10px;
        right: 10px;
        background: var(--success);
        color: white;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 3px solid white;
    }
    
    .text-gradient {
        background: linear-gradient(to right, var(--primary), var(--info));
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        display: inline-block;
    }
    
    .icon-container {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .info-item {
        padding: 1rem;
        margin-bottom: 1rem;
        border-radius: 0.5rem;
        transition: all 0.3s ease;
    }
    
    .info-item:hover {
        background-color: rgba(67, 97, 238, 0.1);
        transform: translateY(-3px);
    }
    
    .stat-card {
        transition: all 0.3s ease;
    }
    
    .parent-card {
        transition: all 0.3s ease;
    }
    
    .parent-icon {
        width: 50px;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .info-item .label {
        font-weight: 600;
        color: var(--primary);
        display: block;
        margin-bottom: 0.25rem;
    }
    
    .info-item .value {
        display: block;
        margin-bottom: 1rem;
    }
    
    .bg-pink {
        background-color: var(--pink) !important;
    }
    
    .bg-lime {
        background-color: var(--lime) !important;
    }
    
    .bg-skyblue {
        background-color: var(--skyblue) !important;
    }
    
    .btn-pink {
        background-color: var(--pink);
        color: white;
    }
    
    .btn-lime {
        background-color: var(--lime);
        color: var(--dark);
    }
    
    .btn-skyblue {
        background-color: var(--skyblue);
        color: white;
    }
    
    .bg-gradient-primary {
        background: linear-gradient(135deg, var(--primary), #6a11cb);
    }
    
    .bg-gradient-success {
        background: linear-gradient(135deg, var(--success), #11998e);
    }
    
    .bg-gradient-info {
        background: linear-gradient(135deg, var(--info), #1d976c);
    }
    
    .bg-gradient-warning {
        background: linear-gradient(135deg, var(--warning), #f46b45);
    }
    
    .bg-gradient-danger {
        background: linear-gradient(135deg, var(--danger), #f00000);
    }
    
    .bg-gradient-secondary {
        background: linear-gradient(135deg, var(--secondary), #606c88);
    }
    
    .hover-scale {
        transition: transform 0.3s ease;
    }
    
    .hover-scale:hover {
        transform: scale(1.02);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
    
    @media (max-width: 768px) {
        .profile-img {
            width: 150px;
            height: 150px;
        }
    }
</style>
@endsection