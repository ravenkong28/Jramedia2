@extends('layouts.main')

@section('header')
    @include('partials.navbar1')
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
                    <form class="form-card" onsubmit="event.preventDefault()">

                        <div class="row justify-content-between text-left">
                            <div class="form-group col-12 flex-column d-flex"> <label class="form-control-label px-3">Product Name</label> 
                                <input type="text" id="name" name="name" placeholder="Enter Product Name..." onblur="validate(6)"> 
                            </div>
                        </div>

                        <div class="row justify-content-between text-left">
                            <div class="form-group col-12 flex-column d-flex"> <label class="form-control-label px-3">Product Price</label> 
                                <input type="number" id="price" name="price" placeholder="Enter Product Price..." onblur="validate(6)"> 
                            </div>
                        </div>

                        <div class="row justify-content-between text-left">
                            <div class="form-group col-12 flex-column d-flex"> <label class="form-control-label px-3">Product Description</label> 
                                <input type="text" id="description" name="description" placeholder="Enter Product Description..." onblur="validate(6)"> 
                            </div>
                        </div>

                        <div class="row col">
                            <div class="form-group d-flex flex-lg-column"> 
                                <label class="input-group-text border-0"> 
                                    <i>Product Type</i>
                                </label>
                            </div>
                            <div class="form-group d-flex flex-lg-column">
                                <select class= "input-group-text text-left" name="product" id="product">
                                    <option value="volvo">Book</option>
                                    <option value="saab">Stationary</option>
                                    <option value="mercedes">Bag</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="input-group mb-3">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="inputGroupFile01"
                                    aria-describedby="inputGroupFileAddon01">
                                <label class="custom-file-label" for="inputGroupFile01">Upload Product Image</label>
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
@endsection

@section('footer')
    @include('partials.footer')
@endsection