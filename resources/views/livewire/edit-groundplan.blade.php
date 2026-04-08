<div class="p-4 flex flex-column justify-center gap-4">
    <flux:button x-data x-on:click="$wire.update(editGrid.save(false), sideGrid.save(false))"
            class="h-12 hover:bg-gray-200 border-2 p-2">Save changes
    </flux:button>

    <flux:modal name="edit-cell" class="md:w-96" @close="$set('selectedCell', null)">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Update profile</flux:heading>
                <flux:text class="mt-2">Make changes to your personal details.</flux:text>
            </div>

            @if($this->selectedCell)
                <flux:field variant="inline">
                    <flux:label>Show name</flux:label>
                    <flux:switch wire:model="options.{{ $this->selectedCell }}.show_name" />
                    <flux:error name="options.{{ $this->selectedCell }}.show_name" />
                </flux:field>
            @else
                <flux:skeleton.group animate="shimmer">
                    <flux:skeleton.line class="mb-2 w-1/4" />
                    <flux:skeleton.line />
                    <flux:skeleton.line />
                    <flux:skeleton.line class="w-3/4" />
                </flux:skeleton.group>
            @endif

            <div class="flex">
                <flux:spacer/>

                <flux:modal.close>
                    <flux:button type="submit" variant="primary">Save changes</flux:button>
                </flux:modal.close>
            </div>
        </div>
    </flux:modal>

    <main class="flex flex-row gap-6">
        <flux:card>
            <div class="flex flex-col" id="sideGrid" wire:ignore>
                @foreach($this->sideGridCells as $storageRoom)
                    <x-cell
                        id="room-{{ $storageRoom->id }}"
                        cell-key="{{ $storageRoom->id }}"
                        name="{{ $storageRoom->name }}"
                    />
                @endforeach
            </div>
        </flux:card>

        <div id="editGrid" wire:ignore>
            @foreach($this->editGridCells as $cell)
                <x-cell
                    id="item-{{ $cell->id }}"
                    cell-key="{{ $cell->storage_room_id }}"
                    name="{{ $cell->storageRoom->name }}"
                />
            @endforeach

        </div>
    </main>
</div>
@script
<script>
    const sideGrid = GridStack.init({
        float: true,
        minRow: 1,
        maxColumn: @js($this->sideGridCells->count()),
        cellHeight: 125,
        cellWidth: 125,
        columnOpts: {columnWidth: 125},
        rowOpts: {rowHeight: 125},
        acceptWidgets: true,
        disableResize: true,
    }, '#sideGrid');

    const editGrid = GridStack.init({
        minRow: 8,
        maxRow: 8,
        float: true,
        cellHeight: 125,
        cellWidth: 125,
        columnOpts: {columnWidth: 125},
        rowOpts: {rowHeight: 125},
        acceptWidgets: true,
    }, '#editGrid');

    window.editGrid = editGrid;
    window.sideGrid = sideGrid;

    sideGrid.on('dropped', (event, previousNode, newNode) => {
        if (newNode?.el) sideGrid.update(newNode.el, {w: 1, h: 1});
        sideGrid.compact();
    });

    sideGrid.on('change removed drag', () => {
        sideGrid.compact();
    });

    @foreach($this->sideGridCells as $key => $storageRoom)
    sideGrid.makeWidget('#room-{{ $storageRoom->id }}', {
        id: 'room-{{ $storageRoom->id }}',
        name: '{{ $storageRoom->name }}',
        cellKey: '{{ $storageRoom->id }}'
    });
    @endforeach

    @foreach($this->editGridCells as $key => $cell)
    editGrid.makeWidget('#item-{{ $cell->id }}', {
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

    editGrid.on('dropped added change', (e, item) => {
        const checkbox = item.el.querySelector('input[type="checkbox"]');

        console.log(checkbox)

        editGrid.update(item.el, {
            showName: checkbox?.checked
        });
    });

    editGrid.el.addEventListener('change', (e) => {
        const item = e.target.closest('.grid-stack-item');

        editGrid.update(item, {
            showName: e.target.checked
        });
    });
</script>
@endscript
