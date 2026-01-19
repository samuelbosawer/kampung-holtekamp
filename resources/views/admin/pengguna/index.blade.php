

     
@extends('admin.layout.tamplate')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  {{-- <h4 class="text-muted py-3 mb-4"><a href="/{{ Request::segment(1).'/'.Request::segment(2) }}" class=" fw-light">{{  Request::segment(2) }}</a> </h4> --}}

  <div class="row ">
   <div class="row ">
    <div class="col-12">

        <div class="card">
            <h5 class="card-header text-capitalize">
                <i class="menu-icon tf-icons bx bx-user"></i> Data Pengguna
            </h5>

            <div class="table-responsive text-nowrap p-5">
                <div class="row g-2 mb-3 align-items-center">
                    <div class="col-md-6 col-12">
                        @include('admin.layout.search')
                    </div>
                </div>

                <table class="table table-bordered">
                    <thead>
                        <tr class="bg-primary">
                            <th class="text-white text-center p-3 fw-bolder" width="10px">No</th>
                            <th class="text-white text-center p-3 fw-bolder">Email</th>
                            <th class="text-white text-center p-3 fw-bolder">Role</th>
                            <th class="text-white text-center p-3 fw-bolder"></th>
                        </tr>
                    </thead>

                    <tbody class="table-border-bottom-0">
                        @php $i = ($datas->currentPage() - 1) * $datas->perPage(); @endphp

                        @forelse($datas as $data)
                            <tr>
                                <td class="text-center">{{ ++$i }}</td>

                                <td class="fw-bolder">
                                    <a href="{{ route('dashboard.user.detail', $data->id) }}">
                                        {{ $data->email }}
                                    </a>
                                </td>

                                <td class="text-center text-uppercase">
                                   {{ $data->roles->first()->name ?? '-' }}
                                </td>


                                <td class="text-center">
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>

                                        <div class="dropdown-menu">

                                            <a class="dropdown-item"
                                                href="{{ route('dashboard.user.ubah', $data->id) }}">
                                                <i class="bx bx-edit-alt me-1"></i> Ubah
                                            </a>

                                           
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Data tidak ditemukan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-3 px-4">
                {{ $datas->appends(request()->query())->links() }}
            </div>
        </div>
    </div>
</div>

  </div>

@endsection
      