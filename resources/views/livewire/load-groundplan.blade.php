<div class="p-4 flex flex-column justify-center gap-4">
    <flux:button href="/">Create new</flux:button>
    <flux:button href="/edit/{{ $groundplan->id }}">Edit</flux:button>
    <main class="flex flex-row gap-6">
        <div id="loadedGrid">
            @foreach($this->cells as $cell)
                <x-cell
                    id="item-{{ $cell->id }}"
                    :cell-key="$cell->storageRoom->id"
                    :name="$cell->storageRoom->name"
                    :edit="false"
                />
            @endforeach
        </div>
    </main>
    <livewire:index-groundplan />
</div>
@script
<script>
    const loadedGrid = GridStack.init({
        minRow: 8,
        maxRow: 8,
        float: true,
        cellWidth: 125,
        columnOpts: {
            columnWidth: 125
        },
        rowOpts: {
            rowHeight: 125
        },
        staticGrid: true,
    }, '#loadedGrid');

    @foreach($this->cells as $key => $cell)
    loadedGrid.makeWidget('#item-{{ $cell->id }}', {
        id: 'item-{{ $cell->id }}',
        name: '{{ $cell->storageRoom->name }}',
        cellKey: '{{ $cell->storage_room_id }}',
        x: {{ $cell->x_pos }},
        y: {{ $cell->y_pos }},
        w: {{ $cell->width }},
        h: {{ $cell->height }},
        showName: @js($cell->show_name)
    });
    @endforeach
</script>
@endscript
