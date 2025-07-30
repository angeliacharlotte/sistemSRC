<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= $main_url ?>dashboard.php" class="brand-link">
      <img src="<?= $main_url ?>asset/image/logoMP.png" alt="Logo" class="brand-image" style="opacity: .8">
      <span class="brand-text font-weight-light">Inventory</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= $main_url ?>asset/image/<?= userLogin()['foto'] ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= userLogin()['fullname'] ?> </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    
    <!-- Dashboard -->
    <li class="nav-item">
      <?php if(userLogin()['level'] == 1): ?>
      <a href="<?= $main_url ?>dashboard.php" class="nav-link" <?= menuHome() ?>>
        <i class="nav-icon fas fa-tachometer-alt text-sm"></i>
        <p>Dashboard</p>
      </a>
      <?php elseif(userLogin()['level'] == 2): ?>
        <a href="<?= $main_url ?>operator/cinunuk/" class="nav-link" <?= menuHome() ?>>
        <i class="nav-icon fas fa-tachometer-alt text-sm"></i>
        <p>Dashboard</p>
      </a>
      <?php elseif(userLogin()['level'] == 3): ?>
        <a href="<?= $main_url ?>operator/cirebon/" class="nav-link" <?= menuHome() ?>>
        <i class="nav-icon fas fa-tachometer-alt text-sm"></i>
        <p>Dashboard</p>
      </a>
      <?php elseif(userLogin()['level'] == 4): ?>
        <a href="<?= $main_url ?>operator/tasikmalaya/" class="nav-link" <?= menuHome() ?>>
        <i class="nav-icon fas fa-tachometer-alt text-sm"></i>
        <p>Dashboard</p>
      </a>
      <?php elseif(userLogin()['level'] == 5): ?>
        <a href="<?= $main_url ?>operator/baksul/" class="nav-link" <?= menuHome() ?>>
        <i class="nav-icon fas fa-tachometer-alt text-sm"></i>
        <p>Dashboard</p>
      </a>
      <?php endif;?>
    </li>

    <!-- Master Data (Admin & Supervisor Only) -->
    <?php if(userLogin()['level'] == 1): ?>
    <li class="nav-item has-treeview <?= menuMaster()?>">
      <a href="#" class="nav-link">
        <i class="nav-icon far fa-folder-open text-sm"></i>
        <p>
          Master Data
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview ml-3">        
        <li class="nav-item  <?= menuMaster()?>">
          <a href="<?= $main_url ?>supplier/data-supplier.php" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Supplier            
          </p>
          </a>
        </li>
        <li class="nav-item  <?= menuMaster()?>">
          <a href="<?= $main_url ?>barang" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Barang            
          </p>
          </a>
        </li>
        </ul>
    </li>
    <!-- Stock Barang untuk Operator -->
    <?php elseif (userLogin()['level'] == 2): ?>
    <li class="nav-item">
      <a href="<?= $main_url ?>stockOperator/cinunuk/stock-cinunuk.php" class="nav-link" <?= menuHome() ?>> 
        <i class="nav-icon fas fa-box text-sm"></i>
        <p>Halaman Operator</p>
      </a>
    </li>
    <?php elseif (userLogin()['level'] == 3): ?>
      <li class="nav-item">
      <a href="<?= $main_url ?>stockOperator/cirebon/stock-cirebon.php" class="nav-link" <?= menuHome() ?>> 
        <i class="nav-icon fas fa-box text-sm"></i>
        <p>Halaman Operator</p>
      </a>
    </li>
    <?php elseif (userLogin()['level'] == 4): ?>
      <li class="nav-item">
      <a href="<?= $main_url ?>stockOperator/tasikmalaya/stock-tasik.php" class="nav-link" <?= menuHome() ?>> 
        <i class="nav-icon fas fa-box text-sm"></i>
        <p>Halaman Operator</p>
      </a>
    </li>
    <?php elseif (userLogin()['level'] == 5): ?>
      <li class="nav-item">
      <a href="<?= $main_url ?>stockOperator/baksul/stock-baksul.php" class="nav-link" <?= menuHome() ?>> 
        <i class="nav-icon fas fa-box text-sm"></i>
        <p>Halaman Operator</p>
      </a>
    </li>
    <?php endif; ?>
  <!-- END Stock Barang untuk Operator -->
    <li class="nav-header">Transaksi</li>
    <!-- Pembelian Admin -->
    <?php if(userLogin()['level'] == 1): ?>
    <li class="nav-item has-treeview <?= menuMaster()?>">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-shopping-cart text-sm"></i>
        <p>
          Pembelian
        </p>
        <i class="fas fa-angle-left right"></i>
      </a>
      <ul class="nav nav-treeview ml-3">
        <!-- Cinunuk -->
        <li class="nav-item <?= menuMaster()?>">
          <a href="<?= $main_url ?>pembelian/cinunuk" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Cinunuk            
          </p>
          </a>
        </li>
        <!-- Cirebon -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>pembelian/cirebon" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Cirebon            
          </p>
          </a>
        </li>
        <!-- Cinunuk -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>pembelian/tasikmalaya" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Tasikmalaya            
          </p>
          </a>
        </li>
        <!-- Baksul -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>pembelian/baksul" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Baksul           
          </p>
          </a>
        </li>
      </ul>
    </li>
    <!-- Pembelian untuk Operator Cinunuk-->
    <?php elseif (userLogin()['level'] == 2): ?>
    <li class="nav-item has-treeview <?= menuMaster()?>">
      <a href="<?= $main_url ?>pembelian/cinunuk"  class="nav-link">
        <i class="nav-icon fas fa-shopping-cart text-sm"></i>
        <p>
          Pembelian
        </p>
      </a>
      </li>
    <!-- Pembelian untuk Operator Cirebon -->
    <?php elseif (userLogin()['level'] == 3): ?>
      <li class="nav-item has-treeview <?= menuMaster()?>">
        <a href="<?= $main_url ?>pembelian/cirebon"  class="nav-link">
          <i class="nav-icon fas fa-shopping-cart text-sm"></i>
          <p>
            Pembelian
          </p>
        </a>
        </li>
    <!-- Pembelian untuk Operator Tasikmalaya -->
    <?php elseif (userLogin()['level'] == 4): ?>
      <li class="nav-item has-treeview <?= menuMaster()?>">
        <a href="<?= $main_url ?>pembelian/tasikmalaya"  class="nav-link">
          <i class="nav-icon fas fa-shopping-cart text-sm"></i>
          <p>
            Pembelian
          </p>
        </a>
        </li>
    <!-- Pembelian untuk Operator Baksul -->
    <?php elseif (userLogin()['level'] == 5): ?>
      <li class="nav-item has-treeview <?= menuMaster()?>">
        <a href="<?= $main_url ?>pembelian/baksul"  class="nav-link">
          <i class="nav-icon fas fa-shopping-cart text-sm"></i>
          <p>
            Pembelian
          </p>
        </a>
        </li>
    <?php endif; ?>
    <!-- Penjualan untuk Admin -->
    <?php if(userLogin()['level'] == 1): ?>
    <li class="nav-item has-treeview <?= menuMaster()?>">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-file-invoice text-sm"></i>
        <p>
          Penjualan
        </p>
        <i class="fas fa-angle-left right"></i>
      </a>
      <ul class="nav nav-treeview ml-3">
        <!-- Cinunuk -->
        <li class="nav-item <?= menuMaster()?>">
          <a href="<?= $main_url ?>penjualan/cinunuk" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Cinunuk            
          </p>
          </a>
        </li>
        <!-- Cirebon -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>penjualan/cirebon" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Cirebon           
          </p>
          </a>
        </li>
        <!-- Tasikmalaya -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>penjualan/tasikmalaya" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Tasikmalaya            
          </p>
          </a>
        </li>
        <!-- Baksul -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>penjualan/baksul" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Baksul           
          </p>
          </a>
        </li>
      </ul>
    </li>
    <!-- Penjualan untuk Operator Cinunuk -->
    <?php elseif(userLogin()['level'] == 2): ?>
    <li class="nav-item">
      <a href="<?= $main_url ?>penjualan/cinunuk" class="nav-link">
        <i class="nav-icon fas fa-box text-sm"></i>
        <p>Penjualan</p>
      </a>
    </li>
    <!-- Penjualan untuk Operator Cirebon -->
    <?php elseif(userLogin()['level'] == 3): ?>
    <li class="nav-item">
      <a href="<?= $main_url ?>penjualan/cirebon" class="nav-link">
        <i class="nav-icon fas fa-box text-sm"></i>
        <p>Penjualan</p>
      </a>
    </li>
    <!-- Penjualan untuk Operator Tasikmalaya -->
    <?php elseif(userLogin()['level'] == 4): ?>
    <li class="nav-item">
      <a href="<?= $main_url ?>penjualan/tasikmalaya" class="nav-link">
        <i class="nav-icon fas fa-box text-sm"></i>
        <p>Penjualan</p>
      </a>
    </li>
    <!-- Penjualan untuk Operator Baksul -->
    <?php elseif(userLogin()['level'] == 5): ?>
    <li class="nav-item">
      <a href="<?= $main_url ?>penjualan/baksul" class="nav-link">
        <i class="nav-icon fas fa-box text-sm"></i>
        <p>Penjualan</p>
      </a>
    </li>
    <?php endif; ?>

    <!-- Report -->
    <li class="nav-header">Report</li>
    <!-- Setoran -->
    <?php if(userLogin()['level'] == 1): ?>
    <li class="nav-item">
      <a href="<?= $main_url ?>laporanSetoran/" class="nav-link" <?= menuHome() ?>>
        <i class="nav-icon fas fa-money-bill text-sm"></i>
        <p>Data Setoran</p>
      </a>      
    </li>
    <?php elseif(userLogin()['level'] == 2) :?>
      <li class="nav-item">
      <a href="<?= $main_url ?>setoran/form-setoran.php" class="nav-link" <?= menuHome() ?>>
        <i class="nav-icon fas fa-money-bill text-sm"></i>
        <p>Data Setoran</p>
      </a>      
    </li>
    <?php elseif(userLogin()['level'] == 3) :?>
      <li class="nav-item">
      <a href="<?= $main_url ?>setoran/form-setoran_cirebon.php" class="nav-link" <?= menuHome() ?>>
        <i class="nav-icon fas fa-money-bill text-sm"></i>
        <p>Data Setoran</p>
      </a>      
    </li>
    <?php elseif(userLogin()['level'] == 4) :?>
      <li class="nav-item">
      <a href="<?= $main_url ?>setoran/form-setoran_tasik.php" class="nav-link" <?= menuHome() ?>>
        <i class="nav-icon fas fa-money-bill text-sm"></i>
        <p>Data Setoran</p>
      </a>      
    </li>
    <?php elseif(userLogin()['level'] == 5) :?>
      <li class="nav-item">
      <a href="<?= $main_url ?>setoran/form-setoran_baksul.php" class="nav-link" <?= menuHome() ?>>
        <i class="nav-icon fas fa-money-bill text-sm"></i>
        <p>Data Setoran</p>
      </a>      
    </li>
    <?php endif; ?>
    <!-- Laporan Pembelian -->
    <?php if(userLogin()['level'] == 1): ?>
    <li class="nav-item has-treeview <?= menuMaster()?>">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-chart-pie text-sm"></i>
        <p>
          Laporan Pembelian
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview ml-3">
        <!-- Cinunuk -->
        <li class="nav-item <?= menuMaster()?>">
          <a href="<?= $main_url ?>laporanPembelian/cinunuk" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Cinunuk            
          </p>
          </a>
        </li>
        <!-- Cirebon -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>laporanPembelian/cirebon" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Cirebon            
          </p>
          </a>
        </li>
        <!-- Tasikmalaya-->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>laporanPembelian/tasikmalaya" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Tasikmalaya            
          </p>
          </a>
        </li>
        <!-- Baksul -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>laporanPembelian/baksul" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Baksul           
          </p>
          </a>
        </li>
      </ul>
    </li>
    <!-- Laporan Pembelian untuk Operator cinunuk-->
    <?php elseif (userLogin()['level'] == 2): ?>
    <li class="nav-item has-treeview <?= menuMaster()?>">
      <a href="<?= $main_url ?>LaporanPembelian/cinunuk"  class="nav-link">
        <i class="nav-icon fas fa-chart-pie text-sm"></i>
        <p>
          Laporan Pembelian
        </p>
      </a>
      </li>
    <!-- Laporan Pembelian untuk Operator Cirebon-->
    <?php elseif (userLogin()['level'] == 3): ?>
      <li class="nav-item has-treeview <?= menuMaster()?>">
        <a href="<?= $main_url ?>LaporanPembelian/cirebon"  class="nav-link">
          <i class="nav-icon fas fa-chart-pie text-sm"></i>
          <p>
            Laporan Pembelian
          </p>
        </a>
        </li>
    <!-- Laporan Pembelian untuk Operator tasikmalaya-->
    <?php elseif (userLogin()['level'] == 4): ?>
      <li class="nav-item has-treeview <?= menuMaster()?>">
        <a href="<?= $main_url ?>LaporanPembelian/tasikmalaya"  class="nav-link">
          <i class="nav-icon fas fa-chart-pie text-sm"></i>
          <p>
            Laporan Pembelian
          </p>
        </a>
        </li>
    <!-- Laporan Pembelian untuk Operator Baksul-->
    <?php elseif (userLogin()['level'] == 5): ?>
      <li class="nav-item has-treeview <?= menuMaster()?>">
        <a href="<?= $main_url ?>LaporanPembelian/baksul"  class="nav-link">
          <i class="nav-icon fas fa-chart-pie text-sm"></i>
          <p>
            Laporan Pembelian
          </p>
        </a>
        </li>
    <?php endif; ?>
