@extends('layouts.app')

@section('content')

<!-- <style>
    div#week_status_chosen {
        width: 423px !important;
    }
</style> -->
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Add Branch</h5>
                                    <div class="float-right">
                                        <a href="{{ route('branches.index') }}" class="btn btn-primary btn-md primary-btn">
                                            <i class="feather icon-arrow-left"></i>
                                            Go Back
                                        </a>
                                    </div>
                                </div>

                                <div class="card-block">
                                    <form action="{{ route('branches.store') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-4 form-group">
                                                <x-input-text name="name" label="Name" value="{{ old('name') }}" required></x-input-text>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <label for="branch_head">Branch Head</label>
                                                <select name="branch_head" id="branch_head" class="form-control">
                                                    <option value="" selected disabled>Select Branch</option>
                                                    @foreach ($users as $key => $user)
                                                        <option value="{{$user->id}}">{{ $user->first_name.' '.$user->last_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-3 form-group">
                                                <label for="location_id">Location <span style="color: red;">*</span></label>
                                                <select name="location_id[]" id="location_id" class="form-control chosen-select" multiple="multiple">
                                                    <option value="select_all">Select All</option>
                                                    @if(!empty($locations))
                                                        @foreach ($locations as $key => $location)
                                                            <option value="{{$location->id}}">{{ $location->name}}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                                <span class="form-control-danger" id="location_id_error" style="display:none; color: #dc3545; font-size:12px;">Please select atleast 1 location.</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 form-group">
                                                <label for="timing">Start Time</label>
                                                <input type="time" name="start_time" class="form-control" value="{{ old('start_time') }}" >
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <label for="timing">End Time</label>
                                                <input type="time" name="end_time" class="form-control" value="{{ old('end_time') }}" >
                                            </div>
                                            <div class="col-md-3 form-group">
                                                <label for="status">Week Status</label>
                                                @php $weeks = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] @endphp
                                                <select multiple class="form-control chosen-select" name="week_status[]" id="week_status">
                                                    <option value="select_all">Select All</option>
                                                    @foreach($weeks as $aItemKey => $week)
                                                        <option value="{{$week}}">{{$week}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 form-group">
                                                <x-input-text name="address" label="Address" value="{{ old('address') }}" required></x-input-text>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <x-input-text name="pincode" label="Pincode" value="{{ old('pincode') }}" required></x-input-text>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <label for="status">Status</label>
                                                <select name="status" id="status" class="form-control">
                                                    <option value="Working">Working</option>
                                                    <option value="Not Working">Not Working</option>
                                                </select>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary primary-btn" id="submit_btn">Save</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-include-plugins chosenSelect></x-include-plugins>

    <script>
        $(function() {
            $('form').validate({
                rules: {
                    name: "required",
                    address: "required",
                    pincode: "required",
                    location_id: {
                        required: true // Ensure location_id is selected
                    },
                },
                messages: {
                    name: "Please enter branch name",
                    address: "Please enter address",
                    pincode: "Please enter pincode",
                    location_id: "Please select a location",
                },
                errorClass: "text-danger f-12",
                errorElement: "span",
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass("form-control-danger");
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass("form-control-danger");
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        });

        $(document).ready(function(){
            $('#location_id').change(function() {
                if ($(this).val().length === 0) {
                    $('#location_id_error').css('display', 'block');
                }else{
                    $('#location_id_error').css('display', 'none');
                }
            });
            
            $('#submit_btn').on('click', function() {
                if ($('#location_id').val().length === 0) {
                    $('#location_id_error').css('display', 'block');
                }else{
                    $('#location_id_error').css('display', 'none');
                }
            });
        });
    </script>
@endsection
