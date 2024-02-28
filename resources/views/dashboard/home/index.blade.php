@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-12">
                <h2 class="content-title">Lab Telcom</h2>
                <!-- <h5 class="content-desc mb-4">
                                                                                                                        Your business growth
                                                                                                                    </h5> -->
            </div>

            <div class="col-12 col-md-6 col-lg-4">
                <div class="statistics-card">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex flex-column justify-content-between align-items-start">
                            <h5 class="content-desc">
                                Tambah Modul Face Recognition
                            </h5>
                        </div>

                        <a href="wajah-tambah.html" class="btn-statistics">
                            <img src="./assets/img/global/times.svg" alt="" />
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4">
                <div class="statistics-card">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex flex-column justify-content-between align-items-start">
                            <h5 class="content-desc">Tambah Modul RFID Reader</h5>
                        </div>

                        <a href="rfid-tambah.html" class="btn-statistics">
                            <img src="./assets/img/global/times.svg" alt="" />
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4">
                <div class="statistics-card">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex flex-column justify-content-between align-items-start">
                            <h5 class="content-desc">Tambah User</h5>
                        </div>

                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button class="btn-statistics" type="submit">
                                <img src="./assets/img/global/times.svg" alt="" />
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <h3>Log Attendance</h3>
            <div class="document-card">
                <div class="document-item">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Status</th>
                                <th scope="col">Lokasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($allLog as $item)
                                <tr>
                                    <th scope="row">1</th>
                                    <td>{{ $item->user->name ?? 'N/A' }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>{{ $item->iot->name }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
