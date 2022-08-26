@extends('layouts.master')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="content">
        <div class="row">
            {{-- <div class="col-12">
                <h2 class="content-title">Kendaraan Tersedia</h2>
                <h5 class="content-desc mb-4">Your business growth</h5>
            </div> --}}

            <div class="col-12 col-md-6 col-lg-4">
                <div class="statistics-card">

                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex flex-column justify-content-between align-items-start">
                            <h5 class="content-desc">Kendaraan Tersedia</h5>

                            <h3 class="statistics-value">{{$kendaraan_tersedia}}</h3>
                        </div>

                        <button class="btn-statistics">
                            <img src="./assets/img/global/times.svg" alt="">
                        </button>
                    </div>

                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4">
                <div class="statistics-card">

                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex flex-column justify-content-between align-items-start">
                            <h5 class="content-desc">Driver Tersedia</h5>

                            <h3 class="statistics-value">{{$driver_tersedia}}</h3>
                        </div>

                        <button class="btn-statistics">
                            <img src="./assets/img/global/times.svg" alt="">
                        </button>
                    </div>

                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4">
                <div class="statistics-card">

                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex flex-column justify-content-between align-items-start">
                            <h5 class="content-desc">Kendaraan Sedang Keluar</h5>

                            <h3 class="statistics-value">{{$kendaraan_keluar}}</h3>
                        </div>

                        <button class="btn-statistics">
                            <img src="./assets/img/global/times.svg" alt="">
                        </button>
                    </div>


                </div>
            </div>

        </div>

        {{-- <div class="row mt-5">
            <div class="col-12 col-lg-6">
                <h2 class="content-title">Documents</h2>
                <h5 class="content-desc mb-4">Standard procedure</h5>

                <div class="document-card">
                    <div class="document-item">
                        <div class="d-flex justify-content-start align-items-center">
                            <div class="document-icon box">
                                <img src="./assets/img/home/document/archive.svg" alt="">
                            </div>

                            <div class="d-flex flex-column justify-content-between align-items-start">
                                <h2 class="document-title">Customer Guide</h2>

                                <span class="document-desc">180 MB • PDF</span>
                            </div>
                        </div>

                        <button class="btn-statistics">
                            <img src="./assets/img/global/download.svg" alt="">
                        </button>

                    </div>

                    <div class="document-item">
                        <div class="d-flex justify-content-start align-items-center">
                            <div class="document-icon globe">
                                <img src="./assets/img/home/document/twitch.svg" alt="">
                            </div>

                            <div class="d-flex flex-column justify-content-between align-items-start">
                                <h2 class="document-title">Twitch Record</h2>

                                <span class="document-desc">700 GB • MP4</span>
                            </div>
                        </div>

                        <button class="btn-statistics">
                            <img src="./assets/img/global/download.svg" alt="">
                        </button>

                    </div>

                    <div class="document-item">
                        <div class="d-flex justify-content-start align-items-center">
                            <div class="document-icon database">
                                <img src="./assets/img/home/document/database.svg" alt="">
                            </div>

                            <div class="d-flex flex-column justify-content-between align-items-start">
                                <h2 class="document-title">Personas Datasets</h2>

                                <span class="document-desc">11 MB • CSV</span>
                            </div>
                        </div>

                        <button class="btn-statistics">
                            <img src="./assets/img/global/download.svg" alt="">
                        </button>

                    </div>

                    <div class="document-item">
                        <div class="d-flex justify-content-start align-items-center">
                            <div class="document-icon target">
                                <img src="./assets/img/home/document/book-open.svg" alt="">
                            </div>

                            <div class="d-flex flex-column justify-content-between align-items-start">
                                <h2 class="document-title">Marketing Book</h2>

                                <span class="document-desc">891 MB • PDF</span>
                            </div>
                        </div>

                        <button class="btn-statistics">
                            <img src="./assets/img/global/download.svg" alt="">
                        </button>

                    </div>


                </div>
            </div>

            <div class="col-12 col-lg-6">
                <h2 class="content-title">History</h2>
                <h5 class="content-desc mb-4">Track the flow</h5>

                <div class="document-card">
                    <div class="document-item">
                        <div class="d-flex justify-content-start align-items-center">
                            <img class="document-icon" src="./assets/img/home/history/photo.png" alt="">

                            <div class="d-flex flex-column justify-content-between align-items-start">
                                <h2 class="document-title">Amalia Syahrina</h2>

                                <span class="document-desc">Promoted to Sr. Website Designer</span>
                            </div>
                        </div>


                    </div>

                    <div class="document-item">
                        <div class="d-flex justify-content-start align-items-center">
                            <img class="document-icon" src="./assets/img/home/history/photo-1.png" alt="">

                            <div class="d-flex flex-column justify-content-between align-items-start">
                                <h2 class="document-title">Ah Park Yo</h2>

                                <span class="document-desc">Promoted to Front-End Developer</span>
                            </div>
                        </div>
                    </div>

                    <div class="document-item">
                        <div class="d-flex justify-content-start align-items-center">
                            <img class="document-icon" src="./assets/img/home/history/photo-2.png" alt="">

                            <div class="d-flex flex-column justify-content-between align-items-start">
                                <h2 class="document-title">Sintia Siny</h2>

                                <span class="document-desc">Promoted to Accounting Executive</span>
                            </div>
                        </div>
                    </div>

                    <div class="document-item">
                        <div class="d-flex justify-content-start align-items-center">
                            <img class="document-icon" src="./assets/img/home/history/photo-3.png" alt="">

                            <div class="d-flex flex-column justify-content-between align-items-start">
                                <h2 class="document-title">Jerami Putu</h2>

                                <span class="document-desc">Promoted to Quality Manager</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div> --}}
        <canvas id="myChart" width="400" height="140"></canvas>

    </div>
@endsection
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js" integrity="sha512-ElRFoEQdI5Ht6kZvyzXhYG9NqjtkmlkfYk0wr6wHxU9JEHakS7UJZNeml5ALk+8IKlU6jDgMabC3vkumRokgJA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Kijang Inova', 'Pick Up', 'Wuling Confero', 'Honda HRV'],
                datasets: [{
                    label: 'Permintaan Kendaraan',
                    data: [`<?php echo $kijang_inova; ?>`, `<?php echo $pick_up; ?>`, `<?php echo $wuling; ?>`, `<?php echo $hrv; ?>`],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
        </script>
@endpush