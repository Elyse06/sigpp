<div wire:ignore.self class="w-100" style="height: 100%">

    @if ($currentPage == PAGECREATFORM)
        @include("livewire.repos.ajout")
    @endif

    @if ($currentPage == PAGEEDITFORM)
        @include("livewire.repos.edit")
    @endif

    @if ($currentPage == PAGELIST)
        @include("livewire.repos.list")
    @endif
    
</div>