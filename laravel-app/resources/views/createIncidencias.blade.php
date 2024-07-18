@extends('layout.home')

@section('content')
    @php
        setlocale(LC_TIME, "es_MX.UTF-8");
        $fecha = new Carbon\Carbon($actividades->created_at);
        $days = $fecha->formatLocalized('%d %m %Y');
    @endphp
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css" media="all">
    <div uk-grid>
        <div class="uk-visible@m uk-width-1-6@m">
            @include('partials.sidebarsub')
        </div>
        <div class="uk-width-expand@m padd_style">
            <div class="uk-text-center">
                <h2 class="uk-article-title color_1">Crear Incidencia {{Auth::user()->name}} {{Auth::user()->apellido}}</h2>
            </div>

            <div class="uk-card uk-card-default uk-card-body "style="background: transparent">

                <div class="uk-grid-column-small uk-grid-row-large uk-child-width-1-2@s uk-text-left" uk-grid>
                    <div class="uk-margin">
                        <div class="uk-text-left">
                            <label style="color: black; font-size: 35px; margin: 0px;">Resumen de la Actividad</label>
                        </div>
                        <p class="uk-article-meta" style="margin-top: 20px">Creado por: {{ $actividades->user->name }} {{ $actividades->user->apellido }}</p>
                        <p class="uk-article-meta">El: {{ $days }}</p>
                        <div class="uk-margin" style="margin-top: 23px">
                            <p class="uk-article-meta" style="color: #BC955C; font-size: 18px"> Tipo de Actividad: {{ $actividades->nombre }}</p>
                            <p class="uk-article-meta" style="color: #BC955C; font-size: 18px"> Tipo de Subactividad: {{ $actividades->descripcion_actividad }}</p>
                            <p class="uk-article-meta" style="color: #BC955C; font-size: 18px"> Tipo de Subactividad #2: {{ $actividades->descripcion_subactividad }}</p>
                            <p class="uk-article-meta" style="color: #BC955C; font-size: 18px"> Notas: {{ $actividades->notas }}</p>
                        </div>
                    </div>
                    <div>
                        <form action="{{route('storeIncidencias',[$actividades->id])}}" enctype="multipart/form-data" method="POST" id="image-upload" class="dropzone">
                            @csrf
                        </form>
                        <form action="{{route('storeIncidenciasCont',[$actividades->id])}}" method="POST">
                            @csrf
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-text" style="font-size: 18px">Nombre de la Incidencia</label>
                                <div class="uk-form-controls">
                                    <input required name="nombre" class="uk-input" id="form-stacked-text" type="text" placeholder="Nombre">
                                </div>
                            </div>

                            <div class="uk-margin uk-hidden">
                                <label class="uk-form-label" for="form-stacked-text" style="font-size: 18px">ID</label>
                                <div class="uk-form-controls">
                                    <input required name="actividad_id" class="uk-input" id="form-stacked-text" type="text" value="{{ $actividades->id }}" placeholder="Nombre">
                                </div>
                            </div>


                            {{--                        <style>--}}
                            {{--                            html * {--}}
                            {{--                                box-sizing: border-box;--}}
                            {{--                            }--}}
                            {{--                            p {--}}
                            {{--                                margin: 0;--}}
                            {{--                            }--}}
                            {{--                            .upload__box {--}}
                            {{--                                padding: 40px;--}}
                            {{--                            }--}}
                            {{--                            .upload__inputfile {--}}
                            {{--                                width: 0.1px;--}}
                            {{--                                height: 0.1px;--}}
                            {{--                                opacity: 0;--}}
                            {{--                                overflow: hidden;--}}
                            {{--                                position: absolute;--}}
                            {{--                                z-index: -1;--}}
                            {{--                            }--}}
                            {{--                            .upload__btn {--}}
                            {{--                                display: inline-block;--}}
                            {{--                                font-weight: 600;--}}
                            {{--                                color: #fff;--}}
                            {{--                                text-align: center;--}}
                            {{--                                min-width: 116px;--}}
                            {{--                                padding: 5px;--}}
                            {{--                                transition: all 0.3s ease;--}}
                            {{--                                cursor: pointer;--}}
                            {{--                                border: 2px solid;--}}
                            {{--                                background-color: #9F2241;--}}
                            {{--                                border-color: #9F2241;--}}
                            {{--                                border-radius: 10px;--}}
                            {{--                                line-height: 26px;--}}
                            {{--                                font-size: 14px;--}}
                            {{--                            }--}}
                            {{--                            .upload__btn:hover {--}}
                            {{--                                background-color: unset;--}}
                            {{--                                color: #9F2241;--}}
                            {{--                                transition: all 0.3s ease;--}}
                            {{--                            }--}}
                            {{--                            .upload__btn-box {--}}
                            {{--                                margin-bottom: 10px;--}}
                            {{--                            }--}}
                            {{--                            .upload__img-wrap {--}}
                            {{--                                display: flex;--}}
                            {{--                                flex-wrap: wrap;--}}
                            {{--                                margin: 0 -10px;--}}
                            {{--                            }--}}
                            {{--                            .upload__img-box {--}}
                            {{--                                width: 200px;--}}
                            {{--                                padding: 0 10px;--}}
                            {{--                                margin-bottom: 12px;--}}
                            {{--                            }--}}
                            {{--                            .upload__img-close {--}}
                            {{--                                width: 24px;--}}
                            {{--                                height: 24px;--}}
                            {{--                                border-radius: 50%;--}}
                            {{--                                background-color: rgba(0, 0, 0, 0.5);--}}
                            {{--                                position: absolute;--}}
                            {{--                                top: 10px;--}}
                            {{--                                right: 10px;--}}
                            {{--                                text-align: center;--}}
                            {{--                                line-height: 24px;--}}
                            {{--                                z-index: 1;--}}
                            {{--                                cursor: pointer;--}}
                            {{--                            }--}}
                            {{--                            .upload__img-close:after {--}}
                            {{--                                content: '\2716';--}}
                            {{--                                font-size: 14px;--}}
                            {{--                                color: white;--}}
                            {{--                            }--}}
                            {{--                            .img-bg {--}}
                            {{--                                background-repeat: no-repeat;--}}
                            {{--                                background-position: center;--}}
                            {{--                                background-size: cover;--}}
                            {{--                                position: relative;--}}
                            {{--                                padding-bottom: 100%;--}}
                            {{--                            }--}}
                            {{--                        </style>--}}

                            {{--                        <div class="upload__box">--}}
                            {{--                            <div class="upload__btn-box">--}}
                            {{--                                <label class="upload__btn">--}}
                            {{--                                    <p>Cargar evidencia</p>--}}
                            {{--                                    <input name="file" type="file" multiple="" data-max_length="20" class="upload__inputfile">--}}
                            {{--                                </label>--}}
                            {{--                            </div>--}}
                            {{--                            <div class="upload__img-wrap"></div>--}}
                            {{--                        </div>--}}

                            {{--                            <script>--}}
                            {{--                                jQuery(document).ready(function () {--}}
                            {{--                                    ImgUpload();--}}
                            {{--                                });--}}

                            {{--                                function ImgUpload() {--}}
                            {{--                                    var imgWrap = "";--}}
                            {{--                                    var imgArray = [];--}}

                            {{--                                    $('.upload__inputfile').each(function () {--}}
                            {{--                                        $(this).on('change', function (e) {--}}
                            {{--                                            imgWrap = $(this).closest('.upload__box').find('.upload__img-wrap');--}}
                            {{--                                            var maxLength = $(this).attr('data-max_length');--}}

                            {{--                                            var files = e.target.files;--}}
                            {{--                                            var filesArr = Array.prototype.slice.call(files);--}}
                            {{--                                            var iterator = 0;--}}
                            {{--                                            filesArr.forEach(function (f, index) {--}}

                            {{--                                                if (!f.type.match('image.*')) {--}}
                            {{--                                                    return;--}}
                            {{--                                                }--}}

                            {{--                                                if (imgArray.length > maxLength) {--}}
                            {{--                                                    return false--}}
                            {{--                                                } else {--}}
                            {{--                                                    var len = 0;--}}
                            {{--                                                    for (var i = 0; i < imgArray.length; i++) {--}}
                            {{--                                                        if (imgArray[i] !== undefined) {--}}
                            {{--                                                            len++;--}}
                            {{--                                                        }--}}
                            {{--                                                    }--}}
                            {{--                                                    if (len > maxLength) {--}}
                            {{--                                                        return false;--}}
                            {{--                                                    } else {--}}
                            {{--                                                        imgArray.push(f);--}}

                            {{--                                                        var reader = new FileReader();--}}
                            {{--                                                        reader.onload = function (e) {--}}
                            {{--                                                            var html = "<div class='upload__img-box'><div style='background-image: url(" + e.target.result + ")' data-number='" + $(".upload__img-close").length + "' data-file='" + f.name + "' class='img-bg'><div class='upload__img-close'></div></div></div>";--}}
                            {{--                                                            imgWrap.append(html);--}}
                            {{--                                                            iterator++;--}}
                            {{--                                                        }--}}
                            {{--                                                        reader.readAsDataURL(f);--}}
                            {{--                                                    }--}}
                            {{--                                                }--}}
                            {{--                                            });--}}
                            {{--                                        });--}}
                            {{--                                    });--}}

                            {{--                                    $('body').on('click', ".upload__img-close", function (e) {--}}
                            {{--                                        var file = $(this).parent().data("file");--}}
                            {{--                                        for (var i = 0; i < imgArray.length; i++) {--}}
                            {{--                                            if (imgArray[i].name === file) {--}}
                            {{--                                                imgArray.splice(i, 1);--}}
                            {{--                                                break;--}}
                            {{--                                            }--}}
                            {{--                                        }--}}
                            {{--                                        $(this).parent().parent().remove();--}}
                            {{--                                    });--}}
                            {{--                                }--}}
                            {{--                            </script>--}}

                            <label class="uk-margin uk-form-label" for="form-stacked-text" style="font-size: 18px">Nuevas notas</label>
                            <div class="uk-form-width-large">
                                <textarea name="notas" class="uk-textarea" rows="5" placeholder="Escribir nuevas notas"></textarea>
                            </div>
                            {{--<label class="uk-margin uk-form-label" for="form-stacked-select" style="font-size: 18px">Status</label>--}}
                            <div class="uk-form-controls uk-hidden">
                                <select required name="status" class="uk-select" id="form-stacked-select">
                                    <option value="pendiente">Pendiente</option>
                                </select>
                            </div>
                            @if(Auth::User()->rol === 'general')
                                <label class="uk-margin uk-form-label" for="form-stacked-select" style="font-size: 18px">Nombre del usuario</label>
                                <div class="uk-form-controls">
                                    <select required name="nombre_usuario" class="uk-select" id="form-stacked-select">
                                        @foreach($usuarios as $u)
                                            <option value="{{ $u->id }}">{{ $u->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            @else
                                <div class="uk-margin uk-form-width-large uk-hidden">
                                    <input value="{{ $user->id }}" name="nombre_usuario" class="uk-textarea" rows="5" placeholder="Escribir notas"></input>
                                </div>
                            @endif

                            <a href="{{route('cancelIncidencias',[$actividades->id])}}"">
                                <button type="button" class="button_back"style="width: 150px;height: 30px">
                                    Cancelar
                                </button>
                            </a>
                            <button type="submit" class="button_back"style="width: 170px;height: 30px">
                                Guardar incidencia
                            </button>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>
    <script type="text/javascript">
        Dropzone.autoDiscover = false;

        var dropzone = new Dropzone('#image-upload', {
            thumbnailWidth: 1200,
            maxFilesize: 100Mb,
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            dictDefaultMessage: "Arrastra aquí tus imagenes",

            init: function() {
                console.log('init');

                // this.on("queuecomplete", function (file) {
                //     $( "#images_reload" ).load(window.location.href + "#images_reload" );
                // }),


                this.on("error", function(file, message) {
                    alert('El archivo que intentas subir excede la medida sugerida, intenta con otro archivo.');
                    this.removeFile(file);
                });

            },

        });
    </script>


{{--    <script>--}}
{{--        Dropzone.options.myAwesomeDropzone = { // camelized version of the `id`--}}
{{--            headers:{--}}
{{--                'X-CSRF-TOKEN': "{{ csrf_token() }}"--}}
{{--            },--}}
{{--            dictDefaultMessage: "Arrastra una imagen hasta aqui o selecciona una <br> Medidas de las imagenes 760 x 560"--}}
{{--        };--}}
{{--    </script>--}}
@endsection