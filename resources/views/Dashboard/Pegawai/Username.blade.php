@extends('Layout.dashboard')
@section('DashboardLayout')
    <div class="app-main flex-column flex-row-fluid">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xl">
            <!--begin::Sign-in Method-->
            <div class="row">
                <div class="col-7">
                    <div class="card mb-5 mb-xl-6">
                        <!--begin::Card header-->
                        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                            data-bs-target="#kt_account_signin_method">
                            <div class="card-title m-0">
                                <h3 class="fw-bolder m-0">{{ $pegawai->nama }} </h3>
                            </div>
                        </div>
                        <!--end::Card header-->
                        <!--begin::Content-->
                        <div id="kt_account_signin_method" class="collapse show">
                            <!--begin::Card body-->
                            <div class="card-body border-top p-9">
                                <div>
                                    <!--begin::Form-->
                                    <form action="/addusername/{{ $pegawai->id }}" method="post" class="form"
                                        onsubmit="return validatePassword()" novalidate="novalidate" id="validasi_password">
                                        @method('PUT')
                                        @csrf
                                        <div class="row mb-6">
                                            <div class="col-lg mb-4 mb-lg-0">
                                                <div class="fv-row mb-0">
                                                    <label for="emailaddress" class="form-label fs-6 fw-bolder mb-3">Input
                                                        Username</label>
                                                    <input type="text"
                                                        class="form-control form-control-lg form-control-solid"
                                                        placeholder="username" name="pegawai_id" value="{{ $pegawai->id }}"
                                                        required hidden />
                                                    <input type="text"
                                                        class="form-control form-control-lg form-control-solid"
                                                        id="username" name="username"
                                                        @if (!empty($pegawai->user->username)) {
                                                    value="{{ $pegawai->user->username }}"
                                                @else}
                                                placeholder="Inputkan User Name Anda" @endif
                                                        required />
                                                </div>
                                            </div>
                                            <div class="col-lg">
                                                <div class="fv-row mb-0">
                                                    <label for="confirmemailpassword"
                                                        class="form-label fs-6 fw-bolder mb-3">
                                                        Password</label>
                                                    <input type="password"
                                                        class="form-control form-control-lg form-control-solid"
                                                        name="password" id="password" required />
                                                </div>
                                            </div>
                                            <div class="col-lg">
                                                <div class="fv-row mb-0">
                                                    <label for="confirmemailpassword"
                                                        class="form-label fs-6 fw-bolder mb-3">
                                                        Konfirmasi Password</label>
                                                    <input type="password"
                                                        class="form-control form-control-lg form-control-solid"
                                                        id="confirmation" required />
                                                </div>
                                                <div id="confirmation-error" class="form-label fs-6 fw-bolder mb-3 text-danger"></div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="/pegawai" class="btn btn-danger"> <span class="svg-icon svg-icon-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-box-arrow-left"
                                                        viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd"
                                                            d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z" />
                                                        <path fill-rule="evenodd"
                                                            d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
                                                    </svg>
                                                </span>Keluar</a>
                                            <button type="submit" class="btn btn-primary"><span class="indicator-label">
                                                    <span class="svg-icon svg-icon-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor" class="bi bi-save2"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M2 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H9.5a1 1 0 0 0-1 1v4.5h2a.5.5 0 0 1 .354.854l-2.5 2.5a.5.5 0 0 1-.708 0l-2.5-2.5A.5.5 0 0 1 5.5 6.5h2V2a2 2 0 0 1 2-2H14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h2.5a.5.5 0 0 1 0 1H2z" />
                                                        </svg>
                                                    </span>
                                                    Simpan
                                                </span>
                                            </button>
                                        </div>
                                    </form>
                                    <!--end::Form-->
                                </div>

                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Content-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
       var confirmationInput = document.getElementById("confirmation");
var passwordInput = document.getElementById("password");
var submitButton = document.querySelector("#validasi_password button[type='submit']");
var confirmationError = document.getElementById("confirmation-error");

confirmationInput.addEventListener("input", function() {
    var password = passwordInput.value;
    var password_confirmation = this.value;

    if (password !== password_confirmation) {
        confirmationError.textContent = "Password tidak sama";
        submitButton.disabled = true;
    } else {
        confirmationError.textContent = ""; // Clear the error message
        submitButton.disabled = false;
    }
});



    </script>
@endsection
