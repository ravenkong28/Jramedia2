@extends('layouts.main')

@section('header')
    @include('partials.navbar')
@endsection

<style>
    .gray1{
        background-color: #ececec;
    }

    .card{
        padding: 30px 40px;
        margin-top: 60px;
        margin-bottom: 60px;
        border: none !important;
        box-shadow: 0 6px 12px 0 rgba(0,0,0,0.2);
        
    }

    .form-control-label{
        margin-bottom: 0
    }
    
    input, textarea, button{
        padding: 8px 15px;
        border-radius: 5px !important;
        margin: 5px 0px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        font-size: 18px !important;
        font-weight: 300
    }
    
    input:focus, textarea:focus{
        -moz-box-shadow: none !important;
        -webkit-box-shadow: none !important;
        box-shadow: none !important;
        border: 1px solid #00BCD4;
        outline-width: 0;
        font-weight: 400;
    }
    
    .btn-block{
        text-transform: uppercase;
        font-size: 15px !important;
        font-weight: 400;
        height: 43px;
        cursor: pointer
    }
    
    .btn-block:hover{
        color: #fff !important
    }
    
    button:focus{
        -moz-box-shadow: none !important;
        -webkit-box-shadow: none !important;
        box-shadow: none !important;
        outline-width: 0
    }

    select.input-group-text{
        background-color: white;
    }

    input{
        background-color: white;
    } */
</style>

@section('content')  
    <body id="body">
        <div id="box1" class = "mt-3 mb-2">
            <div class="container">
                <div class="card gray1">
                    <h1 class="text-center mb-4 text-info">Update Product Form</h1>
                    <form method="post" action="/home/view-products/{{ $item->slug }}" class="mb-5" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-12 flex-column d-flex"> 
                                <label class="form-control-label px-3">Product Name</label> 
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" 
                                placeholder="Enter Product Name..." required autofocus value ="{{ old('name', $item->name) }}"> 
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row justify-content-between text-left">
                            <div class="form-group col-12 flex-column d-flex"> 
                                <label class="form-control-label px-3">Product Price</label> 
                                <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price"
                                placeholder="Enter Product Price..." required value ="{{ old('price', $item->price) }}"> 
                                @error('price')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row justify-content-between text-left">
                            <div class="form-group col-12 flex-column d-flex"> 
                                <label class="form-control-label px-3">Product Description</label> 
                                <input type="text" class="form-control @error('desc') is-invalid @enderror" id="desc" name="desc" 
                                placeholder="Enter Product Description..." required value ="{{ old('desc', $item->desc) }}"> 
                                @error('desc')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group d-flex flex-lg-row"> 
                                <label class="input-group-text border-0"> 
                                    <i>Product Type</i>
                                </label>
                                <select class= "form-select text-left" name="type_id" id="type_id">
                                    @foreach ($types as $type)
                                        @if(old('type_id', $item->type_id)==$type->id)
                                            <option value="{{ $type->id }}" selected>{{ $type->name }}</option>
                                        @else
                                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="row col">
                            <input type="hidden" name="oldImage" value="{{ $item->image }}">
                            <div class="form-group col-sm-5 flex-column d-flex">
                                @if ($item->image)
                                    <img src="{{ asset('storage/'.$item->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block"> 
                                @else
                                    <img src="" class="img-preview img-fluid mb-3 col-sm-5">
                                @endif
                            </div>
                            <div class="form-group col-12 flex-column d-flex">
                                <input type="file" class="custom-file-input form-control @error('image') is-invalid @enderror" id="image" name="image" onchange = "previewImage()">
                                <label class="custom-file-label form-control" for="image">Upload Product Image</label>
                                @error('image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row justify-content-end">
                            <div class="form-group col-12"> <button type="submit" class="btn-block btn-success">Update Product</button> </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>    
    </body>

    <script>
        const name =document.querySelector('#name');
        const slug =document.querySelector('#slug');
    
        title.addEventListener('change',function(){
            fetch("/dashboard/checkSlug?name=" + name.value)
                .then(response=>response.json())
                .then(data => slug.value = data.slug)
        });
    
        document.addEventListener('trix-file-accept', function(e){
            e.preventDefault();
        })
    

        function previewImage(){
            const image = document.querySelector('#image')
            const imgPreview = document.querySelector('.img-preview')
            
            imgPreview.style.display = 'block';
    
            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);
    
            oFReader.onload = function(oFREvent){
                imgPreview.src = oFREvent.target.result;
            }
    
        }
    </script>
@endsection

@section('footer')
    @include('partials.footer')
@endsection