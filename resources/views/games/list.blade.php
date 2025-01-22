@php
    /** @var \App\Models\Game $game */
@endphp

@extends('layout.wrapper')

@section('content')
    <div>
        <div class="rounded-2xl bg-white p-4 mt-4">
            <div class="flex pt-3 pb-3">
                <h3 class="font-bold text-lg pr-3">Games</h3>
                <form
                    class="inline"
                    method="POST"
                    action="{{ route('games.play') }}"
                    enctype="multipart/form-data"
                >
                    @csrf
                    <button type="submit"
                            class="bg-green-500 text-white rounded pl-2 pr-2 pt-1 pb-1"
                    >Play game ►</button>
                </form>
            </div>
            <table>
                <thead>
                <tr>
                    <th class="p-2 text-right align-top">Game</th>
                    <th class="p-2 text-left align-top">Time</th>
                    <th class="p-2 text-left align-top">Winner</th>
                    <th class="p-2 text-left align-top">Scores</th>
                </tr>
                </thead>
                <tbody>
                @if(count($games))
                    @foreach($games as $game)
                    <tr>
                        <td class="p-2 pb-4 text-right align-top">{{ $game->getId() }}</td>
                        <td class="p-2 pb-4 text-left align-top">{{ $game->getTime() }}</td>
                        <td class="p-2 pb-4 text-left align-top">
                            {{ $game->getWinner()->getName() }}
                            <a href="{{ route('members.view', ['memberId' => $game->getWinner()->getId()]) }}"
                               class="rounded bg-blue-200 pl-2 pr-2 pt-1 pb-1"
                            >View</a>
                        </td>
                        <td class="p-2 pb-4 text-left align-top">
                            <table>
                                <tbody>
                                @if(count($game->getScores()))
                                @foreach($game->getScores() as $score)
                                    <tr>
                                        <th class="align-top pr-2">{{ $score->getMember()->getName() }}:</th>
                                        <td class="align-top">{{ $score->getScore() }}</td>
                                    </tr>
                                @endforeach
                                @endif
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
