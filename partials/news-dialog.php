<?php
# หน้าต่างรายละเอียดข่าว
# รับรายการของหน้าเรียกใช้เพื่อแสดงรายละเอียดผ่านรูปแบบเดียวกัน
?>
<dialog class="news-dialog" id="news-dialog" aria-labelledby="news-dialog-title">
  <form method="dialog">
    <button class="news-dialog-close" aria-label="ปิดรายละเอียด" autofocus><span class="material-symbols-rounded" aria-hidden="true">close</span></button>
  </form>
  <div id="news-dialog-content"></div>
</dialog>
<script>
  // # ข้อมูลรายละเอียดข่าวของหน้านี้
  window.newsData = <?= json_encode(array_column($newsDialogItems, null, 'id'), JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) ?>;
</script>
