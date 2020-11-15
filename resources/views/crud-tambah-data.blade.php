@extends('layouts.master')
{{-- Title --}}
@section('title','Laravel ')
{{-- Content --}}
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                {{-- <div class="card-header">
                  <h4>HTML5 Form Basic</h4>
                </div> --}}
                <div class="card-body">
                  {{-- <div class="alert alert-info">
                    <b>Note!</b> Not all browsers support HTML5 type input.
                  </div> --}}
                  <form action="{{route('crud.simpan')}}" method="POST">
                    {{-- Cross Site Request Forgery --}}
                    @csrf 
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Kode barang</label>
                                <label class="text-danger" for="">
                                    @error('kode_barang'){{$message}}@enderror
                                </label>
                                <input type="text" name="kode_barang" value="{{old('kode_barang')}}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Barang</label>
                                <label class="text-danger" for="">
                                    @error('nama_barang'){{$message}}@enderror
                                </label>
                                <input type="text" name="nama_barang" value="{{old('kode_barang')}}" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary mr-1" type="submit">Simpan</button>
                        <button class="btn btn-danger mr-1" type="reset">Reset</button>
                        <a href="{{route('crud')}}" class="btn btn-warning">Kembali</a>
                    </div>
                </form>
              </div>
        </div>
    </div>
</div>
@endsection
{{-- Script --}}
@push('page-scripts')
@endpush
