<div class="card-body d-flex flex-column">
    <form class="quick-post-form" wire:submit.prevent="savePostDraft">
        <div class="form-group">
            <input type="text" id="exampleInputtext1" class="form-control @error('postTitle') is-invalid @enderror" aria-describedby="textHelp" placeholder="Brave New World" wire:model="postTitle">
            @error('postTitle')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <textarea class="form-control @error('postContent') is-invalid @enderror" placeholder="Words can be like X-rays if you use them properly..." wire:model=postContent></textarea>
        </div>
        <div class="form-group mb-0">
            <button type="submit" class="btn btn-accent" wire:loading.remove>Create Draft</button>
            <button type="button" class="btn btn-accent" disabled wire:loading>
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                Loading...
            </button>
        </div>
    </form>
</div>
