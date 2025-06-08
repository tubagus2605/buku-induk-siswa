@extends('layouts.base')

@section('content')
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show animate__animated animate__fadeInDown" role="alert" style="z-index: 1">
            <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    
    <div class="container-fluid px-4 py-4">
        <!-- Welcome Header -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="welcome-card p-4 rounded-4 shadow-lg animate__animated animate__fadeIn">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h1 class="display-5 fw-bold mb-3">Selamat Datang, {{auth()->user()->nama_lengkap}}</h1>
                            <p class="lead mb-4">Sistem ini dibangun sebagai bentuk digitalisasi proses administrasi penyimpanan data induk siswa</p>
                            <a href="/admin/print" class="btn btn-warning btn-lg px-4 py-2 rounded-pill hover-scale">
                                <i class="bi bi-eye me-2"></i>Buku Induk Siswa
                            </a>
                        </div>
                        <div class="d-none d-lg-block">
                            <img src="/images/jumbotron.png" alt="Illustration" class="img-fluid floating-animation" style="max-height: 200px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="row g-4 mb-4">
            <div class="col-md-4">
                <div class="stats-card card bg-primary text-white rounded-4 shadow-sm h-100 hover-grow animate__animated animate__fadeInLeft">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <h5 class="card-title"><i class="bi bi-people-fill me-2"></i>Jumlah Siswa</h5>
                                <h2 class="display-6 fw-bold mb-3">{{$jumlah_siswa}}</h2>
                                <small class="text-white-50">terakhir diperbarui: {{$siswa[0]->created_at->diffForHumans()}}</small>
                            </div>
                            <div class="icon-circle bg-white bg-opacity-25 rounded-circle p-3">
                                <i class="bi bi-people-fill fs-3"></i>
                            </div>
                        </div>
                        <a href="/admin/siswa/create" class="btn btn-light btn-sm mt-3 rounded-pill hover-scale">
                            <i class="bi bi-plus me-2"></i>Tambah
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="stats-card card bg-success text-white rounded-4 shadow-sm h-100 hover-grow animate__animated animate__fadeInUp">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <h5 class="card-title"><i class="bi bi-house me-2"></i>Jumlah Kelas</h5>
                                <h2 class="display-6 fw-bold mb-3">{{$jumlah_kelas}}</h2>
                                @if ($jumlah_kelas > 0)
                                    <small class="text-white-50">terakhir diperbarui: {{$kelas[0]->created_at->diffForHumans()}}</small>
                                @else
                                    <br>
                                @endif
                            </div>
                            <div class="icon-circle bg-white bg-opacity-25 rounded-circle p-3">
                                <i class="bi bi-house fs-3"></i>
                            </div>
                        </div>
                        <a href="/admin/grup/create" class="btn btn-light btn-sm mt-3 rounded-pill hover-scale">
                            <i class="bi bi-plus me-2"></i>Tambah
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="stats-card card bg-info text-white rounded-4 shadow-sm h-100 hover-grow animate__animated animate__fadeInRight">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <h5 class="card-title"><i class="bi bi-arrow-left-right me-2"></i>Mutasi Siswa</h5>
                                <h2 class="display-6 fw-bold mb-3">{{$jumlah_mutasi}}</h2>
                                @if ($jumlah_mutasi > 0)
                                    <small class="text-white-50">terakhir diperbarui: {{$mutasi[0]->created_at->diffForHumans()}}</small>
                                @else
                                    <br>
                                @endif
                            </div>
                            <div class="icon-circle bg-white bg-opacity-25 rounded-circle p-3">
                                <i class="bi bi-arrow-left-right fs-3"></i>
                            </div>
                        </div>
                        <a href="/admin/mutasi" class="btn btn-light btn-sm mt-3 rounded-pill hover-scale">
                            <i class="bi bi-eye me-2"></i>Lihat
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Additional Data Section -->
        <div class="row g-4">
            <div class="col-lg-8">
                <div class="card shadow-sm rounded-4 h-100 animate__animated animate__fadeInLeft">
                    <div class="card-body p-4">
                        <h5 class="card-title mb-4"><i class="bi bi-graph-up me-2"></i>Statistik Siswa</h5>
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="data-card bg-purple p-3 rounded-4 text-white hover-grow">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h6 class="mb-2">Murid Perempuan</h6>
                                            <h3 class="fw-bold">{{$murid_perempuan}}</h3>
                                        </div>
                                        <i class="bi bi-gender-female fs-1 opacity-50"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="data-card bg-blue p-3 rounded-4 text-white hover-grow">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h6 class="mb-2">Murid Laki-laki</h6>
                                            <h3 class="fw-bold">{{$murid_laki}}</h3>
                                        </div>
                                        <i class="bi bi-gender-male fs-1 opacity-50"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="data-card bg-orange p-3 rounded-4 text-white hover-grow">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h6 class="mb-2">Siswa Yatim/Piatu</h6>
                                            <h3 class="fw-bold">{{$siswa_yatim_piatu}}</h3>
                                        </div>
                                        <i class="bi bi-heart fs-1 opacity-50"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="data-card bg-red p-3 rounded-4 text-white hover-grow">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h6 class="mb-2">Siswa Kurang Mampu</h6>
                                            <h3 class="fw-bold">{{$siswa_kurang_mampu}}</h3>
                                        </div>
                                        <i class="bi bi-cash-coin fs-1 opacity-50"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="card shadow-sm rounded-4 h-100 animate__animated animate__fadeInRight">
                    <div class="card-body p-4">
                        <h5 class="card-title mb-4"><i class="bi bi-calendar me-2"></i>Tahun Ajaran</h5>
                        <div class="year-card bg-gradient p-4 rounded-4 text-center mb-4 hover-grow">
                            <h1 class="display-4 fw-bold text-white">
                                @if(count($tahun) > 0) {{$tahun[0]->tahun_ajaran}} @else - @endif
                            </h1>
                        </div>
                        <a href="/admin/tahun" class="btn btn-primary w-100 py-2 rounded-pill hover-scale">
                            <i class="bi bi-pencil me-2"></i>Ubah Tahun Ajaran
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Custom Colors */
        .bg-purple { background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%); }
        .bg-blue { background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%); }
        .bg-orange { background: linear-gradient(135deg, #f46b45 0%, #eea849 100%); }
        .bg-red { background: linear-gradient(135deg, #c31432 0%, #240b36 100%); }
        .bg-gradient { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
        
        /* Animations */
        .hover-grow {
            transition: all 0.3s ease;
        }
        .hover-grow:hover {
            transform: translateY(-5px) scale(1.02);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
        }
        
        .hover-scale {
            transition: all 0.2s ease;
        }
        .hover-scale:hover {
            transform: scale(1.05);
        }
        
        .floating-animation {
            animation: floating 3s ease-in-out infinite;
        }
        
        @keyframes floating {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
        }
        
        /* Card Styles */
        .welcome-card {
            background: linear-gradient(135deg, rgba(255,255,255,0.9) 0%, rgba(255,255,255,0.95) 100%);
            backdrop-filter: blur(5px);
            border: 1px solid rgba(255,255,255,0.3);
        }
        
        .stats-card {
            transition: all 0.3s ease;
            border: none;
        }
        
        .data-card {
            height: 120px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        
        .year-card {
            height: 150px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .icon-circle {
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>

    <!-- Animate.css for animations -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
@endsection