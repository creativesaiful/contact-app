@extends('layouts.admin')

@push('css')
    <link href="{{ asset('assets/libs/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/datatables/buttons.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/datatables/responsive.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
@endpush
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Contacts</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->



   <div class="row">
    <div class="col-md-12">
        <div class="card">

            <!-- /.card-header -->
            <div class="card-body">
                <table id="myTable" class="table table-striped table-bordered dt-responsive nowrap"
                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Type</th>
                            <th>Receiver</th>
                            <th>SMS</th>
                            <th>Response Code</th>
                            <th>Response Message</th>
                            <th>Send Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($smsInfo as $key => $sms )
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $sms->sms_type }}</td>
                                <td>{{ $sms->receiver_number }}</td>
                                <td>{{ $sms->sms_body }}</td>
                                @php
                                    $response = json_decode($sms->response);
                                @endphp
                                <td>{{ isset($response->response_code) ? $response->response_code : '' }}</td>
                                <td>{{ isset($response->success_message) ? $response->success_message : (isset($response->error_message) ? $response->error_message : '') }}</td>
                               <td>{{ $sms->created_at }}</td>
                                <td>
                                    <a href="{{ route('messages.delete', $sms->id)}}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')" >Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

           
            <div class="card-footer">
                <ul class="pagination pagination-sm m-0 float-right">
                    {{ $smsInfo->links('pagination::bootstrap-4') }}
                </ul>
            </div>
            
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

<!-- Responsive examples -->
<script src="{{ asset('assets/libs/datatables/dataTables.responsive.min.js') }}"></script>

<script src="{{ asset('assets/libs/datatables/responsive.bootstrap4.min.js') }}"></script>

<!-- Datatables init -->
<script src="{{ asset('assets/js/pages/datatables.init.js') }}"></script>


<script>
    oTable = $('#myTable')
        .DataTable(); //pay attention to capital D, which is mandatory to retrieve "api" datatables' object, as @Lionel said

  
</script>


@endpush

