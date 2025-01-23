@php
    /** @var \App\Models\Member $member */
@endphp

@extends('layout.wrapper')

@section('content')
    <div>
        <div class="rounded-2xl bg-amber-100 p-4 mt-4">
            <div class="flex pt-3 pb-3">
                <h3 class="font-bold text-lg pr-3">Leaderboard</h3>
            </div>
            <table>
                <thead>
                <tr>
                    <th class="p-2 text-left">Position</th>
                    <th class="p-2 text-left">Member</th>
                    <th class="p-2 text-right">Avg. Score</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($topTen as $position => $member)
                <tr>
                    <td class="p-2 text-left">{{ $position + 1 }}</td>
                    <td class="p-2 text-left">
                        <div class="flex">
                            <div class="w-full">
                                {{ $member->getName() }}
                            </div>
                            <div class="ml-1">
                                <a href="{{ route('members.view', ['memberId' => $member->getId()]) }}"
                                   class="rounded bg-blue-200 pl-2 pr-2 pt-1 pb-1"
                                >View</a>
                            </div>
                        </div>
                    </td>
                    <td class="p-2 text-right">{{ $member->getAvgScore() }}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
