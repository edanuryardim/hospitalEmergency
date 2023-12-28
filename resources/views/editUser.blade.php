@extends('layouts.master')
@section('content')

<div id="main-content">
    <div class="container-fluid">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="title" id="defaultModalLabel">Update user: {{$user->name}}</h6>
                </div>
                <div class="modal-body">
                    <form action="{{ route('edituser') }}" method="POST">
                        @csrf
                        <div class="row clearfix">

                            <input type="hidden" name="id" value="{{$user->id}}">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="name">Name:</label>
                                    <input type="text" class="form-control" placeholder="Name" value="{{$user->name}}" name="name">
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" placeholder="email" value="{{$user->email}}" name="email">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="role">Role</label>
                                    <select class="form-control" name="role">
                                        <option value="admin" @if($user->role == 'admin') selected @endif>Admin</option>
                                        <option value="secretary" @if($user->role == 'secretary') selected @endif>Secretary</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="role">Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" placeholder="Password" name="password" id="passwordInput" value="">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>





                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                    
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>

            </div>
            </form>
        </div>
    </div>
</div>

<!-- Add this script at the end of your HTML body -->
<script>
    $(document).ready(function() {
        $("#togglePassword").click(function() {
            var passwordInput = $("#passwordInput");
            var passwordFieldType = passwordInput.attr("type");

            if (passwordFieldType === "password") {
                passwordInput.attr("type", "text");
                $("#togglePassword i").removeClass("fa fa-eye").addClass("fa fa-eye-slash");
            } else {
                passwordInput.attr("type", "password");
                $("#togglePassword i").removeClass("fa fa-eye-slash").addClass("fa fa-eye");
            }
        });
    });
</script>




<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

@endsection
