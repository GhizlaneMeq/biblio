@extends('layouts.dash')

@section('content')
    <div class="container mx-auto mt-24">
        <div class="max-w-md mx-auto bg-white p-6 rounded shadow">
            <h1 class="text-2xl font-semibold mb-6">Add New User</h1>
            <form action="{{ route('users.store') }}" method="post">
                @csrf

                <div class="mb-4">
                    <label for="firstname" class="block text-sm font-medium text-gray-600">First Name</label>
                    <input type="text" name="firstname" id="firstname" class="form-input">
                    @error('firstname')
                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="lastname" class="block text-sm font-medium text-gray-600">Last Name</label>
                    <input type="text" name="lastname" id="lastname" class="form-input">
                    @error('lastname')
                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
                    <input type="email" name="email" id="email" class="form-input">
                    @error('email')
                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-600">Password</label>
                    <input type="password" name="password" id="password" class="form-input">
                    @error('password')
                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="phone" class="block text-sm font-medium text-gray-600">Phone</label>
                    <input type="text" name="phone" id="phone" class="form-input">
                    @error('phone')
                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="role_id" class="block text-sm font-medium text-gray-600">Role</label>
                    <select name="role_id" id="role_id" class="form-select">
                        <option value="1">Admin</option>
                        <option value="2">User</option>
                    </select>
                </div>

                <div class="mt-6">
                    <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Add User</button>
                </div>
            </form>
        </div>
    </div>
@endsection
