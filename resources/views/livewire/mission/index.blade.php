<div class="w-100" style="height: 100%">

    @if ($btnAjouClick)
        
        @include("livewire.mission.ajout")

    @else

        @include("livewire.mission.list")

    @endif
    
</div>
