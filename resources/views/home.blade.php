<x-app-layout>
    <div>
        <tweet-form user="{{ json_encode($user) }}"/>
    </div>
    <tweets user="{{ $user->id }}" />
</x-app-layout>
