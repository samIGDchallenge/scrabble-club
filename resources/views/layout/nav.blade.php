<div class="bg-gray-200 mt-4 mb-4">
    <ul>
        <li class="rounded p-2 mt-1 mb-1 {{ is_current_route() ? 'bg-white' : '' }}">
            <a href="/" class="block text-nowrap {{ is_current_route() ? 'font-bold' : '' }}">Dashboard</a>
        </li>
        <li class="rounded p-2 mt-1 mb-1 {{ is_current_route('members') ? 'bg-white' : '' }}">
            <a href="{{ route('members') }}" class="block text-nowrap {{ is_current_route('members') ? 'font-bold' : '' }}">Club Members</a>
        </li>
        <li class="rounded p-2 mt-1 mb-1 {{ is_current_route('games') ? 'bg-white' : '' }}">
            <a href="{{ route('games') }}" class="block text-nowrap {{ is_current_route('games') ? 'font-bold' : '' }}">Games</a>
        </li>
        <li class="rounded p-2 mt-1 mb-1 {{ is_current_route('leaderboard') ? 'bg-white' : '' }}">
            <a href="{{ route('leaderboard') }}" class="block text-nowrap {{ is_current_route('leaderboard') ? 'font-bold' : '' }}">Leaderboard</a>
        </li>
    </ul>
</div>
