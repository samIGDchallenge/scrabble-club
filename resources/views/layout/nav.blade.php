<div>
    <ul>
{{--        <li><a href="{{ route('') }}">Dashboard</a></li>--}}
        <li><a href="{{ route('members') }}" class="{{ is_current_route('members') ? 'text-pink-500' : 'text-grey-800' }}">Club Members</a></li>
        <li>Games</li>
        <li>Leaderboard</li>
    </ul>
</div>
