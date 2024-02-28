@extends('layouts.app')


@section('content')
    <div class="content">
        <div class="row">
            <div class="col-12">
                <a href="{{ route('home.index') }}" class="content-title text-decoration-none mb-3">Kembali</a>
                <!-- <h5 class="content-desc mb-4">
                                                                                                                                                                                            Your business growth
                                                                                                                                                                                        </h5> -->
            </div>

            <div class="col-12 col-md-6 col-lg-4">
                <div class="statistics-card">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex flex-column justify-content-between align-items-start">
                            <h5 class="content-desc">
                                Tambah Modul
                            </h5>
                        </div>

                        <a href="{{ route('modul.index') }}" class="btn-statistics">
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

    </div>
@endsection
