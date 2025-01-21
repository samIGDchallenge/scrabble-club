@php
    /** @var \App\Models\Member $member */
@endphp

@extends('layout.wrapper')

@section('content')
    <div>
        <h3 class="font-bold text-lg">Editing member {{ $member->getId() }} - {{ $member->getName() }}</h3>
        <form
            class="w-full"
            method="POST"
            action="{{ route('members.update', ['memberId' => $member->getId()]) }}"
            enctype="multipart/form-data"
        >
            @csrf
            <div class="w-full">
                @include('components.input', [
                    'label' => 'Name',
                    'name' => 'name',
                    'value' => $member->getName()
                ])
                @include('components.input', [
                    'label' => 'Email',
                    'name' => 'email',
                    'value' => $member->getEmail()
                ])
                @include('components.input', [
                    'label' => 'Phone',
                    'name' => 'phone',
                    'value' => $member->getPhone()
                ])
                @include('components.input', [
                    'label' => 'Join Date',
                    'name' => 'joinDate',
                    'value' => $member->getJoinDate()
                ])
            </div>
            <button type="submit" class="bg-green-500 c-white">Submit</button>
        </form>
    </div>
@endsection
