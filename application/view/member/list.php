
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">회원관리</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-heading">회원리스트</div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="right">
                                <button type="button" class="btn btn-primary" onclick="location.href='/member/action'">회원추가</button>
                            </div>
                            <br />
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <colgroup>
                                        <col width="8%" />
                                        <col width="12%" />
                                        <col width="12%" />
                                        <col width="12%" />
                                        <col width="*" />
                                        <col width="10%" />
                                    </colgroup>
                                    <thead>
                                        <tr>
                                            <th class="center">순번</th>
                                            <th class="center">아이디</th>
                                            <th class="center">이름</th>
                                            <th class="center">회원구분</th>
                                            <th class="center">암호(SHA256+SALT)</th>
                                            <th class="center">기능</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($this->list as $data): ?>
                                            <tr>
                                                <td class="center"><?php echo $data->idx ?></td>
                                                <td><?php echo $data->id ?></td>
                                                <td><?php echo $data->name ?></td>
                                                <td class="center">
                                                    <?php if ($data->level == '10'): ?>
                                                        관리자
                                                    <?php else: ?>
                                                        사용자
                                                    <?php endif ?>
                                                </td>
                                                <td><?php echo $data->pw ?></td>
                                                <td class="center">
                                                    <button type="button" class="btn btn-info btn-xs" onclick="location.href='/member/action/<?php echo $data->idx ?>'">수정</button>
                                                    <button type="button" class="btn btn-danger btn-xs" onclick="if(confirm('삭제하시겠습니까?')) location.href='/member/delete/<?php echo $data->idx ?>'">삭제</button>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->