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

            <div class="text-md-right mb-2">
                <a href="{{ route('contacts.create') }}" class="btn btn-gradient waves-light waves-effect width-md"> Add
                    New Contact </a>
            </div>


        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('contacts.filter') }}" method="GET" class="parsley-examples" novalidate>

                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="district_id">Dirstrict <span class="text-danger">*</span> </label>
                            <select class="form-control" name="district_id" id="district_id" required>
                                <option value="">All</option>
                                @foreach ($districts as $district)
                                    <option value="{{ $district->id }}" {{ $district->id == request()->input('district_id') ? 'selected' : '' }}>
                                        {{ $district->name }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="upazila_id">Upazila</label>
                            <select class="form-control" name="upazila_id" id="upazila_id">
                                <option value="">Select Upazila</option>
                                @foreach ($upazilas as $upazila)
                                    <option value="{{ $upazila->id }}" {{ $upazila->id == request()->input('upazila_id') ? 'selected' : '' }}>
                                        {{ $upazila->name }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="union_id">Union</label>
                            <select class="form-control" name="union_id" id="union_id">
                                <option value="">Select Union</option>
                                @foreach ($unions as $union)
                                    <option value="{{ $union->id }}" {{ $union->id == request()->input('union_id') ? 'selected' : '' }}>
                                        {{ $union->name }} </option>  
                                    
                                @endforeach

                            </select>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="ward_id">Ward</label>
                            <select class="form-control" name="ward_id" id="ward_id">
                                <option value="">Select Ward</option>
                                <option value="1" {{ request()->input('ward_id') == 1 ? 'selected' : ''}}>Ward 1</option>
                                <option value="2" {{ request()->input('ward_id') == 2 ? 'selected' : ''}}>Ward 2</option>
                                <option value="3" {{ request()->input('ward_id') == 3 ? 'selected' : ''}}>Ward 3</option>
                                <option value="4" {{ request()->input('ward_id') == 4 ? 'selected' : ''}}>Ward 4</option>
                                <option value="5" {{ request()->input('ward_id') == 5 ? 'selected' : ''}}>Ward 5</option>
                                <option value="6" {{ request()->input('ward_id') == 6 ? 'selected' : ''}}>Ward 6</option>
                                <option value="7"   {{ request()->input('ward_id') == 7 ? 'selected' : ''}}>Ward 7</option>
                                <option value="8" {{ request()->input('ward_id') == 8 ? 'selected' : ''}}>Ward 8</option>
                                <option value="9" {{ request()->input('ward_id') == 9 ? 'selected' : ''}}>Ward 9</option>
                               
                            </select>
                        </div>
                    </div>

                  
                  

                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="category"> Category </label>

                            <select name="category" id="category" class="form-control">
                                <option value="">Select Category</option>
                                <option value="political" {{ request()->input('category') == 'political' ? 'selected' : ''}} >Political</option>
                                <option value="business" {{ request()->input('category') == 'business' ? 'selected' : ''}} >Business</option>
                                <option value="colleague" {{ request()->input('category') == 'colleague' ? 'selected' : ''}}>Colleague</option>
                                <option value="others" {{ request()->input('category') == 'others' ? 'selected' : ''}}>Others</option>

                            </select>

                            @error('category')
                             <ul class="parsley-errors-list filled" id="parsley-id-5"><li class="parsley-required"> {{ $message }}</li>
                             </ul>
                                 
                             @enderror

                        </div>
                    </div>


                  


                    <div class="col-md-2">
                        <div class="form-group mt-3">
                            <button type="submit"
                                class="btn btn-lg w-100 btn-gradient waves-light waves-effect width-md">Filter</button>


                        </div>
                    </div>



                </div>
            </form>
        </div>
    </div>




    <form action="{{ route('send-sms') }}" method="POST">
        @csrf
    <div class="row my-2">
        <div class="col-md-6">


            @if(count($contacts) > 0)
            <div class="form-group">
                <div class="checkbox checkbox-purple">
                    <input id="checkAll" type="checkbox" data-parsley-multiple="checkAll">
                    <label for="checkAll">
                        Select All to send message
                    </label>

                    {{-- <input type="submit" value="Send" class="btn btn-success ml-3"> --}}

                    <button type="button" class="btn btn-success waves-effect waves-light" data-toggle="modal" data-target="#login-modal">Write Message</button>
                </div>
        

            </div>

           @endif

        </div>
    </div>

    <div id="login-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <h2 class="text-uppercase text-center mb-4">
                       Write you message
                    </h2>

                    <div class="form-group">
                        <div class="col-12">
                            <label for="emailaddress1">Subject</label>
                            <input type="text" name="subject"  class="form-control" required>
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
                                <button class="btn width-lg btn-rounded btn-primary waves-effect waves-light" type="submit">Send Message</button>
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
                                <td>{{ ucfirst(@$contact->category) }}</td>
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
                                                    class="btn btn-success btn-sm" target="_blank"> <i
                                                        class="fab fa-whatsapp"></i></a>
                                            </td>
                                                                 <td>
                                                <label for="send_sms"> Send SMS </label>
                                                <input type="checkbox" name="{{ $contact->contact_number_1 }}" class="">
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

    <script>
        $("#checkAll").click(function(){
    $('input:checkbox').not(this).prop('checked', this.checked);
});
    </script>

    
@endpush


@push('js')
    <script>
        $(document).ready(function() {
            //district
            $('#district_id').change(function() {
                var district_id = $(this).val();
                $('#upazila_id').empty();

                $.ajax({
                    url: "{{ route('upazila-list', ['district' => ':district']) }}".replace(
                        ':district', district_id),
                    type: "GET",
                    success: function(data) {
                        
                        $('#upazila_id').append('<option value="">Select Upazila</option>');
                        $.each(data, function(key, value) {
                            $('#upazila_id').append('<option value="' + value.id +
                                '">' + value.name + '</option>');
                        });
                    }
                });
            });


            //upazila
            $('#upazila_id').change(function() {
                var upazila_id = $(this).val();
                $('#union_id').empty();

                $.ajax({
                    url: "{{ route('union-list', ['upazila' => ':upazila']) }}".replace(':upazila',
                        upazila_id),
                    type: "GET",
                    success: function(data) {
                        console.log(data);
                        $('#union_id').append('<option value="">Select Union</option>');
                        $.each(data, function(key, value) {
                            $('#union_id').append('<option value="' + value.id + '">' +
                                value.name + '</option>');
                        });
                    }
                });
            });

        });


        $('#ward_id').prop('disabled', true);

        $('#union_id').change(function() {
            if ($(this).val() == '') {
                $('#ward_id').prop('disabled', true);
            } else {
                $('#ward_id').prop('disabled', false);
            }
        });
        
    </script>
@endpush

