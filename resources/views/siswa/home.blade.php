@extends('layouts.base')

@section('content')
    
    <div class="container card shadow mt-3 mb-3">
      @if (session()->has('Updated'))
          <div class="alert alert-success alert-dismissible fade show position-absolute w-100" role="alert">
            <i class="bi bi-check-circle me-2"></i>{{ session('Updated') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
      <div class="row justify-content-center p-3">
        <div class="col-lg-3">
          <img src="@if (auth()->user()->foto === NULL) @if(auth()->user()->jenis_kelamin === 'L') /images/male.png @else /images/female.png @endif @else {{asset('storage/'.auth()->user()->foto)}}  @endif" class="img-fluid rounded-start" alt="..." style="max-width: 220px">
        </div>
        <div class="col-lg-6 mt-3">
          <h1 class="text-uppercase">{{auth()->user()->nama_lengkap}}</h1>
          <h4 class="fw-normal">NISN : <span class="text-primary">{{auth()->user()->nisn}}</span></h4>
          <h4 class="fw-normal">NIS : <span class="text-primary">{{auth()->user()->nis}}</span></h4>
          <p class="sub-title">Diterima pada tahun ajaran {{auth()->user()->tahun_ajar->tahun_ajaran ?? 'Tidak tersedia'}}</p>
          @if (auth()->user()->kelas)
            <p class="sub-title">Kelas : {{auth()->user()->kelas->nama}}</p>
          @endif
        </div>
        <div class="col-lg-2">
          <a href="/admin/print/{{auth()->user()->nisn}}" class="btn btn-warning btn-lg"><i class="bi bi-printer me-2"></i>Cetak</a>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-lg-4">
          <table class="table">
            <tr>
              <th>Tempat/Tanggal Lahir</th>
              <td>{{auth()->user()->biodata->tempat_lahir ?? 'Tidak tersedia'}}/{{auth()->user()->biodata->tanggal_lahir ?? 'Tidak tersedia'}}</td>
            </tr>
            <tr>
              <th>Jenis Kelamin</th>
              <td>{{auth()->user()->jenis_kelamin}}</td>
            </tr>
            <tr>
              <th>Alamat</th>
              <td>{{auth()->user()->biodata->alamat ?? 'Tidak tersedia'}}</td>
            </tr>
            <tr>
              <th>Kecamatan</th>
              <td>{{auth()->user()->biodata->kecamatan ?? 'Tidak tersedia'}}</td>
            </tr>
            <tr>
              <th>Jumlah Saudara Kandung</th>
              <td>{{auth()->user()->biodata->jlh_saudara ?? 'Tidak tersedia'}}</td>
            </tr> 
          </table>
        </div>
        <div class="col-lg-4">
          <table class="table">
            <tr>
              <th>Bahasa sehari-hari</th>
              <td>{{auth()->user()->biodata->bahasa ?? 'Tidak tersedia'}}</td>
            </tr>
            <tr>
              <th>Agama</th>
              <td>{{auth()->user()->biodata->agama ?? 'Tidak tersedia'}}</td>
            </tr>
            <tr>
              <th>Jarak ke sekolah</th>
              <td>{{auth()->user()->biodata->jarak ? auth()->user()->biodata->jarak.' Km' : 'Tidak tersedia'}}</td>
            </tr>
            <tr>
              <th>Nomor Telefon</th>
              <td>{{auth()->user()->biodata->nomor_hp ?? 'Tidak tersedia'}}</td>
            </tr>
            <tr>
              <th>Golongan Darah</th>
              <td>{{auth()->user()->biodata->goldar ?? 'Tidak tersedia'}}</td>
            </tr>
            <tr>
              <th>Tinggi badan</th>
              <td>{{auth()->user()->biodata->tinggi ? auth()->user()->biodata->tinggi.' Cm' : 'Tidak tersedia'}}</td>
            </tr>
            <tr>
              <th>Berat badan</th>
              <td>{{auth()->user()->biodata->berat ? auth()->user()->biodata->berat.' Kg' : 'Tidak tersedia'}}</td>
            </tr>
          </table>
        </div>
        <div class="col-lg-4">
          <table class="table">
            <tr>
              <th>Riwayat Penyakit</th>
              <td>{{auth()->user()->biodata->penyakit ?? 'Tidak tersedia'}}</td>
            </tr>
            <tr>
              <th>Kegemaran</th>
              <td>{{auth()->user()->biodata->hobi ?? 'Tidak tersedia'}}</td>
            </tr>
            <tr>
              <th>Kewarganegaraan</th>
              <td>{{auth()->user()->biodata->kewarganegaraan ?? 'Tidak tersedia'}}</td>
            </tr>
            <tr>
              <th>Nama Ayah Siswa</th>
              <td>{{auth()->user()->ayah->nama ?? 'Tidak tersedia'}}</td>
            </tr>
            <tr>
              <th>Pekerjaan Ayah</th>
              <td>{{auth()->user()->ayah->pekerjaan ?? 'Tidak tersedia'}}</td>
            </tr>
            <tr>
              <th>Nama Ibu Siswa</th>
              <td>{{auth()->user()->ibu->nama ?? 'Tidak tersedia'}}</td>
            </tr>
            <tr>
              <th>Pekerjaan Ibu</th>
              <td>{{auth()->user()->ibu->pekerjaan ?? 'Tidak tersedia'}}</td>
            </tr>
          </table>
        </div>
      </div>
    </div>
@endsection