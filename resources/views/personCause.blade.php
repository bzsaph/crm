 @extends('layouts.dash')

@section('dashboard')

    <style>
        #uploadRegistration {
            display: none;
        }

        #uploadTeamMembers {
            display: none;
        }
        #file-image {
            display: inline;
            margin: 0 auto .5rem auto;
            width: auto;
            height: auto;
            max-width: 180px;
        }

        #file-image.hidden {
            display: none;
        }

    </style>


    <div class="container">
        @if (Auth::user()->user_type =="enterpreneur")
        <div class="card justify-content-center">
            <h4 class="text-center jumbotron"><strong>Business Idea</strong></h4> <br>
            <form action="/registerIdea" method="post" accept-charset="utf-8" enctype="multipart/form-data"
                style="margin:3%">
                @csrf

                <div class="form-group row">
                    <label for="pjt_name" class="col-sm-2 col-form-label">Project Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" required name="pjt_name" id="pjt_name"
                            placeholder="Your Project Name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="pjt_desc" class="col-sm-2 col-form-label">Which sector are you in</label>
                    <div class="col-sm-10">
                        <select class="custom-select my-1 mr-sm-2" required name="sector" id="sector">
                            <option selected disabled>Choose...</option>
                            @foreach ($sector as $business)
                                <option value="{{ $business->id }}">{{ $business->sectorName }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="pjt_desc" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                        <textarea type="text" class="form-control" required name="pjt_desc" id="pjt_desc"
                            placeholder="Describe your project"></textarea>
                    </div>
                </div>

                <div class="form-group row" id="registration">
                    <label for="registration" class="col-sm-2 col-form-label">Is your project registered in RDB</label>
                    <div class="col-sm-10">
                        <select class="custom-select my-1 mr-sm-2" required id="areYourRegistred" name="areYourRegistred"
                            onchange="getSelectValue()">
                            <option selected>Choose...</option>
                            <option value="yes" id="yes">Yes</option>
                            <option value="no" id="no">No</option>
                        </select>
                    </div>

                </div>

                <div id="uploadRegistration">
                    <div class="form-group row">
                        <label for="registrationProof" class="col-sm-2 col-form-label">
                            <img id="file-image" src="#" alt="Preview" class="hidden">
                            <div id="start">
                                <div>Upload Your proof of registration
                                </div>

                                <span class="text-danger">{{ $errors->first('registrationProof') }}</span>
                            </div>
                        </label>

                        <div class="col-sm-10 custom-file">
                            <div class="file-field">
                                <input type="file" class="form-control" name="registrationProof" id="registrationProof"
                                    accept="image/*" onchange="readURL(this);">
                            </div>

                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="support" class="col-sm-2 col-form-label">type of support you need</label>
                    <div class="col-sm-10">
                        <select class="custom-select my-1 mr-sm-2" required name="support">
                            <option selected disabled>Choose...</option>
                            <option value="mentorship" id="mentorship">mentorship</option>
                            <option value="money" id="money">Investment (money)</option>
                            <option value="both" id="both">both</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">


                    <label for="pjt_desc" class="col-sm-2 col-form-label">do you have a team</label>
                    <div class="col-sm-10">
                        <select class="custom-select my-1 mr-sm-2" required name="havingATeam" id="havingATeam" onchange="team()">
                            <option selected>Choose...</option>
                            <option value="iDo" id="iDo">Yes</option>
                            <option value="iDoNot" id="iDoNot">No</option>
                        </select>
                    </div>
                </div>

                <div id="uploadTeamMembers">
                    <div class="form-group row">
                        <label for="pjt_desc" class="col-sm-2 col-form-label">Team members</label>
                        <div class="col-sm-10">
                            <textarea type="text" class="form-control" name="teamContacts" id="pjt_desc"
                                placeholder="Firstname Lastname: 0700 000 000"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="pjt_name" class="col-sm-2 col-form-label">Postion</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control"  name="position" id="position"
                                placeholder="ex: I'm the CEO">
                        </div>
                    </div>
                </div>



                <div class="modal-footer">

                    <button type="submit" class="btn btn-primary">Submit</button>

                </div>
            </form>

        </div>
        @endif
        {{-- <br><br> --}}
        @if (Auth::user()->user_type =="investor")
        <div class="card justify-content-center">
            <h4 class="text-center jumbotron"><strong>Support you offer</strong></h4> <br>
            <form action="/offerSupport" method="post" accept-charset="utf-8" enctype="multipart/form-data"
                style="margin:3%">
                @csrf
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Business email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" required required name="bns_email" id="bns_email"
                            placeholder="userEmail@email.com">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="number" class="col-sm-2 col-form-label">Business Phone Number</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" required name="bns_phn_number" id="bns_phn_number"
                            placeholder="0700 000 000">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="legal_status" class="col-sm-2 col-form-label">legal status</label>
                    <div class="col-sm-10">
                        <select class="custom-select my-1 mr-sm-2" required name="legal_status" id="legal_status">
                            <option selected  disabled>Choose...</option>
                                <option value="organisation">Organisation</option>
                                <option value="individual">Individual</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="sector" class="col-sm-2 col-form-label">Which sector do you want to invest in in</label>
                    <div class="col-sm-10">
                        <select class="custom-select my-1 mr-sm-2" required name="sector" id="sector">
                            <option selected  disabled>Choose...</option>
                            @foreach ($sector as $business)
                                <option value="{{ $business->id }}">{{ $business->sectorName }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="support" class="col-sm-2 col-form-label">help you offer</label>
                    <div class="col-sm-10">
                        <select class="custom-select my-1 mr-sm-2" required name="support" id="support">
                            <option selected disabled>Choose...</option>
                            <option value="mentorship" id="mentorship">mentorship</option>
                            <option value="money" id="money">Investment (money)</option>
                            <option value="both" id="both">both</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="spt_desc" class="col-sm-2 col-form-label">explain briefly the support your offering</label>
                    <div class="col-sm-10">
                        <textarea type="text" required class="form-control" name="spt_desc" id="spt_desc"
                            placeholder="ex:  i want to offer mentorship to startup businesses"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>

        </div>
        @endif
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script>
        function readURL(input, id) {
            id = id || '#file-image';
            if (input.files & amp; & amp; input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $(id).attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
                $('#file-image').removeClass('hidden');
                $('#start').hide();
            }
        }

    </script>
@endsection
