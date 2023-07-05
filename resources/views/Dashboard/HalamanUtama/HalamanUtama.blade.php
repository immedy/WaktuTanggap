@extends('Layout.dashboard')
@section('DashboardLayout')
    <div class="app-main flex-column flex-row-fluid">
        <div class="container-fluid">
            <div class="col-xl">
                <!--begin::Tables Widget 9-->
                <div class="card card-xl-stretch mb-5 mb-xl-8">
                    <!--begin::Header-->
                    <div class="card-header border-0 pt-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bolder fs-3 mb-1">Laporan Kerusakan</span>
                        </h3>
                        <div class="card-toolbar">
                            <a href="#" class="btn btn-sm btn-light btn-active-primary" data-bs-toggle="modal"
                                data-bs-target="#ktmodalwaktutanggap">
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
                                <!--end::Svg Icon-->Laporan
                            </a>
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
                                        <th class="min-w-10px">No Registrasi</th>
                                        <th class="min-w-150px">Keterangan/Alat/Spesifikasi</th>
                                        <th class="min-w-120px">Jumlah</th>
                                        <th class="min-w-120px">Waktu Pelaporan</th>
                                        <th class="min-w-140px">Waktu Respon</th>
                                        <th class="min-w-90px">status</th>                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($LaporanPengirim as $p)
                                        <tr>
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    {{ $p->notiket }}
                                                </div>
                                            </td>
                                            <td>
                                                <a href="#" class="text-primary fw-bolder  d-block fs-6">-
                                                    {{ $p->alat }}</a>
                                                <span class="text-warning fw-bolder  d-block fs-6">-
                                                    {{ $p->spesifikasi }}</span>
                                                <span class="text-danger fw-bolder  d-block fs-6">-
                                                    {{ $p->keterangan }}</span>
                                            </td>
                                            <td class="text-center">
                                                <div class="d-flex flex-column w-100 me-2">
                                                    <div class="d-flex flex-stack mb-2">
                                                        <span
                                                            class="text-muted me-2 fs-7 fw-bold">{{ $p->jumlah }}</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span
                                                    class="text-danger fw-bolder  d-block fs-6">{{ $p->Waktu_Lapor }}</span>
                                            </td>
                                            <td>
                                                <span class="text-primary fw-bolder  d-block fs-6">
                                                    @if (!empty($p->Waktu_Respon))
                                                        {{ $p->Waktu_Respon }}
                                                    @endif
                                                </span>
                                            </td>
                                            <td>
                                                @if ($p->status == 1)
                                                <span class="text-success fw-bolder  d-block fs-6">diterima</span>
                                                    
                                                @else
                                                <span class="text-warning fw-bolder  d-block fs-6">belum diterima</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach


                                </tbody>
                                <!--end::Table body-->
                            </table>
                            <!--end::Table-->
                        </div>
                        <!--end::Table container-->
                    </div>
                    <!--begin::Body-->
                </div>
                <!--end::Tables Widget 9-->
            </div>
        </div>
    </div>

    {{-- modal --}}
    <div class="modal fade " tabindex="-1" id="ktmodalwaktutanggap">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('KirimLaporan') }}" method="post">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Lapor Kerusakan</h5>
                        <!--begin::Close-->
                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                            aria-label="Close">
                            <span class="svg-icon svg-icon-2x"></span>
                        </div>
                        <!--end::Close-->
                    </div>
                    <div class="modal-body">
                        <div class="fv-row mb-3">
                            <label class="text-dark fw-bolder text-hover-primary fs-6">Keterangan</label>
                            <textarea type="text" name="keterangan" class="form-control form-control-solid mb-3 mb-lg-0" required> </textarea>
                        </div>
                        <div class="fv-row mb-3">
                            <label class="text-dark fw-bolder text-hover-primary fs-6">Alat</label>
                            <input type="text" name="alat" class="form-control form-control-solid mb-3 mb-lg-0"
                                required />
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label class="text-dark fw-bolder text-hover-primary fs-6">Spesifikasi/Merek/tipe</label>
                                <input type="text" class="form-control form-control-solid mb-3 mb-lg-0"
                                    name="spesifikasi" required />
                            </div>
                            <div class="col-3">
                                <label class="text-dark fw-bolder text-hover-primary fs-6">Jumlah Rusak</label>
                                <input type="number" name="jumlah" class="form-control form-control-solid mb-3 mb-lg-0"
                                    required />
                            </div>


                        </div>
                        <div class="fv-row mb-3">
                            <label class="text-dark fw-bolder text-hover-primary fs-6">Waktu Pelaporan</label>
                            <input class="form-control form-control-solid mb-3 mb-lg-0" name="waktu_pelaporan"
                                id="kt_datepicker_1" />
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Proses</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- end modal --}}
@endsection
