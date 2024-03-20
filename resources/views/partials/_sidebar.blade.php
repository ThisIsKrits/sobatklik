<aside  id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme" >
                    <div class="app-brand demo d-flex justify-content-center align-items-center"  >
                        <a href="{{ route('home') }}" class="app-brand-link">
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
                        <li class="menu-item {{ request()->is('/') ? 'active' : '' }}">
                            <a href="{{ route('home') }}" class="menu-link">
                            @if(request()->is('/'))
                                <img class="menu-icon tf-icons" src="{{ asset('dashboard/assets/img/icons/iconly/Home-active.svg') }}" alt="">
                            @else
                                <img class="menu-icon tf-icons" src="{{ asset('dashboard/assets/img/icons/iconly/Home.svg') }}" alt="">
                            @endif
                                <div>Dashboard</div>
                            </a>
                        </li>


                        <li class="menu-item {{ Request::is('data-report') ? 'active' : '' }}">
                            <a href="{{ route('data-report.index') }}" class="menu-link">
                            @if(Request::is('data-report'))
                                <img class="menu-icon tf-icons" src="{{ asset('dashboard/assets/img/icons/iconly/Ticket-Star-active.svg') }}" alt="">
                            @else
                                <img class="menu-icon tf-icons" src="{{ asset('dashboard/assets/img/icons/iconly/Ticket-Star.svg') }}" alt="">
                            @endif
                                <div>Laporan</div>
                            </a>
                        </li>
                        <!-- <li class="menu-item {{ Request::is('data-telepon') ? 'active' : '' }}">
                            <a href="{{ route('data-telepon.index') }}" class="menu-link">
                                @if(Request::is('data-telepon'))
                                <img class="menu-icon tf-icons" src="{{ asset('dashboard/assets/img/icons/iconly/Calling-active.svg') }}" alt="">
                            @else
                                <img class="menu-icon tf-icons" src="{{ asset('dashboard/assets/img/icons/iconly/Calling.svg') }}" alt="">
                            @endif

                               <div>Telepon</div>
                           </a>
                        </li> -->
                        <li class="menu-item {{ Request::is('data-customer') ? 'active' : '' }}">
                            <a href="{{ route('data-customer.index') }}" class="menu-link">
                            @if(Request::is('data-customer'))
                                <img class="menu-icon tf-icons" src="{{ asset('dashboard/assets/img/icons/iconly/3-User-active.svg') }}" alt="">
                            @else
                                <img class="menu-icon tf-icons" src="{{ asset('dashboard/assets/img/icons/iconly/3-User.svg') }}" alt="">
                            @endif

                               <div>Data Customer</div>
                           </a>
                        </li>

                        <!-- Lainnya -->
                        <li class="menu-header small text-uppercase">
                            <span class="menu-header-text">Lainnya</span>
                        </li>
                        <li class="menu-item {{ Request::is('setting') ? 'active' : '' }}">
                            <a href="{{ route('setting.index') }}" class="menu-link">
                            @if(Request::is('setting'))
                                <img class="menu-icon tf-icons" src="{{ asset('dashboard/assets/img/icons/iconly/Setting-active.svg') }}" alt="">
                            @else
                                <img class="menu-icon tf-icons" src="{{ asset('dashboard/assets/img/icons/iconly/Setting.svg') }}" alt="">
                            @endif

                               <div>Pengaturan</div>
                           </a>
                        </li>
                        <li class="menu-item {{ Request::is('data-brand*', 'data-contact*', 'data-sosmed*') ? 'active open' : '' }}">
                            <a
                                href="javascript:void(0);"
                                class="menu-link menu-toggle"
                            >
                            @if(Request::is('data-brand', 'data-contact', 'data-sosmed'))
                                <img class="menu-icon tf-icons" src="{{ asset('dashboard/assets/img/icons/iconly/Folder-active.svg') }}" alt="">
                            @else
                                <img class="menu-icon tf-icons" src="{{ asset('dashboard/assets/img/icons/iconly/Folder.svg') }}" alt="">
                            @endif

                               <div>Master Data</div>
                            </a>
                            <ul class="menu-sub">
                                <li class="menu-item {{ Request::is('data-brand') ? 'active' : '' }} ms-4">
                                    <a
                                        href="{{ route('data-brand.index') }}"
                                        class="menu-link"
                                    >
                                        <div data-i18n="Basic">Brand List</div>
                                    </a>
                                </li>
                                <li class="menu-item {{ Request::is('data-contact') ? 'active' : '' }} ms-4 ">
                                    <a
                                        href="{{ route('data-contact.index') }}"
                                        class="menu-link"
                                    >
                                        <div data-i18n="Basic">Kategori kontak</div>
                                    </a>
                                </li>
                                <li class="menu-item ms-4 {{ Request::is('data-sosmed') ? 'active' : '' }}">
                                    <a
                                        href="{{ route('data-sosmed.index') }}"
                                        class="menu-link"
                                    >
                                        <div data-i18n="Basic">
                                            Kategori Sosmed
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item">
                            <a href="{{ route('data-user.index') }}" class="menu-link {{ Request::is('data-user') ? 'active' : '' }}">
                                <img class="menu-icon tf-icons" src="{{ asset('dashboard/assets/img/icons/iconly/2-User.svg') }}" alt="">

                               <div>Manajemen User</div>
                           </a>
                        </li>
                        <li class="menu-item {{ Request::is('data-log') ? 'active' : '' }}">
                            <a href="{{ route('data-log.index') }}" class="menu-link">
                            @if(Request::is('data-log'))
                                <img class="menu-icon tf-icons" src="{{ asset('dashboard/assets/img/icons/iconly/Light-Time-Circle-active.svg') }}" alt="">
                            @else
                                <img class="menu-icon tf-icons" src="{{ asset('dashboard/assets/img/icons/iconly/Light-Time-Circle.svg') }}" alt="">
                            @endif
                               <div>Log Aktifitas</div>
                           </a>
                        </li>
                        <li class="menu-item {{ Request::is() ? 'active' : '' }}">
                            <a href="{{ route('profile-user.index') }}" class="menu-link">
                                <img class="menu-icon tf-icons" src="{{ asset('dashboard/assets/img/icons/iconly/Profile.svg') }}" alt="">

                               <div>Profil Saya</div>
                           </a>
                        </li>

                    </ul>
                </aside>
