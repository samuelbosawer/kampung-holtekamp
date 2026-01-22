@extends('admin.layout.tamplate')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="row ">
            <div class="col-12">
                <div class="row">
                    <div class="card mb-4">
                        <h5 class="card-header fw-bolder text-capitalize"><i class="menu-icon tf-icons bx bx-user"></i>
                            {{ 'Ubah Data Pengguna' }} </h5>
                        <div class="card-body">

                            @if (Request::segment(4) == 'ubah' && Request::segment(2) == 'user')
                                <form action="{{ route('dashboard.user.update', $data->id) }}" enctype="multipart/form-data"
                                    method="POST">
                                    @csrf
                                    @method('PUT')
                                @elseif (Request::segment(3) == 'tambah' && Request::segment(2) == 'user')
                                    <form action="{{ route('dashboard.user.store') }}" enctype="multipart/form-data"
                                        method="POST">
                                        @csrf
                                    @else
                                        <form action="">
                            @endif

                            
                           

                            <div class="col-md-8 mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="teks" class="form-control" id="email" name="email"
                                    value="{{ old('email') ?? ($data->email ?? '') }}"
                                    @if (Request::segment(3) == 'detail') disabled @endif>
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                             <div class="col-md-8 mb-3">
                                <label for="role" class="form-label">Role</label>
                                <input type="role" class="form-control" id="role"  value="{{  $data->roles->first()->name ?? '-'  }}"
                                     disabled >
                                @error('role')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-8 mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" value=""
                                    @if (Request::segment(3) == 'detail') disabled @endif>
                                @error('password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>


                            <div class="col-md-8 mb-3">
                                <label for="password_confirmation" class="form-label">Ulangi Password</label>
                                <input type="password" class="form-control" id="password_confirmation"
                                    name="password_confirmation" value=""
                                    @if (Request::segment(3) == 'detail') disabled @endif>
                                @error('password_confirmation')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            

                            <div class="col-md-12 mb-3 mx-auto">


                                @if (Request::segment(3) == 'detail')
                                    <a href="{{ route('dashboard.user.ubah', $data->id) }}" class="btn btn-dark text-white">
                                        <i class="menu-icon tf-icons bx bx-pencil"></i>
                                        UBAH DATA </a>
                                @elseif ((Request::segment(3) == 'tambah' || Request::segment(4) == 'ubah') && Request::segment(2) == 'user')
                                    <button type="submit" class="btn btn-primary text-white">SIMPAN <i
                                            class="menu-icon tf-icons bx bx-save"></i></button>
                                            <a href="{{ route('dashboard.user') }}" class="btn btn-dark text-white"> KEMBALI </a>
                                @endif


                            </div>


                            </form>
                        </div>
                    </div>

                </div>
            </div>
        @endsection
