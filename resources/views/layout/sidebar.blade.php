<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar" data-sidebarbg="skin6">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{ route('index') }}"
                    aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span
                        class="hide-menu">Dashboard</span></a>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{ route('mahasiswa.index') }}"
                    aria-expanded="false"><i data-feather="sidebar" class="feather-icon"></i><span
                        class="hide-menu">Mahasiswa</span></a>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{ route('matakuliah.index') }}"
                    aria-expanded="false"><i data-feather="sidebar" class="feather-icon"></i><span
                        class="hide-menu">Mata Kuliah</span></a>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{ route('nilai.index') }}"
                    aria-expanded="false"><i data-feather="sidebar" class="feather-icon"></i><span
                        class="hide-menu">Nilai</span></a>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>