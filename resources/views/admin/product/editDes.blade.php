@extends('admin.welcome')

@section('content')
    <form action="{{ route('admin.product.updateDes', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row container">
            <div class="col-xl-10">
                <div class="card mb-4">
                    <h5 class="card-header">Mô tả sản phẩm</h5>
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

                <div class="card" id='add'>
                    <div class="card-body">
                        <div class="mb-3 row">
                            <label for="html5-text-input" class="col-md-2 col-form-label">Mô tả</label>
                            <div class="col-md-10">
                                <textarea name="descriptions" id="editor">{{ $product->descriptions }}</textarea>
                                {{-- <script type="text/javascript">
                                    CKEDITOR.replace( '#editor' );                     
                                </script> --}}

                                <script>
                                    ClassicEditor
                                        .create(document.querySelector('#editor'))
                                        .then(editor => {
                                            console.log(editor);
                                        })
                                        .catch(error => {
                                            console.error(error);
                                        });
                                </script>
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
@endsection
