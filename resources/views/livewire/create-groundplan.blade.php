<div class="p-4">
    <main class="flex flex-row justify-center gap-6">
        <div class="grid-stack border rounded p-2" id="sideGrid">
            @foreach($this->cells as $key=>$cell)
                <div id="item-{{ $cell->id }}" data-cell-key="{{ $cell->id }}" class="item">
                    <div class="grid-stack-item-content">
                        <div class="flex flex-row items-center justify-between not-has-checked:invisible">
                            <label for="showName">
                                {{ $cell->name }}
                            </label>
                            <input
                                checked
                                class="ml-2 top-0 not-checked:visible"
                                type="checkbox"
                                name="showName"
                            />
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div wire:ignore class="grid-stack border rounded p-2" id="mainGrid"></div>

        <button
            x-data
            x-on:click="$wire.save(mainGrid.save(false), sideGrid.save(false))"
            class="h-12 hover:bg-gray-200 border-2 p-2"
        >
            Save
        </button>
    </main>
</div>

@script
<script>
    const sideGrid = GridStack.init({
        float: true,
        minRow: 1,
        cellHeight: 125,
        cellWidth: 125,
        columnOpts: { columnWidth: 125 },
        rowOpts: { rowHeight: 125 },
        acceptWidgets: true,
        disableResize: true,
    }, '#sideGrid');

    const mainGrid = GridStack.init({
        minRow: 8,
        maxRow: 8,
        float: true,
        cellHeight:125,
        cellWidth: 125,
        columnOpts: { columnWidth: 125 },
        rowOpts: { rowHeight: 125 },
        acceptWidgets: true,
    }, '#mainGrid');

    window.mainGrid = mainGrid;
    window.sideGrid = sideGrid;

    sideGrid.on('dropped', (event, previousNode, newNode) => {
        if (newNode?.el) sideGrid.update(newNode.el, { w: 1, h: 1 });
        sideGrid.compact();
    });

    sideGrid.on('change removed drag', () => {
        sideGrid.compact();
    });

    @foreach($this->cells as $key => $cell)
    sideGrid.makeWidget('#item-{{ $cell->id }}', {
        id: 'cell-{{ $cell->id }}',
        name: '{{ $cell->name }}',
        cellKey: '{{ $cell->id }}',
    });
    @endforeach

    mainGrid.on('dropped added change', (e, item) => {
        const checkbox = item.el.querySelector('input[type="checkbox"]');

        mainGrid.update(item.el, {
            showName: checkbox?.checked
        });
    });

    mainGrid.el.addEventListener('change', (e) => {
        const item = e.target.closest('.grid-stack-item');

        mainGrid.update(item, {
            showName: e.target.checked
        });
    });
</script>
@endscript
