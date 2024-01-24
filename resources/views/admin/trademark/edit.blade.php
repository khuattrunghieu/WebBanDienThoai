@extends('admin.welcome')

@section('content')
    <form action="{{ route('admin.trademark.update', $trademark->id) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label class="form-label" for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" aria-describedby="name"
                value="{{ $trademark->name }}">
        </div>
        <div class="form-group mb-3 mt-3">
            <label class="form-label" for="status">Trạng thái</label>
            <select class="form-select" id="status" name='status'>
                <option value="1" {{ $trademark->status == 1 ? 'selected' : '' }}>Hiện</option>
                <option value="0" {{ $trademark->status == 0 ? 'selected' : '' }}>Ẩn</option>
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
