<!-- Modal -->
<div class="modal fade" id="select-reason" tabindex="-1" role="dialog" aria-labelledby="deleteModalTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-grey">
                <h5 class="my-2 modal-title text-white" id="deleteModalTitle">Ընտրել հոդվածի ջնջման պատճառը</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <div class="modal-body ">
                <div class="reasons-modal">
                    <?php
                        if ($res_reason) {
                            while ($row_reason = mysqli_fetch_assoc($res_reason)) {
                                echo "<div>
                                          <input type='radio' name='radio' class='select-reason' data-reason-id='$row_reason[id]'>
                                          <label> $row_reason[reason_am] </label>
                                      </div>";
                            }
                        }
                    ?>
                </div>
                <input type="hidden" data-article-id='<?=$article_id?>' class="modal-article-id">
                <input type="hidden" data-comment-text='' class="comment-text">
            </div>
            <div class="modal-footer">
                <button id='deleteConfirm' type="button" class="btn btn-primary delete-article" data-mail='<?=$user['email']?>' data-categories='<?=$categories_article?>'>
                    Հաստատել
                </button>
            </div>
            <div class='my-2 px-4 result-modal-delete'></div>
        </div>
    </div>
</div>
</div>
