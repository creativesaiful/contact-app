@extends('layouts.admin')

@section('title', 'Forward Dairy')

@push('css')
    <link href="{{ asset('assets/libs/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/datatables/buttons.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/datatables/dataTables.buttons.min.js') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/datatables/responsive.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Forward Dairy </h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row mb-1">

        <div class="col-md-6">

        </div>

        <div class="col-md-6">

            <div class="text-md-right">
                <a href="{{ route('diary.create') }}" class="btn btn-gradient waves-light waves-effect width-md"> Add New</a>
            </div>


        </div>

    </div>


    <div class="row">
        <div class="col-12">
            <div class="card-box table-responsive">


                <table id="diaryTable" class="table table-striped table-bordered dt-responsive nowrap"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Meeting With</th>
                            <th>Place</th>
                            <th>Details</th>
                            <th>Action</th>

                        </tr>
                    </thead>


                    <tbody>

                        @foreach ($upcommingDairy as $key => $dairy)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ date('l, F j, Y', strtotime($dairy->date)) }}</td>

                                <td>{{ date('h:i A', strtotime($dairy->time)) }}</td>

                                <td> {{ $dairy->person }} </td>
                                <td>{{ $dairy->place }}</td>
                                <td>{{ $dairy->description }}</td>
                                <td>
                                    <a href="{{ route('diary.edit', $dairy->id) }}"
                                        class="btn btn-sm btn-gradient waves-light waves-effect"> <i
                                            class="fas fa-edit"></i></a>

                                    <a href="{{ route('diary.destroy', $dairy->id) }}"
                                        class="btn btn-danger btn-sm waves-light waves-effect"> <i
                                            class="fas fa-trash"></i></a>

                                </td>
                            </tr>
                        @endforeach






                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection



@push('js')

 <!-- Required datatable js -->
 <script src="{{ asset('assets/libs/datatables/jquery.dataTables.min.js') }}"></script>
 <script src="{{ asset('assets/libs/datatables/dataTables.bootstrap4.min.js') }}"></script>
 <!-- Buttons examples -->
 <script src="{{ asset('assets/libs/datatables/dataTables.buttons.min.js') }}"></script>
 <script src="{{ asset('assets/libs/datatables/buttons.bootstrap4.min.js') }}"></script>
 <script src="{{ asset('assets/libs/jszip/jszip.min.js') }}"></script>
 <script src="{{ asset('assets/libs/pdfmake/pdfmake.min.js') }}"></script>
 <script src="{{ asset('assets/libs/pdfmake/vfs_fonts.js') }}"></script>
 <script src="{{ asset('assets/libs/datatables/buttons.html5.min.js') }}"></script>
 <script src="{{ asset('assets/libs/datatables/buttons.print.min.js') }}"></script>

 <!-- Responsive examples -->
 <script src="{{ asset('assets/libs/datatables/dataTables.responsive.min.js') }}"></script>
 <script src="{{ asset('assets/libs/datatables/responsive.bootstrap4.min.js') }}"></script>

 <!-- Datatables init -->
 <script src="{{ asset('assets/js/pages/datatables.init.js') }}"></script>


 <script>
      $(document).ready(function() {
            $("#datatable").DataTable(), $("#diaryTable").DataTable({
                lengthChange: true,
                buttons: ["print"]
            }).buttons().container().appendTo("#diaryTable_wrapper .col-md-6:eq(0)")
        });
 </script>
    
@endpush
    