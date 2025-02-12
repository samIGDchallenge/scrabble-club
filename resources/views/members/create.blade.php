@php
    /** @var \App\Models\Member $member */
@endphp

@extends('layout.wrapper')

@section('content')
    <div>
        <a href="{{ route('members') }}" class="font-bold text-white pl-2 pr-2 pt-1 pb-1">◀ All members</a>
        <div class="rounded-2xl bg-amber-100 p-4 mt-4">
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
                    @include('components.dateInput', [
                        'label' => 'Join Date',
                        'name' => 'joinDate'
                    ])
                </div>
                <button type="submit" class="bg-green-500 text-white rounded pl-2 pr-2 pt-1 pb-1">Submit</button>
            </form>
        </div>
    </div>
@endsection
