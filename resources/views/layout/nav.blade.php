<div class="bg-gray-200">
    <ul>
{{--        <li><a href="{{ route('') }}">Dashboard</a></li>--}}
        <li class="rounded pb-1 pt-1 mb-1 {{ is_current_route('members') ? 'bg-white' : '' }}">
            <a href="{{ route('members') }}" class="{{ is_current_route('members') ? 'font-bold' : '' }}">Club Members</a>
        </li>
        <li class="rounded pb-1 pt-1 mb-1 {{ is_current_route('games') ? 'bg-white' : '' }}">
            <a href="{{ route('games') }}" class="{{ is_current_route('games') ? 'font-bold' : '' }}">Games</a>
        </li>
        <li class="rounded pb-1 pt-1 mb-1 {{ is_current_route('leaderboard') ? 'bg-white' : '' }}">
            <a href="{{ route('leaderboard') }}" class="{{ is_current_route('leaderboard') ? 'font-bold' : '' }}">Leaderboard</a>
        </li>
    </ul>
</div>
