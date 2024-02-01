@extends('layouts.dash')

@section('content')
    <div class="container mx-auto mt-24">
        <div class="max-w-md mx-auto bg-white p-6 rounded shadow">
            <h1 class="text-2xl font-semibold mb-6">Edit User</h1>
            <form action="{{ route('users.update', $user->id) }}" method="post">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="firstname" class="block text-sm font-medium text-gray-600">First Name</label>
                    <input type="text" name="firstname" id="firstname" class="form-input" value="{{ $user->firstname }}">
                    @error('firstname')
                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="lastname" class="block text-sm font-medium text-gray-600">Last Name</label>
                    <input type="text" name="lastname" id="lastname" class="form-input" value="{{ $user->lastname }}">
                    @error('lastname')
                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
                    <input type="email" name="email" id="email" class="form-input" value="{{ $user->email }}">
                    @error('email')
                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="phone" class="block text-sm font-medium text-gray-600">Phone</label>
                    <input type="text" name="phone" id="phone" class="form-input" value="{{ $user->phone }}">
                    @error('phone')
                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="role_id" class="block text-sm font-medium text-gray-600">Role</label>
                    <select name="role_id" id="role_id" class="form-select">
                        <option value="1" {{ $user->role_id == 1 ? 'selected' : '' }}>Admin</option>
                        <option value="2" {{ $user->role_id == 2 ? 'selected' : '' }}>User</option>
                    </select>
                </div>

                <div class="mt-6">
                    <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Update User</button>
                </div>
            </form>
        </div>
    </div>
@endsection
