<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>INOVINDO ACADEMY</title>
  <meta
    name="csrf-token"
    content="lbvVITfSBu0gPIXPb0aIZdu6UNSVIw5g7tYRBKKr" />
  <link
    rel="shortcut icon"
    href="https://inovindoacademy.com/assets/images/favicon.ico"
    type="image/x-icon" />
  <link
    rel="stylesheet"
    href="https://inovindoacademy.com/assets/css/mdb.min.css" />
  <link
    rel="stylesheet"
    href="https://inovindoacademy.com/assets/css/template.css?ver=1" />
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css"
    integrity="sha512-q3eWabyZPc1XTCmF+8/LuE1ozpg5xxn7iO89yfSOd5/oKvyqLngoNGsx8jq92Y8eXJ/IRxQbEC+FGSYxtk2oiw=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer" />
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" />
  <link
    rel="stylesheet"
    href="https://cdn.datatables.net/1.13.3/css/dataTables.bootstrap5.min.css" />
  <link
    rel="stylesheet"
    type="text/css"
    href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
  <link
    rel="stylesheet"
    href="https://inovindoacademy.com/assets/css/perfect-scrollbar.css" />
  <link
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css"
    rel="stylesheet"
    type="text/css" />
</head>

<body class="bg-body">
  <div class="backdrop" id="backdrop"></div>
  <!-- Navbar -->
  <nav
    class="navbar navbar-expand-lg navbar-light bg-white shadow-4 fixed-top">
    <!-- Container wrapper -->
    <div class="container-fluid">
      <button
        class="navbar-toggler bg-white border-0 mx-3"
        type="button"
        aria-expanded="false"
        id="toggleSidebar"
        aria-controls="offcanvasScrolling">
        <i class="fa fa-bars"></i>
      </button>

      <!-- Navbar brand -->

      <a class="navbar-brand" href="#">
        <img
          src="https://inovindoacademy.com/assets/images/logo.png"
          class="logo"
          alt="logo" />
      </a>

      <div class="d-flex align-items-center">
        <!--<div class="d-lg-none nav-item dropdown">
                <a class="nav-link me-3 me-lg-0 dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink"
                    role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-bell"></i>
                    <span class="badge rounded-pill badge-notification bg-danger">1</span>
                </a>
            </div>-->

        <!-- Toggle button -->
        <button
          class="navbar-toggler"
          type="button"
          data-mdb-toggle="collapse"
          data-mdb-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation">
          <img
            src="https://www.gamelab.id/uploads/members/75964/photo-ade-ridwan-75964.png"
            alt="cms"
            class="avatar rounded-circle" />
        </button>
      </div>

      <!-- Collapsible wrapper -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>

        <!-- Icons -->
        <ul class="navbar-nav d-flex align-items-center flex-row me-1">
          <!-- Notification dropdown -->
          <!-- <li class="nav-item dropdown">
                    <a class="nav-link me-3 me-lg-0 dropdown-toggle hidden-arrow" href="#"
                        id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-bell"></i>
                        <span class="badge rounded-pill badge-notification bg-danger">1</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="#">Some news</a></li>
                        <li><a class="dropdown-item" href="#">Another news</a></li>
                        <li>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </li>
                    </ul>
                </li>-->
          <li class="nav-item me-3 me-lg-0">
            <a
              class="nav-link dropdown-toggle"
              href="#"
              role="button"
              id="dropdownMenuLink"
              data-mdb-toggle="dropdown"
              aria-expanded="false"
              data-mdb-offset="100,0">
              <span class="me-2 text-muted">Selamat Pagi, Administrator</span>
              <div class="d-inline-block">
                <div
                  class="d-flex justify-content-center align-items-center text-white rounded-circle"
                  style="
                      width: 32px;
                      height: 32px;
                      background-color: #bf360c;
                      font-size: 0.85rem;
                    ">
                  A
                </div>
              </div>
            </a>
            <ul
              class="dropdown-menu dropdown-menu-end border border-1"
              aria-labelledby="dropdownMenuLink">
              <li>
                <a
                  class="dropdown-item"
                  href="https://inovindoacademy.com/admin/profile">
                  <i class="fas fa-user fa-fw me-2"></i>
                  <span>Profil Saya</span>
                </a>
              </li>
              <li>
                <hr class="dropdown-divider my-0" />
              </li>
              <li>
                <a
                  class="dropdown-item"
                  href="https://inovindoacademy.com/logout">
                  <i class="fas fa-power-off fa-fw me-2"></i>
                  <span>Keluar</span>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
    <!-- Container wrapper -->
  </nav>
  <!-- Navbar -->