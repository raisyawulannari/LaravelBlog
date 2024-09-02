<main class="container-fluid">
  <div class="row">
    <nav class="sidebar sidebar-mini sticky-top" id="sidebar">
      <div class="menu shadow pb-5" id="sidebar-scroll">
        <ul class="menu-wrapper">
          <li class="menu-item ripple">
            <a
              href="https://inovindoacademy.com/admin/dashboard"
              data-mdb-placement="right"
              data-mdb-toggle="tooltip"
              title="Beranda"
              data-mdb-delay='{"show":"350", "hide":"0"}'>
              <i data-feather="home" class="fa-fw"></i>
              <span>Beranda</span>
            </a>
          </li>
          <li class="menu-item ripple">
            <a
              href="https://inovindoacademy.com/admin/profile"
              data-mdb-placement="right"
              data-mdb-toggle="tooltip"
              title="Profil Saya"
              data-mdb-delay='{"show":"350", "hide":"0"}'>
              <i data-feather="user" class="fa-fw"></i>
              <span>Profil Saya</span>
            </a>
          </li>
          <div class="ps-3 text-muted menu-title">
            <small>Main Menu</small>
          </div>
          <li
            class="menu-item ripple show"
            data-mdb-placement="right"
            data-mdb-toggle="tooltip"
            title="Master Data"
            data-mdb-delay='{"show":"350", "hide":"0"}'>
            <a
              data-mdb-toggle="collapse"
              href="#collapseMenu3"
              role="button"
              aria-expanded="false"
              aria-controls="collapseMenu3">
              <i data-feather="database" class="fa-fw"></i>
              <span>My Blog</span>
            </a>
          </li>

          <div class="collapse show" id="collapseMenu3">
            <ul class="p-0 m-0">
              <li class="menu-item ripple">
                <a
                  href="{{ route('posts.index') }}"
                  data-mdb-placement="right"
                  data-mdb-toggle="tooltip"
                  title="Post"
                  data-mdb-delay='{"show":"350", "hide":"0"}'
                  class="sub-item">
                  <i class="far fa-building fa-fw"></i>
                  <span>Post</span>
                </a>
              </li>
</main>