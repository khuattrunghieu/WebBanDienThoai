@extends('admin.welcome')

@section('content')
<form action="{{ route('admin.color.store')}}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" name="name" id="name" aria-describedby="name" placeholder="Enter name">
  </div>
 
  <div class="form-group mb-3 mt-2">
    <label class="form-label" for="status">Trạng thái</label>
    <select class="form-select" id="status" name='status'>
        <option value="1">Hiện</option>
        <option value="0">Ẩn</option>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection

