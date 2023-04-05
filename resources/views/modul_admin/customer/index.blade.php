@extends('layouts.backend')
@section('title', 'Admin - Data Customer')
@section('header', 'Data Customer')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"> Data Pelanggan
                        {{-- <a href="{{url('customer-add')}}" class="btn btn-primary">Tambah</a> --}}
                        <a href="{{ route('customer.create') }}" class="btn btn-primary">Tambah</a>

                    </h4>

                    <div class="table-responsive m-t-0">
                        <table id="myTable" class="table display table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>No Telpon</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach ($customer as $item)
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->alamat }}</td>
                                        <td>{{ $item->no_telp }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>
                                            <a href="{{ route('customer.show', $item->id) }}"
                                                class="btn btn-info btn-sm">Info</a>
                                            <a href="{{ route('customer.update', $item->id) }}"
                                                class="btn btn-sm btn-success" data-toggle="modal"
                                                data-id="{{ $item->id }}" data-id-name="{{ $item->name }}"
                                                data-id-alamat="{{ $item->alamat }}"
                                                data-id-no_telp="{{ $item->no_telp }}" data-id-email="{{ $item->email }}"
                                                id="click_data" data-target="#edit_data" style="color:white">Edit</a>
                                            <form action="{{ route('customer.destroy', $item->id) }}" method="POST"
                                                style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-sm btn-danger"
                                                    onclick="confirmDelete(event)">Delete</button>
                                            </form>
                                        </td>
                                        <div class="modal fade" id="edit_data" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel1">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="exampleModalLabel1">Edit Data Pelanggan
                                                        </h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close"><span
                                                                aria-hidden="true">&times;</span></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form>
                                                            <div class="form-group">
                                                                <input type="hidden" name="id_data" id="id_data">
                                                                <label for="name" class="control-label">Nama :</label>
                                                                <input type="text" name="name" id="name"
                                                                    class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="alamat" class="control-label">Alamat :</label>
                                                                <input type="text" name="alamat" id="alamat"
                                                                    class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="no_telp" class="control-label">No.
                                                                    Telp :</label>
                                                                <input type="text" name="no_telp" id="no_telp"
                                                                    class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="email" class="control-label">Email :</label>
                                                                <input type="text" name="email" id="email"
                                                                    class="form-control">
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-success"
                                                            id="simpan_data">Simpan</button>
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Tutup</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </tr>
                                    <?php $no++; ?>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{-- @include('modul_admin.customer.edit') --}}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')

    <script type="text/javascript">
        // Tampilkan Modal Edit Data
        $(document).on('click', '#click_data', function() {
            var id = $(this).attr('data-id');
            var name = $(this).attr('data-id-name');
            var alamat = $(this).attr('data-id-alamat');
            var no_telp = $(this).attr('data-id-no_telp');
            var email = $(this).attr('data-id-email');
            $("#id_data").val(id)
            $("#name").val(name)
            $("#alamat").val(alamat)
            $("#no_telp").val(no_telp)
            $("#email").val(email)

        });
        // Proses Edit data
        $(document).on('click', '#simpan_data', function() {
            var id_data = $("#id_data").val();
            var name = $("#name").val();
            var alamat = $("#alamat").val();
            var no_telp = $("#no_telp").val();
            var email = $("#email").val();

            // tambahkan kondisi untuk memastikan semua data terisi
            if (id_data != '' && name != '' && alamat != '' && no_telp != '' && email != '') {
                $.get('{{ Url('edit-data') }}', {
                    '_token': $('meta[name=csrf-token]').attr('content'),
                    id_data: id_data,
                    name: name,
                    alamat: alamat,
                    no_telp: no_telp,
                    email: email
                }, function(resp) {

                    $("#id_data").val('');
                    $("#name").val('');
                    $("#alamat").val('');
                    $("#no_telp").val('');
                    $("#email").val('');
                    location.reload();
                });
            } else {
                alert('Semua data harus diisi!');
            }
        });


        //delete
        function confirmDelete(event) {
            event.preventDefault();
            if (confirm('Apakah Anda yakin ingin menghapus data pelanggan ini?')) {
                event.target.closest('form').submit();
            }
        }

        $(document).ready(function() {
            $('#myTable').DataTable();
            $(document).ready(function() {
                var table = $('#example').DataTable({
                    "columnDefs": [{
                        "visible": false,
                        "targets": 2
                    }],
                    "order": [
                        [2, 'asc']
                    ],
                    "displayLength": 25,
                    "drawCallback": function(settings) {
                        var api = this.api();
                        var rows = api.rows({
                            page: 'current'
                        }).nodes();
                        var last = null;
                        api.column(2, {
                            page: 'current'
                        }).data().each(function(group, i) {
                            if (last !== group) {
                                $(rows).eq(i).before(
                                    '<tr class="group"><td colspan="5">' + group +
                                    '</td></tr>');
                                last = group;
                            }
                        });
                    }
                });
                // Order by the grouping
                $('#example tbody').on('click', 'tr.group', function() {
                    var currentOrder = table.order()[0];
                    if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                        table.order([2, 'desc']).draw();
                    } else {
                        table.order([2, 'asc']).draw();
                    }
                });
            });
        });
        $('#example23').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    </script>
@endsection
