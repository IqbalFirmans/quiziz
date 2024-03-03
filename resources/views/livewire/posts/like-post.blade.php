<form wire:submit.prevent="like">
    <button type="submit" class="btn btn-white border border-white bg-white">
        @if ($isLike)
        <i class="fa fa-thumbs-up text-primary">
            <small>{{ $count }}</small>
        </i>
        @else
        <i class="fa fa-thumbs-up text-black">
            <small>{{ $count }}</small>
        </i>
        @endif
    </button>
</form>
