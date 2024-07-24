@extends('layouts.app')

@section('content')
<style>
.modal-content {
    width: 113%;
}
</style>
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Edit Inspection Form</h5>
                                    <div class="float-right">
                                        <a href="{{ route('jobs.index') }}" class="btn btn-primary btn-md primary-btn">
                                            <i class="feather icon-arrow-left"></i>
                                            Go Back
                                        </a>
                                    </div>
                                </div>

                                <div class="card-block">
                                    <form method="post" action="{{ route('jobs.update', $job->id) }}">
                                        @csrf
                                        @method('PATCH')
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label" for="name">Name:</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control m-0" id="name" name="name" value="{{ $job->name }}"
                                                        type="text" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label" for="date">Date:</label>
                                                <div class="col-sm-9">
                                                    <input type="date" name="date" class="form-control m-0" value="{{ $job->date }}"
                                                        id="datepicker" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label" for="mileage">Mileage:</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control m-0" id="mileage" name="mileage" value="{{ $job->mileage }}"
                                                        type="text" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label" for="vehicle">Vehicle:</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control m-0" id="vehicle" name="vehicle" value="{{ $job->vehicle }}"
                                                        type="text" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label" for="year">Year:</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control m-0" id="year" name="year" value="{{ $job->vehicle }}"
                                                        type="text" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label" for="licence_no">Licence No:</label>
                                                <div class="col-sm-9 input-group">
                                                    <input type="text" class="form-control m-0" id="licence_no" value="{{ $job->licence_no }}"
                                                        name="licence_no" readonly>
                                                    <div class="input-group-append">
                                                        <button class="btn btn-outline-secondary primary-btn"
                                                            id="openPopupBtn" type="button" data-toggle="modal"
                                                            data-target="#myModal"><i class="feather icon-eye m-0"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" for="address">Address:</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control m-0" id="address" name="address" value="{{ $job->address }}"
                                                        type="text" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label" for="returning">Returning:</label>
                                                <div class="col-sm-8">
                                                    <input class="form-control m-0" id="returning" name="returning" value="{{ $job->returning }}"
                                                        type="text" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label" for="color">Color:</label>
                                                <div class="col-sm-8">
                                                    <input class="form-control m-0" id="color" name="color" value="{{ $job->color }}"
                                                        type="text" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label" for="tel_digicel">TEL
                                                    Digicel:</label>
                                                <div class="col-sm-8" @readonly(true)>
                                                    <input class="form-control m-0" id="tel_digicel" name="tel_digicel" value="{{ $job->tel_digicel }}"
                                                        type="text">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" for="email">Email:</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control m-0" id="email" name="email" value="{{ $job->email }}"
                                                        type="email" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label" for="tel_lime">TEL Lime:</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control m-0" id="tel_lime" name="tel_lime" value="{{ $job->tel_lime }}"
                                                        type="text" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label" for="dob">Date of
                                                    Birth:</label>
                                                <div class="col-sm-9">
                                                    <input type="date" class="form-control m-0" id="datepicker2" value="{{ $job->dob }}"
                                                        name="dob" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label" for="chassis">Chassis:</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control m-0" id="chassis" name="chassis" value="{{ $job->chassis }}"
                                                        type="text" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label" for="name">Branch:</label>
                                                <div class="col-sm-9">
                                                    <select name="branch_id" id="branch_id" class="form-control m-0">
                                                        <option value="Select Branch">Select Branch</option>
                                                        @foreach($branches as $key => $branch)
                                                            <option value="{{$branch->id}}" @selected($branch->id == $job->branch_id)>{{ ucwords($branch->name) }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label" for="date">Bay:</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control" id="bay_id" name="bay_id">
                                                        <option value="" selected disabled>Select Bay</option>
                                                        @if($bays)
                                                            @foreach($bays as $bay)
                                                                <option value="{{$bay->id}}" @selected($bay->id == $job->bay_id)>{{ $bay->name }}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label" for="mileage">User:</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control" id="user_id" name="user_id">
                                                        <option value="" selected disabled>Select User</option>
                                                        @if($users)
                                                            @foreach($users as $user)
                                                                <option value="{{$user->id}}" @selected($user->id == $job->user_id)>{{ $user->first_name.' '.$user->last_name }}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-8">
                                            <p>Kindly complete this checklist by placing a tick in the respective boxes.<br>
                                                Any discrepancies should be detailed in the section provided at the bottom
                                                of the sheet.</p>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label" for="engine">Engine:</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control m-0" id="engine" name="engine" value="{{ $job->engine }}"
                                                        type="text" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-8">
                                            <p>ITEMS TO BE CHECKED:</p>
                                            <p>Start Engine check dashboard for the following indicators</p>
                                            <ul>
                                                <li>Fuel level</li>
                                                <li>Oil level</li>
                                                <li>Coolant level</li>
                                                <li>Power steering oil level</li>
                                                <li>Check tires for wear and pressure (20% 30% 50% 60% 80% 100% other
                                                    indicate)</li>
                                            </ul>
                                            <div class="form-group">
                                                <label class="col-form-label" for="notes">Notes:</label>
                                                <div class="">
                                                    <textarea class="form-control m-0" id="notes" name="notes" rows="2" cols="200">{{$job->notes}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Engine Light</th>
                                                        <th>ABS Light</th>
                                                        <th>Brake Light</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>E 1/4</td>
                                                        <td>1/2 3/4</td>
                                                        <td>F</td>
                                                    </tr>
                                                    <tr>
                                                        <td>E 1/4</td>
                                                        <td>1/2 3/4</td>
                                                        <td>F</td>
                                                    </tr>
                                                    <tr>
                                                        <td>E 1/4</td>
                                                        <td>1/2 3/4</td>
                                                        <td>F</td>
                                                    </tr>
                                                    <tr>
                                                        <td>E 1/4</td>
                                                        <td>1/2 3/4</td>
                                                        <td>F</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                        </div>
                                        <div class="col-md-5">
                                            <span class="col-sm-8"> </span><span class="col-sm-2">Good</span><span
                                                class="col-sm-2">Defective</span>
                                        </div>
                                        <div class="col-md-5">
                                            <span class="col-sm-8"></span><span class="col-sm-2">Good</span><span
                                                class="col-sm-2">Defective</span>
                                        </div>
                                    </div><br>
                                    <?php  $data = json_decode($job->conditions); 
                                    ?>
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            @php
                                                $products1 = [
                                                    'Horn',
                                                    'Carpet',
                                                    'Battery',
                                                    'Battery Clamps',
                                                    'Left Headlight',
                                                    'Right Headlight',
                                                    'Left Indicator',
                                                    'Right Front Fender',
                                                    'Left Front Fender',
                                                    'Right Front Door',
                                                    'Left Front Door',
                                                    'Left Rear Door',
                                                    'Right Rear Door',
                                                    'Left Tail Lamp',
                                                    'Right Tail Lamp',
                                                    'Hub Caps',
                                                    'Cigarette Lighter',
                                                    'Grill',
                                                ];
                                            @endphp
                                            @foreach ($products1 as $key => $product)
                                                <label class="col-sm-6">{{ $product }}</label>
                                                <div class="form-check form-check-inline col-sm-2">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input status-checkbox"
                                                            id="{{ strtolower(str_replace(' ', '_', $product)) }}_status[]"
                                                            type="checkbox"
                                                            name="products[{{ strtolower(str_replace(' ', '_', $product)) }}][condition]"
                                                            value="good" @if($data) {{ in_array(strtolower(str_replace(' ', '_', $product)), array_column($data, 'product')) && $data[array_search(strtolower(str_replace(' ', '_', $product)), array_column($data, 'product'))]->condition == 'good' ? 'checked' : '' }} @endif disabled>
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline col-sm-2">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input status-checkbox"
                                                            id="{{ strtolower(str_replace(' ', '_', $product)) }}_status[]"
                                                            type="checkbox"
                                                            name="products[{{ strtolower(str_replace(' ', '_', $product)) }}][condition]"
                                                            value="defective" @if($data){{ in_array(strtolower(str_replace(' ', '_', $product)), array_column($data, 'product')) && $data[array_search(strtolower(str_replace(' ', '_', $product)), array_column($data, 'product'))]->condition == 'defective' ? 'checked' : '' }} @endif disabled>
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="col-md-6 form-group">
                                            @php
                                                $products2 = [
                                                    'Reverse Light',
                                                    'Rear Door or Trunk',
                                                    'Window Functions',
                                                    'Oil Cap',
                                                    'Left Quarter Panel',
                                                    'Right Quarter Panel',
                                                    'Front Bumper',
                                                    'Rear Bumper',
                                                    'Left Wing Mirror',
                                                    'Right Wing Mirror',
                                                    'Rims',
                                                    'Interior Lights',
                                                    'Seats',
                                                    'Door Pulls',
                                                    'Rear Windshield',
                                                    'Front Windshield',
                                                    'Spare Tire',
                                                    'Jack & Handle',
                                                    'Wipers & Washer Jets',
                                                ];
                                            @endphp

                                            @foreach ($products2 as $key => $product)
                                                <label class="col-sm-6">{{ $product }}</label>
                                                <div class="form-check form-check-inline col-sm-2">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input status-checkbox" type="checkbox"
                                                            id="{{ strtolower(str_replace(' ', '_', $product)) }}_status[]"
                                                            name="products[{{ strtolower(str_replace(' ', '_', $product)) }}][condition]"
                                                            value="good" @if($data) {{ in_array(strtolower(str_replace(' ', '_', $product)), array_column($data, 'product')) && $data[array_search(strtolower(str_replace(' ', '_', $product)), array_column($data, 'product'))]->condition == 'good' ? 'checked' : '' }} @endif disabled>
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline col-sm-2">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input status-checkbox" type="checkbox"
                                                            id="{{ strtolower(str_replace(' ', '_', $product)) }}_status[]"
                                                            name="products[{{ strtolower(str_replace(' ', '_', $product)) }}][condition]"
                                                            value="defective" @if($data) {{ in_array(strtolower(str_replace(' ', '_', $product)), array_column($data, 'product')) && $data[array_search(strtolower(str_replace(' ', '_', $product)), array_column($data, 'product'))]->condition == 'defective' ? 'checked' : '' }} @endif disabled>
                                                    </label>
                                                </div><br>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <p>Following discrepancies were noted:
                                                .......................................................</p>
                                            <p>I hereby authorize Superior Parts Limited to effect repairs and supply
                                                necessary materials
                                                relating to this job and grant your employees permission to operate the
                                                vehicle described above
                                                on streets, highways, and elsewhere for testing and inspection.</p>
                                            <p>50% deposit is to be made on all jobs.</p>
                                            <p>Superior Parts Ltd will not be held responsible for jobs left over 30 days.
                                            </p>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label" for="date">Date:</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control m-0 " id="date" name="sign_date" type="date" value="{{ $job->sign_date }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8 form-group row">
                                            <label class="col-sm-4 col-form-label">Customer's Signature:</label>
                                            <div class="col-sm-8">
                                                <img src="{{ asset($job->sign)}}" width="100" height="100">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                        </div>
                                    </div>
                                    <br />
                                    <button id="sig-submitBtn" class="btn btn-primary primary-btn">Save</button>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

     <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Inspection Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="inquery-table">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>S.No.</th>
                                        <th>Name</th>
                                        <th>Date</th>
                                        <th>Licence no</th>
                                        <th>Action</th>
                                    </tr>
                                <tbody id="inquery"></tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <!-- Add additional buttons or controls here if needed -->
                    </div>
                </div>
            </div>
        </div>
    <script>
        $(document).ready(function() {
            $('#openPopupBtn').click(function() {
                var licenseNo = $('#licence_no').val();
                console.log(licenseNo);
                $.ajax({
                    url: '/job-data',
                    type: 'POST',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        licenseNo: licenseNo,
                    },
                    success: function(response) {
                        if (response.html == '') {
                            $('.inquery-table').addClass('d-none');
                        } else {
                            $('#inquery').html(response.html);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });
        });

        $(function() {
            $('.status-checkbox').change(function() {
                var type = $(this).attr('id');
                $('.status-checkbox[id="' + type + '"]').not(this).prop('checked', false);
            });

            $('#branch_id').on('change', function() {
                var branch_id = this.value;
                $("#bay_id").html('');
                $.ajax({
                    url: "{{ url('get-bay') }}",
                    type: "POST",
                    data: {
                        branch_id: branch_id,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#bay_id').html(result.options);
                        $('#user_id').html(result.userOption)
                    }
                });
            });

            $('form').validate({
                rules: {
                    name: "required",
                    mileage: "required",
                    licence_no: "required",
                    tel_digicel: "required",
                    tel_lime: "required",
                    dob: "required",
                },
                messages: {
                    name: "Please enter name",
                    mileage: "Please enter mileage",
                    licence_no: "Please enter licence no",
                    tel_digicel: "Please enter tel digicel",
                    tel_lime:"Please enter tel lime",
                    dob: "Please enter date of birth",
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
    </script>
@endsection
