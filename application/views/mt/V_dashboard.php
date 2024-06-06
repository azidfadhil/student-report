<div class="row">

  <!--------------------------------------- Jumlah Siswa --------------------------------------->
  <div class="col-xl-6 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Siswa</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jml_siswa ?></div>
          </div>
          <div class="col-auto">
            <i class="fas fa-user fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--------------------------------------- Jumlah Sekolah --------------------------------------->
  <div class="col-xl-6 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah Sekolah</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jml_sekolah ?></div>
          </div>
          <div class="col-auto">
            <i class="fas fa-school fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

<div class="row">
  
  <!----------------------------------- Jumlah Siswa per Bulan ----------------------------------->
  <div class="col-xl-8 col-lg-7">
    <div class="card shadow mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Jumlah Siswa Per Bulan</h6>
      </div>
      <div class="card-body">
        <div class="chart-area">
          <canvas id="jumlahSiswaPerBulanAreaChart"></canvas>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Pie Chart -->
  <div class="col-xl-4 col-lg-5">
    <div class="card shadow mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
      </div>
      <!-- Card Body -->
      <div class="card-body">
        <div class="chart-pie pt-4 pb-2">
          <canvas id="myPieChart"></canvas>
        </div>
        <div class="mt-4 text-center small">
          <span class="mr-2">
            <i class="fas fa-circle text-primary"></i> Direct
          </span>
          <span class="mr-2">
            <i class="fas fa-circle text-success"></i> Social
          </span>
          <span class="mr-2">
            <i class="fas fa-circle text-info"></i> Referral
          </span>
        </div>
      </div>
    </div>
  </div>
</div>