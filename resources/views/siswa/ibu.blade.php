@extends('layouts.base')

@section('content')
    <div class="container card shadow-lg my-4 p-4 animate__animated animate__fadeIn">
      <div class="row justify-content-center">
        <div class="col-lg-10">
          <h3 class="text-uppercase fw-bold text-center mb-4 gradient-text">{{$title}}</h3>
        </div>
      </div>
      
      <form action="/data-ibu/{{auth()->user()->ibu->uri}}" method="post" class="mx-3 my-3 needs-validation" novalidate>
        @method('put')
        @csrf
        
        <div class="row g-4">
          <div class="col-lg-4">
            <div class="form-floating mb-3">
              <input type="text" class="form-control @error('nama') is-invalid @enderror floating-input" 
                     id="nama" name="nama" value="{{$res->nama}}" placeholder="Nama lengkap" required>
              <label for="nama">Nama lengkap</label>
              <div class="invalid-feedback">
                @error('nama') {{ $message }} @else Harap isi nama lengkap @enderror
              </div>
            </div>
            
            <div class="form-floating mb-3">
              <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror floating-input" 
                     id="tempat_lahir" name="tempat_lahir" value="{{$res->tempat_lahir}}" placeholder="Kota Kelahiran" required>
              <label for="tempat_lahir">Kota Kelahiran</label>
              <div class="invalid-feedback">
                @error('tempat_lahir') {{ $message }} @else Harap isi kota kelahiran @enderror
              </div>
            </div>
            
            <div class="form-floating mb-3">
              <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror floating-input" 
                     id="tanggal_lahir" name="tanggal_lahir" value="{{$res->tanggal_lahir}}" required>
              <label for="tanggal_lahir">Tanggal Lahir</label>
              <div class="invalid-feedback">
                @error('tanggal_lahir') {{ $message }} @else Harap isi tanggal lahir @enderror
              </div>
            </div>
            
            <div class="form-floating mb-3">
              <select class="form-select floating-select" id="agama" name="agama" required>
                <option value="" disabled>Pilih agama</option>
                <option value="Islam" @if ($res->agama === 'Islam') selected @endif>Islam</option>
                <option value="Protestan" @if ($res->agama === 'Protestan') selected @endif>Protestan</option>
                <option value="Katholik" @if ($res->agama === 'Katholik') selected @endif>Katholik</option>
                <option value="Buddha" @if ($res->agama === 'Buddha') selected @endif>Buddha</option>
                <option value="Hindu" @if ($res->agama === 'Hindu') selected @endif>Hindu</option>
              </select>
              <label for="agama">Agama</label>
            </div>
          </div>
          
          <div class="col-lg-4">
            <div class="form-floating mb-3">
              <input type="text" class="form-control @error('kewarganegaraan') is-invalid @enderror floating-input" 
                     id="kewarganegaraan" name="kewarganegaraan" value="{{$res->kewarganegaraan}}" placeholder="Kewarganegaraan" required>
              <label for="kewarganegaraan">Kewarganegaraan</label>
              <div class="invalid-feedback">
                @error('kewarganegaraan') {{ $message }} @else Harap isi kewarganegaraan @enderror
              </div>
            </div>
            
            <div class="form-floating mb-3">
              <input type="text" class="form-control @error('pekerjaan') is-invalid @enderror floating-input" 
                     id="pekerjaan" name="pekerjaan" value="{{$res->pekerjaan}}" placeholder="Pekerjaan" required>
              <label for="pekerjaan">Pekerjaan</label>
              <div class="invalid-feedback">
                @error('pekerjaan') {{ $message }} @else Harap isi pekerjaan @enderror
              </div>
            </div>
            
            <div class="form-floating mb-3">
              <select class="form-select floating-select" id="pendidikan" name="pendidikan" required>
                <option value="" disabled>Pilih pendidikan</option>
                <option value="SD/Sederajat" @if ($res->pendidikan === 'SD/Sederajat') selected @endif>SD/Sederajat</option>
                <option value="SMP/Sederajat" @if ($res->pendidikan === 'SMP/Sederajat') selected @endif>SMP/Sederajat</option>
                <option value="SMA/Sederajat" @if ($res->pendidikan === 'SMA/Sederajat') selected @endif>SMA/Sederajat</option>
                <option value="Diploma" @if ($res->pendidikan === 'Diploma') selected @endif>Diploma</option>
                <option value="Strata-1" @if ($res->pendidikan === 'Strata-1') selected @endif>Strata-1</option>
                <option value="Strata-2" @if ($res->pendidikan === 'Strata-2') selected @endif>Strata-2</option>
                <option value="Strata-3" @if ($res->pendidikan === 'Strata-3') selected @endif>Strata-3</option>
              </select>
              <label for="pendidikan">Pendidikan Terakhir</label>
            </div>
            
            <div class="form-floating mb-3">
              <input type="number" class="form-control @error('penghasilan') is-invalid @enderror floating-input" 
                     id="penghasilan" name="penghasilan" value="{{$res->penghasilan}}" placeholder="Penghasilan" required>
              <label for="penghasilan">Penghasilan perbulan</label>
              <div class="invalid-feedback">
                @error('penghasilan') {{ $message }} @else Harap isi penghasilan @enderror
              </div>
            </div>
          </div>
          
          <div class="col-lg-4">
            <div class="form-floating mb-3">
              <textarea class="form-control @error('alamat') is-invalid @enderror floating-input" 
                        id="alamat" name="alamat" placeholder="Alamat" style="height: 100px" required>{{$res->alamat}}</textarea>
              <label for="alamat">Alamat sesuai KTP</label>
              <div class="invalid-feedback">
                @error('alamat') {{ $message }} @else Harap isi alamat @enderror
              </div>
            </div>
            
            <div class="form-floating mb-3">
              <input type="tel" class="form-control @error('nomor_hp') is-invalid @enderror floating-input" 
                     id="nomor_hp" name="nomor_hp" value="{{$res->nomor_hp}}" placeholder="Nomor Telefon" required>
              <label for="nomor_hp">Nomor Telefon</label>
              <div class="invalid-feedback">
                @error('nomor_hp') {{ $message }} @else Harap isi nomor telefon @enderror
              </div>
            </div>
            
            <div class="mb-3 p-3 border rounded">
              <label class="form-label fw-bold">Status Orang Tua</label>
              <div class="form-check">
                <input class="form-check-input @error('status') is-invalid @enderror" type="radio" 
                       name="status" id="status1" value="Masih Hidup" @if ($res->status == 'Masih Hidup') checked @endif required>
                <label class="form-check-label" for="status1">Masih hidup</label>
              </div>
              <div class="form-check">
                <input class="form-check-input @error('status') is-invalid @enderror" type="radio" 
                       name="status" id="status2" value="Telah Meninggal" @if ($res->status == 'Telah Meninggal') checked @endif>
                <label class="form-check-label" for="status2">Telah Meninggal</label>
              </div>
              <div class="invalid-feedback">
                @error('status') {{ $message }} @else Harap pilih status @enderror
              </div>
            </div>
          </div>
        </div>
        
        <div class="d-grid gap-2 mb-3 w-100 mt-4">
          <div class="form-text mb-2"><span class="text-danger fw-bold">*</span> Pastikan data yang kamu masukkan benar dan sesuai ketentuan</div>
          <button type="submit" class="btn btn-primary w-100 py-3 btn-submit">
            <span class="submit-text">
              <i class="bi bi-cloud-check me-2"></i> Simpan Perubahan
            </span>
            <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
          </button>
        </div>
      </form>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <style>
        /* Gradient text for title */
        .gradient-text {
            background: linear-gradient(45deg, #3b82f6, #8b5cf6);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            text-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        /* Floating label animation */
        .floating-input:focus ~ label,
        .floating-input:not(:placeholder-shown) ~ label,
        .floating-select:focus ~ label,
        .floating-select:not([value=""]):valid ~ label {
            transform: translateY(-1.5rem) scale(0.85);
            background-color: white;
            padding: 0 0.5rem;
            color: #3b82f6;
        }
        
        .form-floating label {
            transition: all 0.2s ease-out;
            color: #6b7280;
        }
        
        /* Input focus effects */
        .floating-input:focus, .floating-select:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 0.25rem rgba(59, 130, 246, 0.25);
        }
        
        /* Submit button animation */
        .btn-submit {
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
        }
        
        .btn-submit:active {
            transform: translateY(0);
        }
        
        /* Card styling */
        .card {
            border: none;
            border-radius: 12px;
            overflow: hidden;
            background: white;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }
        
        /* Radio button styling */
        .form-check-input:checked {
            background-color: #3b82f6;
            border-color: #3b82f6;
        }
        
        /* Responsive adjustments */
        @media (max-width: 992px) {
            .col-lg-4 {
                margin-bottom: 1rem;
            }
        }
    </style>
@endpush

@push('scripts')
    <script>
        // Form validation
        (function () {
            'use strict'
            
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')
            
            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function (form) {
                    form.addEventListener('submit', function (event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        } else {
                            // Show loading spinner on submit
                            const submitBtn = form.querySelector('.btn-submit');
                            const submitText = submitBtn.querySelector('.submit-text');
                            const spinner = submitBtn.querySelector('.spinner-border');
                            
                            submitText.classList.add('d-none');
                            spinner.classList.remove('d-none');
                            submitBtn.disabled = true;
                        }
                        
                        form.classList.add('was-validated')
                    }, false)
                })
        })()
        
        // Add animation to form elements on scroll
        document.addEventListener('DOMContentLoaded', function() {
            const formElements = document.querySelectorAll('.form-floating, .border.rounded');
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate__animated', 'animate__fadeInUp');
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.1
            });
            
            formElements.forEach((el, index) => {
                el.style.setProperty('--animate-delay', `${index * 0.1}s`);
                observer.observe(el);
            });
        });
    </script>
@endpush