<!-- Laporan Penjualan -->
    <?php if(userLogin()['level'] == 1): ?>
    <li class="nav-item has-treeview <?= menuMaster()?>">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-chart-line text-sm"></i>
        <p>
          Laporan Penjualan
        </p>
        <i class="fas fa-angle-left right"></i>
      </a>
      <ul class="nav nav-treeview ml-3">
        <!-- Cinunuk -->
        <li class="nav-item <?= menuMaster()?>">
          <a href="<?= $main_url ?>laporanPenjualan/purwakarta" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Cinunuk            
          </p>
          </a>
        </li>
        <!-- Cirebon -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>laporanPenjualan/cirebon" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Cirebon            
          </p>
          </a>
        </li>
        <!-- Tasikmalaya -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>laporanPenjualan/tasikmalaya" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Tasikmalaya            
          </p>
          </a>
        </li>
        <!-- Bandung3 -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>laporanPenjualan/baksul" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Baksul          
          </p>
          </a>
        </li>
      </ul>
    </li>

    <!-- Laporan Penjualan untuk Operator cinunuk -->
    <?php elseif(userLogin()['level'] == 2): ?>
    <li class="nav-item">
      <a href="<?= $main_url ?>LaporanPenjualan/cinunuk" class="nav-link">
        <i class="nav-icon fas fa-chart-line text-sm"></i>
        <p>Laporan Penjualan</p>
      </a>
    </li>
    <!-- Laporan Penjualan untuk Operator Cirebon -->
    <?php elseif(userLogin()['level'] == 3): ?>
    <li class="nav-item">
      <a href="<?= $main_url ?>LaporanPenjualan/cirebon" class="nav-link">
        <i class="nav-icon fas fa-chart-line text-sm"></i>
        <p>Laporan Penjualan</p>
      </a>
    </li>
    <!-- Laporan Penjualan untuk Operator tasikmalaya -->
    <?php elseif(userLogin()['level'] == 4): ?>
    <li class="nav-item">
      <a href="<?= $main_url ?>LaporanPenjualan/tasikmalaya" class="nav-link">
        <i class="nav-icon fas fa-chart-line text-sm"></i>
        <p>Laporan Penjualan</p>
      </a>
    </li>
    <!-- Laporan Penjualan untuk Operator Baksul -->
    <?php elseif(userLogin()['level'] == 5): ?>
    <li class="nav-item">
      <a href="<?= $main_url ?>LaporanPenjualan/baksul" class="nav-link">
        <i class="nav-icon fas fa-chart-line text-sm"></i>
        <p>Laporan Penjualan</p>
      </a>
    </li>
    <?php endif; ?>
