@php
    /** @var \App\Models\Member $member */
@endphp

@extends('layout.wrapper')

@section('content')
    <div>
        <h3 class="font-bold text-lg">Create Member</h3>
        <form
            class="w-full"
            method="POST"
            action="{{ route('members.save') }}"
            enctype="multipart/form-data"
        >
            @csrf
            <div class="w-full">
                @include('components.input', [
                    'label' => 'Name',
                    'name' => 'name'
                ])
                @include('components.input', [
                    'label' => 'Email',
                    'name' => 'email'
                ])
                @include('components.input', [
                    'label' => 'Phone',
                    'name' => 'phone'
                ])
                @include('components.input', [
                    'label' => 'Join Date',
                    'name' => 'joinDate'
                ])
            </div>
            <button type="submit" class="bg-green-500 c-white">Submit</button>
        </form>
    </div>
@endsection
