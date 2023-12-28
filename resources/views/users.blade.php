@extends('layouts.master')
@section('content')
<!-- mani page content body part -->
<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <h2>Analytical</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-dashboard"></i></a></li>
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item active">Analytical</li>
                    </ul>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="d-flex flex-row-reverse">
                        <div class="page_action">
                            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#addUserModal">New User</button>


                        </div>
                        <div class="p-2 d-flex">

                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>users </h2>
                        <ul class="header-dropdown">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another Action</a></li>
                                    <li><a href="javascript:void(0);">Something else</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">

                        @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @elseif(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                        @endif

                        <p class="float-md-right">


                            <span class="badge badge-success"> {{ $users->where('role', 'admin')->count() }} Admin</span>

                            <span class="badge badge-default">
                                {{ $users->where('role', 'secretary')->count() }} Secretary
                            </span>

                        </p>
                        <div class="table-responsive table_middel">
                            <table class="table m-b-0">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Users</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Created Date</th>
                                        <th>Updated Date</th>
                                        <th>Actions</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)


                                    <tr>

                                        <td>{{$user->id}}</td>


                                        <td>{{$user->name ? $user->name : 'No Name'}}</td>

                                        <td>{{$user->email ? $user->email : 'No Email'}}</td>
                                        <td>
                                            @if($user->role == 'admin')
                                            <span class="badge badge-danger">Admin</span>
                                            @elseif($user->role == 'secretary')
                                            <span class="badge badge-success">Secretary</span>
                                            @else
                                            <span class="badge badge-warning">No Role</span>
                                            @endif
                                        </td>


                                        <td><span class="text-info">{{ \Carbon\Carbon::parse($user->created_at)->format('Y.n.j') }}</span></td>

                                        @if ($user->exit_date)
                                        <td><span class="text-danger">{{ \Carbon\Carbon::parse($user->updated_at)->format('Y.n.j') }}</span></td>
                                        @else
                                        <td><span class="text-danger">---</span></td>
                                        @endif





                                        <td>
                                            <a type="button" class="btn btn-sm btn-primary" href="{{ route('editUserIndex', ['id'=>$user->id]) }}"><i class="fa fa-pencil"></i></a>
                                            <!-- Silme işlemi için modal tetikleyici buton -->
                                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteUserModal_{{ $user->id }}">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                            <!-- Silme işlemi için modal -->
                                            <div class="modal fade" id="deleteUserModal_{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteUserModalLabel_{{ $user->id }}" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="deleteUserModalLabel_{{ $user->id }}">Delete User</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you sure you want to delete user '{{ $user->name }}'?
                                                        </div>
                                                        <div class="modal-footer">

                                                            <!-- Silme formu -->
                                                            <form action="{{ route('deleteUser', ['id' => $user->id]) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger">Delete</button>
                                                            </form>
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>









<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="title" id="addUserModalLabel">Add New User</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <!-- Yeni kullanıcı eklemek için form -->
                <form action="{{ route('createNewUser') }}" method="POST">
                    @csrf
                    <div class="row clearfix">
                        <!-- Kullanıcı adı -->
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="name">Full Name:</label>
                                <input type="text" class="form-control" placeholder="Name" name="name">
                            </div>
                        </div>
                        <!-- Kullanıcı email -->
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" placeholder="Email" name="email">
                            </div>
                        </div>
                        <!-- Kullanıcı rolü -->
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="role">Role</label>
                                <select class="form-control" name="role">
                                    <option value="admin">Admin</option>
                                    <option value="secretary">Secretary</option>
                                </select>
                            </div>
                        </div>
                        <!-- Kullanıcı şifresi -->
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" placeholder="Password" name="password" id="addUserPasswordInput">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" id="toggleAddUserPassword">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>



            <div class="modal-footer">
                <!-- Save button -->
                <button type="submit"  class="btn btn-primary">Save</button>
                <!-- Cancel button -->
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
            </form>

            </div>
        </div>
    </div>
</div>




<script>
    // jQuery document ready
    $(document).ready(function() {
        // Fonksiyonun global alanda tanımlanması
        window.openAddUserModal = function() {
            // Modalı aç
            $('#addUserModal').modal('show');
        };

        // Butona tıklandığında openAddUserModal fonksiyonunu çağır
        $('#newUserButton').on('click', openAddUserModal);



    });

    // Şifre göster/gizle fonksiyonu
    function togglePassword() {
        var passwordInput = $("#passwordInput");
        var passwordFieldType = passwordInput.attr("type");

        if (passwordFieldType === "password") {
            passwordInput.attr("type", "text");
            $("#togglePassword i").removeClass("fa fa-eye").addClass("fa fa-eye-slash");
        } else {
            passwordInput.attr("type", "password");
            $("#togglePassword i").removeClass("fa fa-eye-slash").addClass("fa fa-eye");
        }
    }

    // Modal açıldığında togglePassword fonksiyonunu çağır
    $('#myModal').on('shown.bs.modal', function() {
        togglePassword();
    });

    // Şifre göster/gizle butonuna tıklandığında togglePassword fonksiyonunu çağır
    $("#togglePassword").click(function() {
        togglePassword();
    });
</script>



<!-- Font Awesome CDN kullanımı -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

@endsection
