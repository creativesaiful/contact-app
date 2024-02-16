@extends('layouts.admin')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Edit Contact</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="card">

        <div class="card-body">

            <form action="{{ route('contacts.update', $contact->id) }}" method="POST" class="parsley-examples" novalidate>
                @csrf
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="district_id">Dirstrict <span class="text-danger">*</span> </label>
                            <select class="form-control" name="district_id" id="district_id" required>
                                @foreach ($districts as $district)
                                    <option value="{{ $district->id }}" {{ $district->id == $contact->district_id ? 'selected' : '' }}>
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
                                    <option value="{{ $upazila->id }}" {{ $upazila->id == $contact->upazila_id ? 'selected' : '' }}>
                                        {{ $upazila->name }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="union_id">Union</label>
                            <select class="form-control" name="union_id" id="union_id">
                                @foreach ($unions as $union )
                                    <option value="{{ $union->id }}" {{ $union->id == $contact->union_id ? 'selected' : '' }}>{{ $union->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="ward_id">Ward</label>
                            <select class="form-control" name="ward_id" id="ward_id">
                                <option value="">Select Ward</option>

                                @for ($i = 1; $i <= 10; $i++)
                                <option value="{{$i}}" {{ $i == $contact->ward_id ? 'selected' : '' }}>Ward {{ $i}} </option>
                                @endfor
                                
                           
                               
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="name">Name In English <span class="text-danger">*</span></label>
                            <input type="text" name="name" id="name" placeholder="Mr. Kashem"
                                class="form-control" value="{{ $contact->name }}" required>

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
                                value="{{  @$contact->bangla_name }}" class="form-control">

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
                                value="{{ $contact->contact_number_1 }}" class="form-control" required minlength="11" maxlength="11" >

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
                                value="{{ @$contact->contact_number_2 }}" class="form-control" minlength="11" maxlength="11">
                            
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
                                class="form-control" value="{{ $contact->profession }}">

                                @error('profession')
                             <ul class="parsley-errors-list filled" id="parsley-id-5"><li class="parsley-required"> {{ $message }}</li>
                             </ul>
                                 
                             @enderror
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="category"> Category </label>
                            <select name="category" id="category" class="form-control">
                                <option value="political" {{ @$contact->category == 'political' ? 'selected' : '' }} >Political</option>
                                <option value="business" {{ @$contact->category == 'business' ? 'selected' : '' }} >Business</option>
                                <option value="colleague" {{ @$contact->category == 'colleague' ? 'selected' : '' }} >Colleague</option>
                                 <option value="government job" {{ @$contact->category == 'government job' ? 'selected' : '' }} >Government Job</option>
                                  <option value="primary teacher" {{ @$contact->category == 'primary teacher' ? 'selected' : '' }} >Primary Teacher</option>
                                   <option value="others" {{ @$contact->category == 'others' ? 'selected' : '' }} >Others</option>

                            </select>

                            @error('category')
                             <ul class="parsley-errors-list filled" id="parsley-id-5"><li class="parsley-required"> {{ $message }}</li>
                             </ul>
                                 
                             @enderror

                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="address"> Address </label>

                           <input type="text" name="address" id="address" value="{{ @$contact->address }}" class="form-control ">

                            @error('address')
                             <ul class="parsley-errors-list filled" id="parsley-id-5"><li class="parsley-required"> {{ $message }}</li>
                             </ul>
                                 
                             @enderror

                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="comments"> Comments </label>

                            <textarea name="comments" id="comments" class="form-control" cols="30" rows="1">{{ @$contact->comments }}</textarea>

                            @error('comments')
                             <ul class="parsley-errors-list filled" id="parsley-id-5"><li class="parsley-required"> {{ $message }}</li>
                             </ul>
                                 
                             @enderror

                        </div>
                    </div>



                    <div class="col-md-3">
                        <div class="form-group">
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


     <script src="{{asset('assets/libs/parsleyjs/parsley.min.js')}}"></script>


        <script src="{{asset('assets/js/pages/form-validation.init.js')}}"></script>

    
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
    </script>
@endpush
