@extends('layouts.master')
@section('title', 'Laravel')
@section('content')
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <a href="{{ route('crud.tambah') }}" type="button" class="btn btn-primary">Tambah Data</a>
                <hr>
                @if (session('message'))
                <div class="alert alert-success alert-dismissible show fade">
                    <div class="alert-body">
                      <button class="close" data-dismiss="alert">
                        <span>×</span>
                      </button>
                      {{ session('message')}}
                    </div>
                  </div>
                @endif
                <table class="table table-striped table-bordered">
                    <tr>
                        <th>No</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($data_barang as $no => $data)    
                    <tr>
                        <td>{{ $data_barang -> firstItem()+$no }}</td>
                        <td>{{ $data -> kode_barang}}</td>
                        <td>{{ $data -> nama_barang}}</td>
                        <td>
                            <a href="#" class="badge badge-success">Edit</a>
                            <a href="#" data-id="{{ $data->id }}" class="badge badge-danger swal-confirm">
                                <form action="{{ route('crud.hapus', $data->id) }}" id="del{{ $data->id }}" method="POST">
                                @csrf
                                @method('delete')
                                </form>
                                Hapus
                            </a>
                        </td>
                    </tr>    
                    
                    @endforeach
                </table>
            </div>
            {{ $data_barang->links()}}
        </div>
    </div>

@endsection

@push('page-scripts')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endpush

@push('after-script')

<script>
    $(".swal-confirm").click(function(e) {
    id = e.target.dataset.id;
    swal({
        title: 'yakin hapus Data? ',
        text: 'Ketika data sudah dihapus, Data sepenuhnya akan hilang!',
        icon: 'warning',
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
            //swal('Data Berhasil Dihapus');
            $('#del'+id).submit();
        } else {
           // swal('Data batal dihapus')
        }
      });
  });
</script>

@endpush