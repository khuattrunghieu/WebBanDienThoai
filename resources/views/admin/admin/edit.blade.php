@extends('admin.welcome')
@section('content')
    <div class="col-xl-12 col-lg-12 col-md-12">
        <!-- About User -->
        <div class="card mb-12">
            <div class="card-body">
                <div class="mt-2">
                    <a class="btn btn-primary me-2" href="{{ route('admin.admin.edit', $admin->id ) }}" role="button">Đổi mật khẩu</a>
                </div>
                <form id="formAuthentication" class="mb-3" action="{{ route('admin.admin.update', $admin->id) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Username</label>
                        <input type="text" class="form-control" id="name" name="name" value='{{ $admin->name }}' placeholder="Enter your username" autofocus />
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $admin->email }}" placeholder="Enter your email" />
                    </div>
                    <div class="mb-3 form-password-toggle">
                        <label class="form-label" for="password">Password</label>
                        <div class="input-group input-group-merge">
                            <input type="password" id="password" class="form-control" name="password"
                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                aria-describedby="password" />
                            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row mt-3">
                            <div class="d-grid gap-2 col-lg-6 mx-auto">
                                <button class="btn btn-primary btn-lg" type="submit">Lưu</button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
        
        <!--/ About User -->
    </div>
@endsection
