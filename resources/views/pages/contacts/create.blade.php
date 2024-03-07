@extends('layouts.admin')
@section('title', 'Contacts')

@push('css')

<link href="{{asset('assets/libs/bootstrap-tagsinput/bootstrap-tagsinput.css')}}" rel="stylesheet" />
<link href="{{asset('assets/libs/switchery/switchery.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/libs/select2/select2.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/libs/bootstrap-select/bootstrap-select.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.css')}}" rel="stylesheet" type="text/css" />

@endpush

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Add New Contact</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="card">

        <div class="card-body">

            <form action="{{ route('contacts.store') }}" method="POST" class="parsley-examples" novalidate>
                @csrf
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="district_id">Dirstrict <span class="text-danger">*</span> </label>
                            <select class="form-control" name="district_id" id="district_id" required>
                                @foreach ($districts as $district)
                                    <option value="{{ $district->id }}" {{ $district->id == 14 ? 'selected' : '' }}>
                                        {{ $district->name }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="upazila_id">Upazila</label>
                            <select class="form-control" name="upazila_id" id="upazila_id">
                                @foreach ($upazilas as $upazila)
                                    <option value="{{ $upazila->id }}" {{ $upazila->id == 1 ? 'selected' : '' }}>
                                        {{ $upazila->name }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="union_id">Union</label>
                            @php
                            $union = \App\Models\Union::where('upazila_id', 1)->get();
                        @endphp
                            <select class="form-control" name="union_id" id="union_id">

                             <option value=""> Select Union </option>

                                @foreach ($union as $item)
                                    <option value="{{ $item->id }}">
                                        {{ $item->name }} </option>
                                @endforeach

                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="ward_id">Ward</label>
                            <select class="form-control" name="ward_id" id="ward_id">
                                <option value="">Select Ward</option>
                                <option value="1">Ward 1</option>
                                <option value="2">Ward 2</option>
                                <option value="3">Ward 3</option>
                                <option value="4">Ward 4</option>
                                <option value="5">Ward 5</option>
                                <option value="6">Ward 6</option>
                                <option value="7">Ward 7</option>
                                <option value="8">Ward 8</option>
                                <option value="9">Ward 9</option>
                               
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="name">Name In English <span class="text-danger">*</span></label>
                            <input type="text" name="name" id="name" placeholder="Mr. Kashem"
                                class="form-control" value="{{ old('name') }}" required>

                             @error('name')
                             <ul class="parsley-errors-list filled" id="parsley-id-5"><li class="parsley-required"> {{ $message }}</li>
                             </ul>
                                 
                             @enderror
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="bangla_name">Name In Bangla</label>
                            <input type="text" name="bangla_name" id="bangla_name" placeholder="মোঃ কাশেম"
                                value="{{ old('bangla_name') }}" class="form-control">

                                @error('bangla_name')
                             <ul class="parsley-errors-list filled" id="parsley-id-5"><li class="parsley-required"> {{ $message }}</li>
                             </ul>
                                 
                             @enderror
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="contact_number_1">Contact Number <span class="text-danger">*</span></label>
                            <input type="tel" name="contact_number_1" id="contact_number_1" placeholder="01710565656"
                                value="{{ old('contact_number_1') }}" class="form-control" required minlength="11" maxlength="11" >

                                @error('contact_number_1')
                             <ul class="parsley-errors-list filled" ><li class="parsley-required"> {{ $message }}</li>
                             </ul>
                                 
                             @enderror
                        </div>
                    </div>


                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="contact_number_2">Contact Number (Optional)</label>
                            <input type="tel" name="contact_number_2" id="contact_number_2" placeholder="01710565656"
                                value="{{ old('contact_number_2') }}" class="form-control" minlength="11" maxlength="11">
                            
                                @error('contact_number_2')
                             <ul class="parsley-errors-list filled" id="parsley-id-5"><li class="parsley-required"> {{ $message }}</li>
                             </ul>
                                 
                             @enderror

                            </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="profession"> Profession </label>
                            <input type="text" name="profession" id="profession" placeholder="Politician"
                                class="form-control" value="{{ old('profession') }}">

                                @error('profession')
                             <ul class="parsley-errors-list filled" id="parsley-id-5"><li class="parsley-required"> {{ $message }}</li>
                             </ul>
                                 
                             @enderror
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="category"> Category </label>

                            @php
                                $category = App\Models\Category::all();
                            @endphp

                            <select name="category_id[]" id="category" class="select2 form-control select2-multiple" multiple="multiple" multiple data-placeholder="" >
                                
                                @foreach ($category as $item)
                                    <option value="{{ $item->id }}">{{ ucfirst($item->category_name ) }}</option>
                                    
                                @endforeach

                            </select>

                            @error('category')
                             <ul class="parsley-errors-list filled" id="parsley-id-5"><li class="parsley-required"> {{ $message }}</li>
                             </ul>
                                 
                             @enderror

                        </div>
                    </div>


                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="category"> BCS Batch </label>

                            @php
                                $batches = \App\Models\Batch::all();
                            @endphp

                            <select name="batch_id" id="batch_id" class="form-control">

                                <option value="">Select Batch</option>
                                @foreach ($batches as $batch)
                                    <option value="{{ $batch->id }}">{{ $batch->batch_year }}</option>
                                @endforeach
                                

                            </select>

                            @error('batch_id')
                             <ul class="parsley-errors-list filled" id="parsley-id-5"><li class="parsley-required"> {{ $message }}</li>
                             </ul>
                                 
                             @enderror

                        </div>
                    </div>


                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="category"> SSC Batch </label>

                            @php
                                $sscBatches = \App\Models\SSC_Batch::all();
                            @endphp

                            <select name="s_s_c_batch_id" id="s_s_c_batch_id" class="form-control">

                                <option value="">Select SSC Batch</option>
                                @foreach ($sscBatches as $batch)
                                    <option value="{{ $batch->id }}">{{ $batch->batch_year }}</option>
                                @endforeach
                                

                            </select>

                            @error('s_s_c_batch_id')
                             <ul class="parsley-errors-list filled" id="parsley-id-5"><li class="parsley-required"> {{ $message }}</li>
                             </ul>
                                 
                             @enderror

                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="address"> Address </label>

                           <input type="text" name="address" id="address" class="form-control ">

                            @error('address')
                             <ul class="parsley-errors-list filled" id="parsley-id-5"><li class="parsley-required"> {{ $message }}</li>
                             </ul>
                                 
                             @enderror

                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="comments"> Comments </label>

                            <textarea name="comments" id="comments" class="form-control" cols="30" rows="1">{{ old('comments') }}</textarea>

                            @error('comments')
                             <ul class="parsley-errors-list filled" id="parsley-id-5"><li class="parsley-required"> {{ $message }}</li>
                             </ul>
                                 
                             @enderror

                        </div>
                    </div>



                    <div class="col-md-3">
                        <div class="form-group mt-3">
                            <button type="submit"
                                class="btn btn-lg w-100 btn-gradient waves-light waves-effect width-md">Submit</button>


                        </div>
                    </div>



                </div>
            </form>


        </div>
    </div>
@endsection

@push('js')


<script src="{{asset('assets/libs/switchery/switchery.min.js')}}"></script>
     <script src="{{asset('assets/libs/parsleyjs/parsley.min.js')}}"></script>
     <script src="{{asset('assets/libs/bootstrap-tagsinput/bootstrap-tagsinput.min.js')}}"></script>
  
        <script src="{{asset('assets/js/pages/form-validation.init.js')}}"></script>

        <script src="{{asset('assets/libs/select2/select2.min.js')}}"></script>
        <script src="{{asset('assets/libs/bootstrap-select/bootstrap-select.min.js')}}"></script>

        <script src="{{asset('assets/js/pages/form-advanced.init.js')}}"></script>

    
@endpush


@push('js')
    <script>
        $(document).ready(function() {
            //district
            $('#district_id').change(function() {
                var district_id = $(this).val();
                $('#upazila_id').empty();
                $('#union_id').empty();

                $.ajax({
                    url: "{{ route('upazila-list', ['district' => ':district']) }}".replace(
                        ':district', district_id),
                    type: "GET",
                    success: function(data) {
                        console.log(data);
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


//         $('#ward_id').prop('disabled', true);

// $('#union_id').change(function() {
//     if ($(this).val() == '') {
//         $('#ward_id').prop('disabled', true);
//     } else {
//         $('#ward_id').prop('disabled', false);
//     }
// });
    </script>
@endpush
