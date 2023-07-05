@extends('Layout.dashboard')
@section('DashboardLayout')
    <div class="app-main flex-column flex-row-fluid">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-fluid">
            <div class="row">
                <!--begin::Col-->
                <div class="col-xl">
                    <!--begin::List Widget 3-->
                    <div class="card card-xl-stretch mb-xl-8">
                        <!--begin::Header-->
                        <div class="card-header border-0">
                            <h3 class="card-title fw-bolder text-dark">Jenis Referensi</h3>
                            <div class="card-toolbar">
                                <!--begin::Menu-->
                                @if ( Auth::user()->akses !=1)
                                @else
                                <button type="button" class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary"
                                    data-kt-menu-placement="bottom-end" data-bs-toggle="modal"
                                    data-bs-target="#modalreferensi">
                                    <span class="svg-icon svg-icon-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-folder-plus" viewBox="0 0 16 16">
                                            <path
                                                d="m.5 3 .04.87a1.99 1.99 0 0 0-.342 1.311l.637 7A2 2 0 0 0 2.826 14H9v-1H2.826a1 1 0 0 1-.995-.91l-.637-7A1 1 0 0 1 2.19 4h11.62a1 1 0 0 1 .996 1.09L14.54 8h1.005l.256-2.819A2 2 0 0 0 13.81 3H9.828a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 6.172 1H2.5a2 2 0 0 0-2 2Zm5.672-1a1 1 0 0 1 .707.293L7.586 3H2.19c-.24 0-.47.042-.683.12L1.5 2.98a1 1 0 0 1 1-.98h3.672Z" />
                                            <path
                                                d="M13.5 9a.5.5 0 0 1 .5.5V11h1.5a.5.5 0 1 1 0 1H14v1.5a.5.5 0 1 1-1 0V12h-1.5a.5.5 0 0 1 0-1H13V9.5a.5.5 0 0 1 .5-.5Z" />
                                        </svg>
                                    </span>
                                </button>
                                @endif
                            </div>
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body pt-2">
                            <!--begin::Item-->
                            @foreach ( $referensi as $p )
                            <div class="d-flex align-items-center mb-8">
                                <span class="bullet bullet-vertical h-40px bg-success"></span>
                                <div class="form-check form-check-custom form-check-solid mx-5">
                                     {{ $loop->iteration }} 
                                </div>
                                <div class="flex-grow-1">
                                    <a  class="text-gray-800 text-hover-primary fw-bolder fs-6">{{ $p->referensi }}</a>
                                </div>
                            </div>
                            @endforeach                            
                        </div>                        
                        <!--end::Body-->
                    </div>
                    <!--end:List Widget 3-->
                </div>
                <div class="col-xl-9">
                    <!--begin::Tables Widget 9-->
                    <div class="card card-xl-stretch mb-5 mb-xl-8">
                        <!--begin::Header-->
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bolder fs-3 mb-1">Referensi</span>
                            </h3>
                            <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-trigger="hover" title="Tambah Referensi">
                                @if ( Auth::user()->akses !=1)
                                @else
                                <a href="#" class="btn btn-sm btn-light btn-active-primary" data-bs-toggle="modal"
                                    data-bs-target="#modaldetailreferensi">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                                    <span class="svg-icon svg-icon-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2"
                                                rx="1" transform="rotate(-90 11.364 20.364)" fill="black" />
                                            <rect x="4.36396" y="11.364" width="16" height="2" rx="1"
                                                fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->Tambah
                                </a>
                                @endif
                            </div>
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
                                            <th class="min-w-300px">Referensi</th>                                            
                                            <th class="min-w-10px">Status</th>
                                            <th class="min-w-100px text-end">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       @foreach ( $subreferensi as $p)
                                       <tr>
                                        <td>
                                            {{ $loop->iteration }} 
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">                                                    
                                                <div class="d-flex justify-content-start flex-column">
                                                    <a class="text-dark fw-bolder text-hover-primary fs-6">{{ $p->deskripsi }}</a>
                                                    <span class="text-muted fw-bold text-muted d-block fs-7">Jenis Referensi : {{ $p->referensi->referensi }}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            @if ($p->status == 1)
                                            <div class="form-check form-switch form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox" value="" id="flexSwitchChecked" checked="checked" />                                                
                                            </div>
                                            @else ()
                                            <div class="form-check form-switch form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox" value="" id="flexSwitchDefault"/>                                                
                                            </div>
                                            @endif
                                        </td>
                                        
                                        <td>
                                            <div class="d-flex justify-content-end flex-shrink-0">
                                                <a href="#"
                                                    class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen019.svg-->
                                                    <span class="svg-icon svg-icon-3">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none">
                                                            <path
                                                                d="M17.5 11H6.5C4 11 2 9 2 6.5C2 4 4 2 6.5 2H17.5C20 2 22 4 22 6.5C22 9 20 11 17.5 11ZM15 6.5C15 7.9 16.1 9 17.5 9C18.9 9 20 7.9 20 6.5C20 5.1 18.9 4 17.5 4C16.1 4 15 5.1 15 6.5Z"
                                                                fill="black" />
                                                            <path opacity="0.3"
                                                                d="M17.5 22H6.5C4 22 2 20 2 17.5C2 15 4 13 6.5 13H17.5C20 13 22 15 22 17.5C22 20 20 22 17.5 22ZM4 17.5C4 18.9 5.1 20 6.5 20C7.9 20 9 18.9 9 17.5C9 16.1 7.9 15 6.5 15C5.1 15 4 16.1 4 17.5Z"
                                                                fill="black" />
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                </a>
                                                <a href="#"
                                                    class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
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
                                                    class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
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
                                                    <!--end::Svg Icon-->
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
    <div class="modal fade" tabindex="-1" id="modalreferensi">
        <div class="modal-dialog border border-danger">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Jenis Referensi</h5>
                </div>
                <form action="/tambah"  method="post" id="kt_docs_formvalidation_text">
                    @csrf
                    <div class="modal-body">
                        <div class="fv-row mb-10">
                            <!--begin::Input-->
                            <input type="text" name="referensi" class="form-control form-control-solid mb-3 mb-lg-0"
                                placeholder="" value="" required />
                            <!--end::Input-->
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Keluar</button>
                        <button type="submit"  class="btn btn-primary"><span class="indicator-label">
                            Simpan
                        </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade " tabindex="-1" id="modaldetailreferensi">
        <div class="modal-dialog border border-danger">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Jenis Referensi</h5>
                </div>
                <form action="/tambahkategori"  method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="fv-row mb-3">
                            <label class="text-dark fw-bolder text-hover-primary fs-6">Kategori Di Dalam Referensi</label>
                            <input type="text" name="deskripsi" class="form-control form-control-solid mb-3 mb-lg-0"
                                placeholder="" value="" required/>
                            <!--end::Input-->
                        </div>
                        <div class="fv-row ">
                            <label class="text-dark fw-bolder text-hover-primary fs-6">Referensi</label>
                            <select name="referensi_id" class="form-select form-select-solid" data-dropdown-parent="#modaldetailreferensi" data-control="select2" data-placeholder="Pilih Jenis Referensi" required>
                                <option></option>
                                @foreach ($referensi as $p)
                                <option value="{{ $p->id }}">{{ $p->referensi }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Keluar</button>
                        <button type="submit"  class="btn btn-primary"><span class="indicator-label">
                            Simpan
                        </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

