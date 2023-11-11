@extends('admin.layouts.app')

@section('content')
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/css/tempusdominus-bootstrap-4.min.css"
        integrity="sha512-3JRrEUwaCkFUBLK1N8HehwQgu8e23jTH4np5NHOmQOobuC4ROQxFwFgBLTnhcnQRMs84muMh0PnnwXlPq5MGjg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .upload-btn-wrapper {
            position: relative;
            overflow: hidden;
            display: inline-block;
        }

        .upload-btn-wrapper input[type=file] {
            font-size: 100px;
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
        }


        .ck.ck-reset.ck-editor.ck-rounded-corners {
            height: 100%;
        }

        .ck-editor__editable {
            min-height: 350px;
        }
    </style>
    <div class="main-content-container container-fluid px-4">
        <div class="page-header row no-gutters py-4">
            <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Posts</span>
                <h3 class="page-title">Tambah Artikel</h3>
            </div>
        </div>
        <div class="card" style="overflow: hidden;">
            <div class="card-body">
                <img id="frame" src="{{ $post_title ? Storage::get($foto_sampul) : '' }}"
                    style="position: absolute;top:0;left:0;object-fit: cover; {{ $post_title ? 'display: block; width: 100%; height: 208px;' : 'display: none; width: 100%; height: 0px;' }}" />
                <div class="container-fluid" style="position: relative;z-index: 1;">
                    <form action="{{ $action }}" method="{{ $method }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group" style="margin-bottom: 5vh; margin-top: 7vh;">
                            @error('post_title')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <input type="text" class="form-control" value="{{ old('post_title', $post_title) }}" name="post_title" id="post_title" placeholder="Judul Post" style="background: #c9c9c985; border: none;font-size: 3vw;color: #666666;;" />
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-9 col-lg-9">
                                <div class="form-group">
                                    <textarea class="form-control @error('post_content')
                                        'is-invalid'
                                    @enderror" style="height: 80vh;" name="post_content" id="post_content" placeholder="Isi Post">{{ old('post_content',$post_content) }}</textarea>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <label for="post_category_id">Jenis Post @error('post_category_id')<div class="text-danger">{{ $message }}</div>@enderror</label>
                                    <select class="form-control" name="post_category_id" id="post_category_id"
                                        placeholder="Jenis Post">
                                        <option value="">-</option>
                                        @foreach ($post_category as $item)
                                            <option value="{{ $item->id }}" {{ $item->id == old('post_category_id',$post_category_id) ? 'selected' : '' }}>{{ $item->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="datetime">Tanggal Post @error('created_at')<div class="text-danger">{{ $message }}</div>@enderror</label>
                                    <div class="input-group date" id="datetimepicker2" data-target-input="nearest">
                                        <input type="text" name="created_at" id="created_at"
                                            placeholder="Tanggal Post" value="{{ old('created_at',$created_at) }}"
                                            class="form-control datetimepicker-input" data-target="#datetimepicker2" />
                                        <div class="input-group-append" data-target="#datetimepicker2"
                                            data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="text" name="tags" id="tags"
                                        placeholder="Tags " value="{{ $tags }}" />
                                </div>

                                <div class="form-group">
                                    <div class="upload-btn-wrapper">
                                        <button class="btn btn-secondary btn-upload-sampul-gambar">
                                            {{ $post_title ? 'Ganti Foto Sampul' : 'Upload Foto Sampul' }}
                                        </button>
                                        <input type="file" name="myfile" />
                                        <input type="file" name="foto_sampul" id="foto_sampul"
                                            placeholder="Foto Sampul" accept=".png,.jpeg,.jpg" />
                                    </div>
                                    @if ($post_title)
                                        <input type="hidden" name="foto_sampul_old" id="foto_sampul_old"
                                        value="{{ $foto_sampul }}">
                                    @endif
                                </div>
                            </div>
                        </div>
                        @if($method == 'PUT')
                            <input type="hidden" name="id" value="{{ $id }}" />
                        @endif
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="{{ route('admin.posts.index') }}" class="btn btn-default">Cancel</a>
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment-with-locales.min.js"
        integrity="sha512-LGXaggshOkD/at6PFNcp2V2unf9LzFq6LE+sChH7ceMTDP0g2kn6Vxwgg7wkPP7AAtX+lmPqPdxB47A0Nz0cMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/js/tempusdominus-bootstrap-4.min.js"
        integrity="sha512-k6/Bkb8Fxf/c1Tkyl39yJwcOZ1P4cRrJu77p83zJjN2Z55prbFHxPs9vN7q3l3+tSMGPDdoH51AEU8Vgo1cgAA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
    <script>
        jQuery(function() {


            $('#created_at').val("{{ $created_at }}")

            $('#datetimepicker2').datetimepicker({
                locale: 'id',
                widgetPositioning: {
                    vertical: 'bottom'
                },
                icons: {
                    time: 'fas fa-clock',
                    date: 'fas fa-calendar',
                    up: 'fas fa-arrow-up',
                    down: 'fas fa-arrow-down',
                    previous: 'fas fa-chevron-left',
                    next: 'fas fa-chevron-right',
                    today: 'fas fa-calendar-check-o',
                    clear: 'fas fa-trash',
                    close: 'fas fa-times'
                }
            });

            class myUploadAdapter {
                constructor(loader) {
                    this.loader = loader;
                }

                upload() {
                    return this.loader.file
                        .then(file => new Promise((resolve, reject) => {
                            this._initRequest();
                            this._initListeners(resolve, reject, file);
                            this._sendRequest(file);
                        }));
                }

                abort() {
                    if (this.xhr) {
                        this.xhr.abort();
                    }
                }

                _initRequest() {
                    const xhr = this.xhr = new XMLHttpRequest();

                    xhr.open('POST', "{{ route('admin.posts.uploadimage', ['_token' => csrf_token()]) }}", true);
                    xhr.responseType = 'json';
                }

                _initListeners(resolve, reject, file) {
                    const xhr = this.xhr;
                    const loader = this.loader;
                    const genericErrorText = `Couldn't upload file: ${ file.name }.`;

                    xhr.addEventListener('error', () => reject(genericErrorText));
                    xhr.addEventListener('abort', () => reject());
                    xhr.addEventListener('load', () => {
                        const response = xhr.response;

                        if (!response || response.error) {
                            return reject(response && response.error ? response.error.message : genericErrorText);
                        }

                        resolve({
                            default: response.url
                        });
                    });

                    if (xhr.upload) {
                        xhr.upload.addEventListener('progress', evt => {
                            if (evt.lengthComputable) {
                                loader.uploadTotal = evt.total;
                                loader.uploaded = evt.loaded;
                            }
                        });
                    }
                }

                _sendRequest(file) {
                    const data = new FormData();

                    data.append('upload', file);
                    this.xhr.send(data);
                }
            }

            function simpleUploadAdapterPlugin(editor) {
                editor.plugins.get('FileRepository').createUploadAdapter = (loader) => {
                    return new myUploadAdapter(loader);
                };
            }

            ClassicEditor
                .create(document.querySelector('#post_content'), {
                    extraPlugins: [simpleUploadAdapterPlugin],
                    toolbar: {
                        items: [
                            'heading',
                            '|',
                            'bold',
                            'italic',
                            'link',
                            'bulletedList',
                            'numberedList',
                            'blockQuote',
                            'insertTable',
                            'mediaEmbed',
                            'imageUpload',
                            'undo',
                            'redo'
                        ]
                    },
                    language: 'id',
                    table: {
                        contentToolbar: [
                            'tableColumn',
                            'tableRow',
                            'mergeTableCells'
                        ]
                    },
                    licenseKey: '',
                })
                .then(editor => {
                    console.log(editor);
                })
                .catch(error => {
                    console.error(error);
                });


            $('#foto_sampul').on('change', function(e) {
                var s = $(this)[0]

                if (s.files[0].size > 2097152) {
                    s.value = ""
                    frame.style.display = "none"
                    alert("Maksimal lampiran 2 MB")
                } else {
                    console.log(s.value)
                    var ext = s.value.match(/\.([^\.]+)$/)[1];
                    switch (ext) {
                        case 'jpg':
                        case 'jpeg':
                        case 'png':
                            $('#frame').css('height', '208px')
                            frame.style.display = "block"
                            frame.src = URL.createObjectURL(event.target.files[0]);
                            break;
                        default:
                            $('#frame').css('height', '0px')
                            alert('Not allowed');
                            this.value = '';
                    }
                }
            })
        });
    </script>
@endpush
