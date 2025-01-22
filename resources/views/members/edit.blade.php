@php
    /** @var \App\Models\Member $member */
@endphp

@extends('layout.wrapper')

@section('content')
    <div>
        <a href="{{ route('members.view', ['memberId' => $member->getId()]) }}" class="font-bold pl-2 pr-2 pt-1 pb-1">◀ Back</a>
        <div class="rounded-2xl bg-white p-4 mt-4">
            <div class="flex pt-3 pb-3">
                <h5 class="font-bold text-lg">Editing member {{ $member->getId() }} - {{ $member->getName() }}</h5>
            </div>
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
                <button type="submit" class="bg-green-500 text-white rounded pl-2 pr-2 pt-1 pb-1">Submit</button>
            </form>
        </div>
    </div>
@endsection
