@extends('layouts.dashboard')

@section('title', 'Profile')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
                            <!-- Main Content -->
    <div class="mb-4">
        <div class="card">
            <div class="row">
                <div class="col-md-3 border-end">
                    <div class="px-2 pt-3">
                        <div
                            class="d-flex flex-column align-items-center text-center"
                        >
                            <img
                                src="{{ asset('/dashboard/assets/img/avatars/5.png') }}"
                                alt="Admin"
                                class="rounded-circle p-1"
                                width="150"
                            />
                            <div class="mt-2">
                                <h5 class="m-0">
                                    John Doe
                                </h5>
                                <p
                                    class="text-body-2 mb-4"
                                >
                                    johndoe@example.com
                                </p>

                                <div
                                    class="d-flex flex-column gap-2"
                                >
                                    <button
                                        class="btn btn-white ps-2 tab-button"
                                        onclick="openTab(event, 'tab1')"
                                    >
                                        <div
                                            class="d-flex justify-content-start align-items-center gap-2"
                                        >
                                            <svg
                                                class="svg-icon"
                                                width="24px"
                                                height="24px"
                                                viewBox="0 0 24 24"
                                                version="1.1"
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                            >
                                                <title>
                                                    Iconly/Light/Profile
                                                </title>
                                                <g
                                                    id="Iconly/Light/Profile"
                                                    stroke="#A0A3BD"
                                                    stroke-width="1.5"
                                                    fill="none"
                                                    fill-rule="evenodd"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                >
                                                    <g
                                                        id="Profile"
                                                        transform="translate(4.814286, 2.814476)"
                                                        stroke="#A0A3BD"
                                                    >
                                                        <path
                                                            d="M7.17047619,12.531714 C3.30285714,12.531714 -4.08562073e-14,13.1164759 -4.08562073e-14,15.4583807 C-4.08562073e-14,17.8002854 3.28190476,18.4059997 7.17047619,18.4059997 C11.0380952,18.4059997 14.34,17.8202854 14.34,15.479333 C14.34,13.1383807 11.0590476,12.531714 7.17047619,12.531714 Z"
                                                            id="Stroke-1"
                                                            stroke-width="1.5"
                                                        ></path>
                                                        <path
                                                            d="M7.17047634,9.19142857 C9.70857158,9.19142857 11.7657144,7.13333333 11.7657144,4.5952381 C11.7657144,2.05714286 9.70857158,-5.32907052e-15 7.17047634,-5.32907052e-15 C4.6323811,-5.32907052e-15 2.574259,2.05714286 2.574259,4.5952381 C2.56571443,7.1247619 4.60952396,9.18285714 7.13809539,9.19142857 L7.17047634,9.19142857 Z"
                                                            id="Stroke-3"
                                                            stroke-width="1.5"
                                                        ></path>
                                                    </g>
                                                </g>
                                            </svg>
                                            <p
                                                class="font-normal"
                                            >
                                                Pengaturan
                                                Profil
                                            </p>
                                        </div>
                                    </button>
                                    <button
                                        class="btn btn-white ps-2 tab-button"
                                        onclick="openTab(event, 'tab2')"
                                    >
                                        <div
                                            class="d-flex justify-content-start align-items-center gap-1"
                                        >
                                            <svg
                                                class="svg-icon"
                                                width="24px"
                                                height="24px"
                                                viewBox="0 0 24 24"
                                                version="1.1"
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                            >
                                                <title>
                                                    Iconly/Light/Lock
                                                </title>
                                                <g
                                                    id="Iconly/Light/Lock"
                                                    stroke="#A0A3BD"
                                                    stroke-width="1.5"
                                                    fill="none"
                                                    fill-rule="evenodd"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                >
                                                    <g
                                                        id="Lock"
                                                        transform="translate(3.500000, 2.000000)"
                                                        stroke="#A0A3BD"
                                                        stroke-width="1.5"
                                                    >
                                                        <path
                                                            d="M12.9234,7.4478 L12.9234,5.3008 C12.9234,2.7878 10.8854,0.749755462 8.3724,0.749755462 C5.8594,0.7388 3.8134,2.7668 3.8024,5.2808 L3.8024,5.3008 L3.8024,7.4478"
                                                            id="Stroke-1"
                                                        ></path>
                                                        <path
                                                            d="M12.1832,19.2496 L4.5422,19.2496 C2.4482,19.2496 0.7502,17.5526 0.7502,15.4576 L0.7502,11.1686 C0.7502,9.0736 2.4482,7.3766 4.5422,7.3766 L12.1832,7.3766 C14.2772,7.3766 15.9752,9.0736 15.9752,11.1686 L15.9752,15.4576 C15.9752,17.5526 14.2772,19.2496 12.1832,19.2496 Z"
                                                            id="Stroke-3"
                                                        ></path>
                                                        <line
                                                            x1="8.3629"
                                                            y1="12.2027"
                                                            x2="8.3629"
                                                            y2="14.4237"
                                                            id="Stroke-5"
                                                        ></line>
                                                    </g>
                                                </g>
                                            </svg>
                                            <p
                                                class="font-normal"
                                            >
                                                Ubah Password
                                            </p>
                                        </div>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div
                        id="tab1"
                        class="tab active-tab"
                    >
                        <div
                            class="px-3 me-2 pt-3 h-px-600"
                        >
                            <h4>Pengaturan Profil</h4>
                            <form
                                id="formAuthentication"
                                class="mb-3"
                                method="POST"
                            >
                                <div
                                    id="AvatarFileUpload"
                                >
                                    <!-- Image Preview Wrapper -->
                                    <div
                                        class="selected-image-holder"
                                    >
                                        <img
                                            src="{{ asset('/dashboard/assets/img/avatars/5.png') }}"
                                            alt="AvatarInput"
                                        />
                                    </div>
                                    <!-- Image Preview Wrapper -->
                                    <!-- Browse Image to Upload Wrapper -->
                                    <div
                                        class="avatar-selector"
                                    >
                                        <a
                                            href="#"
                                            class="avatar-selector-btn d-flex align-items-center justify-content-center"
                                        >
                                            <img
                                                class="mt-0"
                                                src="{{ asset('/dashboard/assets/img/icons/camera-fill.svg') }}"
                                                alt="cam"
                                            />
                                        </a>
                                        <input
                                            type="file"
                                            accept="images/jpg, images/png"
                                            name="avatar"
                                        />
                                    </div>
                                    <!-- Browse Image to Upload Wrapper -->
                                </div>
                                <div class="mb-3">
                                    <label
                                        for="email"
                                        class="form-label"
                                        >Email
                                        <span
                                            >*</span
                                        ></label
                                    >
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="email"
                                        name="email-username"
                                        value="johndoe@gmail.com"
                                        placeholder="Masukan Email"
                                        disabled
                                    />
                                </div>
                                <div class="mb-3">
                                    <label
                                        class="form-label"
                                        for="fullName"
                                        >Nama Lengkap
                                        <span
                                            >*</span
                                        ></label
                                    >

                                    <div
                                        class="input-group"
                                    >
                                        <input
                                            type="text"
                                            id="fullName"
                                            class="form-control"
                                            name="fullname"
                                            value="John Doe Abdullah"
                                            placeholder="Masukan Nama Lengkap"
                                            disabled
                                        />
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label
                                        class="form-label"
                                        for="nickname"
                                        >Nick Name
                                        <span
                                            >*</span
                                        ></label
                                    >

                                    <div
                                        class="input-group"
                                    >
                                        <input
                                            type="text"
                                            id="nickname"
                                            class="form-control"
                                            name="nickname"
                                            value="JD"
                                            placeholder="Masukkan Nick Name"
                                            autofocus
                                        />
                                    </div>
                                </div>

                                <div
                                    class="d-flex align-items-center justify-content-center mb-3"
                                >
                                    <button
                                        class="btn btn-primary d-grid"
                                        type="submit"
                                    >
                                        Ubah Profil
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div id="tab2" class="tab">
                        <div
                            class="px-3 me-2 pt-3 h-px-600"
                        >
                            <h4>Ubah Password</h4>
                            <form
                                id="formAuthentication"
                                class="mb-3"
                                action="index.html"
                                method="POST"
                            >
                                <div
                                    class="mb-3 form-password-toggle"
                                >
                                    <label
                                        class="form-label"
                                        for="oldPassword"
                                        >Password
                                        Lama<span
                                            >*</span
                                        ></label
                                    >

                                    <div
                                        class="input-group input-group-merge"
                                    >
                                        <input
                                            type="password"
                                            id="oldPassword"
                                            class="form-control error"
                                            name="password"
                                            placeholder="Masukan password lama"
                                            aria-describedby="password"
                                        />
                                        <span
                                            id="toggleOldPassword"
                                            class="input-group-text cursor-pointer"
                                        >
                                            <i
                                                class="ri-eye-line"
                                            ></i>
                                        </span>
                                    </div>
                                </div>
                                <div
                                    class="mb-3 form-password-toggle"
                                >
                                    <label
                                        class="form-label"
                                        for="password"
                                        >Password
                                        Baru<span
                                            >*</span
                                        ></label
                                    >

                                    <div
                                        class="input-group input-group-merge"
                                    >
                                        <input
                                            type="password"
                                            id="password"
                                            class="form-control error"
                                            name="password"
                                            placeholder="Masukan password baru"
                                            aria-describedby="password"
                                        />
                                        <span
                                            id="togglePassword"
                                            class="input-group-text cursor-pointer"
                                        >
                                            <i
                                                class="ri-eye-line"
                                            ></i>
                                        </span>
                                    </div>
                                </div>

                                <div
                                    class="mb-4 form-password-toggle"
                                >
                                    <label
                                        class="form-label"
                                        for="passwordConfirmation"
                                        >Konfirmasi
                                        Password Baru
                                        <span
                                            >*</span
                                        ></label
                                    >

                                    <div
                                        class="input-group input-group-merge"
                                    >
                                        <input
                                            type="password"
                                            id="passwordConfirmation"
                                            class="form-control error"
                                            name="passwordConfirmation"
                                            placeholder="Masukan konfirmasi password baru"
                                            aria-describedby="password"
                                        />
                                        <span
                                            id="togglePasswordConfirmation"
                                            class="input-group-text cursor-pointer"
                                            ><i
                                                class="ri-eye-line"
                                            ></i
                                        ></span>
                                    </div>
                                </div>

                                <div
                                    class="d-flex justify-content-center align-items-center mb-3"
                                >
                                    <button
                                        class="btn btn-primary"
                                        type="submit"
                                    >
                                        Ubah Password
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
    <script>
        const openTab = (evt, tabName) => {
                const tabcontent = document.getElementsByClassName("tab");
                for (let i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }
                const tablinks = document.getElementsByClassName("tab-button");
                for (let i = 0; i < tablinks.length; i++) {
                    tablinks[i].classList.remove("btn-primary");
                    tablinks[i].classList.add("btn-white");
                }
                evt.currentTarget.classList.remove("btn-white");
                evt.currentTarget.classList.add("btn-primary");
                document.getElementById(tabName).style.display = "block";
            };

            // Open the default tab on page load
            document.getElementById("tab1").style.display = "block";
            document
                .getElementsByClassName("tab-button")[0]
                .classList.add("btn-primary");

            // Open the default tab on page load
            document.getElementById("tab1").style.display = "block";
            document
                .getElementsByClassName("tab-button")[0]
                .classList.add("active");

            //Avatar upload
            const avatarFileUpload =
                document.getElementById("AvatarFileUpload");

            const imageViewer = avatarFileUpload.querySelector(
                ".selected-image-holder>img"
            );

            const imageSelector = avatarFileUpload.querySelector(
                ".avatar-selector-btn"
            );

            const imageInput = avatarFileUpload.querySelector(
                'input[name="avatar"]'
            );

            imageSelector.addEventListener("click", (e) => {
                e.preventDefault();

                imageInput.click();
            });

            imageInput.addEventListener("change", (e) => {
                // Open File eader
                var reader = new FileReader();
                reader.onload = function () {
                    imageViewer.src = reader.result;
                };

                reader.readAsDataURL(e.target.files[0]);
            });

            const togglePassword = (passwordInput, toggleButton) => {
                passwordInput.type =
                    passwordInput.type === "password" ? "text" : "password";
                toggleButton.innerHTML =
                    passwordInput.type === "password"
                        ? '<i class="ri-eye-line"></i>'
                        : '<i class="ri-eye-off-line"></i>';
            };

            // Function to toggle password confirmation visibility
            const togglePasswordConfirmation = (
                passwordInputConfirmation,
                toggleButtonConfirmation
            ) => {
                passwordInputConfirmation.type =
                    passwordInputConfirmation.type === "password"
                        ? "text"
                        : "password";
                toggleButtonConfirmation.innerHTML =
                    passwordInputConfirmation.type === "password"
                        ? '<i class="ri-eye-line"></i>'
                        : '<i class="ri-eye-off-line"></i>';
            };

            // Function to toggle old password visibility
            const toggleOldPassword = (oldPasswordInput, toggleButton) => {
                oldPasswordInput.type =
                    oldPasswordInput.type === "password" ? "text" : "password";
                toggleButton.innerHTML =
                    oldPasswordInput.type === "password"
                        ? '<i class="ri-eye-line"></i>'
                        : '<i class="ri-eye-off-line"></i>';
            };

            // Add event listeners to toggle buttons
            const toggleOldPasswordButton =
                document.getElementById("toggleOldPassword");
            const oldPasswordInput = document.getElementById("oldPassword");
            toggleOldPasswordButton.addEventListener("click", () => {
                toggleOldPassword(oldPasswordInput, toggleOldPasswordButton);
            });

            const togglePasswordButton =
                document.getElementById("togglePassword");
            const passwordInput = document.getElementById("password");
            togglePasswordButton.addEventListener("click", () => {
                togglePassword(passwordInput, togglePasswordButton);
            });

            const togglePasswordConfirmationButton = document.getElementById(
                "togglePasswordConfirmation"
            );
            const passwordConfirmationInput = document.getElementById(
                "passwordConfirmation"
            );
            togglePasswordConfirmationButton.addEventListener("click", () => {
                togglePasswordConfirmation(
                    passwordConfirmationInput,
                    togglePasswordConfirmationButton
                );
            });
    </script>
@endpush