<!-- Laporan Piutang -->
    <?php if(userLogin()['level'] == 1): ?>
    <li class="nav-item has-treeview <?= menuMaster()?>">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-chart-line text-sm"></i>
        <p>
          Laporan Piutang Toko
        </p>
        <i class="fas fa-angle-left right"></i>
      </a>
      <ul class="nav nav-treeview ml-3">
        <!-- Cinunuk -->
        <li class="nav-item <?= menuMaster()?>">
          <a href="<?= $main_url ?>laporanPiutang/purwakarta" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Cinunuk            
          </p>
          </a>
        </li>
        <!-- Cirebon -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>laporanPiutang/cirebon" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Cirebon           
          </p>
          </a>
        </li>
        <!-- Tasikmalaya -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>laporanPiutang/tasikmalaya" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Tasikmalaya            
          </p>
          </a>
        </li>
        <!-- Baksul -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>laporanPiutang/baksul" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Baksul            
          </p>
          </a>
        </li>
      </ul>
    </li>
    <?php endif; ?>

    <?php if(userLogin()['level'] == 1): ?>
    <li class="nav-item has-treeview <?= menuMaster()?>">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-chart-line text-sm"></i>
        <p>
          Laporan Margin
        </p>
        <i class="fas fa-angle-left right"></i>
      </a>
      <ul class="nav nav-treeview ml-3">
        <!-- Cinunuk -->
        <li class="nav-item <?= menuMaster()?>">
          <a href="<?= $main_url ?>laporanMargin/cinunuk" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Cinunuk            
          </p>
          </a>
        </li>
        <!-- Cirebon -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>laporanMargin/cirebon" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Cirebon             
          </p>
          </a>
        </li>
        <!-- Tasikmalaya -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>laporanMargin/tasikmalaya" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Tasikmalaya            
          </p>
          </a>
        </li>
        <!-- Baksul -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>laporanMargin/baksul" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Baksul            
          </p>
          </a>
        </li>
      </ul>
    </li>
    <?php endif; ?>    

    <!-- Admin Only -->
    <?php if(userLogin()['level'] == 1): ?>
    <li class="nav-item has-treeview <?= menuMaster()?>">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-warehouse text-sm"></i>
        <p>
          Laporan Stock
        </p>
        <i class="fas fa-angle-left right"></i>
      </a>
      <ul class="nav nav-treeview ml-3">
        <!-- Cinunuk -->
        <li class="nav-item <?= menuMaster()?>">
          <a href="<?= $main_url ?>stock/cinunuk/stock-purwakarta.php" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Cinunuk            
          </p>
          </a>
        </li>
        <!-- Cirebon -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>stock/cirebon/stock-cirebon.php" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Cirebon           
          </p>
          </a>
        </li>
        <!-- Tasikmalaya-->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>stock/tasikmalaya/stock-tasik.php" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Tasikmalaya            
          </p>
          </a>
        </li>
        <!-- Baksul -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>stock/baksul/stock-tangerang.php" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Baksul            
          </p>
          </a>
        </li>
      </ul>
    </li>
    <li class="nav-item has-treeview">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-cog text-sm"></i>
        <p>
          Pengaturan
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="<?= $main_url ?>user/admin/data-user.php" class="nav-link" <?= menuUser() ?>>
            <i class="far fa-circle nav-icon text-sm"></i>
            <p>Users</p>
          </a>
        </li>
      </ul>
    </li>
    <?php endif; ?>
    
  </ul>
</nav>
<!-- /.sidebar-menu -->
</div>
    <!-- /.sidebar -->
</aside>