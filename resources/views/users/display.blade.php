@extends('layouts.dash')

@section('content')
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap");

        * {
            margin: 0;
            padding: 0;
            outline: none;
            border: none;
            text-decoration: none;
            list-style: none;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            background: rgb(233, 233, 233);
        }

        .container {
            display: flex;
            width: 1200px;
            margin: auto;
        }

        nav {
            position: sticky;
            top: 0;
            left: 0;
            bottom: 0;
            width: 280px;
            height: 110vh;
            background: #fff;
        }

        .navbar {
            width: 80%;
            margin: 0 auto;
        }

        .logo {
            margin: 2rem 0 1rem 0;
            padding-bottom: 3rem;
            display: flex;
            align-items: center;
        }

        .logo img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }

        .logo h1 {
            margin-left: 1rem;
            text-transform: uppercase;
        }

        ul {
            margin: 0 auto;
        }

        li {
            padding-bottom: 2rem;
        }

        li a {
            font-size: 16px;
            color: rgb(85, 83, 83);
        }

        .nav-item {}

        nav i {
            width: 50px;
            font-size: 18px;
            text-align: center;
        }

        .logout {
            position: absolute;
            bottom: 20px;
        }

        /* Main Section */
        .main {
            width: 100%;
        }

        .main-top {
            width: 100%;
            background: #fff;
            padding: 10px;
            text-align: center;
            font-size: 18px;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: rgb(43, 43, 43);
        }

        .main-body {
            padding: 10px 10px 10px 20px;
        }

        h1 {
            margin: 20px 10px;
        }

        .search_bar {
            display: flex;
            padding: 10px;
            justify-content: space-between;
        }

        .search_bar input {
            width: 50%;
            padding: 10px;
            border: 1px solid rgb(190, 190, 190);
        }

        .search_bar input:focus {
            border: 1px solid blueviolet;
        }

        .search_bar select {
            border: 1px solid rgb(190, 190, 190);
            padding: 10px;
            margin-left: 2rem;
        }

        .search_bar .filter {
            width: 300px;
        }

        .tags_bar {
            width: 55%;
            display: flex;
            padding: 10px;
            justify-content: space-between;
        }

        .tag {
            background: #fff;
            padding: 10px 15px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            font-size: 13px;
            cursor: pointer;
        }

        .tag i {
            margin-right: 0.7rem;
        }

        .row {
            display: flex;
            padding: 10px;
            margin-top: 1.3rem;
            justify-content: space-between;
        }

        .row p {
            color: rgb(54, 54, 54);
            font-size: 15px;
        }

        .row p span {
            color: blueviolet;
        }

        .job_card {
            width: 100%;
            padding: 15px;
            cursor: pointer;
            display: flex;
            border-radius: 10px;
            background: #fff;
            margin-bottom: 15px;
            justify-content: space-between;
            border: 2px solid rgb(190, 190, 190);
            box-shadow: 0 20px 30px rgba(0, 0, 0, 0.1);
        }

        .job_details {
            display: flex;
        }

        .job_details .img {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .job_details .img i {
            width: 70px;
            font-size: 3rem;
            margin-left: 1rem;
            padding: 10px;
            color: rgb(82, 22, 138);
            background: rgb(216, 205, 226);
        }

        .job_details .text {
            margin-left: 2.3rem;
        }

        .job_details .text span {
            color: rgb(116, 112, 112);
        }

        .job_salary {
            text-align: right;
            color: rgb(54, 54, 54);
        }

        .job_card:active {
            border: 2px solid blueviolet;
            transition: 0.4s;
        }
    </style>


    <div class="container">
        <div class="main-body ml-16 mt-36">
            @if (session('success'))
                <div class="bg-green-200 text-green-800 border border-green-600 px-4 py-2 rounded relative" role="alert">
                    <p>{{ session('success') }}</p>
                    <button type="button" class="absolute top-0 right-0 mt-2 mr-2 text-xl font-bold" data-dismiss="alert"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="card border-left-primary shadow h-100 custom-card">
                <a href="{{ route('users.create') }}" class="btn btn-primary">Add New User</a>
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <table class="table table-borderless">
                            <thead>
                                <thead>
                                    <tr>
                                        <th>First name</th>
                                        <th>Last name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Role</th>
                                    </tr>
                                </thead>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->firstname }}</td>
                                        <td>{{ $user->lastname }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td>{{ $user->role->name }}</td>
                                        <td>
                                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Edit</a>
                                            <form action="{{ route('users.destroy', $user->id) }}" method="post" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
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
@endsection
