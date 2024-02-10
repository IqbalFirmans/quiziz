@extends('admin.layouts.main')

@section('content')
    <div class="mx-3">
        <div class="row">
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div
                            class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                            <div class="py-3" style="">
                                <svg class="material-icons opacity-10 text-white" xmlns="http://www.w3.org/2000/svg"
                                    width="32" height="32" viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M13.5 14.538q.31 0 .545-.235q.236-.236.236-.545q0-.31-.236-.545t-.545-.236q-.31 0-.545.236t-.236.545q0 .31.236.545q.235.235.545.235m0-2.815q.179 0 .31-.123q.132-.123.163-.294q.05-.396.232-.666q.182-.269.703-.752q.634-.576.884-1.03q.25-.452.25-1.039q0-1.01-.72-1.683q-.72-.674-1.822-.674q-.71 0-1.308.336t-.96.96q-.092.154-.024.323q.067.169.232.236q.16.068.336.016q.176-.052.274-.206q.263-.402.621-.603q.358-.2.829-.2q.715 0 1.187.423q.47.424.47 1.095q0 .408-.228.759q-.229.35-.787.845q-.57.49-.79.876q-.22.386-.27.959q-.024.165.102.304q.126.138.316.138M8.115 17q-.69 0-1.152-.462q-.463-.463-.463-1.153V4.615q0-.69.463-1.152Q7.425 3 8.115 3h10.77q.69 0 1.152.463q.463.462.463 1.152v10.77q0 .69-.462 1.153q-.463.462-1.153.462zm-3 3q-.69 0-1.152-.462q-.463-.463-.463-1.153V7.115q0-.213.143-.356q.144-.144.357-.144t.357.144t.143.356v11.27q0 .23.192.423q.193.192.423.192h11.27q.213 0 .356.143t.144.357q0 .213-.144.357q-.143.143-.356.143z" />
                                </svg>
                            </div>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">Kuis Aktif</p>
                            <h4 class="mb-0">0</h4>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-3 text-center">
                        8-12-2023 s/d {{ $now }}
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div
                            class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                            <i class="material-icons opacity-10">person</i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">User Aktif</p>
                            <h4 class="mb-0">{{ $users_active }}</h4>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-3 text-center">
                        8-12-2023 s/d {{ $now }}
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div
                            class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                            <i class="material-icons opacity-10">person</i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">User Baru Bulan Ini</p>
                            <h4 class="mb-0">{{ $new_users_inMonth }}</h4>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-3 text-center">
                        1-{{ $month_now }}-{{ $year_now }} s/d {{ $now }}
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div
                            class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                            <div class="py-3">
                                <svg class="material-icons opacity-10 text-white" xmlns="http://www.w3.org/2000/svg"
                                    width="32" height="32" viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M12 16.423q.262 0 .438-.177q.177-.177.177-.438q0-.262-.177-.439q-.176-.177-.438-.177t-.438.177q-.177.177-.177.439q0 .261.177.438q.176.177.438.177m0-2.961q.213 0 .357-.144q.143-.144.143-.356V7.885q0-.213-.144-.357q-.144-.143-.357-.143t-.356.143q-.143.144-.143.357v5.077q0 .212.144.356t.357.144M9.344 20q-.331 0-.632-.13q-.3-.132-.518-.349L4.48 15.806q-.217-.218-.348-.518q-.131-.3-.131-.632V9.344q0-.331.13-.632q.132-.3.349-.518L8.194 4.48q.218-.217.518-.348q.3-.131.632-.131h5.312q.331 0 .632.13q.3.132.518.349l3.715 3.715q.217.218.348.518q.131.3.131.632v5.312q0 .331-.13.632q-.132.3-.349.518l-3.715 3.715q-.218.217-.518.348q-.3.131-.632.131zM9.1 19h5.8l4.1-4.1V9.1L14.9 5H9.1L5 9.1v5.8zm2.9-7" />
                                </svg>
                            </div>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">Laporan Hari Ini</p>
                            <h4 class="mb-0">0</h4>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-3 text-center">
                        {{ $time_now }}
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-4 mt-4 mb-3">
                <div class="card z-index-2 ">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                        <div class="bg-gradient-dark shadow-dark border-radius-lg py-3 pe-1">
                            <div class="chart">
                                <canvas id="chart-quiz" class="chart-canvas" height="170"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="mb-0 ">Kuis Aktif</h6>
                        <p class="text-sm ">Kuis yang dibuat oleh user.</p>
                        <hr class="dark horizontal">
                        <div class="d-flex ">
                            <i class="material-icons text-sm my-auto me-1">schedule</i>
                            <p class="mb-0 text-sm">just updated</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mt-4 mb-4">
                <div class="card z-index-2 ">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                            <div class="chart">
                                <canvas id="chart-user-active" class="chart-canvas" height="170"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="mb-0 ">User Aktif</h6>
                        <p class="text-sm ">User yang terdaftar.</p>
                        <hr class="dark horizontal">
                        <div class="d-flex ">
                            <i class="material-icons text-sm my-auto me-1">schedule</i>
                            <p class="mb-0 text-sm">just updated </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mt-4 mb-4">
                <div class="card z-index-2  ">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                        <div class="bg-gradient-success shadow-success border-radius-lg py-3 pe-1">
                            <div class="chart">
                                <canvas id="chart-report" class="chart-canvas" height="170"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="mb-0 "> Laporan Dari User </h6>
                        <p class="text-sm "> Jumlah laporan dari user. </p>
                        <hr class="dark horizontal">
                        <div class="d-flex ">
                            <i class="material-icons text-sm my-auto me-1">schedule</i>
                            <p class="mb-0 text-sm"> just updated </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-4">
            <div class="mb-md-0 mb-4">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-lg-6 col-7">
                                <h5>Laporan</h5>
                                <p class="text-sm mb-0">
                                    <i class="fa fa-check text-info" aria-hidden="true"></i>
                                    <span class="font-weight-bold ms-1">0 selesai</span> dalam bulan ini dari <span
                                        class="text-primary">0 laporan.</span>
                                </p>
                            </div>

                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="text-center">
                            <h6>Laporan Baru-Baru Ini</h6>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            User</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
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
    </div>
    <script src="{{ asset('admin/assets/js/plugins/chartjs.min.js') }}"></script>

    <script>
        var ctx3 = document.getElementById("chart-quiz").getContext("2d");

        new Chart(ctx3, {
            type: "line",
            data: {
                labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September",
                    "Oktober", "November", "Desember"
                ],
                datasets: [{
                    label: "Kuis",
                    tension: 0,
                    borderWidth: 0,
                    pointRadius: 5,
                    pointBackgroundColor: "rgba(255, 255, 255, .8)",
                    pointBorderColor: "transparent",
                    borderColor: "rgba(255, 255, 255, .8)",
                    borderWidth: 4,
                    backgroundColor: "transparent",
                    fill: true,
                    data: [12, 32, 42, 11, 37, 43, 87, 89, 23, 5, 5, 100],
                    maxBarThickness: 6

                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5],
                            color: 'rgba(255, 255, 255, .2)'
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#f8f9fa',
                            font: {
                                size: 14,
                                weight: 300,
                                family: "Roboto",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#f8f9fa',
                            padding: 10,
                            font: {
                                size: 14,
                                weight: 300,
                                family: "Roboto",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });

        var ctx = document.getElementById("chart-user-active").getContext("2d");

        new Chart(ctx, {
            type: "line",
            data: {
                labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September",
                    "Oktober", "November", "Desember"
                ],
                datasets: [{
                    label: "User",
                    tension: 0,
                    borderWidth: 0,
                    pointRadius: 5,
                    pointBackgroundColor: "rgba(255, 255, 255, .8)",
                    pointBorderColor: "transparent",
                    borderColor: "rgba(255, 255, 255, .8)",
                    borderWidth: 4,
                    backgroundColor: "transparent",
                    fill: true,
                    data: @json($users),
                    maxBarThickness: 6

                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5],
                            color: 'rgba(255, 255, 255, .2)'
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#f8f9fa',
                            font: {
                                size: 14,
                                weight: 300,
                                family: "Roboto",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#f8f9fa',
                            padding: 10,
                            font: {
                                size: 14,
                                weight: 300,
                                family: "Roboto",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });

        var ctx2 = document.getElementById("chart-report").getContext("2d");

        new Chart(ctx2, {
            type: "line",
            data: {
                labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September",
                    "Oktober", "November", "Desember"
                ],
                datasets: [{
                    label: "Report",
                    tension: 0,
                    borderWidth: 0,
                    pointRadius: 5,
                    pointBackgroundColor: "rgba(255, 255, 255, .8)",
                    pointBorderColor: "transparent",
                    borderColor: "rgba(255, 255, 255, .8)",
                    borderColor: "rgba(255, 255, 255, .8)",
                    borderWidth: 4,
                    backgroundColor: "transparent",
                    fill: true,
                    data: [50, 40, 300, 320, 500, 350, 200, 230, 500, 1000, 2000, 3000],
                    maxBarThickness: 6

                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5],
                            color: 'rgba(255, 255, 255, .2)'
                        },
                        ticks: {
                            display: true,
                            color: '#f8f9fa',
                            padding: 10,
                            font: {
                                size: 14,
                                weight: 300,
                                family: "Roboto",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#f8f9fa',
                            padding: 10,
                            font: {
                                size: 14,
                                weight: 300,
                                family: "Roboto",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });
    </script>
@endsection
