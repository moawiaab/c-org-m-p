<button wire:click="export" type="button" class="btn btn-sm" wire:loading.attr="disabled">
    {{-- <i wire:loading class="fas fa-spinner fa-spin"></i> --}}
    @if ($format == 'pdf')
        <i class="far fa-file-pdf text-danger"></i>
    @endif

    @if ($format == 'xlsx')
        <i class="far  fa-file-excel text-success"></i>
    @endif

    @if ($format == 'csv')
        <i class="fas fa-file-csv text-info"></i>
    @endif

</button>
