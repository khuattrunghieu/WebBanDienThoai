@extends('admin.welcome')

@section('content')
    {{ $color1 = $color }}
    @foreach ($product as $key => $product)
        <form action="{{ route('admin.product.storeImg', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row container">
                <div class="col-xl-10">
                    <div class="card mb-4">
                        <h5 class="card-header">Thêm ảnh sản phẩm</h5>
                        <div class="card-body">
                            <div class="mb-3 row">
                                <label for="html5-text-input" class="col-md-2 col-form-label">Tên sản phẩm</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name='name' value="{{ $product->name }}"
                                        id="html5-text-input" disabled />
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- File input -->
                    <div class="card-body">
                        <div class=" mt-2">
                            <button type="button" class="btn btn-primary me-2" onclick="append_jquery()">Thêm</button>
                        </div>
                    </div>
                    <div class="card" id='add'>
                        <div class="card-body">
                            <div class="mb-3 row">
                                <label for="html5-number-input" class="col-md-2 col-form-label">Màu</label>
                                <div class="col-md-10">
                                    <select class="form-control" name='id_color[]'>
                                        <option selected>Màu</option>
                                        @foreach ($color as $key => $color)
                                            <option value="{{ $color->id }}">{{ $color->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="formFileMultiple" class="form-label">Multiple files input example</label>
                                <input class="form-control" name="image[]" type="file" id="formFileMultiple" multiple />
                            </div>
                            <div class="mb-3 row">
                                <label for="html5-text-input" class="col-md-2 col-form-label">Gía</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name='price[]' id="html5-text-input" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row mt-3">
                            <div class="d-grid gap-2 col-lg-6 mx-auto">
                                <button class="btn btn-primary btn-lg" type="submit">SAVE</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    @endforeach
    <script>
        var html = `<div class='card add'>
                        <div class='card-body'>
                            <div class='mb-3 row'>
                                <label for="html5-number-input" class="col-md-2 col-form-label">Màu</label>
                                <div class="col-md-10">
                                    <select class="form-control" name='id_color[]'>
                                        <option selected>Màu</option>
                                        @foreach ($color1 as $key => $color)
                                            <option  value="{{ $color->id }}">{{ $color->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="formFileMultiple" class="form-label">Multiple files input example</label>
                                <input class="form-control" name="image[]" type="file" id="formFileMultiple" multiple />
                            </div>
                            <div class="mb-3 row">
                                <label for="html5-text-input" class="col-md-2 col-form-label">Gía</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name='price[]' id="html5-text-input"/>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class=" mt-2">
                                    <button type='button' class="btn btn-primary me-2" onclick="remove_app(this)">Xóa</button>
                                </div>
                            </div>
                        </div>
                    </div>`;

        function append_jquery() {
            $("#add").append(html);
        }
        function remove_app(e) {
            $(e).parents('.add').remove()
        }
    </script>
@endsection
