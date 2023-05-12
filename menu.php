<div id="layoutSidenav">
  <div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
      <div class="sb-sidenav-menu">
        <div class="nav">
          <div class="sb-sidenav-menu-heading">Core</div>
          <a class="nav-link" href="index.php">
            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
            Dashboard
          </a>
          <div class="sb-sidenav-menu-heading">Interface</div>
          <a class="nav-link" href="index.php?page=orders">
            Orders
          </a>
          <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#masterData" aria-expanded="false" aria-controls="masterData">
            Master Data
            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
          </a>
          <div class="collapse" id="masterData" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
            <nav class="sb-sidenav-menu-nested nav">
              <a class="nav-link" href="index.php?page=customers">
                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                Customer Data
              </a>
              <a class="nav-link" href="index.php?page=cards">
                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                Card Data
              </a>
              <a class="nav-link" href="index.php?page=products">
                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                Product Data
              </a>
              <!-- <a class="nav-link" href="index.php?page=type-products">
                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                Type Product Data
              </a> -->
            </nav>
          </div>

          <div class="sb-sidenav-menu-heading">Information</div>
          <a class="nav-link" href="index.php?page=about">
            <div class="sb-nav-link-icon"><i class="fa fa-info-circle"></i>
            </div>
            About
          </a>
          <a class="nav-link" href="index.php?page=contact">
            <div class="sb-nav-link-icon"><i class="fa-solid fa-address-book"></i></i>
            </div>
            Contact
          </a>
        </div>
      </div>
      <div class="sb-sidenav-footer">
        <div class="small">Logged in as:</div>
        <?= $_SESSION['MEMBER']['username'] . " - " . $_SESSION['MEMBER']['role'] ?>
      </div>
    </nav>
  </div>
  <div id="layoutSidenav_content">
    <main>