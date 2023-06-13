@extends('dashboard.layout.master')

@section('content')

<div class="container-fluid">
                        
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">Sosialisasi</li>
                    </ol>
                </div>
                <h4 class="page-title">Sosialisasi</h4>
            </div>
        </div>
    </div>     
    <!-- end page title --> 
    <div class="mb-3">
    <a href="/guru/sosialisasi/create" type="button" class="btn btn-primary">Add New</a>

    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-hover table-centered mb-0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Photo</th>
                        <th>Judul</th>
                        <th>Waktu</th>
                        <th>Tempat</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($Sosialisasi as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>
                            @if($item->photo == null)
                            Belum ada foto
                            @else
                            <img src="{{ asset('storage/' . $item->photo) }}" height="90px" width="100px" alt="Foto Profil Guru">
                            @endif
                        </td>
                        <td>{{$item->judul}}</td>
                        <td>{{$item->tanggal}}</td>
                        <td>{{$item->tempat}}</td>
                        <td class="table-action">
                            <a href="/guru/sosialisasi/edit/{{$item->id}}" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                            <a href="javascript:void(0);" class="action-icon" onclick="showDeleteModal({{ $item->id }})"><i class="mdi mdi-delete"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
                                                    
  </div>

      <!-- Delete Modal -->
      <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus Data ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <form id="deleteForm" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showDeleteModal(siswaId) {
            var deleteForm = document.getElementById('deleteForm');
            deleteForm.action = '/guru/sosialisasi/delete/' + siswaId;
            var deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
            deleteModal.show();
        }
    </script>
@endsection

  
