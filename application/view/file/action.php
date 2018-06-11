    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">파일 관리</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="" method="post">
                            <?php if (isset($this->param->idx)): ?>
                            <input type="hidden" name="action" value="update">
                            <?php else: ?>
                            <input type="hidden" name="action" value="add">
                            <?php endif ?>
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="폴더 이름" name="file_name" type="text" autofocus required value="<?php if ($this->info != "") echo $this->info->file_name ?>">
                                </div>
                                <button class="btn btn-lg btn-success btn-block" type="submit">추가</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>