@php
    /** @var \App\Models\Member $member */
@endphp

@extends('layout.wrapper')

@section('content')
    <div>
        <div class="rounded-2xl bg-white p-4 mt-4">
            <div class="flex pt-3 pb-3">
                <h3 class="font-bold text-lg pr-3">Club Members</h3>
                <div>
                    <a href="{{ route('members.create') }}"
                       class="bg-green-500 text-white rounded pl-2 pr-2 pt-1 pb-1 block"
                    >+ Create</a>
                </div>
            </div>
            <table>
                <thead>
                <tr>
                    <th class="p-2 text-left">Name</th>
                    <th class="p-2 text-left">Email</th>
                    <th class="p-2 text-left">Phone</th>
                    <th class="p-2 text-left">Join Date</th>
                    <th class="p-2 text-right">Avg. Score</th>
                    <th class="p-2 text-left">Recent Form</th>
                </tr>
                </thead>
                <tbody>
                @foreach($members as $member)
                <tr>
                    <td class="p-2 text-left">{{ $member->getName() }}</td>
                    <td class="p-2 text-left">{{ $member->getEmail() }}</td>
                    <td class="p-2 text-left">{{ $member->getPhone() }}</td>
                    <td class="p-2 text-left">{{ $member->getJoinDate() }}</td>
                    <td class="p-2 text-right">{{ $member->getAvgScore() }}</td>
                    <td class="p-2 text-left">{{ $member->getRecentForm() }}</td>
                    <td class="p-2 text-middle">
                        <a href="{{ route('members.view', ['memberId' => $member->getId()]) }}"
                           class="rounded bg-blue-200 pl-2 pr-2 pt-1 pb-1"
                        >View</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
