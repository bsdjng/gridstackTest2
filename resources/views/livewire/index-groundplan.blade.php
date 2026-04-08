<div class="flex justify-center">
    <ul>
        <li class="p-3 bg-indigo-500">
            ID
        </li>
        @foreach($this->groundplans as $groundplan)
            <a href="/load/{{$groundplan->id}}">
                <li class="p-3 border-2 hover:bg-gray-200">
                    {{ $groundplan->id }}
                </li>
            </a>
        @endforeach
    </ul>
</div>
