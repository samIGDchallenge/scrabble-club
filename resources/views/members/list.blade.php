@php
    /** @var \App\Models\Member $member */
@endphp

@extends('layout.wrapper')

@section('content')
    <div>
        <table>
            <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Join Date</th>
                <th>Avg. Score</th>
                <th>Current Form</th>
            </tr>
            </thead>
            <tbody>
            @foreach($members as $member)
            <tr>
                <td>{{ $member->getName() }}</td>
                <td>{{ $member->getEmail() }}</td>
                <td>{{ $member->getPhone() }}</td>
                <td>{{ $member->getJoinDate() }}</td>
                <td>{{ $member->getAvgScore() }}</td>
                <td>{{ $member->getRecentForm() }}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
