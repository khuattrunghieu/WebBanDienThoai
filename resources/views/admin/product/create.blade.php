@extends('admin.welcome')

@section('content')
    <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row container">
            <div class="col-xl-10">
                <div class="card mb-4">
                    <h3 class="card-header">Thêm sản phẩm</h3>
                    <div class="card-body">
                        <h5 class="card-header"><mark>Thông tin sản phẩm</mark></h5>
                        <div class="mb-3 row">
                            <label for="html5-text-input" class="col-md-2 col-form-label">Tên sản phẩm</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name='name' value=""
                                    id="html5-text-input" />
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="html5-number-input" class="col-md-2 col-form-label">Nhãn Hiệu</label>
                            <div class="col-md-10">
                                <select class="form-control" id="trademark" name='trademark'>
                                    <option selected>Nhãn Hiệu</option>
                                    @foreach ($trademark as $key => $trademark)
                                        <option value="{{ $trademark->id }}">{{ $trademark->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <h5 class="card-header"><mark>Hệ điều hành & CPU</mark></h5>
                        <div class="mb-3 row">
                            <label for="html5-number-input" class="col-md-2 col-form-label">vi sử lý</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" value="" name='processor'
                                    id="html5-number-input" />
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="html5-number-input" class="col-md-2 col-form-label">tốc độ cpu</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" value="" name='cpu'
                                    id="html5-number-input" />
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="html5-number-input" class="col-md-2 col-form-label">Vi xử lý đồ họa (GPU)</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" value="" name='gpu'
                                    id="html5-number-input" />
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="html5-number-input" class="col-md-2 col-form-label">hệ điều hành</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" value="" name='operating_system'
                                    id="html5-number-input" />
                            </div>
                        </div>

                        <h5 class="card-header"><mark>Bộ nhớ & Lưu trữ</mark></h5>
                        <div class="mb-3 row">
                            <label for="html5-number-input" class="col-md-2 col-form-label">ram</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" value="" name='ram'
                                    id="html5-number-input" />
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="html5-number-input" class="col-md-2 col-form-label">Dung lượng lưu trữ:</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" value="" name='rom'
                                    id="html5-number-input" />
                            </div>
                        </div>

                        <h5 class="card-header"><mark>Màn hình</mark></h5>
                        <textarea id="screen" name="screen"></textarea>
                        <script>
                            ClassicEditor
                                .create(document.querySelector('#screen'), {
                                    toolbar: {
                                        items: ['bold', 'italic','link', '|', 'undo', 'redo', '-', 'numberedList', 'bulletedList', 'insertTable'],
                                        shouldNotGroupWhenFull: true
                                    }
                                })
                        </script>
                        
                        <h5 class="card-header"><mark>Camera sau</mark></h5>
                        <textarea id="r_camera" name="r_camera"></textarea>
                        <script>
                            ClassicEditor
                                .create(document.querySelector('#r_camera'), {
                                    toolbar: {
                                        items: ['bold', 'italic','link', '|', 'undo', 'redo', '-', 'numberedList', 'bulletedList', 'insertTable'],
                                        shouldNotGroupWhenFull: true
                                    }
                                })
                        </script>
                        

                        <h5 class="card-header"><mark>Camera trước</mark></h5>
                        <textarea id="f_camera" name="f_camera"></textarea>
                        <script>
                            ClassicEditor
                                .create(document.querySelector('#f_camera'), {
                                    toolbar: {
                                        items: ['bold', 'italic','link', '|', 'undo', 'redo', '-', 'numberedList', 'bulletedList', 'insertTable'],
                                        shouldNotGroupWhenFull: true
                                    }
                                })
                        </script>

                        <h5 class="card-header"><mark>Kết nối</mark></h5>
                        <textarea id="connect" name="connect"></textarea>
                        <script>
                            ClassicEditor
                                .create(document.querySelector('#connect'), {
                                    toolbar: {
                                        items: ['bold', 'italic','link', '|', 'undo', 'redo', '-', 'numberedList', 'bulletedList', 'insertTable'],
                                        shouldNotGroupWhenFull: true
                                    }
                                })
                        </script>
                        <h5 class="card-header"><mark>Pin & Sạc</mark></h5>
                        <textarea id="battery_charger" name="battery_charger"></textarea>
                        <script>
                            ClassicEditor
                                .create(document.querySelector('#battery_charger'), {
                                    toolbar: {
                                        items: ['bold', 'italic','link', '|', 'undo', 'redo', '-', 'numberedList', 'bulletedList', 'insertTable'],
                                        shouldNotGroupWhenFull: true
                                    }
                                })
                        </script>
                        <h5 class="card-header"><mark>Thông tin thêm</mark></h5>
                        <textarea id="general" name="general"></textarea>
                        <script>
                            ClassicEditor
                                .create(document.querySelector('#general'), {
                                    toolbar: {
                                        items: ['bold', 'italic','link', '|', 'undo', 'redo', '-', 'numberedList', 'bulletedList', 'insertTable'],
                                        shouldNotGroupWhenFull: true
                                    }
                                })
                        </script>
                    </div>
                    <div class="card-body">
                        <div class="row mt-3">
                            <div class="d-grid gap-2 col-lg-6 mx-auto">
                                <button class="btn btn-primary btn-lg" type="submit">Tiếp theo</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
