@extends('layouts.admin')
@section('title', 'Forward Dairy')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Edit Meeting </h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="card">

        <div class="card-body">

            <form action="{{route('diary.update', $dairy->id)}}" method="POST" class="parsley-examples" novalidate>
                @csrf
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="date">Date <span class="text-danger">*</span> </label>
                            <input type="date" name="date" id="date" value="{{ $dairy->date }}" class="form-control" required>

                             @error('date')
                             <ul class="parsley-errors-list filled" id="parsley-id-5"><li class="parsley-required"> {{ $message }}</li>
                             </ul>
                                 
                             @enderror
                         
                        </div>
                    </div>


                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="time">Time <span class="text-danger">*</span></label>
                            <input type="time" name="time"class="form-control" value="{{ $dairy->time }}" required>

                             @error('time')
                             <ul class="parsley-errors-list filled" id="parsley-id-5"><li class="parsley-required"> {{ $message }}</li>
                             </ul>
                                 
                             @enderror
                        </div>
                    </div>

                    

                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="person">Meeting With </label>
                            <input type="text" name="person" placeholder="Mr. John Doe"
                                value="{{ $dairy->person }}" class="form-control" required >

                                @error('person')
                             <ul class="parsley-errors-list filled" ><li class="parsley-required"> {{ $message }}</li>
                             </ul>
                                 
                             @enderror
                        </div>
                    </div>


                   

                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="place"> Place </label>
                            <input type="text" name="place" placeholder="Sheraton Dhaka"
                                class="form-control" value="{{ $dairy->place }}" required>

                                @error('place')
                             <ul class="parsley-errors-list filled" id="parsley-id-5"><li class="parsley-required"> {{ $message }}</li>
                             </ul>
                                 
                             @enderror
                        </div>
                    </div>


                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="description"> Metting Details </label>

                            <textarea name="description"  class="form-control" cols="30" rows="1">{{  @$dairy->description }}</textarea>

                            @error('description')
                             <ul class="parsley-errors-list filled" id="parsley-id-5"><li class="parsley-required"> {{ $message }}</li>
                             </ul>
                                 
                             @enderror

                        </div>
                    </div>



                    <div class="col-md-2">
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


     <script src="{{asset('assets/libs/parsleyjs/parsley.min.js')}}"></script>


        <script src="{{asset('assets/js/pages/form-validation.init.js')}}"></script>

    
@endpush