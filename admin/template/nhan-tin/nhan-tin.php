<?php 
$rows_lien_he = $action->getList('newsletter','','','id','desc',$trang,20,'nhan-tin');//var_dump($rows_lien_he);die();
?>
<div class="container">
  <h2>Bảng đăng ký nhận tin.</h2>            
  <table class="table">
    <thead>
      <tr>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($rows_lien_he['data'] as $v_row_lh) { ?>
      <tr>
        <td><?php echo $v_row_lh['email'];?></td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
<?php
    echo $rows_lien_he['paging'];
?> 
</div>
