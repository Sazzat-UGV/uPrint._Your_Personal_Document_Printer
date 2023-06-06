<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
      <a href="{{ route('admin.dashboard') }}" class="app-brand-link">
        <span class="app-brand-text demo menu-text fw-bolder ms-2">uPrint <span class="text-danger">.</span></span>
      </a>

      <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
        <i class="bx bx-chevron-left bx-sm align-middle"></i>
      </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
      <!-- Dashboard -->
      <li class="menu-item ">
        <a href="{{ route('admin.dashboard') }}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-home-circle"></i>
          <div data-i18n="Analytics">Dashboard</div>
        </a>
      </li>

      <!-- Department -->
      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-buildings"></i>
          <div data-i18n="Layouts">Departments</div>
        </a>

        <ul class="menu-sub">
          <li class="menu-item">
            <a href="{{ route('department.index') }}" class="menu-link">
              <div data-i18n="Without menu">Department List</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="{{ route('department.create') }}" class="menu-link">
              <div data-i18n="Without menu">Add New Department</div>
            </a>
          </li>
        </ul>
      </li>

      <!-- Teachers -->
      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bxs-graduation"></i>

          <div data-i18n="Layouts">Teachers</div>
        </a>

        <ul class="menu-sub">
          <li class="menu-item">
            <a href="{{ route('teacher.index') }}" class="menu-link">
              <div data-i18n="Without menu">Teacher List</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="{{ route('teacher.create') }}" class="menu-link">
              <div data-i18n="Without menu">Add New Teacher</div>
            </a>
          </li>
        </ul>
      </li>

      <!-- Subject -->
      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-book"></i>
          <div data-i18n="Layouts">Subjects</div>
        </a>

        <ul class="menu-sub">
          <li class="menu-item">
            <a href="{{ route('subject.index') }}" class="menu-link">
              <div data-i18n="Without menu">Subject List</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="{{ route('subject.create') }}" class="menu-link">
              <div data-i18n="Without menu">Add New Subject</div>
            </a>
          </li>
        </ul>
      </li>

      <!-- Semester -->
      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bxs-school"></i>
          <div data-i18n="Layouts">Semesters</div>
        </a>

        <ul class="menu-sub">
          <li class="menu-item">
            <a href="{{ route('semester.index') }}" class="menu-link">
              <div data-i18n="Without menu">Semester List</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="{{ route('semester.create') }}" class="menu-link">
              <div data-i18n="Without menu">Add New Semester</div>
            </a>
          </li>
        </ul>
      </li>

      <li class="menu-header small text-uppercase">
        <span class="menu-header-text">Pages</span>
      </li>
      <li class="menu-item">
        <a href="{{ route('admin.studentIndexPage') }}" class="menu-link">
          <i class="menu-icon tf-icons bx bxs-user"></i>
          <div data-i18n="Tables">Students</div>
        </a>
      </li>






      <li class="menu-header small text-uppercase">
        <span class="menu-header-text">Settings</span>
      </li>
      <li class="menu-item">
        <a href="{{ route('admin.generalSettingPage') }}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-cog"></i>
          <div data-i18n="Tables">General Settings</div>
        </a>
      </li>
    </ul>
  </aside>
