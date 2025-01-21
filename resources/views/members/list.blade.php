@php
    /** @var \App\Models\Member $member */
@endphp

@extends('layout.wrapper')

@section('content')
    <div>
        <a href="/" class="bg-blue-500 c-white border-r-2">< BACK</a>
        <div class="flex">
            <h3 class="font-bold text-lg">Club Members</h3>
            <a href="{{ route('members.create') }}"
               class="border-r-2 bg-green-500 c-white"
            >Create</a>
        </div>
        <table>
            <thead>
            <tr>
                <th class="p-2 align-left">Name</th>
                <th class="p-2 align-left">Email</th>
                <th class="p-2 align-left">Phone</th>
                <th class="p-2 align-left">Join Date</th>
                <th class="p-2 align-right">Avg. Score</th>
                <th class="p-2 align-left">Recent Form</th>
            </tr>
            </thead>
            <tbody>
            @foreach($members as $member)
            <tr>
                <td class="p-2 align-left">{{ $member->getName() }}</td>
                <td class="p-2 align-left">{{ $member->getEmail() }}</td>
                <td class="p-2 align-left">{{ $member->getPhone() }}</td>
                <td class="p-2 align-left">{{ $member->getJoinDate() }}</td>
                <td class="p-2 align-right">{{ $member->getAvgScore() }}</td>
                <td class="p-2 align-left">{{ $member->getRecentForm() }}</td>
                <td class="p-2 align-middle">
                    <a href="{{ route('members.view', ['memberId' => $member->getId()]) }}"
                       class="border-r-2 bg-blue-200"
                    >View</a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
