@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-4/12 bg-white p-3 rounded-lg">
            <form class="mt-8 space-y-6" action="{{ route('register') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="name" class="sr-only">Name</label>
                    <input id="name" name="name" type="text" value="{{ old('name') }}"
                        class="rounded-lg w-full p-4 border-2 bg-gray-100 @error('name') border-red-500 @enderror"
                        placeholder="Name">

                    @error('name')
                        <span class="text-sm text-red-700">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="email-address" class="sr-only">Email address</label>
                    <input id="email-address" name="email" type="email" value="{{ old('email') }}"
                        class="rounded-lg w-full p-4 border-2 bg-gray-100 @error('email') border-red-500 @enderror"
                        placeholder="Email address">

                    @error('email')
                        <span class="text-sm text-red-700">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input id="password" name="password" type="password"
                        class="rounded-lg w-full p-4 border-2 bg-gray-100 @error('password') border-red-500 @enderror"
                        placeholder="Password">

                    @error('password')
                        <span class="text-sm text-red-700">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password_confirmation" class="sr-only">Repeat Password</label>
                    <input id="password_confirmation" name="password_confirmation" type="password"
                        class="rounded-lg w-full p-4 border-2 bg-gray-100 @error('password_confirmation') border-red-500 @enderror"
                        placeholder="Repeat Password">

                    @error('password_confirmation')
                        <span class="text-sm text-red-700">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <button type="submit"
                        class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Register
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
