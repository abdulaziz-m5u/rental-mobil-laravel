@extends('layouts.app')

@section('content')

    <!-- Main content -->
    <section class="content pt-4">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Testimonial</h3>
                <a href="{{ route('admin.testimonials.create')}}" class="btn btn-success shadow-sm float-right"> <i class="fa fa-plus"></i> Tambah </a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="table-responsive">
                    <table id="data-table" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Profile</th>
                        <th>Pekerjaan</th>
                        <th>Pesan</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse($testimonials as $testimonial)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $testimonial->name }}</td>
                                <td>
                                  <a target="_blank" href="{{ Storage::url($testimonial->profile) }}">
                                    <img width="80" src="{{ Storage::url($testimonial->profile) }}" alt="">
                                  </a>
                                </td>
                                <td>{{ $testimonial->pekerjaan }}</td>
                                <td>{{ $testimonial->pesan }}</td>
                                <td>
                                <div class="btn-group btn-group-sm">
                                    <a href="{{ route('admin.testimonials.edit', $testimonial) }}" class="btn btn-sm btn-primary">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form onclick="return confirm('are you sure !')" action="{{ route('admin.testimonials.destroy', $testimonial) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" test$testimonial="submit"><i class="fa fa-trash"></i></button>
                                    </form>
                                </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center">Data Kosong !</td>
                            </tr>
                        @endforelse
                    </table>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@push('style-alt')
  <!-- DataTables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css">
@endpush

@push('script-alt') 
    <script
        src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
        crossorigin="anonymous"
    >
    </script>
    <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
    <script>
    $("#data-table").DataTable();
    </script>
@endpush