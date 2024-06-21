@extends('adminlte::page')

@section('title', 'Create Top-Up Product')

@section('content_header')
    <h1>Create Top-Up Product</h1>
@stop

@section('content')
    <style>
        .img-thumbnail{
            max-width: 150px;
        }
    </style>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('top-up.store') }}" method="POST" enctype="multipart/form-data" id="dynamicForm">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Image Vertical Banner:</strong>
                    <input type="file" name="image-vertical" accept="image/*" onchange="loadFile(event)"><br>
                    <img id="image-vertical" class="col-1"/>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 my-5">
                <div class="form-group col-8">
                    <strong>Image Detail:</strong>
                    <div class="" id="inputContainer">
                        <div class="input-group mb-3">
                            <img src="" alt="Image Preview" class="img-thumbnail" style="max-width: 150px; display: none;">
                            <input type="file" class="form-control file-input align-items-center" name="image-detail[]" accept="image/*">
                            <button type="button" class="btn btn-danger remove-field" style="display: none;">-</button>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary" id="addField">+</button>
                </div>
            </div>

            <div class="col-xs-3 col-sm-3 col-md-3 mt-2">
                <div class="form-group">
                    <strong>Price in Rupiah:</strong>
                    <input type="number" name="price" class="form-control" placeholder="800000">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Product Name:</strong>
                    <input type="text" name="product-name" class="form-control" placeholder="Akun Valoran Sultan">
                </div>
            </div>
            <div class="d-flex col-6">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Title/Game:</strong>
                        <input type="text" name="title" class="form-control" placeholder="Valorant">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Developer:</strong>
                        <input type="text" name="developer" class="form-control" placeholder="RIOT">
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Description:</strong>
                    <textarea class="form-control summernote" style="height:150px" name="description" placeholder="Game Valo adalah.."></textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        
    </form>

    <script>
        var loadFile = function(event) {
            var output = document.getElementById('image-vertical');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
            }
        };
        var loadFile1 = function(event) {
            var output = document.getElementById('image-horizontal');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
            }
        };
        var loadFile2 = function(event) {
            var output = document.getElementById('image-square');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('addField').addEventListener('click', function() {
                var inputContainer = document.getElementById('inputContainer');
                var newInputGroup = document.createElement('div');
                newInputGroup.className = 'input-group mb-3';
                
                var imgPreview = document.createElement('img');
                imgPreview.src = '';
                imgPreview.alt = 'Image Preview';
                imgPreview.className = 'img-thumbnail'
                imgPreview.style.display = 'none';
                
                newInputGroup.innerHTML = `
                    <input type="file" class="form-control file-input" name="fields[]" accept="image/*">
                    <button type="button" class="btn btn-danger remove-field">-</button>
                `;
                
                newInputGroup.insertBefore(imgPreview, newInputGroup.firstChild);
                inputContainer.appendChild(newInputGroup);

                // Add event listener to the new remove button
                newInputGroup.querySelector('.remove-field').addEventListener('click', function() {
                    inputContainer.removeChild(newInputGroup);
                });

                // Add event listener to the new file input
                newInputGroup.querySelector('.file-input').addEventListener('change', function(event) {
                    loadFile(event, imgPreview);
                });
            });

            // Add event listener to the initial remove button
            var initialRemoveButton = document.querySelector('.remove-field');
            initialRemoveButton.style.display = 'inline-block';
            initialRemoveButton.addEventListener('click', function() {
                var inputContainer = document.getElementById('inputContainer');
                inputContainer.removeChild(initialRemoveButton.parentNode);
            });

            // Add event listener to the initial file input
            var initialFileInput = document.querySelector('.file-input');
            var initialImgPreview = document.querySelector('.img-thumbnail');
            initialFileInput.addEventListener('change', function(event) {
                loadFile(event, initialImgPreview);
            });
        });

        function loadFile(event, imgPreview) {
            var input = event.target;
            var reader = new FileReader();
            reader.onload = function() {
                var dataURL = reader.result;
                imgPreview.src = dataURL;
                imgPreview.style.display = 'block';
            };
            reader.readAsDataURL(input.files[0]);
        }
    </script>
@stop
