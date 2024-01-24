@extends('admin.welcome')

@section('content')
<div class="mt-2">
  <a class="btn btn-primary me-2" href="{{ route('admin.category.create') }}" role="button">Thêm</a>
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
      @foreach($categorydata as $key => $category)
        @if ($category->status == 1)
          <tr>
            <th scope="row">{{ ++$key }}</th>
            <td>{{ $category->name }}</td>
            <td>{{ $category->admin->name }}</td>
            <td>{{ $category->updated_at }}</td>
            <td>
              <a href="{{ route('admin.category.edit', $category->id)}}" class="btn btn-info">Sửa</a>
              <a href="{{ route('admin.category.hidden', $category->id)}}" class="btn btn-secondary">Ẩn</a>
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
        <th scope="col">Admin</th>
        <th scope="col">Ngày Cập nhật gần nhất</th>
        <th scope="col">Hành Động</th>
      </tr>
    </thead>
    <tbody>
      @foreach($categorydata as $key => $category)
        @if ($category->status == 0)
          <tr>
            <th scope="row">{{ ++$key }}</th>
            <td>{{ $category->name }}</td>
            <td>{{ $category->admin->name }}</td>
            <td>{{ $category->updated_at }}</td>
            <td>
              <a href="{{ route('admin.category.undo', $category->id)}}" class="btn btn-success">Hiện</a>
              <form action="{{ route('admin.category.destroy', $category->id)}}" method="POST">
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