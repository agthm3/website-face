@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-12">
                <a href="{{ route('home.index') }}" class="content-title">Kembali</a>
                <!-- <h5 class="content-desc mb-4">
                                                                                                                                                                                                                                                Your business growth
                                                                                                                                                                                                                                            </h5> -->
            </div>


            <div class="row mt-5">
                <h3>Rekap Absensi</h3>
                <div class="document-card">
                    <div class="document-item">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Waktu Akses</th>
                                    <th scope="col">Lokasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($succesAbsen as $index => $item)
                                    <tr>
                                        <th scope="row">{{ $index + 1 }}</th>
                                        <td>{{ $item->user->name ?? 'N/A' }}</td>
                                        <td>{{ $item->status }}</td>
                                        <td>{{ \Carbon\Carbon::parse($item->created_at)->isoFormat('dddd, D MMMM Y, HH:mm:ss') }}
                                        </td>
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
