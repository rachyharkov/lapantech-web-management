<div class="card card-small blog-comments">
    <div class="card-header border-bottom">
        <h6 class="m-0">Discussions</h6>
    </div>
    <div class="card-body p-0">
        @foreach ($comments as $cm)

            <div class="blog-comments__item d-flex p-3">
                <div class="blog-comments__avatar mr-3">
                    <img src="{{asset('images/avatars/'.rand(1,3)) }}.jpg" alt="avatar {{ $cm->comment_author }}" />
                </div>
                <div class="blog-comments__content" style="display: grid;">
                    <div class="blog-comments__meta text-muted">
                        <a class="text-secondary" href="#">{{ $cm->comment_author }}</a> on
                        <a class="text-secondary" href="#">{{ $cm->post->post_title }}</a>
                        <span class="text-muted">- {{ $cm->created_at->diffForHumans() }}</span>
                    </div>
                    <p class="m-0 my-1 mb-2 text-muted" style="overflow: hidden;white-space: nowrap;text-overflow: ellipsis;width: 100%;">{{ $cm->comment_content }}</p>
                    <div class="blog-comments__actions">
                        <div class="btn-group btn-group-sm">
                            <button type="button" class="btn btn-white">
                                <span class="text-success">
                                    <i class="material-icons">check</i>
                                </span> Approve </button>
                            <button type="button" class="btn btn-white">
                                <span class="text-danger">
                                    <i class="material-icons">clear</i>
                                </span> Reject </button>
                            <button type="button" class="btn btn-white" wire:click="editComment({{ $cm->id }})">
                                <span class="text-light">
                                    <i class="material-icons">more_vert</i>
                                </span> Edit </button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="card-footer border-top">
        <div class="row">
            <div class="col text-center view-report">
                <button type="submit" class="btn btn-white">View All Comments</button>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editCommentModal" tabindex="-1" role="dialog" aria-labelledby="editCommentModalLabel" aria-hidden="true" wire:ignore>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form wire:submit.prevent="updateComment">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editCommentModalLabel">Edit Comment</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="comment_author" class="form-label">Author</label>
                            <input type="text" class="form-control @error('comment_author') is-invalid @enderror" id="comment_author" placeholder="Author" wire:model.defer="comment_author">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control @error('comment_content') is-invalid @enderror"" id="comment_content" rows="3" wire:model.defer="comment_content"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" wire:loading.remove>Save changes</button>
                        <button type="button" class="btn btn-primary" wire:loading>
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            Loading...
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script>
        document.addEventListener('livewire:load', function () {
            window.livewire.on('editComment', commentId => {
                $('#editCommentModal').modal('show');
            })
        })

        document.addEventListener('triggerAlert', event => {
            Swal.fire({
                title: event.detail.title,
                text: event.detail.text,
                icon: event.detail.icon,
                confirmButtonText: 'OK'
            });
        })

        window.addEventListener('closeEditCommentModal', event => {
            $('#editCommentModal').modal('hide');
        })
    </script>

</div>
