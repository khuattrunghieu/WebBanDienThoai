@extends('admin.welcome')

@section('content')
<div class="mt-2">
  <a class="btn btn-primary me-2" href="{{ route('admin.trademark.create') }}" role="button">Thêm</a>
</div>

<table class="table">
    <thead>
      <tr>
        <th scope="col">STT</th>
        <th scope="col">Name</th>
        <th scope="col">Admin</th>
        <th scope="col">Ngày Cập nhật gần nhất</th>
        <th scope="col">Hành Động</th>
      </tr>
    </thead>
    <tbody>
      @foreach($trademarkdata as $key => $trademark)
      @if ($trademark->status == 1)
      <tr>
        <th scope="row">{{ ++$key }}</th>
        <td>{{ $trademark->name }}</td>
        <td>{{ $trademark->admin->name }}</td>
        <td>{{ $trademark->updated_at }}</td>
        <td>
          <a href="{{ route('admin.trademark.edit', $trademark->id)}}" class="btn btn-info">Sửa</a>
          <a href="{{ route('admin.trademark.hidden', $trademark->id)}}" class="btn btn-secondary">Ẩn</a>
        </td>
      </tr>
      @endif
      
      @endforeach

    </tbody>
  </table>
  <div>
    Các danh mục đã ẩn:
  </div>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">STT</th>
        <th scope="col">Name</th>
        <th scope="col">Ngày tạo</th>
        <th scope="col">Hành Động</th>
      </tr>
    </thead>
    <tbody>
      @foreach($trademarkdata as $key => $trademark)
      @if ($trademark->status == 0)
      <tr>
        <th scope="row">{{ ++$key }}</th>
        <td>{{ $trademark->name }}</td>
        <td>{{ $trademark->updated_at }}</td>
        <td>
          <a href="{{ route('admin.trademark.undo', $trademark->id)}}" class="btn btn-success">Hiện</a>
          <form action="{{ route('admin.trademark.destroy', $trademark->id)}}" method="POST">
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