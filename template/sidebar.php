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
        <a href="<?= $main_url ?>operator/bandung/" class="nav-link" <?= menuHome() ?>>
        <i class="nav-icon fas fa-tachometer-alt text-sm"></i>
        <p>Dashboard</p>
      </a>
      <?php elseif(userLogin()['level'] == 3): ?>
        <a href="<?= $main_url ?>operator/purwakarta/" class="nav-link" <?= menuHome() ?>>
        <i class="nav-icon fas fa-tachometer-alt text-sm"></i>
        <p>Dashboard</p>
      </a>
      <?php elseif(userLogin()['level'] == 4): ?>
        <a href="<?= $main_url ?>operator/bandung2/" class="nav-link" <?= menuHome() ?>>
        <i class="nav-icon fas fa-tachometer-alt text-sm"></i>
        <p>Dashboard</p>
      </a>
      <?php elseif(userLogin()['level'] == 5): ?>
        <a href="<?= $main_url ?>operator/bekasi/" class="nav-link" <?= menuHome() ?>>
        <i class="nav-icon fas fa-tachometer-alt text-sm"></i>
        <p>Dashboard</p>
      </a>
      <?php elseif(userLogin()['level'] == 6): ?>
        <a href="<?= $main_url ?>operator/cirebon/" class="nav-link" <?= menuHome() ?>>
        <i class="nav-icon fas fa-tachometer-alt text-sm"></i>
        <p>Dashboard</p>
      </a>
      <?php elseif(userLogin()['level'] == 7): ?>
        <a href="<?= $main_url ?>operator/garut/" class="nav-link" <?= menuHome() ?>>
        <i class="nav-icon fas fa-tachometer-alt text-sm"></i>
        <p>Dashboard</p>
      </a>
      <?php elseif(userLogin()['level'] == 8): ?>
        <a href="<?= $main_url ?>operator/jakbar/" class="nav-link" <?= menuHome() ?>>
        <i class="nav-icon fas fa-tachometer-alt text-sm"></i>
        <p>Dashboard</p>
      </a>
      <?php elseif(userLogin()['level'] == 9): ?>
        <a href="<?= $main_url ?>operator/jakpus/" class="nav-link" <?= menuHome() ?>>
        <i class="nav-icon fas fa-tachometer-alt text-sm"></i>
        <p>Dashboard</p>
      </a>
      <?php elseif(userLogin()['level'] == 10): ?>
        <a href="<?= $main_url ?>operator/jaksel/" class="nav-link" <?= menuHome() ?>>
        <i class="nav-icon fas fa-tachometer-alt text-sm"></i>
        <p>Dashboard</p>
      </a>
      <?php elseif(userLogin()['level'] == 11): ?>
        <a href="<?= $main_url ?>operator/jaktim/" class="nav-link" <?= menuHome() ?>>
        <i class="nav-icon fas fa-tachometer-alt text-sm"></i>
        <p>Dashboard</p>
      </a>
      <?php elseif(userLogin()['level'] == 12): ?>
        <a href="<?= $main_url ?>operator/tangerang/" class="nav-link" <?= menuHome() ?>>
        <i class="nav-icon fas fa-tachometer-alt text-sm"></i>
        <p>Dashboard</p>
      </a>
      <?php elseif(userLogin()['level'] == 13): ?>
        <a href="<?= $main_url ?>operator/tasikmalaya/" class="nav-link" <?= menuHome() ?>>
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
        <!-- Purwakarta -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="#" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Purwakarta
            <i class="fas fa-angle-left right"></i>
          </p>
          </a>
          <ul class="nav nav-treeview ml-2">            
            <li class="nav-item">
              <a href="<?= $main_url ?>customer/customer_purwakarta/data-customer.php" class="nav-link <?= menuCustomer() ?>">
                <i class="far fa-circle nav-icon text-sm"></i>
                <p>Customer</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= $main_url ?>barang" class="nav-link <?= menuBarang() ?>">
                <i class="far fa-circle nav-icon text-sm"></i>
                <p>Barang</p>
              </a>
            </li>
          </ul>
        </li>
        <!-- Bekasi -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="#" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Bekasi
            <i class="fas fa-angle-left right"></i>
          </p>
          </a>
          <ul class="nav nav-treeview ml-2">            
            <li class="nav-item">
              <a href="<?= $main_url ?>customer/customer_bekasi/data-customer.php" class="nav-link <?= menuCustomer() ?>">
                <i class="far fa-circle nav-icon text-sm"></i>
                <p>Customer</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= $main_url ?>barang/barang-bekasi.php" class="nav-link <?= menuBarang() ?>">
                <i class="far fa-circle nav-icon text-sm"></i>
                <p>Barang</p>
              </a>
            </li>
          </ul>
        </li>
        <!-- Bandung -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="#" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Bandung
            <i class="fas fa-angle-left right"></i>
          </p>
          </a>
          <ul class="nav nav-treeview ml-2">            
            <li class="nav-item">
              <a href="<?= $main_url ?>customer/customer_bandung/data-customer.php" class="nav-link <?= menuCustomer() ?>" class="nav-link">
                <i class="far fa-circle nav-icon text-sm"></i>
                <p>Customer</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= $main_url ?>barang/barang-bandung.php" class="nav-link <?= menuBarang() ?>">
                <i class="far fa-circle nav-icon text-sm"></i>
                <p>Barang</p>
              </a>
            </li>
          </ul>
        </li>
        <!-- Bandung2 -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="#" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Bandung 2
            <i class="fas fa-angle-left right"></i>
          </p>
          </a>
          <ul class="nav nav-treeview ml-2">            
            <li class="nav-item">
              <a href="<?= $main_url ?>customer/customer_bandung2/data-customer.php" class="nav-link <?= menuCustomer() ?>" class="nav-link">
                <i class="far fa-circle nav-icon text-sm"></i>
                <p>Customer</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= $main_url ?>barang/barang-bandung2.php" class="nav-link <?= menuBarang() ?>">
                <i class="far fa-circle nav-icon text-sm"></i>
                <p>Barang</p>
              </a>
            </li>
          </ul>
        </li>
        <!-- Garut -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="#" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Garut
            <i class="fas fa-angle-left right"></i>
          </p>
          </a>
          <ul class="nav nav-treeview ml-2">            
            <li class="nav-item">
              <a href="<?= $main_url ?>customer/customer_garut/data-customer.php" class="nav-link <?= menuCustomer() ?>" class="nav-link">
                <i class="far fa-circle nav-icon text-sm"></i>
                <p>Customer</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= $main_url ?>barang/barang-garut.php" class="nav-link <?= menuBarang() ?>">
                <i class="far fa-circle nav-icon text-sm"></i>
                <p>Barang</p>
              </a>
            </li>
          </ul>
        </li>
        <!-- Tasikmalaya -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="#" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Tasikmalaya
            <i class="fas fa-angle-left right"></i>
          </p>
          </a>
          <ul class="nav nav-treeview ml-2">            
            <li class="nav-item">
              <a href="<?= $main_url ?>customer/customer_tasik/data-customer.php" class="nav-link <?= menuCustomer() ?>" class="nav-link">
                <i class="far fa-circle nav-icon text-sm"></i>
                <p>Customer</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= $main_url ?>barang/barang-tasik.php" class="nav-link <?= menuBarang() ?>">
                <i class="far fa-circle nav-icon text-sm"></i>
                <p>Barang</p>
              </a>
            </li>
          </ul>
        </li>
        <!-- Cirebon -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="#" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Cirebon
            <i class="fas fa-angle-left right"></i>
          </p>
          </a>
          <ul class="nav nav-treeview ml-2">            
            <li class="nav-item">
              <a href="<?= $main_url ?>customer/customer_cirebon/data-customer.php" class="nav-link <?= menuCustomer() ?>" class="nav-link">
                <i class="far fa-circle nav-icon text-sm"></i>
                <p>Customer</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= $main_url ?>barang/barang-cirebon.php" class="nav-link <?= menuBarang() ?>">
                <i class="far fa-circle nav-icon text-sm"></i>
                <p>Barang</p>
              </a>
            </li>
          </ul>
        </li>
        <!-- Tangerang -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="#" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Tangerang
            <i class="fas fa-angle-left right"></i>
          </p>
          </a>
          <ul class="nav nav-treeview ml-2">            
            <li class="nav-item">
              <a href="<?= $main_url ?>customer/customer_tangerang/data-customer.php" class="nav-link <?= menuCustomer() ?>" class="nav-link">
                <i class="far fa-circle nav-icon text-sm"></i>
                <p>Customer</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= $main_url ?>barang/barang-tangerang.php" class="nav-link <?= menuBarang() ?>">
                <i class="far fa-circle nav-icon text-sm"></i>
                <p>Barang</p>
              </a>
            </li>
          </ul>
        </li>
        <!-- Jakarta Selatan -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="#" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Jakarta Selatan
            <i class="fas fa-angle-left right"></i>
          </p>
          </a>
          <ul class="nav nav-treeview ml-2">            
            <li class="nav-item">
              <a href="<?= $main_url ?>customer/customer_jaksel/data-customer.php" class="nav-link <?= menuCustomer() ?>" class="nav-link">
                <i class="far fa-circle nav-icon text-sm"></i>
                <p>Customer</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= $main_url ?>barang/barang-jaksel.php" class="nav-link <?= menuBarang() ?>">
                <i class="far fa-circle nav-icon text-sm"></i>
                <p>Barang</p>
              </a>
            </li>
          </ul>
        </li>
        <!-- Jakarta Pusat -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="#" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Jakarta Pusat
            <i class="fas fa-angle-left right"></i>
          </p>
          </a>
          <ul class="nav nav-treeview ml-2">            
            <li class="nav-item">
              <a href="<?= $main_url ?>customer/customer_jakpus/data-customer.php" class="nav-link <?= menuCustomer() ?>" class="nav-link">
                <i class="far fa-circle nav-icon text-sm"></i>
                <p>Customer</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= $main_url ?>barang/barang-jakpus.php" class="nav-link <?= menuBarang() ?>">
                <i class="far fa-circle nav-icon text-sm"></i>
                <p>Barang</p>
              </a>
            </li>
          </ul>
        </li>
        <!-- Jakarta Timur -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="#" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Jakarta Timur
            <i class="fas fa-angle-left right"></i>
          </p>
          </a>
          <ul class="nav nav-treeview ml-2">            
            <li class="nav-item">
              <a href="<?= $main_url ?>customer/customer_jaktim/data-customer.php" class="nav-link <?= menuCustomer() ?>" class="nav-link">
                <i class="far fa-circle nav-icon text-sm"></i>
                <p>Customer</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= $main_url ?>barang/barang-jaktim.php" class="nav-link <?= menuBarang() ?>">
                <i class="far fa-circle nav-icon text-sm"></i>
                <p>Barang</p>
              </a>
            </li>
          </ul>
        </li>
        <!-- Jakarta Barat -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="#" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Jakarta Barat
            <i class="fas fa-angle-left right"></i>
          </p>
          </a>
          <ul class="nav nav-treeview ml-2">            
            <li class="nav-item">
              <a href="<?= $main_url ?>customer/customer_jakbar/data-customer.php" class="nav-link <?= menuCustomer() ?>" class="nav-link">
                <i class="far fa-circle nav-icon text-sm"></i>
                <p>Customer</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= $main_url ?>barang/barang-jakbar.php" class="nav-link <?= menuBarang() ?>">
                <i class="far fa-circle nav-icon text-sm"></i>
                <p>Barang</p>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </li>
    <?php elseif (userLogin()['level'] == 3): ?>
    <!-- Stock Barang untuk Operator -->
    <li class="nav-item">
      <a href="<?= $main_url ?>stockOperator/purwakarta/stock-purwakarta.php" class="nav-link" <?= menuHome() ?>> 
        <i class="nav-icon fas fa-box text-sm"></i>
        <p>Halaman Operator</p>
      </a>
    </li>
    <?php elseif (userLogin()['level'] == 2): ?>
      <li class="nav-item">
      <a href="<?= $main_url ?>stockOperator/bandung/stock-bandung.php" class="nav-link" <?= menuHome() ?>> 
        <i class="nav-icon fas fa-box text-sm"></i>
        <p>Halaman Operator</p>
      </a>
    </li>
    <?php elseif (userLogin()['level'] == 4): ?>
      <li class="nav-item">
      <a href="<?= $main_url ?>stockOperator/bandung2/stock-bandung2.php" class="nav-link" <?= menuHome() ?>> 
        <i class="nav-icon fas fa-box text-sm"></i>
        <p>Halaman Operator</p>
      </a>
    </li>
    <?php elseif (userLogin()['level'] == 5): ?>
      <li class="nav-item">
      <a href="<?= $main_url ?>stockOperator/bekasi/stock-bekasi.php" class="nav-link" <?= menuHome() ?>> 
        <i class="nav-icon fas fa-box text-sm"></i>
        <p>Halaman Operator</p>
      </a>
    </li>
    <?php elseif (userLogin()['level'] == 6): ?>
      <li class="nav-item">
      <a href="<?= $main_url ?>stockOperator/cirebon/stock-cirebon.php" class="nav-link" <?= menuHome() ?>> 
        <i class="nav-icon fas fa-box text-sm"></i>
        <p>Halaman Operator</p>
      </a>
    </li>
    <?php elseif (userLogin()['level'] == 7): ?>
      <li class="nav-item">
      <a href="<?= $main_url ?>stockOperator/garut/stock-garut.php" class="nav-link" <?= menuHome() ?>> 
        <i class="nav-icon fas fa-box text-sm"></i>
        <p>Halaman Operator</p>
      </a>
    </li>
    <?php elseif (userLogin()['level'] == 8): ?>
      <li class="nav-item">
      <a href="<?= $main_url ?>stockOperator/jakbar/stock-jakbar.php" class="nav-link" <?= menuHome() ?>> 
        <i class="nav-icon fas fa-box text-sm"></i>
        <p>Halaman Operator</p>
      </a>
    </li>
    <?php elseif (userLogin()['level'] == 9): ?>
      <li class="nav-item">
      <a href="<?= $main_url ?>stockOperator/jakpus/stock-jakpus.php" class="nav-link" <?= menuHome() ?>> 
        <i class="nav-icon fas fa-box text-sm"></i>
        <p>Halaman Operator</p>
      </a>
    </li>
    <?php elseif (userLogin()['level'] == 10): ?>
      <li class="nav-item">
      <a href="<?= $main_url ?>stockOperator/jaksel/stock-jaksel.php" class="nav-link" <?= menuHome() ?>> 
        <i class="nav-icon fas fa-box text-sm"></i>
        <p>Halaman Operator</p>
      </a>
    </li>
    <?php elseif (userLogin()['level'] == 11): ?>
      <li class="nav-item">
      <a href="<?= $main_url ?>stockOperator/jaktim/stock-jaktim.php" class="nav-link" <?= menuHome() ?>> 
        <i class="nav-icon fas fa-box text-sm"></i>
        <p>Halaman Operator</p>
      </a>
    </li>
    <?php elseif (userLogin()['level'] == 12): ?>
      <li class="nav-item">
      <a href="<?= $main_url ?>stockOperator/tangerang/stock-tangerang.php" class="nav-link" <?= menuHome() ?>> 
        <i class="nav-icon fas fa-box text-sm"></i>
        <p>Halaman Operator</p>
      </a>
    </li>
    <?php elseif (userLogin()['level'] == 13): ?>
      <li class="nav-item">
      <a href="<?= $main_url ?>stockOperator/tasikmalaya/stock-tasik.php" class="nav-link" <?= menuHome() ?>> 
        <i class="nav-icon fas fa-box text-sm"></i>
        <p>Halaman Operator</p>
      </a>
    </li>
    <?php endif; ?>

    <li class="nav-header">Transaksi</li>
    <!-- Pembelian -->
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
        <!-- Purwakarta -->
        <li class="nav-item <?= menuMaster()?>">
          <a href="<?= $main_url ?>pembelian/purwakarta" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Purwakarta            
          </p>
          </a>
        </li>
        <!-- Bekasi -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>pembelian/bekasi" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Bekasi            
          </p>
          </a>
        </li>
        <!-- Bandung -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>pembelian/bandung" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Bandung            
          </p>
          </a>
        </li>
        <!-- Bandung2 -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>pembelian/bandung2" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Bandung 2            
          </p>
          </a>
        </li>
        <!-- Garut -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>pembelian/garut" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Garut            
          </p>
          </a>
        </li>
        <!-- Tasikmalaya -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>pembelian/tasikmalaya" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Tasikmalaya            
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
        <!-- Tangerang -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>pembelian/tangerang" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Tangerang            
          </p>
          </a>
        </li>
        <!-- Jakarta Selatan -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>pembelian/jaksel" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Jakarta Selatan            
          </p>
          </a>
        </li>
        <!-- Jakarta Pusat -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>pembelian/jakpus" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Jakarta Pusat            
          </p>
          </a>
        </li>
        <!-- Jakarta Timur -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>pembelian/jaktim" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Jakarta Timur            
          </p>
          </a>
        </li>
        <!-- Jakarta Barat -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>pembelian/jakbar" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Jakarta Barat            
          </p>
          </a>
        </li>
      </ul>
    </li>
    <?php elseif (userLogin()['level'] == 2): ?>
    <!-- Pembelian untuk Operator Bandung-->
    <li class="nav-item has-treeview <?= menuMaster()?>">
      <a href="<?= $main_url ?>pembelian/bandung"  class="nav-link">
        <i class="nav-icon fas fa-shopping-cart text-sm"></i>
        <p>
          Pembelian
        </p>
      </a>
      </li>
    <?php elseif (userLogin()['level'] == 3): ?>
    <!-- Pembelian untuk Operator Purwakarta -->
      <li class="nav-item has-treeview <?= menuMaster()?>">
        <a href="<?= $main_url ?>pembelian/purwakarta"  class="nav-link">
          <i class="nav-icon fas fa-shopping-cart text-sm"></i>
          <p>
            Pembelian
          </p>
        </a>
        </li>
    <?php elseif (userLogin()['level'] == 4): ?>
    <!-- Pembelian untuk Operator bandung2 -->
      <li class="nav-item has-treeview <?= menuMaster()?>">
        <a href="<?= $main_url ?>pembelian/bandung2"  class="nav-link">
          <i class="nav-icon fas fa-shopping-cart text-sm"></i>
          <p>
            Pembelian
          </p>
        </a>
        </li>
    <?php elseif (userLogin()['level'] == 5): ?>
    <!-- Pembelian untuk Operator bekasi -->
      <li class="nav-item has-treeview <?= menuMaster()?>">
        <a href="<?= $main_url ?>pembelian/bekasi"  class="nav-link">
          <i class="nav-icon fas fa-shopping-cart text-sm"></i>
          <p>
            Pembelian
          </p>
        </a>
        </li>
    <?php elseif (userLogin()['level'] == 6): ?>
    <!-- Pembelian untuk Operator cirebon -->
      <li class="nav-item has-treeview <?= menuMaster()?>">
        <a href="<?= $main_url ?>pembelian/cirebon"  class="nav-link">
          <i class="nav-icon fas fa-shopping-cart text-sm"></i>
          <p>
            Pembelian
          </p>
        </a>
        </li>
    <?php elseif (userLogin()['level'] == 7): ?>
    <!-- Pembelian untuk Operator garut -->
      <li class="nav-item has-treeview <?= menuMaster()?>">
        <a href="<?= $main_url ?>pembelian/garut"  class="nav-link">
          <i class="nav-icon fas fa-shopping-cart text-sm"></i>
          <p>
            Pembelian
          </p>
        </a>
        </li>
        <?php elseif (userLogin()['level'] == 8): ?>
    <!-- Pembelian untuk Operator jakbar -->
      <li class="nav-item has-treeview <?= menuMaster()?>">
        <a href="<?= $main_url ?>pembelian/jakbar"  class="nav-link">
          <i class="nav-icon fas fa-shopping-cart text-sm"></i>
          <p>
            Pembelian
          </p>
        </a>
        </li>
        <?php elseif (userLogin()['level'] == 9): ?>
    <!-- Pembelian untuk Operator jakpus -->
      <li class="nav-item has-treeview <?= menuMaster()?>">
        <a href="<?= $main_url ?>pembelian/jakpus"  class="nav-link">
          <i class="nav-icon fas fa-shopping-cart text-sm"></i>
          <p>
            Pembelian
          </p>
        </a>
        </li>
    <?php elseif (userLogin()['level'] == 10): ?>
    <!-- Pembelian untuk Operator jaksel -->
      <li class="nav-item has-treeview <?= menuMaster()?>">
        <a href="<?= $main_url ?>pembelian/jaksel"  class="nav-link">
          <i class="nav-icon fas fa-shopping-cart text-sm"></i>
          <p>
            Pembelian
          </p>
        </a>
        </li>
    <?php elseif (userLogin()['level'] == 11): ?>
    <!-- Pembelian untuk Operator jaktim -->
      <li class="nav-item has-treeview <?= menuMaster()?>">
        <a href="<?= $main_url ?>pembelian/jaktim"  class="nav-link">
          <i class="nav-icon fas fa-shopping-cart text-sm"></i>
          <p>
            Pembelian
          </p>
        </a>
        </li>
    <?php elseif (userLogin()['level'] == 12): ?>
    <!-- Pembelian untuk Operator tangerang -->
      <li class="nav-item has-treeview <?= menuMaster()?>">
        <a href="<?= $main_url ?>pembelian/tangerang"  class="nav-link">
          <i class="nav-icon fas fa-shopping-cart text-sm"></i>
          <p>
            Pembelian
          </p>
        </a>
        </li>
    <?php elseif (userLogin()['level'] == 13): ?>
    <!-- Pembelian untuk Operator tasikmalaya -->
      <li class="nav-item has-treeview <?= menuMaster()?>">
        <a href="<?= $main_url ?>pembelian/tasikmalaya"  class="nav-link">
          <i class="nav-icon fas fa-shopping-cart text-sm"></i>
          <p>
            Pembelian
          </p>
        </a>
        </li>
    <?php endif; ?>
    <!-- Penjualan -->
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
        <!-- Purwakarta -->
        <li class="nav-item <?= menuMaster()?>">
          <a href="<?= $main_url ?>penjualan/purwakarta" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Purwakarta            
          </p>
          </a>
        </li>
        <!-- Bekasi -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>penjualan/bekasi" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Bekasi            
          </p>
          </a>
        </li>
        <!-- Bandung -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>penjualan/bandung" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Bandung            
          </p>
          </a>
        </li>
        <!-- Bandung2 -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>penjualan/bandung2" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Bandung 2            
          </p>
          </a>
        </li>
        <!-- Garut -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>penjualan/garut" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Garut            
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
        <!-- Cirebon -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>penjualan/cirebon" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Cirebon            
          </p>
          </a>
        </li>
        <!-- Tangerang -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>penjualan/tangerang" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Tangerang            
          </p>
          </a>
        </li>
        <!-- Jakarta Selatan -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>penjualan/jaksel" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Jakarta Selatan            
          </p>
          </a>
        </li>
        <!-- Jakarta Pusat -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>penjualan/jakpus" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Jakarta Pusat            
          </p>
          </a>
        </li>
        <!-- Jakarta Timur -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>penjualan/jaktim" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Jakarta Timur            
          </p>
          </a>
        </li>
        <!-- Jakarta Barat -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>penjualan/jakbar" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Jakarta Barat            
          </p>
          </a>
        </li>
      </ul>
    </li>
    <?php elseif(userLogin()['level'] == 2): ?>
    <!-- Penjualan untuk Operator Bandung -->
    <li class="nav-item">
      <a href="<?= $main_url ?>penjualan/bandung" class="nav-link">
        <i class="nav-icon fas fa-box text-sm"></i>
        <p>Penjualan</p>
      </a>
    </li>
    <?php elseif(userLogin()['level'] == 3): ?>
    <!-- Penjualan untuk Operator purwakarta -->
    <li class="nav-item">
      <a href="<?= $main_url ?>penjualan/purwakarta" class="nav-link">
        <i class="nav-icon fas fa-box text-sm"></i>
        <p>Penjualan</p>
      </a>
    </li>
    <?php elseif(userLogin()['level'] == 4): ?>
    <!-- Penjualan untuk Operator Bandung2 -->
    <li class="nav-item">
      <a href="<?= $main_url ?>penjualan/bandung2" class="nav-link">
        <i class="nav-icon fas fa-box text-sm"></i>
        <p>Penjualan</p>
      </a>
    </li>
    <?php elseif(userLogin()['level'] == 5): ?>
    <!-- Penjualan untuk Operator bekasi -->
    <li class="nav-item">
      <a href="<?= $main_url ?>penjualan/bekasi" class="nav-link">
        <i class="nav-icon fas fa-box text-sm"></i>
        <p>Penjualan</p>
      </a>
    </li>
    <?php elseif(userLogin()['level'] == 6): ?>
    <!-- Penjualan untuk Operator cirebon -->
    <li class="nav-item">
      <a href="<?= $main_url ?>penjualan/cirebon" class="nav-link">
        <i class="nav-icon fas fa-box text-sm"></i>
        <p>Penjualan</p>
      </a>
    </li>
    <?php elseif(userLogin()['level'] == 7): ?>
    <!-- Penjualan untuk Operator garut -->
    <li class="nav-item">
      <a href="<?= $main_url ?>penjualan/garut" class="nav-link">
        <i class="nav-icon fas fa-box text-sm"></i>
        <p>Penjualan</p>
      </a>
    </li>
    <?php elseif(userLogin()['level'] == 8): ?>
    <!-- Penjualan untuk Operator jakbar -->
    <li class="nav-item">
      <a href="<?= $main_url ?>penjualan/jakbar" class="nav-link">
        <i class="nav-icon fas fa-box text-sm"></i>
        <p>Penjualan</p>
      </a>
    </li>
    <?php elseif(userLogin()['level'] == 9): ?>
    <!-- Penjualan untuk Operator jakpus -->
    <li class="nav-item">
      <a href="<?= $main_url ?>penjualan/jakpus" class="nav-link">
        <i class="nav-icon fas fa-box text-sm"></i>
        <p>Penjualan</p>
      </a>
    </li>
    <?php elseif(userLogin()['level'] == 10): ?>
    <!-- Penjualan untuk Operator jaksel -->
    <li class="nav-item">
      <a href="<?= $main_url ?>penjualan/jaksel" class="nav-link">
        <i class="nav-icon fas fa-box text-sm"></i>
        <p>Penjualan</p>
      </a>
    </li>
    <?php elseif(userLogin()['level'] == 11): ?>
    <!-- Penjualan untuk Operator jaktim -->
    <li class="nav-item">
      <a href="<?= $main_url ?>penjualan/jaktim" class="nav-link">
        <i class="nav-icon fas fa-box text-sm"></i>
        <p>Penjualan</p>
      </a>
    </li>
    <?php elseif(userLogin()['level'] == 12): ?>
    <!-- Penjualan untuk Operator Tangerang -->
    <li class="nav-item">
      <a href="<?= $main_url ?>penjualan/Tangerang" class="nav-link">
        <i class="nav-icon fas fa-box text-sm"></i>
        <p>Penjualan</p>
      </a>
    </li>
    <?php elseif(userLogin()['level'] == 13): ?>
    <!-- Penjualan untuk Operator tasikmalaya -->
    <li class="nav-item">
      <a href="<?= $main_url ?>penjualan/tasikmalaya" class="nav-link">
        <i class="nav-icon fas fa-box text-sm"></i>
        <p>Penjualan</p>
      </a>
    </li>
    <?php endif; ?>

    <!-- Report -->
    <li class="nav-header">Report</li>
    
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
        <!-- Purwakarta -->
        <li class="nav-item <?= menuMaster()?>">
          <a href="<?= $main_url ?>laporanPembelian/purwakarta" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Purwakarta            
          </p>
          </a>
        </li>
        <!-- Bekasi -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>laporanPembelian/bekasi" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Bekasi            
          </p>
          </a>
        </li>
        <!-- Bandung -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>laporanPembelian/bandung" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Bandung            
          </p>
          </a>
        </li>
        <!-- Bandung2 -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>laporanPembelian/bandung2" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Bandung 2            
          </p>
          </a>
        </li>
        <!-- Garut -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>laporanPembelian/garut" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Garut            
          </p>
          </a>
        </li>
        <!-- Tasikmalaya -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>laporanPembelian/tasikmalaya" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Tasikmalaya            
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
        <!-- Tangerang -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>laporanPembelian/tangerang" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Tangerang            
          </p>
          </a>
        </li>
        <!-- Jakarta Selatan -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>laporanPembelian/jaksel" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Jakarta Selatan            
          </p>
          </a>
        </li>
        <!-- Jakarta Pusat -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>laporanPembelian/jakpus" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Jakarta Pusat            
          </p>
          </a>
        </li>
        <!-- Jakarta Timur -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>laporanPembelian/jaktim" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Jakarta Timur            
          </p>
          </a>
        </li>
        <!-- Jakarta Barat -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>laporanPembelian/jakbar" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Jakarta Barat            
          </p>
          </a>
        </li>
      </ul>
    </li>
    
    <?php elseif (userLogin()['level'] == 2): ?>
    <!-- Pembelian untuk Operator Bandung-->
    <li class="nav-item has-treeview <?= menuMaster()?>">
      <a href="<?= $main_url ?>LaporanPembelian/bandung"  class="nav-link">
        <i class="nav-icon fas fa-chart-pie text-sm"></i>
        <p>
          Laporan Pembelian
        </p>
      </a>
      </li>
    <?php elseif (userLogin()['level'] == 3): ?>
    <!-- Pembelian untuk Operator Purwakarta -->
      <li class="nav-item has-treeview <?= menuMaster()?>">
        <a href="<?= $main_url ?>LaporanPembelian/purwakarta"  class="nav-link">
          <i class="nav-icon fas fa-chart-pie text-sm"></i>
          <p>
            Laporan Pembelian
          </p>
        </a>
        </li>
    <?php elseif (userLogin()['level'] == 4): ?>
    <!-- Pembelian untuk Operator bandung2 -->
      <li class="nav-item has-treeview <?= menuMaster()?>">
        <a href="<?= $main_url ?>LaporanPembelian/bandung2"  class="nav-link">
          <i class="nav-icon fas fa-chart-pie text-sm"></i>
          <p>
            Laporan Pembelian
          </p>
        </a>
        </li>
    <?php elseif (userLogin()['level'] == 5): ?>
    <!-- Pembelian untuk Operator bekasi -->
      <li class="nav-item has-treeview <?= menuMaster()?>">
        <a href="<?= $main_url ?>LaporanPembelian/bekasi"  class="nav-link">
          <i class="nav-icon fas fa-chart-pie text-sm"></i>
          <p>
            Laporan Pembelian
          </p>
        </a>
        </li>
    <?php elseif (userLogin()['level'] == 6): ?>
    <!-- Pembelian untuk Operator cirebon -->
      <li class="nav-item has-treeview <?= menuMaster()?>">
        <a href="<?= $main_url ?>LaporanPembelian/cirebon"  class="nav-link">
          <i class="nav-icon fas fa-chart-pie text-sm"></i>
          <p>
            Laporan Pembelian
          </p>
        </a>
        </li>
    <?php elseif (userLogin()['level'] == 7): ?>
    <!-- Pembelian untuk Operator garut -->
      <li class="nav-item has-treeview <?= menuMaster()?>">
        <a href="<?= $main_url ?>LaporanPembelian/garut"  class="nav-link">
          <i class="nav-icon fas fa-chart-pie text-sm"></i>
          <p>
            Laporan Pembelian
          </p>
        </a>
        </li>
        <?php elseif (userLogin()['level'] == 8): ?>
    <!-- Pembelian untuk Operator jakbar -->
      <li class="nav-item has-treeview <?= menuMaster()?>">
        <a href="<?= $main_url ?>LaporanPembelian/jakbar"  class="nav-link">
          <i class="nav-icon fas fa-chart-pie text-sm"></i>
          <p>
            Laporan Pembelian
          </p>
        </a>
        </li>
        <?php elseif (userLogin()['level'] == 9): ?>
    <!-- Pembelian untuk Operator jakpus -->
      <li class="nav-item has-treeview <?= menuMaster()?>">
        <a href="<?= $main_url ?>LaporanPembelian/jakpus"  class="nav-link">
          <i class="nav-icon fas fa-chart-pie text-sm"></i>
          <p>
            Laporan Pembelian
          </p>
        </a>
        </li>
    <?php elseif (userLogin()['level'] == 10): ?>
    <!-- Pembelian untuk Operator jaksel -->
      <li class="nav-item has-treeview <?= menuMaster()?>">
        <a href="<?= $main_url ?>LaporanPembelian/jaksel"  class="nav-link">
          <i class="nav-icon fas fa-chart-pie text-sm"></i>
          <p>
            Laporan Pembelian
          </p>
        </a>
        </li>
    <?php elseif (userLogin()['level'] == 11): ?>
    <!-- Pembelian untuk Operator jaktim -->
      <li class="nav-item has-treeview <?= menuMaster()?>">
        <a href="<?= $main_url ?>LaporanPembelian/jaktim"  class="nav-link">
          <i class="nav-icon fas fa-chart-pie text-sm"></i>
          <p>
            Laporan Pembelian
          </p>
        </a>
        </li>
    <?php elseif (userLogin()['level'] == 12): ?>
    <!-- Pembelian untuk Operator tangerang -->
      <li class="nav-item has-treeview <?= menuMaster()?>">
        <a href="<?= $main_url ?>LaporanPembelian/tangerang"  class="nav-link">
          <i class="nav-icon fas fa-chart-pie text-sm"></i>
          <p>
            Laporan Pembelian
          </p>
        </a>
        </li>
    <?php elseif (userLogin()['level'] == 13): ?>
    <!-- Pembelian untuk Operator tasikmalaya -->
     <li class="nav-item has-treeview <?= menuMaster()?>">
        <a href="<?= $main_url ?>LaporanPembelian/tangerang"  class="nav-link">
          <i class="nav-icon fas fa-chart-pie text-sm"></i>
          <p>
            Laporan Pembelian
          </p>
        </a>
        </li></p>
    <?php endif; ?>

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
        <!-- Purwakarta -->
        <li class="nav-item <?= menuMaster()?>">
          <a href="<?= $main_url ?>laporanPenjualan/purwakarta" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Purwakarta            
          </p>
          </a>
        </li>
        <!-- Bekasi -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>laporanPenjualan/bekasi" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Bekasi            
          </p>
          </a>
        </li>
        <!-- Bandung -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>laporanPenjualan/bandung" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Bandung            
          </p>
          </a>
        </li>
        <!-- Bandung2 -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>laporanPenjualan/bandung2" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Bandung 2            
          </p>
          </a>
        </li>
        <!-- Garut -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>laporanPenjualan/garut" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Garut            
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
        <!-- Cirebon -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>laporanPenjualan/cirebon" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Cirebon            
          </p>
          </a>
        </li>
        <!-- Tangerang -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>laporanPenjualan/tangerang" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Tangerang            
          </p>
          </a>
        </li>
        <!-- Jakarta Selatan -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>laporanPenjualan/jaksel" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Jakarta Selatan            
          </p>
          </a>
        </li>
        <!-- Jakarta Pusat -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>laporanPenjualan/jakpus" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Jakarta Pusat            
          </p>
          </a>
        </li>
        <!-- Jakarta Timur -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>laporanPenjualan/jaktim" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Jakarta Timur            
          </p>
          </a>
        </li>
        <!-- Jakarta Barat -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>laporanPenjualan/jakbar" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Jakarta Barat            
          </p>
          </a>
        </li>
      </ul>
    </li>

    <?php elseif(userLogin()['level'] == 2): ?>
    <!-- Penjualan untuk Operator Bandung -->
    <li class="nav-item">
      <a href="<?= $main_url ?>LaporanPenjualan/bandung" class="nav-link">
        <i class="nav-icon fas fa-chart-line text-sm"></i>
        <p>Laporan Penjualan</p>
      </a>
    </li>
    <?php elseif(userLogin()['level'] == 3): ?>
    <!-- Penjualan untuk Operator purwakarta -->
    <li class="nav-item">
      <a href="<?= $main_url ?>LaporanPenjualan/purwakarta" class="nav-link">
        <i class="nav-iconfas fa-chart-line text-sm"></i>
        <p>Laporan Penjualan</p>
      </a>
    </li>
    <?php elseif(userLogin()['level'] == 4): ?>
    <!-- Penjualan untuk Operator Bandung2 -->
    <li class="nav-item">
      <a href="<?= $main_url ?>LaporanPenjualan/bandung2" class="nav-link">
        <i class="nav-iconfas fa-chart-line text-sm"></i>
        <p>Laporan Penjualan</p>
      </a>
    </li>
    <?php elseif(userLogin()['level'] == 5): ?>
    <!-- Penjualan untuk Operator bekasi -->
    <li class="nav-item">
      <a href="<?= $main_url ?>LaporanPenjualan/bekasi" class="nav-link">
        <i class="nav-iconfas fa-chart-line text-sm"></i>
        <p>Laporan Penjualan</p>
      </a>
    </li>
    <?php elseif(userLogin()['level'] == 6): ?>
    <!-- Penjualan untuk Operator cirebon -->
    <li class="nav-item">
      <a href="<?= $main_url ?>LaporanPenjualan/cirebon" class="nav-link">
        <i class="nav-iconfas fa-chart-line text-sm"></i>
        <p>Laporan Penjualan</p>
      </a>
    </li>
    <?php elseif(userLogin()['level'] == 7): ?>
    <!-- Penjualan untuk Operator garut -->
    <li class="nav-item">
      <a href="<?= $main_url ?>LaporanPenjualan/garut" class="nav-link">
        <i class="nav-iconfas fa-chart-line text-sm"></i>
        <p>Laporan Penjualan</p>
      </a>
    </li>
    <?php elseif(userLogin()['level'] == 8): ?>
    <!-- Penjualan untuk Operator jakbar -->
    <li class="nav-item">
      <a href="<?= $main_url ?>LaporanPenjualan/jakbar" class="nav-link">
        <i class="nav-iconfas fa-chart-line text-sm"></i>
        <p>Laporan Penjualan</p>
      </a>
    </li>
    <?php elseif(userLogin()['level'] == 9): ?>
    <!-- Penjualan untuk Operator jakpus -->
    <li class="nav-item">
      <a href="<?= $main_url ?>LaporanPenjualan/jakpus" class="nav-link">
        <i class="nav-iconfas fa-chart-line text-sm"></i>
        <p>Laporan Penjualan</p>
      </a>
    </li>
    <?php elseif(userLogin()['level'] == 10): ?>
    <!-- Penjualan untuk Operator jaksel -->
    <li class="nav-item">
      <a href="<?= $main_url ?>LaporanPenjualan/jaksel" class="nav-link">
        <i class="nav-iconfas fa-chart-line text-sm"></i>
        <p>Laporan Penjualan</p>
      </a>
    </li>
    <?php elseif(userLogin()['level'] == 11): ?>
    <!-- Penjualan untuk Operator jaktim -->
    <li class="nav-item">
      <a href="<?= $main_url ?>LaporanPenjualan/jaktim" class="nav-link">
        <i class="nav-iconfas fa-chart-line text-sm"></i>
        <p>Laporan Penjualan</p>
      </a>
    </li>
    <?php elseif(userLogin()['level'] == 12): ?>
    <!-- Penjualan untuk Operator Tangerang -->
    <li class="nav-item">
      <a href="<?= $main_url ?>LaporanPenjualan/Tangerang" class="nav-link">
        <i class="nav-iconfas fa-chart-line text-sm"></i>
        <p>Laporan Penjualan</p>
      </a>
    </li>
    <?php elseif(userLogin()['level'] == 13): ?>
    <!-- Penjualan untuk Operator tasikmalaya -->
    <li class="nav-item">
      <a href="<?= $main_url ?>LaporanPenjualan/tasikmalaya" class="nav-link">
        <i class="nav-iconfas fa-chart-line text-sm"></i>
        <p>Laporan Penjualan</p>
      </a>
    </li>
    <?php endif; ?>

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
        <!-- Purwakarta -->
        <li class="nav-item <?= menuMaster()?>">
          <a href="<?= $main_url ?>laporanPiutang/purwakarta" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Purwakarta            
          </p>
          </a>
        </li>
        <!-- Bekasi -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>laporanPiutang/bekasi" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Bekasi            
          </p>
          </a>
        </li>
        <!-- Bandung -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>laporanPiutang/bandung" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Bandung            
          </p>
          </a>
        </li>
        <!-- Bandung2 -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>laporanPiutang/bandung2" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Bandung 2            
          </p>
          </a>
        </li>
        <!-- Garut -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>laporanPiutang/garut" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Garut            
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
        <!-- Cirebon -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>laporanPiutang/cirebon" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Cirebon            
          </p>
          </a>
        </li>
        <!-- Tangerang -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>laporanPiutang/tangerang" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Tangerang            
          </p>
          </a>
        </li>
        <!-- Jakarta Selatan -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>laporanPiutang/jaksel" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Jakarta Selatan            
          </p>
          </a>
        </li>
        <!-- Jakarta Pusat -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>laporanPiutang/jakpus" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Jakarta Pusat            
          </p>
          </a>
        </li>
        <!-- Jakarta Timur -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>laporanPiutang/jaktim" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Jakarta Timur            
          </p>
          </a>
        </li>
        <!-- Jakarta Barat -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>laporanPiutang/jakbar" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Jakarta Barat            
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
        <!-- Purwakarta -->
        <li class="nav-item <?= menuMaster()?>">
          <a href="<?= $main_url ?>laporanMargin/purwakarta" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Purwakarta            
          </p>
          </a>
        </li>
        <!-- Bekasi -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>laporanMargin/bekasi" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Bekasi            
          </p>
          </a>
        </li>
        <!-- Bandung -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>laporanMargin/bandung" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Bandung            
          </p>
          </a>
        </li>
        <!-- Bandung2 -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>laporanMargin/bandung2" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Bandung 2            
          </p>
          </a>
        </li>
        <!-- Garut -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>laporanMargin/garut" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Garut            
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
        <!-- Cirebon -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>laporanMargin/cirebon" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Cirebon            
          </p>
          </a>
        </li>
        <!-- Tangerang -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>laporanMargin/tangerang" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Tangerang            
          </p>
          </a>
        </li>
        <!-- Jakarta Selatan -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>laporanMargin/jaksel" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Jakarta Selatan            
          </p>
          </a>
        </li>
        <!-- Jakarta Pusat -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>laporanMargin/jakpus" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Jakarta Pusat            
          </p>
          </a>
        </li>
        <!-- Jakarta Timur -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>laporanMargin/jaktim" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Jakarta Timur            
          </p>
          </a>
        </li>
        <!-- Jakarta Barat -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>laporanMargin/jakbar" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Jakarta Barat            
          </p>
          </a>
        </li>
      </ul>
    </li>
    <?php endif; ?>
    <!-- Setoran -->
    <?php if(userLogin()['level'] == 1): ?>
    <li class="nav-item has-treeview <?= menuMaster()?>">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-chart-line text-sm"></i>
        <p>
          Data Setoran
        </p>
        <i class="fas fa-angle-left right"></i>
      </a>
      <ul class="nav nav-treeview ml-3">
        <!-- Purwakarta -->
        <li class="nav-item <?= menuMaster()?>">
          <a href="<?= $main_url ?>laporanSetoran/" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Purwakarta            
          </p>
          </a>
        </li>
        <!-- Bekasi -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>laporanMargin/bekasi" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Bekasi            
          </p>
          </a>
        </li>
        <!-- Bandung -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>laporanMargin/bandung" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Bandung            
          </p>
          </a>
        </li>
        <!-- Bandung2 -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>laporanMargin/bandung2" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Bandung 2            
          </p>
          </a>
        </li>
        <!-- Garut -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>laporanMargin/garut" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Garut            
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
        <!-- Cirebon -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>laporanMargin/cirebon" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Cirebon            
          </p>
          </a>
        </li>
        <!-- Tangerang -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>laporanMargin/tangerang" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Tangerang            
          </p>
          </a>
        </li>
        <!-- Jakarta Selatan -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>laporanMargin/jaksel" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Jakarta Selatan            
          </p>
          </a>
        </li>
        <!-- Jakarta Pusat -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>laporanMargin/jakpus" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Jakarta Pusat            
          </p>
          </a>
        </li>
        <!-- Jakarta Timur -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>laporanMargin/jaktim" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Jakarta Timur            
          </p>
          </a>
        </li>
        <!-- Jakarta Barat -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>laporanMargin/jakbar" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Jakarta Barat            
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
        <!-- Purwakarta -->
        <li class="nav-item <?= menuMaster()?>">
          <a href="<?= $main_url ?>stock/purwakarta/stock-purwakarta.php" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Purwakarta            
          </p>
          </a>
        </li>
        <!-- Bekasi -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>stock/bekasi/stock-bekasi.php" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Bekasi            
          </p>
          </a>
        </li>
        <!-- Bandung -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>stock/bandung/stock-bandung.php" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Bandung            
          </p>
          </a>
        </li>
        <!-- Bandung2 -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>stock/bandung2/stock-bandung2.php" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Bandung 2            
          </p>
          </a>
        </li>
        <!-- Garut -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>stock/garut/stock-garut.php" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Garut            
          </p>
          </a>
        </li>
        <!-- Tasikmalaya -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>stock/tasikmalaya/stock-tasik.php" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Tasikmalaya            
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
        <!-- Tangerang -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>stock/tangerang/stock-tangerang.php" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Tangerang            
          </p>
          </a>
        </li>
        <!-- Jakarta Selatan -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>stock/jaksel/stock-jaksel.php" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Jakarta Selatan            
          </p>
          </a>
        </li>
        <!-- Jakarta Pusat -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>stock/jakpus/stock-jakpus.php" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Jakarta Pusat            
          </p>
          </a>
        </li>
        <!-- Jakarta Timur -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>stock/jaktim/stock-jaktim.php" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Jakarta Timur            
          </p>
          </a>
        </li>
        <!-- Jakarta Barat -->
        <li class="nav-item has-treeview <?= menuMaster()?>">
          <a href="<?= $main_url ?>stock/jakbar/stock-jakbar.php" class="nav-link">
          <i class=" nav-icon fas fa-map-pin text-sm"></i>
          <p>
            Jakarta Barat            
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