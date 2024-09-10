<main class="container-fluid">
  <div class="row">
    <nav class="sidebar sidebar-mini sticky-top" id="sidebar">
      <div class="menu shadow pb-5" id="sidebar-scroll">
        <ul class="menu-wrapper">
          <li class="menu-item ripple">
            <a
              href="{{ route('home') }}"
              data-mdb-placement="right"
              data-mdb-toggle="tooltip"
              title="Home"
              data-mdb-delay='{"show":"350", "hide":"0"}'>
              <i data-feather="home" class="fa-fw"></i>
              <span>HOME</span>
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
            title="My Blog"
            data-mdb-delay='{"show":"350", "hide":"0"}'>
            <a
              data-mdb-toggle="collapse"
              href="#collapseMenu3"
              role="button"
              aria-expanded="false"
              aria-controls="collapseMenu3">
              <i data-feather="database" class="fa-fw"></i>
              <span>My Bolg</span>
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
                  <span>POST</span>
                </a>
              </li>
              <li class="menu-item ripple active">
    <a
      href="{{ route('jobs.index') }}"
      data-mdb-placement="right"
      data-mdb-toggle="tooltip"
      title="Job"
      data-mdb-delay='{"show":"350", "hide":"0"}'
      class="sub-item">
      <i class="fa fa-briefcase fa-fw"></i>
      <span>JOB</span>
    </a>
</li>

              <li class="menu-item ripple">
                <a
                  href="{{ route('locations.index') }}"
                  data-mdb-placement="right"
                  data-mdb-toggle="tooltip"
                  title="Location"
                  data-mdb-delay='{"show":"350", "hide":"0"}'
                  class="sub-item">
                  <i class="fas fa-map-marker-alt fa-fw"></i>
                  <span>LOCATION</span>
                </a>
              </li>

              <li class="menu-item ripple">
                <a
                  href="{{ route('job_locations.index') }}"
                  data-mdb-placement="right"
                  data-mdb-toggle="tooltip"
                  title="job_locations"
                  data-mdb-delay='{"show":"350", "hide":"0"}'
                  class="sub-item">
                  <i class="bi bi-bookmark-check"></i>
                  <span>JOB LOCATION</span>
                </a>
              </li>

              <!-- Item User -->
              <li class="menu-item ripple">
                <a
                  href="{{ route('users.index') }}"
                  data-mdb-placement="right"
                  data-mdb-toggle="tooltip"
                  title="User"
                  data-mdb-delay='{"show":"350", "hide":"0"}'
                  class="sub-item">
                  <!-- Ganti ikon dengan ikon user -->
                  <i class="bi bi-person-circle"></i>
                  <span>User</span>
                </a>
              </li>

              <!-- Item Logout -->
              <li class="menu-item ripple">
                <a
                  href="#"
                  onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                  data-mdb-placement="right"
                  data-mdb-toggle="tooltip"
                  title="Logout"
                  data-mdb-delay='{"show":"350", "hide":"0"}'
                  class="sub-item">
                  <i class="fas fa-power-off fa-fw me-2"></i>
                  <span>Logout</span>
                </a>
                <!-- Form Logout -->
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
              </li>



            </ul>
          </div>
          <!-- <div class="ps-3 text-muted menu-title">
            <small>Kelola Peserta Magang</small>
          </div>
          <li class="menu-item ripple">
            <a
              href="https://inovindoacademy.com/admin/internship-requests"
              data-mdb-placement="right"
              data-mdb-toggle="tooltip"
              title="Pengajuan"
              data-mdb-delay='{"show":"350", "hide":"0"}'>
              <i data-feather="send" class="fa-fw"></i>
              <span>Pengajuan</span>
            </a>
          </li>
          <li class="menu-item ripple">
            <a
              href="https://inovindoacademy.com/admin/internships"
              data-mdb-placement="right"
              data-mdb-toggle="tooltip"
              title="Peserta"
              data-mdb-delay='{"show":"350", "hide":"0"}'>
              <i data-feather="users" class="fa-fw"></i>
              <span>Peserta</span>
            </a>
          </li>
          <li class="menu-item ripple">
            <a
              href="https://inovindoacademy.com/admin/grades"
              data-mdb-placement="right"
              data-mdb-toggle="tooltip"
              title="Penilaian"
              data-mdb-delay='{"show":"350", "hide":"0"}'>
              <i data-feather="feather" class="fa-fw"></i>
              <span>Penilaian</span>
            </a>
          </li>
          <li class="menu-item ripple">
            <a
              href="https://inovindoacademy.com/admin/internship-projects"
              data-mdb-placement="right"
              data-mdb-toggle="tooltip"
              title="Manajemen Tugas"
              data-mdb-delay='{"show":"350", "hide":"0"}'>
              <i data-feather="briefcase" class="fa-fw"></i>
              <span>Manajemen Tugas</span>
            </a>
          </li>
          <li class="menu-item ripple">
            <a
              href="https://inovindoacademy.com/admin/internship-presensi"
              data-mdb-placement="right"
              data-mdb-toggle="tooltip"
              title="Monitoring Kehadiran"
              data-mdb-delay='{"show":"350", "hide":"0"}'>
              <i class="bi bi-geo-alt-fill fa-fw"></i>
              <span>Monitoring Kehadiran</span>
            </a>
          </li>
          <li class="menu-item ripple">
            <a
              href="https://inovindoacademy.com/admin/certificates"
              data-mdb-placement="right"
              data-mdb-toggle="tooltip"
              title="Sertifikat"
              data-mdb-delay='{"show":"350", "hide":"0"}'>
              <i data-feather="award" class="fa-fw"></i>
              <span>Sertifikat</span>
            </a>
          </li>
          <li class="menu-item ripple">
            <a
              href="https://inovindoacademy.com/admin/internship-feedback"
              data-mdb-placement="right"
              data-mdb-toggle="tooltip"
              title="Feedback Pemagang"
              data-mdb-delay='{"show":"350", "hide":"0"}'>
              <i class="bi bi-chat-heart fa-fw"></i>
              <span>Feedback Pemagang</span>
            </a>
          </li>
          <div class="ps-3 text-muted menu-title">
            <small>Pengaturan</small>
          </div>
          <li class="menu-item ripple">
            <a
              href="#"
              data-mdb-placement="right"
              data-mdb-toggle="tooltip"
              title="Pengaturan"
              data-mdb-delay='{"show":"350", "hide":"0"}'>
              <i data-feather="settings" class="fa-fw"></i>
              <span>Pengaturan</span>
            </a>
          </li>
        </ul>
      </div> -->



        </ul>
      </div>
  </div>
  </nav>
  </div>
</main>