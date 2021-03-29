@extends('layouts.master')

@section('title', 'Laravel')

@section('content')
    <div class="section-body">
        <head>
            <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet' type='text/css'>
            <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
            <style>
              html, body {
              min-height: 100%;
              }
              body, div, form, input, select, p { 
              padding: 5px;
              margin: 0;
              outline: none;
              font-family: Roboto, Arial, sans-serif;
              font-size: 13px;
              color: #666;
              }
              h1 {
              margin: 10px;
              font-weight: 50;
              font-size: 25px;
              }
              h3 {
              margin: 12px 0;
              color: #2a6ead;
              }
              .main-block {
              display: flex;
              justify-content: center;
              align-items: center;
              background: #fff;
              }
              form {
              width: 90%;
              padding: 20px;
              }
              fieldset {
              border: none;
              border-top: 1px solid #3e8dc2;
              }
              .account-details, .personal-details {
              display: block;
              flex-wrap: wrap;
              }
              .account-details >div, .personal-details >div >div {
              display: block;
              align-items: center;
              margin-bottom: 5px;
              }
              .account-details >div, .personal-details >div, input, label {
              width: 100%;
              }
              label {
              padding: 10px 2px;
              text-align: left;
              vertical-align: middle;
              }
              input {
              padding: 10px;
              vertical-align: middle;
              }
              button {
              width: 20%;
              margin: 10px auto;
              border-radius: 5px; 
              border: none;
              background: #304fb6;
              font-size: 14px;
              font-weight: 600;
              color: #fff;
              }
              button:hover {
              background: #348cb5;
              }
              @media (min-width: 568px) {
              .account-details >div, .personal-details >div {
              width: 75%;
              }
              label {
              width: 75%;
              }
              }
            </style>
          </head>
        <body>
            <div class="main-block">
            <form action={{route('crud.simpan')}} method="POST">
              @csrf
              <h1>Tambah Data Barang</h1>
              <fieldset>
                <div  class="account-details">
                  <div class="mb-3">
                    <label @error('kode_barang') class="text-danger" @enderror for="exampleFormControlInput1" class="form-label">@error('kode_barang')
                      {{ $message }}
                    @enderror</label>
                    <input type="text" value="{{ old('kode_barang') }}" class="form-control" id="kode_barang" name="kode_barang" placeholder="kode barang">
                  </div>
                  <div class="mb-3">
                    <label @error('nama_barang') class="text-danger" @enderror for="exampleFormControlInput1" class="form-label">@error('nama_barang')
                      {{ $message }}
                    @enderror</label>
                    <input type="text" value="{{ old('nama_barang') }}" class="form-control" id="nama_barang" name="nama_barang" placeholder="nama barang">
                  </div>
                  
                </div>
              </fieldset>
              <div>
                <button class="btn btn-primary mr-1" type="submit">Submit</button>
                <button class="btn btn-secondary" type="reset">Cancel</button>
              </div>
            </form>
            </div> 
          </body>
    </div>

@endsection

@push('page-scripts')
    
@endpush