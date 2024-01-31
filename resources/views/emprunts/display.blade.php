@extends('layouts.dash')

@section('content')
    <div class="container" style="margin-left: 250px">
        <h1 class="text-2xl font-semibold mb-4">Emprunts</h1>

        @if(session('success'))
            <div class="bg-green-200 text-green-800 border border-green-600 px-4 py-2 rounded mb-4" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr>
                    <th class="border border-gray-300 px-4 py-2">ID</th>
                    <th class="border border-gray-300 px-4 py-2">Description</th>
                    <th class="border border-gray-300 px-4 py-2">Date Emprunt</th>
                    <th class="border border-gray-300 px-4 py-2">Return Date</th>
                    <th class="border border-gray-300 px-4 py-2">Is Returned</th>
                    <th class="border border-gray-300 px-4 py-2">User</th>
                    <th class="border border-gray-300 px-4 py-2">Book</th>
                    <th class="border border-gray-300 px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($emprunts as $emprunt)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">{{ $emprunt->id }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $emprunt->description }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $emprunt->date_emprunt }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $emprunt->return_date }}</td>
                        <td class="border border-gray-300 px-4 py-2">
                            @if ($emprunt->is_returned)
                                Returned
                            @else
                                Not Returned
                            @endif
                        </td>
                        <td class="border border-gray-300 px-4 py-2">{{ ($emprunt->user->firstname.' '.$emprunt->user->lastname) }}</td>
                        <td class="border border-gray-300 px-4 py-2">
                            @if($emprunt->is_returned)
                                Returned
                            @else
                                <form action="{{ route('emprunts.update', $emprunt->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-2">
                                        <label for="description" class="block text-sm font-medium text-gray-600">Description:</label>
                                        <textarea id="description" name="description" rows="2" class="form-input mt-1 block w-full" required></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Mark as Returned</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="border border-gray-300 px-4 py-2 text-center">No emprunts available.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
