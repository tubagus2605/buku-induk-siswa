@extends('layouts.base')

@section('content')
    <div class="container mt-3 card shadow">
      <div class="row justify-content-center mb-3">
        <div class="col-lg-9">
          <form action="/biodata/{{auth()->user()->biodata->uri}}" method="post" id="multiStepForm">
            @method('put')
            @csrf
            <div class="container">
              <!-- Progress Steps -->
              <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="progress" style="height: 8px; flex-grow: 1; margin: 0 15px;">
                  <div class="progress-bar bg-primary" role="progressbar" id="formProgress" style="width: 33%"></div>
                </div>
              </div>
              
              <!-- Tabs navs with improved styling -->
              <ul class="nav nav-pills nav-fill mb-4" id="formTabs" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active step-indicator" id="step1-tab" data-bs-toggle="tab" data-bs-target="#step1" type="button" role="tab">
                    <span class="step-number">1</span>
                    <span class="step-label d-none d-md-inline">Informasi Dasar</span>
                  </button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link step-indicator" id="step2-tab" data-bs-toggle="tab" data-bs-target="#step2" type="button" role="tab">
                    <span class="step-number">2</span>
                    <span class="step-label d-none d-md-inline">Detail Pribadi</span>
                  </button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link step-indicator" id="step3-tab" data-bs-toggle="tab" data-bs-target="#step3" type="button" role="tab">
                    <span class="step-number">3</span>
                    <span class="step-label d-none d-md-inline">Informasi Tambahan</span>
                  </button>
                </li>
              </ul>

              <!-- Tabs content -->
              <div class="tab-content" id="formSteps">
                <!-- Step 1 -->
                <div class="tab-pane fade show active" id="step1" role="tabpanel" aria-labelledby="step1-tab">
                  <h3 class="text-uppercase text-center mb-4">{{$title}}</h3>
                  
                  <div class="row g-3">
                    <div class="col-md-12">
                      <label class="form-label">Alamat</label>
                      <input type="text" class="form-control @error('alamat') is-invalid @enderror" placeholder="Contoh: Jl. Kemuning No.7" name="alamat" value="{{$res->alamat}}">
                      @error('alamat')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    
                    <div class="col-md-6">
                      <label class="form-label">Kota</label>
                      <input type="text" class="form-control @error('kota') is-invalid @enderror" placeholder="Contoh: Jakarta Utara" name="kota" value="{{$res->kota}}">
                      @error('kota')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    
                    <div class="col-md-6">
                      <label class="form-label">Kecamatan</label>
                      <input type="text" class="form-control @error('kecamatan') is-invalid @enderror" placeholder="Contoh: Sidorejo" name="kecamatan" value="{{$res->kecamatan}}">
                      @error('kecamatan')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    
                    <div class="col-md-6">
                      <label class="form-label">Tempat Lahir</label>
                      <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" placeholder="Contoh: Jakarta" name="tempat_lahir" value="{{$res->tempat_lahir}}">
                      @error('tempat_lahir')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    
                    <div class="col-md-6">
                      <label class="form-label">Tanggal Lahir</label>
                      <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" value="{{$res->tanggal_lahir}}">
                      @error('tanggal_lahir')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    
                    <div class="col-md-6">
                      <label class="form-label">Anak ke</label>
                      <input type="number" class="form-control @error('anak_ke') is-invalid @enderror" placeholder="Contoh: 1" name="anak_ke" value="{{$res->anak_ke}}">
                      @error('anak_ke')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    
                    <div class="col-md-6">
                      <label class="form-label">Jumlah Saudara Kandung</label>
                      <input type="number" class="form-control @error('jlh_saudara') is-invalid @enderror" placeholder="Contoh: 2" name="jlh_saudara" value="{{$res->jlh_saudara}}">
                      @error('jlh_saudara')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                  
                  <div class="d-flex justify-content-end mt-4">
                    <button type="button" class="btn btn-primary next-step" data-next="step2">Selanjutnya <i class="bi bi-arrow-right ms-2"></i></button>
                  </div>
                </div>
                
                <!-- Step 2 -->
                <div class="tab-pane fade" id="step2" role="tabpanel" aria-labelledby="step2-tab">
                  <h3 class="text-uppercase text-center mb-4">{{$title}}</h3>
                  
                  <div class="row g-3">
                    <div class="col-md-12">
                      <label class="form-label">Bahasa sehari-hari</label>
                      <input type="text" class="form-control @error('bahasa') is-invalid @enderror" placeholder="Contoh: Bahasa Indonesia" name="bahasa" value="{{$res->bahasa}}">
                      @error('bahasa')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    
                    <div class="col-md-6">
                      <label class="form-label">Agama</label>
                      <select name="agama" class="form-select">
                        <option value="Islam" @if ($res->agama === 'Islam') selected @endif>Islam</option>
                        <option value="Katholik" @if ($res->agama === 'Katholik') selected @endif>Katholik</option>
                        <option value="Protestan" @if ($res->agama === 'Protestan') selected @endif>Protestan</option>
                        <option value="Buddha" @if ($res->agama === "Buddha") selected @endif>Buddha</option>
                        <option value="Hindu" @if ($res->agama === 'Hindu') selected @endif>Hindu</option>
                      </select>
                    </div>
                    
                    <div class="col-md-6">
                      <label class="form-label">Jarak dari rumah (KM)</label>
                      <input type="number" class="form-control @error('jarak') is-invalid @enderror" placeholder="Contoh: 7" name="jarak" value="{{$res->jarak}}">
                      @error('jarak')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    
                    <div class="col-md-6">
                      <label class="form-label">Nomor telefon siswa</label>
                      <input type="text" class="form-control @error('nomor_hp') is-invalid @enderror" placeholder="Contoh: 081234567891" name="nomor_hp" value="{{$res->nomor_hp}}">
                      @error('nomor_hp')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    
                    <div class="col-md-6">
                      <label class="form-label">Golongan Darah</label>
                      <select name="goldar" class="form-select">
                        <option value="O" @if ($res->goldar === 'O') selected @endif>O</option>
                        <option value="A" @if ($res->goldar === 'A') selected @endif>A</option>
                        <option value="B" @if ($res->goldar === 'B') selected @endif>B</option>
                        <option value="AB" @if ($res->goldar === "AB") selected @endif>AB</option>
                      </select>
                    </div>
                    
                    <div class="col-md-6">
                      <label class="form-label">Tinggi badan (CM)</label>
                      <input type="number" class="form-control @error('tinggi') is-invalid @enderror" placeholder="Contoh: 172" name="tinggi" value="{{$res->tinggi}}">
                      @error('tinggi')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    
                    <div class="col-md-6">
                      <label class="form-label">Berat badan (KG)</label>
                      <input type="number" class="form-control @error('berat') is-invalid @enderror" placeholder="Contoh: 55" name="berat" value="{{$res->berat}}">
                      @error('berat')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                  
                  <div class="d-flex justify-content-between mt-4">
                    <button type="button" class="btn btn-outline-secondary prev-step" data-prev="step1"><i class="bi bi-arrow-left me-2"></i> Sebelumnya</button>
                    <button type="button" class="btn btn-primary next-step" data-next="step3">Selanjutnya <i class="bi bi-arrow-right ms-2"></i></button>
                  </div>
                </div>
                
                <!-- Step 3 -->
                <div class="tab-pane fade" id="step3" role="tabpanel" aria-labelledby="step3-tab">
                  <h3 class="text-uppercase text-center mb-4">{{$title}}</h3>
                  
                  <div class="row g-3">
                    <div class="col-md-12">
                      <label class="form-label">Riwayat penyakit</label>
                      <input type="text" class="form-control @error('penyakit') is-invalid @enderror" placeholder="Contoh: Asma" name="penyakit" value="{{$res->penyakit}}">
                      @error('penyakit')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    
                    <div class="col-md-12">
                      <label class="form-label">Kegemaran</label>
                      <input type="text" class="form-control @error('hobi') is-invalid @enderror" placeholder="Contoh: Bulu tangkis" name="hobi" value="{{$res->hobi}}">
                      @error('hobi')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    
                    <div class="col-md-12">
                      <label class="form-label">Kewarganegaraan</label>
                      <input type="text" class="form-control @error('kewarganegaraan') is-invalid @enderror" placeholder="Contoh: Indonesia" name="kewarganegaraan" value="{{$res->kewarganegaraan}}">
                      @error('kewarganegaraan')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    
                    <div class="col-md-12">
                      <label class="form-label">Sekolah Asal</label>
                      <input type="text" class="form-control @error('sekolah_asal') is-invalid @enderror" placeholder="Contoh: SMPN 1 Kota Medan" name="sekolah_asal" value="{{$res->sekolah_asal}}">
                      @error('sekolah_asal')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                  
                  <div class="alert alert-info mt-4">
                    <i class="bi bi-info-circle-fill me-2"></i> Pastikan data yang kamu masukkan benar dan sesuai ketentuan
                  </div>
                  
                  <div class="d-flex justify-content-between mt-3">
                    <button type="button" class="btn btn-outline-secondary prev-step" data-prev="step2"><i class="bi bi-arrow-left me-2"></i> Sebelumnya</button>
                    <button type="submit" class="btn btn-success"><i class="bi bi-cloud-check me-2"></i> Simpan Data</button>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    @push('scripts')
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        // Next step functionality
        document.querySelectorAll('.next-step').forEach(button => {
          button.addEventListener('click', function() {
            const nextStep = this.getAttribute('data-next');
            const currentTab = document.querySelector('.tab-pane.active');
            
            // Validate current step before proceeding
            if (validateStep(currentTab.id)) {
              // Switch to next tab
              const nextTab = document.querySelector(`#${nextStep}`);
              const nextTabTrigger = document.querySelector(`[data-bs-target="#${nextStep}"]`);
              
              // Bootstrap tab show
              const tab = new bootstrap.Tab(nextTabTrigger);
              tab.show();
              
              // Update progress bar
              updateProgressBar(nextStep);
            }
          });
        });
        
        // Previous step functionality
        document.querySelectorAll('.prev-step').forEach(button => {
          button.addEventListener('click', function() {
            const prevStep = this.getAttribute('data-prev');
            const prevTabTrigger = document.querySelector(`[data-bs-target="#${prevStep}"]`);
            
            // Bootstrap tab show
            const tab = new bootstrap.Tab(prevTabTrigger);
            tab.show();
            
            // Update progress bar
            updateProgressBar(prevStep);
          });
        });
        
        // Update progress bar based on current step
        function updateProgressBar(step) {
          let progress = 33;
          if (step === 'step2') progress = 66;
          else if (step === 'step3') progress = 100;
          
          document.getElementById('formProgress').style.width = `${progress}%`;
          
          // Update active state of step indicators
          document.querySelectorAll('.step-indicator').forEach(indicator => {
            indicator.classList.remove('active');
          });
          document.querySelector(`[data-bs-target="#${step}"]`).classList.add('active');
        }
        
        // Simple validation for each step
        function validateStep(stepId) {
          const inputs = document.querySelectorAll(`#${stepId} [required]`);
          let isValid = true;
          
          inputs.forEach(input => {
            if (!input.value.trim()) {
              input.classList.add('is-invalid');
              isValid = false;
            } else {
              input.classList.remove('is-invalid');
            }
          });
          
          if (!isValid) {
            // Scroll to first invalid input
            const firstInvalid = document.querySelector(`#${stepId} .is-invalid`);
            firstInvalid.scrollIntoView({ behavior: 'smooth', block: 'center' });
          }
          
          return isValid;
        }
      });
    </script>
    @endpush

    @push('styles')
    <style>
      /* Custom styling for step indicators */
      .step-indicator {
        position: relative;
        padding: 10px 15px;
        border-radius: 50px;
        transition: all 0.3s ease;
        border: none;
        background-color: #f8f9fa;
        color: #6c757d;
      }
      
      .step-indicator.active {
        background-color: #0d6efd;
        color: white;
        box-shadow: 0 4px 8px rgba(13, 110, 253, 0.2);
      }
      
      .step-number {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 24px;
        height: 24px;
        border-radius: 50%;
        background-color: #e9ecef;
        margin-right: 8px;
        font-weight: bold;
      }
      
      .step-indicator.active .step-number {
        background-color: white;
        color: #0d6efd;
      }
      
      .step-label {
        font-size: 0.9rem;
      }
      
      .nav-pills .nav-link {
        margin: 0 5px;
      }
      
      /* Form input styling */
      .form-control, .form-select {
        padding: 10px 15px;
        border-radius: 8px;
        border: 1px solid #ced4da;
        transition: all 0.3s ease;
      }
      
      .form-control:focus, .form-select:focus {
        border-color: #86b7fe;
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
      }
      
      /* Button styling */
      .btn {
        padding: 10px 20px;
        border-radius: 8px;
        font-weight: 500;
        transition: all 0.3s ease;
      }
      
      .btn-primary {
        background-color: #0d6efd;
        border-color: #0d6efd;
      }
      
      .btn-primary:hover {
        background-color: #0b5ed7;
        border-color: #0a58ca;
      }
      
      /* Responsive adjustments */
      @media (max-width: 768px) {
        .step-label {
          display: none !important;
        }
        
        .step-indicator {
          padding: 8px 12px;
        }
      }
    </style>
    @endpush
@endsection