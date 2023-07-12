
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('student.dashboard') }}" class="app-brand-link">
          <span class="app-brand-text demo menu-text fw-bolder ms-2">uPrint <span class="text-danger">.</span></span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
          <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
      </div>
    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
      <!-- Dashboard -->
      <li class="menu-item">
        <a href="{{ route('student.dashboard') }}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-home-circle"></i>
          <div data-i18n="Analytics">Dashboard</div>
        </a>
      </li>
      <li class="menu-header small text-uppercase">
        <span class="menu-header-text">Documents</span>
      </li>
      <li class="menu-item ">
        <a href="{{ route('student.GetCoverPageForm') }}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-file"></i>
          <div data-i18n="Analytics">Generate Cover Page <span class="text-danger text-bold">***</span></div>
        </a>
      </li>

      <li class="menu-item ">
        <a href="{{ route('student.DocumentPage') }}" class="menu-link"><i class="menu-icon tf-icons bx bx-paperclip"></i><div data-i18n="Analytics">Print Your Documents <span class="text-danger text-bold">***</span></div>
        </a>
      </li>

      <li class="menu-header small text-uppercase">
        <span class="menu-header-text">Profile Management</span>
      </li>
      <li class="menu-item ">
        <a class="menu-link" href="{{ route('student.profile') }}">
            <i class="bx bx-edit me-2"></i>
            <div data-i18n="Analytics">Edit Profile</div>
          </a>
      </li>
      <li class="menu-item ">
        <a href="{{ route('student.changePasswordPage') }}" class="menu-link"><i class="menu-icon tf-icons bx bx-lock me-2"></i><div data-i18n="Analytics">Change Password</div>
        </a>
      </li>
      <li class="menu-item ">
        <a href="{{ route('student.logout') }}" class="menu-link"><i class="menu-icon tf-icons bx bx-exit"></i><div data-i18n="Analytics">Log Out</div>
        </a>
      </li>
    </ul>
  </aside>
