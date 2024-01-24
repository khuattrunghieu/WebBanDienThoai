@extends('admin.welcome')

@section('content')
{{ $products = $product }}

<div class="mt-2">
  <a class="btn btn-primary me-2" href="{{ route('admin.product.create') }}" role="button">Thêm</a>
</div>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">STT</th>
        <th scope="col">Name</th>
        <th scope="col">Admin</th>
        <th scope="col">Ngày cập nhật</th>
        <th scope="col">Hành Động</th>
      </tr>
    </thead>
    <tbody>
      @foreach($product as $key => $product)
      {{-- @dd($product->trademark) --}}
        @if ($product->status == 1)
          <tr>
            <th scope="row">{{ ++$key }}</th>
            <td>{{ $product->name }}</td>
            <td>{{ $product->admin->name }}</td>
            <td>{{ $product->updated_at }}</td>
            <td>
              <a href="{{ route('admin.product.edit', $product->id)}}" class="btn btn-warning">Sửa</a>
              @if ($product->descriptions == NULL)
                <a href="{{ route('admin.product.createDes', $product->id)}}" class="btn btn-warning">Thêm mô tả</a>
              @else
                <a href="{{ route('admin.product.editDes', $product->id)}}" class="btn btn-warning">Sửa mô tả</a>
              @endif
              @if (!empty($product->product_img->product_id))
                <a href="{{ route('admin.product.createImg', $product->id)}}" class="btn btn-warning">Thêm ảnh và giá</a>
              @else
                <a href="{{ route('admin.product.editImg', $product->id)}}" class="btn btn-warning">Sửa ảnh và giá</a>
              @endif
              <a href="{{ route('admin.product.hidden', $product->id)}}" class="btn btn-secondary">Ẩn</a>
            </td>
          </tr>
        @endif
      @endforeach
    </tbody>
  </table>
  <div>
    Các sản phẩm đã ẩn:
  </div>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">STT</th>
        <th scope="col">Name</th>
        <th scope="col">Admin</th>
        <th scope="col">Ngày cập nhật</th>
        <th scope="col">Hành Động</th>
      </tr>
    </thead>
    <tbody>
      @foreach($products as $key => $product)
        @if ($product->status == 0)
          <tr>
            <th scope="row">{{ ++$key }}</th>
            <td>{{ $product->name }}</td>
            <td>{{ $product->admin->name }}</td>
            <td>{{ $product->updated_at }}</td>
            <td>
              <a href="{{ route('admin.product.undo', $product->id)}}" class="btn btn-success">Hiện</a>
              <form action="{{ route('admin.product.destroy', $product->id)}}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-icon btn-outline-danger"><i class="bx bx-trash-alt"></i></button>
              </form>
            </td>
          </tr>
        @endif
      @endforeach
    </tbody>
  </table>
  {{-- {{ $product->links() }} --}}
@endsection