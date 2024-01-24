@extends('admin.welcome')

@section('content')
<div class="mt-2">
  <a class="btn btn-primary me-2" href="{{ route('admin.auth.register') }}" role="button">Thêm tài khoản</a>
</div>
{{ $admins = $admin }}
<table class="table">
    <thead>
      <tr>
        <th scope="col">STT</th>
        <th scope="col">Name</th>
        <th scope="col">Hành Động</th>
      </tr>
    </thead>
    <tbody>
      @foreach($admin as $key => $admin)
      @if ($admin->status == 1)
      <tr>
        <th scope="row">{{ ++$key }}</th>
        <td>{{ $admin->name }}</td>
        <td>
          <a href="{{ route('admin.admin.hidden', $admin->id)}}" class="btn btn-secondary">Ẩn</a>
        </td>
      </tr>
      @endif
      
      @endforeach

    </tbody>
  </table>
  <div>
    Các tài khoản không được phép hoạt động:
  </div>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">STT</th>
        <th scope="col">Name</th>
        <th scope="col">Hành Động</th>
      </tr>
    </thead>
    <tbody>
      @foreach($admins as $key => $admin)
      @if ($admin->status == 0)
      <tr>
        <th scope="row">{{ ++$key }}</th>
        <td>{{ $admin->name }}</td>
        <td>
          <a href="{{ route('admin.admin.undo', $admin->id)}}" class="btn btn-success">Hiện</a>
          <form action="{{ route('admin.admin.destroy', $admin->id)}}" method="POST">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-icon btn-outline-danger">
              <i class="bx bx-trash-alt"></i>
            </button>
          </form>
        </td>
      </tr>
      @endif
     
      @endforeach

    </tbody>
  </table>
@endsection