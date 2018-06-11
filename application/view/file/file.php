
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">파일관리</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-heading">파일/폴더리스트</div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="right">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <button type="button" class="btn btn-primary" onclick="location.href='/file/action?path=<?php echo $this->param->path ?>'">디렉토리 생성</button>
                                    <input type="hidden" name="action" value="file_upload">
                                    <button type="submit" class="btn btn-primary">파일 업로드</button>
                                    <input type="file" name="file" style="position: absolute;right: 0;" required>
                                </form>
                            </div>
                            <div class="left">
                                위치 : /
                            </div>
                            <br />
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <colgroup>
                                        <col width="*" />
                                        <col width="10%" />
                                        <col width="10%" />
                                        <col width="10%" />
                                        <col width="10%" />
                                        <col width="15%" />
                                    </colgroup>
                                    <thead>
                                        <tr>
                                            <th class="center">파일/디렉토리명</th>
                                            <th class="center">크기</th>
                                            <th class="center">종류</th>
                                            <th class="center">생성일</th>
                                            <th class="center">수정일</th>
                                            <th class="center">기능</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($this->folder as $data): ?>
                                            <tr>
                                                <td><a href="<?php echo $data->idx ?>"><?php echo $data->file_name ?></a></td>
                                                <td class="center">-</td>
                                                <td class="center">디렉토리</td>
                                                <td class="center"><?php echo $data->date ?></td>
                                                <td class="center"><?php echo $data->change_date ?></td>
                                                <td class="center">
                                                    <button type="button" class="btn btn-info btn-xs" onclick="location.href='/file/action/<?php echo $data->idx ?>'">수정</button>
                                                    <button type="button" class="btn btn-danger btn-xs" onclick="if(confirm('삭제하시겠습니까?')) location.href='/file/delete/<?php echo $data->idx ?>'">삭제</button>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                        <?php foreach ($this->file as $data): ?>
                                            <tr>
                                                <td><a href="/file/down/<?php echo $data->idx ?>"><?php echo $data->file_name ?></a></td>
                                                <td class="center"><?php echo get_size($data->file_size); ?></td>
                                                <td class="center"><?php echo $data->type ?></td>
                                                <td class="center"><?php echo $data->date ?></td>
                                                <td class="center"><?php echo $data->change_date ?></td>
                                                <td class="center">
                                                    <button type="button" class="btn btn-info btn-xs" onclick="if(confirm('내부 인원에게 공유하시겠습니까?')) location.href='/share/in_add/<?php echo $data->idx ?>'">내부공유</button>
                                                    <button type="button" class="btn btn-info btn-xs" onclick="if(confirm('외부 인원에게 공유하시겠습니까?')) location.href='/share/out_add/<?php echo $data->idx ?>'">외부공유</button>
                                                    <button type="button" class="btn btn-danger btn-xs" onclick="if(confirm('삭제하시겠습니까?')) location.href='/file/delete/<?php echo $data->idx ?>'">삭제</button>
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