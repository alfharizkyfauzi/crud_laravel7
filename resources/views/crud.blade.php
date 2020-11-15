@extends('layouts.master')
{{-- Title --}}
@section('title','Laravel')
{{-- Content --}}
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <a href="{{route('crud.tambah')}}" class="btn btn-icon icon-left btn-success"><i class="fas fa-plus"></i> Tambah Data</a>
            <hr>
            @if (session('message'))
            <div class="alert alert-info alert-dismissible show fade">
                <div class="alert-body">
                  <button class="close" data-dismiss="alert">
                    <span>×</span>
                  </button>
                  {{session('message')}}.
                </div>
              </div>
            @endif
            <table class="table table-striped table-bordered">
                <tr>
                    <th>No.</th>
                    <th>Kode_barang</th>
                    <th>Nama_barang</th>
                    <th>Action</th>
                </tr>
                @foreach ($data_barang as $no => $data)
                    <tr>
                        <td>{{ $data_barang->firstItem()+$no }}</td>
                        <td>{{ $data->kode_barang }}</td>
                        <td>{{ $data->nama_barang }}</td>
                        <td>
                        <a href="{{route('crud.edit', $data->id)}}" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
                            <a href="#" data-id="{{$data->id}}" class="btn btn-danger swal-confirm">
                                <form action="{{route('crud.delete',$data->id)}}" id="delete{{$data->id}}" method="POST">
                                    @csrf
                                    @method('delete')
                                </form>
                                <i class="fas fa-trash-alt"></i> 
                                Delete
                            </a>
                        </td>
                    </tr>
                @endforeach
            </table>
            {{$data_barang->links()}}
        </div>
    </div>
</div>
@endsection
{{-- Script --}}
@push('page-scripts')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endpush

@push('after-scripts')
<script>
    $(".swal-confirm").click(function(e) {
        id = e.target.dataset.id;
        swal({
            title: 'Yakin hapus data? ',
            text: 'Data yang sudah dihapus tidak dapat di kembalikan!',
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                swal('Selamat! Data anda telah terhapus!', {
                icon: 'success',
                });
                $(`#delete${id}`).submit();
            } else {
                swal('Data anda batal terhapus!');
            }
        });
    });
</script>
@endpush
