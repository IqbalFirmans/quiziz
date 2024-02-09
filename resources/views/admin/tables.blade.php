@extends('admin.layouts.main')

@section('content')
<section class="mx-3">
    <div class="mb-4">
        <div class="mb-md-0 mb-4">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-lg-6 col-7">
                            <h5>Laporan</h5>
                            <p class="text-sm mb-0">
                                <i class="fa fa-check text-info" aria-hidden="true"></i>
                                <span class="font-weight-bold ms-1">0 selesai</span> dari <span class="text-primary">0 laporan.</span>
                            </p>
                        </div>

                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="text-center">
                        <h6>Laporan</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        User</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Jenis Laporan</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Deskripsi Singkat</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="{{ asset('admin/assets/img/drake.jpg') }}"
                                                    class="avatar avatar-sm me-3" alt="xd">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">John Marteen</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <b style="font-size: 14px;" class="text-primary">Komentar Sensitif</b>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                       <button type="button" class="btn btn-info my-auto">Detail</button>
                                    </td>
                                    <td class="align-middle">
                                       <div class="d-flex justify-content-center gap-2">
                                        <button type="button" class="btn btn-success my-auto">Terima</button>
                                        <button type="button" class="btn btn-primary my-auto">Tolak</button>
                                       </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
