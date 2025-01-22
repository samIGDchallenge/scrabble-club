@php
    /** @var \App\Models\Member $member */
@endphp

@extends('layout.wrapper')

@section('content')
    <div>
        <a href="{{ route('members') }}" class="bg-blue-500 text-white rounded pl-2 pr-2 pt-1 pb-1">< BACK</a>
        <div class="rounded-2xl bg-white p-4 mt-4">
            <div class="flex pt-3 pb-3">
                <h5 class="font-bold text-lg pr-3">Member Details</h5>
                <a href="{{ route('members.edit', ['memberId' => $member->getId()]) }}"
                   class="bg-blue-500 text-white rounded pl-2 pr-2 pt-1 pb-1 mr-2"
                >Edit</a>
                <form
                    class="inline"
                    method="POST"
                    action="{{ route('members.delete', ['memberId' => $member->getId()]) }}"
                    enctype="multipart/form-data"
                >
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                       class="bg-red-600 text-white rounded pl-2 pr-2 pt-1 pb-1"
                    >Delete</button>
                </form>
            </div>
            <table>
                <tbody>
                <tr>
                    <td class="font-bold p-2">Name</td>
                    <td>{{ $member->getName() }}</td>
                </tr>
                <tr>
                    <td class="font-bold p-2">Email</td>
                    <td>{{ $member->getEmail() }}</td>
                </tr>
                <tr>
                    <td class="font-bold p-2">Phone</td>
                    <td>{{ $member->getPhone() }}</td>
                </tr>
                <tr>
                    <td class="font-bold p-2">Join Date</td>
                    <td>{{ $member->getJoinDate() }}</td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="rounded-2xl bg-white p-4 mt-4">
            <h5 class="font-bold text-lg">Member Stats</h5>
            <table>
                <tbody>
                <tr>
                    <td class="font-bold p-2">Average Score</td>
                    <td class="p-2">{{ $member->getAvgScore() }}</td>
                </tr>
                <tr>
                    <td class="font-bold p-2">Highest Score</td>
                    <td class="p-2">{{ $member->getHighScore() }}</td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="rounded-2xl bg-white p-4 mt-4">
            <h5 class="font-bold text-lg">Recent Form</h5>
            <table class="table-fixed w-full">
                <thead>
                <tr>
                    <th class="text-left p-2">
                        Result
                    </th>
                    <th class="text-right p-2">
                        Score
                    </th>
                    <th class="text-left p-2">
                        Time of Game
                    </th>
                </tr>
                </thead>
                <tbody>
{{--                @if (count($member->getRecentGames()) > 0)--}}
{{--                    @foreach($member->getRecentGames() as $game)--}}
{{--                    <tr>--}}
{{--                        <td class="text-left p-2">--}}
{{--                        </td>--}}
{{--                        <td lass="text-right p-2">--}}
{{--                        </td>--}}
{{--                        <td class="text-left p-2">--}}
{{--                        </td>--}}
{{--                    </tr>--}}
{{--                    @endforeach--}}
{{--                @else--}}
{{--                    <tr>--}}
{{--                        <td colspan="3">--}}
{{--                            No games played--}}
{{--                        </td>--}}
{{--                    </tr>--}}
{{--                @endif--}}
                </tbody>
            </table>
        </div>
    </div>
@endsection
