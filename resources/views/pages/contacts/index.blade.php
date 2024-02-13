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

        <div class="col-md-6">
            <div class="form-group">
                <label for="myInputTextField"> Search </label>
                <input type="text" id="myInputTextField" class="form-control" placeholder="Type to search">
            </div>
        </div>

        <div class="col-md-6">

            <div class="text-md-right mt-3">
                <a href="{{ route('contacts.create') }}" class="btn btn-gradient waves-light waves-effect width-md"> Add
                    New Contact </a>
            </div>


        </div>
    </div>

    <div class="row">

    </div>


    <div class="row">
        <div class="col-12">
            <div class="card-box table-responsive">


                <table id="myTable" class="table table-striped table-bordered dt-responsive nowrap"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>District</th>
                            <th>Contact</th>
                            <th>Action</th>

                        </tr>
                    </thead>


                    <tbody>

                        @foreach ($contacts as $key => $contact)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ ucfirst(@$contact->name) }} <br>

                                    {{ @$contact->bangla_name }}

                                </td>
                                <td>{{ @$contact->category }}</td>
                                <td>{{ @$contact->district->name }} <br>

                                    {{ @$contact->upazila->name }} <br>

                                    {{ @$contact->union->name }}

                                </td>
                                <td>

                                    <table class="table-bordered dt-responsive nowrap">
                                        <tr>
                                            <td class="font-weight-bold">
                                                {{ $contact->contact_number_1 }} 
                                                
                                            </td>
                                            <td>
                                                <a href="tel:{{ $contact->contact_number_1 }}"
                                                    class="btn btn-gradient btn-sm mx-1"> <i class="fas fa-phone"></i></a>
                                            </td>
                                            <td>
                                                <a href="https://wa.me/+88{{ $contact->contact_number_1 }}"
                                                    class="btn btn-success btn-sm" target="_blank"> <i class="fab fa-whatsapp"></i></a>
                                            </td>
                                            <td>
                                                <label for="send_sms"> Send SMS </label>
                                                <input type="checkbox" name="send_sms[]"  class="">
                                            </td>
                                        </tr>


                                        @if ($contact->contact_number_2)

                                        <tr>
                                            <td>{{ $contact->contact_number_2 }}</td>
                                            <td>
                                                <a href="tel:{{ $contact->contact_number_2 }}"
                                                    class="btn btn-gradient btn-sm mx-1"> <i class="fas fa-phone"></i></a>
                                            </td>

                                            <td>
                                                <a href="https://wa.me/+88{{ $contact->contact_number_2 }}"
                                                    class="btn btn-success btn-sm" target="_blank"> <i class="fab fa-whatsapp"></i>
                                                </a>
                                            </td>

                                            <td>
                                                <label for="send_sms"> Send SMS </label>
                                                <input type="checkbox" name="send_sms" class="send_sms[]">
                                            </td>
                                        </tr>

                                    

                                        
                                    @endif



                                    </table>

                                   
                                

                                   


                                </td>
                                <td>
                                    <a href="{{ route('contacts.edit', $contact->id) }}"
                                        class="btn btn-sm btn-gradient waves-light waves-effect"> <i
                                            class="fas fa-edit"></i></a>

                                    <a href="{{ route('contacts.destroy', $contact->id) }}"
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
    <!-- end row -->
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
        $('#myInputTextField').keyup(function() {

            oTable.search($(this).val()).draw();
        })

        $('.dataTables_filter').hide();
    </script>
@endpush
