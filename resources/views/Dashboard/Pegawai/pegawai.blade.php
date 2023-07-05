@extends('Layout.dashboard')
@section('DashboardLayout')
    <div class="app-main flex-column flex-row-fluid">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-fluid">
            <div class="row">
                <div class="col-xl">
                    <!--begin::Tables Widget 9-->
                    <div class="card card-xl-stretch mb-5 mb-xl-8">
                        <!--begin::Header-->
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bolder fs-3 mb-1">Referensi</span>
                            </h3>
                            <form action="">
                            <div class="card-toolbar" >
                                <div>
                                    <input type="text" name="caripegawai" value="{{ request('caripegawai') }}" class="form-control" placeholder="Cari Pegawai" />
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-icon btn-outline-warning btn-active-light-info border" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Keluar"><span
                                        class="indicator-label">
                                        <span class="svg-icon svg-icon-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search-heart" viewBox="0 0 16 16">
                                                <path d="M6.5 4.482c1.664-1.673 5.825 1.254 0 5.018-5.825-3.764-1.664-6.69 0-5.018Z"/>
                                                <path d="M13 6.5a6.471 6.471 0 0 1-1.258 3.844c.04.03.078.062.115.098l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1.007 1.007 0 0 1-.1-.115h.002A6.5 6.5 0 1 1 13 6.5ZM6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11Z"/>
                                              </svg>
                                        </span>
                                    </span>
                                </button>
                                </div>
                                <div>
                                    <a href="#" class="btn btn-icon btn-outline-danger btn-active-light-info border" data-bs-toggle="modal"
                                        data-bs-target="#modaldetailreferensi"data-bs-toggle="tooltip" data-bs-placement="top" title="Tambah Pegawai">
                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                                        <span class="indicator-label">
                                        <span class="svg-icon svg-icon-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                                                <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                                <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                                              </svg>
                                        </span>
                                    </span>                                        
                                    </a>
                                </div>
                            </div>
                        </form>
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
                                            <th>Username</th>
                                            <th>Ruangan</th>
                                            <th>Status</th>
                                            <th class="d-flex justify-content-end flex-shrink-0">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pegawai as $p)
                                            <tr>
                                                <td>
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="d-flex justify-content-start flex-column">
                                                            <a
                                                                class="text-dark fw-bolder text-hover-primary fs-6">{{ $p->nama }}</a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="d-flex justify-content-start flex-column">
                                                            @if (!empty($p->user->username))
                                                                <a class="text-dark fw-bolder text-hover-primary fs-6">{{ $p->user->username }}
                                                                </a>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="d-flex justify-content-start flex-column">
                                                            <a
                                                                class="text-dark fw-bolder text-hover-primary fs-6">{{ $p->subreferensi->deskripsi }}</a>
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
                                                        ()
                                                        <div
                                                            class="form-check form-switch form-check-custom form-check-solid">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="flexSwitchDefault" />
                                                        </div>
                                                    @endif
                                                </td>

                                                <td>
                                                    <div class="d-flex justify-content-end flex-shrink-0">
                                                        <a href="/pegawai/{{ $p->id }}/edit"
                                                            class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1"
                                                            data-bs-toggle="tooltip" data-bs-placement="Top"
                                                            title="Username">
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
                                                            data-bs-toggle="tooltip" data-bs-placement="Top"
                                                            title="Hapus">
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
                                                                    class="bi bi-journal-bookmark-fill"
                                                                    viewBox="0 0 16 16">
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
    <div class="modal fade " tabindex="-1" id="modaldetailreferensi">
        <div class="modal-dialog border border-danger">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Pegawai</h5>
                </div>
                <form action="/addpegawai" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="fv-row mb-3">
                            <label class="text-dark fw-bolder text-hover-primary fs-6">Nama Pegawai</label>
                            <input type="text" name="nama" class="form-control form-control-solid mb-3 mb-lg-0"
                                placeholder="" value="" required />
                            <!--end::Input-->
                        </div>
                        <div class="fv-row ">
                            <label class="text-dark fw-bolder text-hover-primary fs-6">Ruangan</label>
                            <select name="ruangan" class="form-select form-select-solid"
                                data-dropdown-parent="#modaldetailreferensi" data-control="select2"
                                data-placeholder="Pilih Jenis Referensi" required>
                                <option></option>
                                @foreach ($referensi as $p)
                                    <option value="{{ $p->id }}">{{ $p->deskripsi }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Keluar</button>
                        <button type="submit" class="btn btn-primary"><span class="indicator-label">
                                Simpan
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
