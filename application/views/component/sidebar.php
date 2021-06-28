<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="index.html">Sarana Crowdfunding</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="index.html">SRN</a>
    </div>
    <ul class="sidebar-menu">
      <?php
      $uriSegments = explode(
        "/",
        parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH)
      );
      $url = $uriSegments[2];
      ?>
      <li class="menu-header">Main</li>
      <li <?= $url == "dashboard"
        ? 'class="active"'
        : "" ?>><a class="nav-link" href="<?= base_url(
  "dashboard"
) ?>"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>
      <li class="menu-header">Data</li>
      <li <?= $url == "donation"
        ? 'class="active"'
        : "" ?>><a class="nav-link" href="<?= base_url(
  "donation"
) ?>"><i class="fas fa-donate"></i> <span>Donation</span></a></li>
      <li <?= $url == "campaign" || $url == "newlanguage"
        ? 'class="active"'
        : "" ?>><a class="nav-link" href="<?= base_url(
  "campaign"
) ?>"><i class="fas fa-flag"></i> <span>Campaign</span></a></li>
      <li <?= $url == "category"
        ? 'class="active"'
        : "" ?>><a class="nav-link" href="<?= base_url(
  "category"
) ?>"><i class="fas fa-flag"></i> <span>Campaign Category</span></a></li>
      <li <?= $url == "participant"
        ? 'class="active"'
        : "" ?>><a class="nav-link" href="<?= base_url(
  "participant"
) ?>"><i class="fas fa-users"></i> <span>Participant</span></a></li>
      <li class="menu-header">Setting</li>
      <li <?= $url == "profile"
        ? 'class="active"'
        : "" ?>><a class="nav-link" href="<?= base_url(
  "penjualan"
) ?>"><i class="fas fa-user"></i> <span>Profile</span></a></li>
      <!-- <li <?= $url == "customer"
        ? 'class="active"'
        : "" ?>><a class="nav-link" href="<?= base_url(
  "customer"
) ?>"><i class="fas fa-users"></i> <span>Customer</span></a></li>
              <li <?= $url == "artikel" ||
              $url == "tambah_artikel" ||
              $url == "detail_artikel" ||
              $url == "update_artikel"
                ? 'class="active"'
                : "" ?>><a class="nav-link" href="<?= base_url(
  "artikel"
) ?>"><i class="far fa-newspaper"></i> <span>Artikel</span></a></li>
              <li <?= $url == "user_admin"
                ? 'class="active"'
                : "" ?>><a class="nav-link" href="<?= base_url(
  "user_admin"
) ?>"><i class="fas fa-cogs"></i> <span>Admin</span></a></li> -->
    </ul>

    <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
      <a href="<?= base_url() .
        "clogin/logout" ?>" class="btn btn-danger btn-lg btn-block btn-icon-split">
        <i class="fas fa-power-off"></i> Log Out
      </a>
    </div>
  </aside>
</div>