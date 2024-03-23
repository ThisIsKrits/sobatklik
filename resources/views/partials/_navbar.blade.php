<!-- Navbar -->
@php
    $role = Auth::user()->roles->first()->name;
@endphp
<nav
    class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
    id="layout-navbar"
>
    <div
        class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none"
    >
        <a
            class="nav-item nav-link px-0 me-xl-4"
            href="javascript:void(0)"
        >
            <i class="bx bx-menu bx-sm"></i>
        </a>
    </div>

    <div
        class="navbar-nav-right d-flex align-items-center"
        id="navbar-collapse"
    >
        <!-- Secure Login -->
        <div
            class="navbar-nav align-items-center d-none d-xl-block"
        >
            <div class="nav-item d-flex align-items-center">
                <form id="secureForm">
                    @csrf
                <div class="form-check form-switch">
                    <input
                        class="form-check-input"
                        type="checkbox"
                        id="secureCheck"
                        name="secure"
                        data-on="1"
                        data-off="0"
                        @if (Auth::user()->secure == 1)
                                    checked
                                    @endif
                    />
                    <label
                        class="form-check-label"
                        for="secureCheck"
                        >Secure Login</label
                    >
                </div>
                </form>
            </div>
        </div>
        <!-- /Secure Login -->

        <ul
            class="navbar-nav flex-row align-items-center ms-auto"
        >
            <!-- Place this tag where you want the button to render. -->
            <li class="nav-item mt-1 me-3">
                <i class="ri-notification-3-line ic-md"></i>
            </li>

            <!-- User -->
            <li
                class="nav-item navbar-dropdown dropdown-user dropdown"
            >
                <a
                    class="d-flex justify-content-between gap-2 align-items-center nav-link dropdown-toggle hide-arrow"
                    href="javascript:void(0);"
                    data-bs-toggle="dropdown"
                >
                    @if(isset(Auth::user()->profile))
                    <img src="{{ asset('storage/uploads/profile/' . Auth::user()->profile->image) }}" class="admin-avatar" alt="Avatar">
                    @else
                    <div class="admin-avatar">
                        <p class="mb-0">
                            @if ($role == 'superadmin')
                                SA
                            @elseif ($role == 'admin')
                                A
                            @endif
                        </p>
                    </div>
                    @endif
                    <div>
                    @auth
                        <p class="mb-0">{{ Auth::user()->fullname }}</p>
                    @endauth
                    </div>
                    <div class="mt-1">
                        <i
                            class="ri-arrow-drop-down-line ic-md"
                        ></i>
                    </div>
                </a>

                <ul class="dropdown-menu dropdown-menu-end">
                @auth
                    <li>
                        <a class="dropdown-item" href="#">
                            <div class="d-flex">
                                <div
                                    class="flex-shrink-0 me-3"
                                >
                                    @if(isset(Auth::user()->profile))
                                        <img src="{{ asset('storage/uploads/profile/' . Auth::user()->profile->image) }}" class="admin-avatar" alt="Avatar">
                                    @else
                                        <div
                                            class="admin-avatar"
                                        >
                                            <p class="mb-0">
                                            @if ($role == 'superadmin')
                                                SA
                                            @elseif ($role == 'admin')
                                                A
                                            @endif
                                            </p>
                                        </div>
                                    @endif
                                </div>
                                <div class="flex-grow-1">

                                    <span
                                        class="fw-semibold d-block"
                                        >{{ Auth::user()->fullname }}</span
                                    >
                                    <small
                                        class="text-muted"
                                        >{{ $role }}</small
                                    >


                                </div>
                            </div>
                        </a>
                    </li>

                    <li>
                        <a
                            class="dropdown-item d-flex align-items-center"
                            href="#"
                        >
                            <div class="mt-1">
                                <i
                                    class="ri-user-3-line me-2 ic-md"
                                ></i>
                            </div>
                            <span class="align-middle"
                                >Profile Saya</span
                            >
                        </a>
                    </li>
                    <li>
                        <a
                            class="dropdown-item d-flex align-items-center"
                            href="#"
                        >
                            <div class="mt-1">
                                <i
                                    class="ri-coupon-line me-2 ic-md"
                                ></i>
                            </div>
                            <span class="align-middle"
                                >Laporan Saya</span
                            >
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-item">
                            <div
                                class="form-check form-switch"
                            >
                                <input
                                    class="form-check-input"
                                    type="checkbox"
                                    id="flexSwitchCheckChecked"
                                    checked
                                />
                                <label
                                    class="form-check-label"
                                    for="flexSwitchCheckChecked"
                                    >Secure Login</label
                                >
                            </div>
                        </div>
                    </li>
                    <li>
                        <span
                            class="dropdown-item d-flex align-items-center logout-dropdown-menu"
                            type="button"
                            data-bs-toggle="modal"
                            data-bs-target="#modalLogout"
                        >
                            <div class="me-2"><img src="{{ asset('/dashboard/assets/img/icons/iconly/Logout.svg') }}" alt=""></div>
                            <span class="align-middle"
                                >Log Out</span
                            >
                        </span>
                    </li>
                    @endauth
                </ul>
            </li>
            <!--/ User -->
        </ul>
    </div>
</nav>
