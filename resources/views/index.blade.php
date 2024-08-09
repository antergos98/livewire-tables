<div x-data>
    <x-livewire-tables::search />

    <div class="my-3">
        <x-livewire-tables::page-size-selector />
    </div>

    <table class="table table-striped">
        <thead>
        <tr>
            @foreach($columns as $column)
                <x-livewire-tables::th :name="$column->name" :field="$column->field" :sortable="$column->isSortable()"/>
            @endforeach
        </tr>
        </thead>

        <tbody>
            @foreach($this->rows as $row)
                <tr>
                    @foreach($columns as $column)
                        <td>{{ $column->getContent($row) }}</td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex align-items-center justify-content-between">
        <small class="d-block text-muted">
            Total: {{ $this->rows->total() }}
        </small>
        <div>
            {{ $this->rows->links(data: ['scrollTo' => false]) }}
        </div>
    </div>
</div>