@extends('admin.welcome')
@section('content')
    <div class="col-xl-12 col-lg-12 col-md-12">
        <!-- About User -->
        <div class="card mb-12">
            <div class="card-body">
                <small class="text-muted text-uppercase">About</small>
                <ul class="list-unstyled mb-4 mt-3">
                    <li class="d-flex align-items-center mb-3"><i class="bx bx-user"></i><span class="fw-medium mx-2">Full
                            Name:</span> <span>{{ $admin->name }}</span></li>
                    <li class="d-flex align-items-center mb-3"><i class="bx bx-check"></i><span
                            class="fw-medium mx-2">Status:</span> <span>Active</span></li>
                    
                </ul>
                <small class="text-muted text-uppercase">Contacts</small>
                <ul class="list-unstyled mb-4 mt-3">
                    <li class="d-flex align-items-center mb-3"><i class="bx bx-phone"></i><span
                            class="fw-medium mx-2">Contact:</span> <span>{{ $admin->phone }}</span></li>
                    <li class="d-flex align-items-center mb-3"><i class="bx bx-envelope"></i><span
                            class="fw-medium mx-2">Email:</span> <span>{{ $admin->email }}</span></li>
                </ul>
            </div>
        </div>
        <div class="mt-2">
            <a class="btn btn-primary me-2" href="{{ route('admin.admin.edit', $admin->id ) }}" role="button">Sửa</a>
        </div>
        <!--/ About User -->
    </div>
@endsection
