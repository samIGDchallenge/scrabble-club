@php
    /** @var \App\Models\Game $game */
@endphp

@extends('layout.wrapper')

@section('content')
    <div>
        <a href="/" class="bg-blue-500 text-white rounded pl-2 pr-2 pt-1 pb-1">< BACK</a>
        <div class="rounded-2xl bg-white p-4 mt-4">
            <div class="flex pt-3 pb-3">
                <h3 class="font-bold text-lg pr-3">Games</h3>
{{--                <div>--}}
{{--                    <a href="{{ route('game.play') }}"--}}
{{--                       class="bg-green-500 text-white rounded pl-2 pr-2 pt-1 pb-1"--}}
{{--                    >+ Play game</a>--}}
{{--                </div>--}}
            </div>
            <table>
                <thead>
                <tr>
                    <th class="p-2 text-right">Game</th>
                    <th class="p-2 text-left">Time</th>
                    <th class="p-2 text-left">Winner</th>
                    <th class="p-2 text-left">Scores</th>
                </tr>
                </thead>
                <tbody>
                @if(count($games))
                    @foreach($games as $game)
                    <tr>
                        <td class="p-2 text-right">{{ $game->getId() }}</td>
                        <td class="p-2 text-left">{{ $game->getTime() }}</td>
                        <td class="p-2 text-left">{{ $game->winner()->get() }}</td>
                        <td class="p-2 text-left">{{ $game->scores()->get() }}</td>
                    </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
