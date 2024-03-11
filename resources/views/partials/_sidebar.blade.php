<aside  id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme" >
                    <div class="app-brand demo d-flex justify-content-center align-items-center"  >
                        <a href="index.html" class="app-brand-link">
                            <span class="app-brand-logo demo">
                                <img
                                    src="{{ asset('dashboard/assets/img/elements/logo-default.png') }}"
                                    alt=""
                                />
                            </span>
                        </a>

                        <a href="javascript:void(0);"  class="layout-menu-toggle menu-link ms-auto d-block d-xl-none">
                            <i class="ri-menu-unfold-line"></i>
                        </a>
                    </div>

                    <div class="menu-inner-shadow"></div>

                    <ul class="menu-inner py-1">
                        <li class="menu-header small text-uppercase">
                            <span class="menu-header-text">Utama</span>
                        </li>
                        <!-- Utama -->
                        <li class="menu-item active">
                            <a href="index.html" class="menu-link">
                                <img class="menu-icon tf-icons" src="{{ asset('dashboard/assets/img/icons/iconly/Home-active.svg') }}" alt="">
                                <div>Dashboard</div>
                            </a>
                        </li>


                        <li class="menu-item">
                            <a href="index.html" class="menu-link">
                                 <img class="menu-icon tf-icons" src="{{ asset('dashboard/assets/img/icons/iconly/Ticket-Star.svg') }}" alt="">

                                <div>Laporan</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="index.html" class="menu-link">
                                <img class="menu-icon tf-icons" src="{{ asset('dashboard/assets/img/icons/iconly/Calling.svg') }}" alt="">

                               <div>Telepon</div>
                           </a>
                        </li>
                        <li class="menu-item">
                            <a href="index.html" class="menu-link">
                                <img class="menu-icon tf-icons" src="{{ asset('dashboard/assets/img/icons/iconly/3-User.svg') }}" alt="">

                               <div>Data Customer</div>
                           </a>
                        </li>

                        <!-- Lainnya -->
                        <li class="menu-header small text-uppercase">
                            <span class="menu-header-text">Lainnya</span>
                        </li>
                        <li class="menu-item">
                            <a href="index.html" class="menu-link">
                                <img class="menu-icon tf-icons" src="{{ asset('dashboard/assets/img/icons/iconly/Setting.svg') }}" alt="">

                               <div>Pengaturan</div>
                           </a>
                        </li>
                        <li class="menu-item">
                            <a
                                href="javascript:void(0);"
                                class="menu-link menu-toggle"
                            >
                                <img class="menu-icon tf-icons" src="{{ asset('dashboard/assets/img/icons/iconly/Folder.svg') }}" alt="">

                               <div>Master Data</div>
                            </a>
                            <ul class="menu-sub">
                                <li class="menu-item ms-4">
                                    <a
                                        href="auth-login-basic.html"
                                        class="menu-link"
                                        target="_blank"
                                    >
                                        <div data-i18n="Basic">Brand List</div>
                                    </a>
                                </li>
                                <li class="menu-item ms-4">
                                    <a
                                        href="auth-register-basic.html"
                                        class="menu-link"
                                        target="_blank"
                                    >
                                        <div data-i18n="Basic">Kategori kontak</div>
                                    </a>
                                </li>
                                <li class="menu-item ms-4">
                                    <a
                                        href="auth-forgot-password-basic.html"
                                        class="menu-link"
                                        target="_blank"
                                    >
                                        <div data-i18n="Basic">
                                            Kategori Sosmed
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item">
                            <a href="index.html" class="menu-link">
                                <img class="menu-icon tf-icons" src="{{ asset('dashboard/assets/img/icons/iconly/2-User.svg') }}" alt="">

                               <div>Manajemen User</div>
                           </a>
                        </li>
                        <li class="menu-item">
                            <a href="index.html" class="menu-link">
                                <img class="menu-icon tf-icons" src="{{ asset('dashboard/assets/img/icons/iconly/Light-Time-Circle.svg') }}" alt="">
                               <div>Log Aktifitas</div>
                           </a>
                        </li>
                        <li class="menu-item">
                            <a href="index.html" class="menu-link">
                                <img class="menu-icon tf-icons" src="{{ asset('dashboard/assets/img/icons/iconly/Profile.svg') }}" alt="">

                               <div>Profil Saya</div>
                           </a>
                        </li>

                    </ul>
                </aside>
