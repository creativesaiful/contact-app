@extends('layouts.admin')
@section('title', 'Contacts')

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
                <a href="{{ route('contacts.create') }}" class="btn btn-gradient waves-light waves-effect width-md"> Add New Contact </a>
            </div>


        </div>
    </div>

    <form action="{{ route('send-sms') }}" method="POST">
        @csrf
        <div class="row my-2">
            <div class="col-md-6">

                <div class="form-group">
                    <div class="checkbox checkbox-purple">
                        <input id="checkAll" type="checkbox" data-parsley-multiple="checkAll">
                        <label for="checkAll">
                            Select All to send message
                        </label>

                        {{-- <input type="submit" value="Send" class="btn btn-success ml-3"> --}}

                        <button type="button" class="btn btn-success waves-effect waves-light" data-toggle="modal"
                            data-target="#login-modal">Write Message</button>
                    </div>


                </div>



            </div>
        </div>

        <div id="login-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel"
            aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <h2 class="text-uppercase text-center mb-4">
                            Write you message
                        </h2>

                        <div class="form-group">
                            <div class="col-12">
                                <label for="emailaddress1">Subject</label>
                                <input type="text" name="subject" class="form-control" required>
                            </div>
                        </div>



                        <div class="form-group">
                            <div class="col-12">
                                <label for="emailaddress1">Message</label>
                                <textarea name="message" id="" cols="30" rows="5" class="form-control" required></textarea>
                            </div>
                        </div>



                        <div class="form-group account-btn text-center">
                            <div class="col-12">
                                <button class="btn width-lg btn-rounded btn-primary waves-effect waves-light"
                                    type="submit">Send Message</button>
                            </div>
                        </div>


                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->




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
                                <th>Address</th>
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
                                    <td>

                                        @php
                                            $categories = json_decode(@$contact->category_id);
                                          
                                        @endphp


                                        @if (is_array($categories))
                                            @php
                                            
                                                $categoryList = [];
                                                foreach ($categories as $categoryId) {
                                                    $category = \App\Models\Category::find($categoryId);
                                                    if ($category) {
                                                        $categoryList[] = ucfirst($category->category_name);
                                                    }
                                                }
                                                echo implode(', ', $categoryList);
                                            @endphp
                                        @else
                                            {{ ucfirst(@$contact->category->category_name) }}
                                        @endif


                                        @if (@$contact->batch->batch_year)
                                            <br>
                                            BCS-{{ $contact->batch->batch_year }}
                                        @endif

                                        @if (@$contact->s_s_c_batch->batch_year)
                                            <br>
                                            SSC-{{ $contact->s_s_c_batch->batch_year }}
                                        @endif





                                    </td>
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
                                                        class="btn btn-gradient btn-sm mx-1"> <i
                                                            class="fas fa-phone"></i></a>
                                                </td>
                                                <td>
                                                    <a href="https://wa.me/+88{{ $contact->contact_number_1 }}"
                                                        class="btn btn-success btn-sm" target="_blank"> <i
                                                            class="fab fa-whatsapp"></i></a>
                                                </td>
                                                <td>
                                                    <label for="send_sms"> Send SMS </label>
                                                    <input type="checkbox" name="{{ $contact->contact_number_1 }}"
                                                        class="">
                                                </td>
                                            </tr>


                                            @if ($contact->contact_number_2)
                                                <tr>
                                                    <td>{{ $contact->contact_number_2 }}</td>
                                                    <td>
                                                        <a href="tel:{{ $contact->contact_number_2 }}"
                                                            class="btn btn-gradient btn-sm mx-1"> <i
                                                                class="fas fa-phone"></i></a>
                                                    </td>

                                                    <td>
                                                        <a href="https://wa.me/+88{{ $contact->contact_number_2 }}"
                                                            class="btn btn-success btn-sm" target="_blank"> <i
                                                                class="fab fa-whatsapp"></i>
                                                        </a>
                                                    </td>

                                                    <td>
                                                        <label for="send_sms"> Send SMS </label>
                                                        <input type="checkbox" name="{{ $contact->contact_number_2 }}">
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

    </form>
    <!-- end row -->
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
        oTable = $('#myTable').DataTable();

        $('#myInputTextField').keyup(function() {

            oTable.search($(this).val()).draw();
        });

        new $.fn.dataTable.Buttons(oTable, {
            buttons: [{
                extend: 'print',
                text: 'Print'
            }]
        }).container().appendTo($('#myTable_wrapper .col-md-6:eq(0)'));

        $('.dataTables_filter').hide();
    </script>

    <script>
        $("#checkAll").click(function() {
            $('input:checkbox').not(this).prop('checked', this.checked);
        });
    </script>
@endpush
