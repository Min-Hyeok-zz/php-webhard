
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">내부 공유 목록</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-heading">내부 공유 리스트</div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <form action="" method="post">
                            <div class="right">
                                <button type="submit" class="btn btn-primary">공유삭제</button>
                            </div>
                             <div class="left">
                                전체 <b><?php echo $this->total ?></b>건 공유 중 <b><?php echo $this->my ?></b>건 공유 중
                            </div>
                            <br />
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <colgroup>
                                        <col width="5%" />
                                        <col width="*" />
                                        <col width="10%" />
                                        <col width="10%" />
                                        <col width="10%" />
                                        <col width="10%" />
                                        <col width="30%" />
                                    </colgroup>
                                    <thead>
                                        <tr>
                                            <th class="center"><input type="checkbox" name="chk[]" id="chk" value="" /></th>
                                            <th class="center">파일명</th>
                                            <th class="center">파일용량</th>
                                            <th class="center">공유자</th>
                                            <th class="center">공유일</th>
                                            <th class="center">다운로드 횟수</th>
                                            <th class="center">다운로드주소</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($this->list as $data): ?>
                                            <tr>
                                                <td class="center">
                                                <?php if ($_SESSION['member']->idx == $data->member_idx || $_SESSION['member']->level == "10"): ?>
                                                    <input type="checkbox" name="chk[]" value="<?php echo $data->idx ?>" />
                                                <?php endif ?></td>
                                                <td><a href="/share/in_down/<?php echo $data->idx ?>"><?php echo "{$data->file_name}.{$data->file_type}" ?></a></td>
                                                <td class="right"><?php echo get_size($data->file_size); ?></td>
                                                <td class="center"><?php echo $data->member_name ?>(<?php echo $data->member_id ?>)</td>
                                                <td class="center"><?php echo $data->date ?></td>
                                                <td class="center"><?php echo number_format($data->hit) ?></td>
                                                <td class="left">
                                                   <a href="http://localhost/share/in_down/<?php echo $data->idx ?>">http://localhost/share/in_down/<?php echo $data->idx ?></a>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                            </form>
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
