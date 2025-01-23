@php
    /** @var \App\Models\Game $game */
@endphp

@extends('layout.wrapper')

@section('content')
    <div class="rounded-2xl bg-amber-100 p-4 mt-4">
        <div class="flex pt-3 pb-3">
            <h3 class="font-bold text-lg pr-3">Game Result</h3>
        </div>
        <table>
            <tbody>
            <tr>
                <td class="font-bold align-top p-2">Game Number</td>
                <td class="p-2">{{ $game->getId() }}</td>
            </tr>
            <tr>
                <td class="font-bold align-top p-2">Time</td>
                <td class="p-2">{{ $game->getFormattedPlayedAt(true) }}</td>
            </tr>
            <tr>
                <td class="font-bold align-top p-2">Winner</td>
                <td class="p-2">{{ $game->getWinner()?->getName() ?? '[deleted]' }}</td>
            </tr>
            <tr>
                <td class="font-bold align-top p-2">Scores</td>
                <td class="p-2 text-left">
                    <table>
                        <tbody>
                        @foreach($game->getScores() as $score)
                            <tr>
                                <th class="align-top pr-2">{{ $score->getMember()->getName() }}:</th>
                                <td class="align-top">{{ $score->getScore() }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </td>
            </tr>
            </tbody>
        </table>
        <div class="flex pt-3 pb-3">
            <a href="/" class="bg-blue-500 text-white rounded pl-2 pr-2 pt-1 pb-1 mr-2">Continue</a>
            <form
                class="inline"
                method="POST"
                action="{{ route('games.play') }}"
                enctype="multipart/form-data"
            >
                @csrf
                <button type="submit"
                        class="bg-green-500 text-white rounded pl-2 pr-2 pt-1 pb-1"
                >Play again ►</button>
            </form>
        </div>
    </div>
@endsection
