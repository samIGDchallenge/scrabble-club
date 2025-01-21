@php
    /** @var \App\Models\Member $member */
@endphp

@extends('layout.wrapper')

@section('content')
    <div>
        <a href="{{ route('members') }}">< BACK</a>
        <h3 class="font-bold text-lg">Viewing member {{ $member->getId() }} - {{ $member->getName() }}</h3>
        <div class="flex">
            <h5>Member Details</h5>
            <a href="{{ route('members.edit', ['memberId' => $member->getId()]) }}"
               class="border-r-2 bg-blue-200"
            >Edit</a>
{{--            <a href="{{ route('members.delete', ['memberId' => $member->getId()]) }}"--}}
{{--               class="border-r-2 bg-red-200"--}}
{{--            >Delete</a>--}}
        </div>
        <table>
            <tbody>
            <tr>
                <td class="font-bold">Name</td>
                <td>{{ $member->getName() }}</td>
            </tr>
            <tr>
                <td class="font-bold">Email</td>
                <td>{{ $member->getEmail() }}</td>
            </tr>
            <tr>
                <td class="font-bold">Phone</td>
                <td>{{ $member->getPhone() }}</td>
            </tr>
            <tr>
                <td class="font-bold">Join Date</td>
                <td>{{ $member->getJoinDate() }}</td>
            </tr>
            </tbody>
        </table>
        <h5>Member Stats</h5>
        <table>
            <tbody>
            <tr>
                <td class="font-bold">Average Score</td>
                <td>XXX</td>
            </tr>
            </tbody>
        </table>
        <h5>Recent Form</h5>
        <table>
            <thead>
            <tr>
                <th>
                    Result
                </th>
                <th>
                    Score
                </th>
                <th>
                    Time of Game
                </th>
            </tr>
            </thead>
            <tbody>
{{--            @foreach($member->getGames() as $game)--}}
{{--            <tr>--}}
{{--                <td>--}}
{{--                </td>--}}
{{--                <td>--}}
{{--                </td>--}}
{{--                <td>--}}
{{--                </td>--}}
{{--            </tr>--}}
{{--            @endforeach--}}
            </tbody>
        </table>
    </div>
@endsection
