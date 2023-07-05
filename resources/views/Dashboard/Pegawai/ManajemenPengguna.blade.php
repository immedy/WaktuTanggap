@extends('Layout.dashboard')
@section('DashboardLayout')
    <div class="app-main flex-column flex-row-fluid">
        <!--begin::Container-->
        <div id="user-table" class="container-fluid">
            <div class="row">
                <div class="col-xl">
                    <!--begin::Tables Widget 9-->
                    <div class="card card-xl-stretch mb-5 mb-xl-8">
                        <!--begin::Header-->
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bolder fs-3 mb-1">Manajemen Pengguna</span>
                            </h3>
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body py-3">
                            <!--begin::Table container-->
                            <div class="table-responsive">
                                <!--begin::Table-->
                                <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                    <!--begin::Table head-->
                                    <thead>
                                        <tr class="fw-bolder text-muted">
                                            <th class="w-25px">
                                                No
                                            </th>
                                            <th class="min-w-300px">Nama </th>
                                            <th>username</th>
                                            <th>Hak Akses</th>
                                            <th>Status</th>
                                            <th class="d-flex justify-content-end flex-shrink-0">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $p)
                                            <tr>
                                                <td>
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="d-flex justify-content-start flex-column">
                                                            <a
                                                                class="text-dark fw-bolder text-hover-primary fs-6">{{ $p->pegawai->nama }}</a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="d-flex justify-content-start flex-column">
                                                            <a
                                                                class="text-dark fw-bolder text-hover-primary fs-6">{{ $p->username }}</a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="d-flex justify-content-start flex-column">
                                                            <a class="text-dark fw-bolder text-hover-primary fs-6">
                                                                @if (!empty($p->hakakses->hakakses))
                                                                    {{ $p->hakakses->hakakses }}"
                                                                @endif
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    @if ($p->status == 1)
                                                        <div
                                                            class="form-check form-switch form-check-custom form-check-solid">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="flexSwitchChecked" checked="checked" />
                                                        </div>
                                                    @else
                                                        <div
                                                            class="form-check form-switch form-check-custom form-check-solid">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="flexSwitchDefault" />
                                                        </div>
                                                    @endif
                                                </td>

                                                <td>
                                                    <div class="d-flex justify-content-end flex-shrink-0">
                                                        <a href="javascript:void(0)" id="user"
                                                            data-url="{{ route('DetailIdUsername', $p->id) }}"
                                                            class="action btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1 "
                                                            data-bs-placement="Top" title="Ganti Username">
                                                            <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                                            <span class="svg-icon svg-icon-3">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none">
                                                                    <path opacity="0.3"
                                                                        d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z"
                                                                        fill="black" />
                                                                    <path
                                                                        d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z"
                                                                        fill="black" />
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                        </a>
                                                        <a href="#"
                                                            class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1"
                                                            data-bs-toggle="tooltip" data-bs-placement="Top" title="Hapus">
                                                            <span class="svg-icon svg-icon-3">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none">
                                                                    <path
                                                                        d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z"
                                                                        fill="black" />
                                                                    <path opacity="0.5"
                                                                        d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z"
                                                                        fill="black" />
                                                                    <path opacity="0.5"
                                                                        d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z"
                                                                        fill="black" />
                                                                </svg>
                                                            </span>
                                                        </a>
                                                        <a href="/HakAkses"
                                                            class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1"
                                                            data-bs-toggle="tooltip" data-bs-placement="Top"
                                                            title="Hak Akses">
                                                            <span class="svg-icon svg-icon-3">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" fill="currentColor"
                                                                    class="bi bi-journal-bookmark-fill" viewBox="0 0 16 16">
                                                                    <path fill-rule="evenodd"
                                                                        d="M6 1h6v7a.5.5 0 0 1-.757.429L9 7.083 6.757 8.43A.5.5 0 0 1 6 8V1z"
                                                                        fill="black" />
                                                                    <path opacity="0.5"
                                                                        d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"
                                                                        fill="black" />
                                                                    <path opacity="0.5"
                                                                        d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"
                                                                        fill="black" />
                                                                </svg>
                                                            </span>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    {{-- modal --}}
    <div class="modal fade " tabindex="-1" id="userShowModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('EditUsername') }}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title"></h5>
                        <!--begin::Close-->
                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                            aria-label="Close">
                            <span class="svg-icon svg-icon-2x"></span>
                        </div>
                        <!--end::Close-->
                    </div>
                    <div class="modal-body">
                        <div class="fv-row mb-3">
                            <label class="text-dark fw-bolder text-hover-primary fs-6">User Name</label>
                            <input type="text" name="username" class="form-control form-control-solid mb-3 mb-lg-0"
                                placeholder="" id="user-username" />
                            <input type="text" name="id" id="user-id" hidden />
                            <input type="text" name="pegawai_id" id="user-pegawai" hidden />
                        </div>
                        <div class="fv-row mb-3">
                            <label class="text-dark fw-bolder text-hover-primary fs-6">Password</label>
                            <input type="password" name="password" class="form-control form-control-solid mb-3 mb-lg-0"
                                placeholder="" id="user-password" />
                        </div>
                        <div class="fv-row mb-3">
                            <label class="text-dark fw-bolder text-hover-primary fs-6">Konfirmasi Password</label>
                            <input type="password" name="confirm-password"
                                class="form-control form-control-solid mb-3 mb-lg-0" placeholder=""
                                id="confirm-password" />
                            <small id="confirmation-error" class="text-danger d-none">Password tidak sama.</small>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary" id="validasi_password" disabled>Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- end modal --}}
    <script>
        var confirmationInput = document.getElementById("confirm-password");
        var passwordInput = document.getElementById("user-password");
        var submitButton = document.querySelector("#validasi_password");
        var confirmationError = document.getElementById("confirmation-error");

        confirmationInput.addEventListener("input", function() {
            var password = passwordInput.value;
            var password_confirmation = this.value;

            if (password !== password_confirmation) {
                confirmationError.classList.remove("d-none");
                submitButton.disabled = true;
            } else {
                confirmationError.classList.add("d-none");
                submitButton.disabled = false;
            }
        });
    </script>
@endsection
