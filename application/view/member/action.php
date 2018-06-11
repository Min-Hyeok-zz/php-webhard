    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">회원 관리</h3>
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
                                    <input class="form-control" placeholder="아이디" name="id" type="text" autofocus required value="<?php if ($this->info != "") echo $this->info->id ?>">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="암호" name="pw" type="password" required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="이름" name="name" type="text" required value="<?php if ($this->info != "") echo $this->info->name ?>">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="레벨(10 = 관리자,1 = 일반)" name="level" type="number" required value="<?php if ($this->info != "") echo $this->info->level ?>">
                                </div>
                                <button class="btn btn-lg btn-success btn-block" type="submit">추가</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>