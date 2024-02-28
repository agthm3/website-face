@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-12">
                <a href="{{ route('home.index') }}" class="content-title text-decoration-none">Kembali</a>
                <!-- <h5 class="content-desc mb-4">
                                                                                                                Your business growth
                                                                                                            </h5> -->
            </div>


        </div>

        <div class="row mt-5">
            <h3>Tambah Modul</h3>
            <div class="document-card">
                <div class="document-item row">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('store.new.modul') }}" method="post">
                        @csrf
                        <label for="">Mac</label>
                        <input type="text" name="mac" class="form-control col-lg-12" />
                        <label for="" class="mt-3">Name</label>
                        <input type="text" name="name" class="form-control col-lg-12" />

                        <button type="submit" class="btn btn-success">Simpan</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <h3>Daftar Modul</h3>
            <div class="document-card">
                <div class="document-item">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Modul</th>
                                <th scope="col">MAC</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($allModul as $index => $item)
                                <tr>
                                    <th scope="row">{{ $index + 1 }}</th>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->mac }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
