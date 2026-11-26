<?php
$activePage = 'announcements';
$announcements = [
  [
    'id' => 'MOCK-01', 'level' => 'urgent', 'levelLabel' => 'ด่วนที่สุด', 'title' => 'ตัวอย่าง: เหตุท่อประปาแตกรอการตรวจสอบ',
    'date' => '2026-11-22T09:30:00', 'displayDate' => '22 พ.ย. 2569 · 09:30 น.', 'area' => 'ชุมชนตัวอย่าง เขตเทศบาล',
    'status' => 'active', 'statusLabel' => 'กำลังตรวจสอบ', 'restore' => 'จะแจ้งเวลาอีกครั้งหลังประเมินหน้างาน',
    'description' => 'ข้อมูลจำลองเพื่อแสดงรูปแบบการแจ้งเหตุ เจ้าหน้าที่ตัวอย่างกำลังตรวจสอบจุดเกิดเหตุและประเมินผลกระทบ',
    'updates' => [['time' => '09:30 น.', 'text' => 'รับแจ้งเหตุจำลองและส่งทีมตรวจสอบ'], ['time' => '10:15 น.', 'text' => 'อยู่ระหว่างประเมินพื้นที่และวางแผนซ่อม']]
  ],
  [
    'id' => 'MOCK-02', 'level' => 'important', 'levelLabel' => 'สำคัญ', 'title' => 'ตัวอย่าง: วางแผนบำรุงรักษาท่อจ่ายน้ำ',
    'date' => '2026-11-21T08:00:00', 'displayDate' => '21 พ.ย. 2569 · 08:00 น.', 'area' => 'ถนนตัวอย่างและพื้นที่ใกล้เคียง',
    'status' => 'active', 'statusLabel' => 'กำลังดำเนินการ', 'restore' => 'คาดเสร็จ 16:00 น. (เวลาจำลอง)',
    'description' => 'ประกาศจำลองสำหรับงานบำรุงรักษาตามแผน อาจมีผลต่อการจ่ายน้ำในพื้นที่ตัวอย่างระหว่างดำเนินงาน',
    'updates' => [['time' => '08:00 น.', 'text' => 'เริ่มงานบำรุงรักษาตามแผนจำลอง'], ['time' => '11:30 น.', 'text' => 'ดำเนินงานต่อเนื่อง ทีมงานกำลังตรวจสอบระบบ']]
  ],
  [
    'id' => 'MOCK-03', 'level' => 'other', 'levelLabel' => 'แจ้งเพื่อทราบ', 'title' => 'ตัวอย่าง: ปิดงานซ่อมและคืนสภาพการจ่ายน้ำ',
    'date' => '2026-11-19T14:00:00', 'displayDate' => '19 พ.ย. 2569 · 14:00 น.', 'area' => 'ชุมชนตัวอย่าง เขตเทศบาล',
    'status' => 'complete', 'statusLabel' => 'ดำเนินการเสร็จแล้ว', 'restore' => 'คืนสภาพระบบแล้ว (ข้อมูลจำลอง)',
    'description' => 'รายการตัวอย่างที่ปิดงานแล้ว เพื่อแสดงสถานะและข้อมูลสรุปหลังการซ่อมแซม',
    'updates' => [['time' => '12:00 น.', 'text' => 'เริ่มซ่อมระบบ (ข้อมูลจำลอง)'], ['time' => '14:00 น.', 'text' => 'ตรวจสอบและปิดงานตัวอย่าง']]
  ],
  [
    'id' => 'MOCK-04', 'level' => 'other', 'levelLabel' => 'แจ้งเพื่อทราบ', 'title' => 'ตัวอย่าง: ตรวจสอบแรงดันน้ำในพื้นที่',
    'date' => '2026-11-18T10:00:00', 'displayDate' => '18 พ.ย. 2569 · 10:00 น.', 'area' => 'พื้นที่ตัวอย่าง เขตเทศบาล',
    'status' => 'complete', 'statusLabel' => 'ตรวจสอบแล้ว', 'restore' => 'ไม่พบเหตุขัดข้องในข้อมูลจำลอง',
    'description' => 'รายการจำลองสำหรับแสดงรูปแบบแจ้งผลการตรวจสอบระบบประปา',
    'updates' => [['time' => '10:00 น.', 'text' => 'รับเรื่องตรวจสอบตัวอย่าง'], ['time' => '13:00 น.', 'text' => 'บันทึกผลตรวจสอบและปิดรายการ']]
  ],
  [
    'id' => 'MOCK-05', 'level' => 'other', 'levelLabel' => 'แจ้งเพื่อทราบ', 'title' => 'ตัวอย่าง: ล้างทำความสะอาดอุปกรณ์ระบบประปา',
    'date' => '2026-11-16T07:30:00', 'displayDate' => '16 พ.ย. 2569 · 07:30 น.', 'area' => 'สถานีตัวอย่าง เขตเทศบาล',
    'status' => 'complete', 'statusLabel' => 'ดำเนินการเสร็จแล้ว', 'restore' => 'ระบบกลับสู่สถานะปกติ (ข้อมูลจำลอง)',
    'description' => 'ข้อมูลตัวอย่างสำหรับประกาศงานดูแลระบบตามรอบ',
    'updates' => [['time' => '07:30 น.', 'text' => 'เริ่มงานตามแผนจำลอง'], ['time' => '10:30 น.', 'text' => 'ตรวจสอบการทำงานหลังเสร็จงาน']]
  ],
  [
    'id' => 'MOCK-06', 'level' => 'urgent', 'levelLabel' => 'ด่วนที่สุด', 'title' => 'ตัวอย่าง: แจ้งเหตุขัดข้องเพื่อเฝ้าระวัง',
    'date' => '2026-11-15T16:00:00', 'displayDate' => '15 พ.ย. 2569 · 16:00 น.', 'area' => 'บริเวณตัวอย่าง เขตเทศบาล',
    'status' => 'complete', 'statusLabel' => 'ติดตามแล้วเสร็จ', 'restore' => 'ปิดประกาศตัวอย่างแล้ว',
    'description' => 'รายการตัวอย่างที่แสดงการติดตามเหตุและการแจ้งสถานะล่าสุด',
    'updates' => [['time' => '16:00 น.', 'text' => 'รับแจ้งเหตุจำลอง'], ['time' => '18:00 น.', 'text' => 'ติดตามผลและปิดรายการตัวอย่าง']]
  ]
];
$counts = ['urgent' => 0, 'important' => 0, 'other' => 0, 'active' => 0];
foreach ($announcements as $announcement) {
  $counts[$announcement['level']]++;
  if ($announcement['status'] === 'active') $counts['active']++;
}
?>
<!doctype html>
<html lang="th">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#173f70">
    <meta name="description" content="ประกาศด่วนและแจ้งเหตุระบบประปา ตัวอย่างข้อมูลจำลองเพื่อการออกแบบเว็บไซต์">
    <title>ประกาศด่วนและแจ้งเหตุน้ำประปา — กองการประปา เทศบาลนครพิษณุโลก</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Noto+Sans+Thai:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,400,0,0" rel="stylesheet">
    <link rel="icon" type="image/png" href="assets/logos/กองการประปา%20logo.PNG">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/announcements.css">
    <script src="js/main.js" defer></script>
    <script src="js/announcements.js" defer></script>
  </head>
  <body>
    <a class="skip-link" href="#main-content">ข้ามไปยังเนื้อหาหลัก</a>
    <?php require __DIR__ . '/partials/header.php'; ?>
    <?php require __DIR__ . '/partials/breadcrumb.php'; ?>
    <main id="main-content" class="announcements-page">
      <section class="announcement-hero">
        <div class="container">
          <div class="announcement-hero-row">
            <div class="announcement-intro">
              <p class="section-kicker announcement-eyebrow"><span class="status-dot status-dot-red" aria-hidden="true"></span> ศูนย์แจ้งเตือนและข่าวสารสถานการณ์น้ำประปา</p>
              <h1>ประกาศด่วนและแจ้งเหตุน้ำประปา</h1>
              <p class="subpage-subtitle" lang="en">Urgent Announcements &amp; Water Service Alerts</p>
              <p>ติดตามประกาศหยุดจ่ายน้ำชั่วคราว เหตุขัดข้อง และความคืบหน้าการซ่อมบำรุง</p>
            </div>
            <div class="announcement-stats" aria-label="สรุปประกาศจากข้อมูลตัวอย่าง">
              <div class="announcement-stat stat-urgent"><span>ด่วนที่สุด</span><strong><?= $counts['urgent'] ?></strong><small>รายการตัวอย่าง</small></div>
              <div class="announcement-stat stat-important"><span>สำคัญ</span><strong><?= $counts['important'] ?></strong><small>รายการตัวอย่าง</small></div>
              <div class="announcement-stat stat-other"><span>อื่น ๆ / ดำเนินการแล้ว</span><strong><?= $counts['other'] ?></strong><small>รายการตัวอย่าง</small></div>
              <div class="announcement-stat stat-active"><span>กำลังดำเนินการ</span><strong><?= $counts['active'] ?></strong><small>รายการตัวอย่าง</small></div>
            </div>
          </div>
        </div>
      </section>
      <section class="announcement-content container" aria-label="ค้นหาและรายการประกาศ">
        <form class="announcement-filters" id="announcement-filters">
          <div class="announcement-filter-row">
            <label class="announcement-search"><span class="material-symbols-rounded" aria-hidden="true">search</span><span class="visually-hidden">ค้นหาประกาศ</span><input id="announcement-search" type="search" placeholder="ค้นหาหัวข้อประกาศ ถนน ชุมชน หรือรหัสประกาศ..."></label>
            <label class="filter-select"><span>พื้นที่</span><select id="announcement-area"><option value="">ทุกพื้นที่ในเขตเทศบาล</option><option value="ชุมชนตัวอย่าง">ชุมชนตัวอย่าง</option><option value="ถนนตัวอย่าง">ถนนตัวอย่าง</option><option value="พื้นที่ตัวอย่าง">พื้นที่ตัวอย่าง</option><option value="สถานีตัวอย่าง">สถานีตัวอย่าง</option><option value="บริเวณตัวอย่าง">บริเวณตัวอย่าง</option></select></label>
          </div>
          <div class="announcement-filter-bottom">
            <fieldset class="announcement-levels"><legend>ระดับความสำคัญ:</legend>
              <label><input type="radio" name="announcement-level" value="" checked><span>ทั้งหมด (<?= count($announcements) ?>)</span></label>
              <label><input type="radio" name="announcement-level" value="urgent"><span class="level-urgent">ด่วนที่สุด (<?= $counts['urgent'] ?>)</span></label>
              <label><input type="radio" name="announcement-level" value="important"><span class="level-important">สำคัญ (<?= $counts['important'] ?>)</span></label>
              <label><input type="radio" name="announcement-level" value="other"><span class="level-other">อื่น ๆ (<?= $counts['other'] ?>)</span></label>
            </fieldset>
            <label class="filter-select"><span>ช่วงเวลา</span><select id="announcement-date"><option value="all">ทั้งหมด</option><option value="today">วันนี้</option><option value="week">7 วันล่าสุด</option><option value="month">30 วันล่าสุด</option></select></label>
            <button class="announcement-reset" type="reset"><span class="material-symbols-rounded" aria-hidden="true">restart_alt</span> ล้างตัวกรอง</button>
          </div>
        </form>
        <div class="announcement-list-heading"><h2>รายการประกาศและสถานการณ์ล่าสุด <span id="announcement-result-count"><?= count($announcements) ?> รายการ</span></h2><span class="announcement-demo-note">ข้อมูลจำลองเพื่อแสดงรูปแบบต้นแบบ</span></div>
        <div class="announcement-grid" id="announcement-list" aria-live="polite">
          <?php foreach ($announcements as $item): ?>
            <article class="announcement-card level-card-<?= htmlspecialchars($item['level']) ?>" data-level="<?= htmlspecialchars($item['level']) ?>" data-area="<?= htmlspecialchars($item['area']) ?>" data-date="<?= htmlspecialchars($item['date']) ?>" data-search="<?= htmlspecialchars($item['title'] . ' ' . $item['area'] . ' ' . $item['id'] . ' ' . $item['description']) ?>">
              <div class="announcement-image-placeholder" role="img" aria-label="พื้นที่ภาพประกอบตัวอย่างประกาศ"><span class="material-symbols-rounded" aria-hidden="true">water_damage</span><span>ภาพประกอบตัวอย่าง · รอภาพจากหน่วยงาน</span></div>
              <div class="announcement-card-top"><span class="announcement-level-badge"><span class="status-dot"></span><?= htmlspecialchars($item['levelLabel']) ?></span></div>
              <div class="announcement-card-body">
                <p class="announcement-date"><span class="material-symbols-rounded" aria-hidden="true">schedule</span><?= htmlspecialchars($item['displayDate']) ?></p>
                <h3><?= htmlspecialchars($item['title']) ?></h3>
                <p class="announcement-description"><?= htmlspecialchars($item['description']) ?></p>
                <div class="announcement-meta"><p><span class="material-symbols-rounded" aria-hidden="true">location_on</span><span><strong>พื้นที่:</strong> <?= htmlspecialchars($item['area']) ?></span></p><p class="repair-state <?= $item['status'] === 'active' ? 'is-active' : 'is-complete' ?>"><span class="material-symbols-rounded" aria-hidden="true"><?= $item['status'] === 'active' ? 'engineering' : 'task_alt' ?></span><span><strong><?= htmlspecialchars($item['statusLabel']) ?>:</strong> <?= htmlspecialchars($item['restore']) ?></span></p></div>
              </div>
              <div class="announcement-card-footer"><span class="announcement-status <?= $item['status'] === 'active' ? 'is-active' : 'is-complete' ?>"><span class="status-dot"></span><?= htmlspecialchars($item['statusLabel']) ?></span><button type="button" class="announcement-detail-button" data-announcement-id="<?= htmlspecialchars($item['id']) ?>">ดูรายละเอียด <span class="material-symbols-rounded" aria-hidden="true">arrow_forward</span></button></div>
            </article>
          <?php endforeach; ?>
        </div>
        <div class="announcement-empty" id="announcement-empty" hidden><span class="material-symbols-rounded" aria-hidden="true">search_off</span><h2>ไม่พบประกาศที่ตรงกับตัวกรอง</h2><p>ลองเปลี่ยนคำค้นหาหรือเลือกตัวกรองอื่น</p><button type="button" id="announcement-empty-reset">ล้างตัวกรอง</button></div>
        <p class="announcement-prototype-footnote">หมายเหตุ: ประกาศและสถานะทั้งหมดในหน้านี้เป็นข้อมูลสมมติเพื่อการออกแบบและทดสอบต้นแบบเท่านั้น ไม่ใช่ประกาศจากหน่วยงาน</p>
      </section>
      <dialog class="announcement-dialog" id="announcement-dialog" aria-labelledby="announcement-dialog-title"><form method="dialog"><button class="dialog-close" aria-label="ปิดรายละเอียด"><span class="material-symbols-rounded" aria-hidden="true">close</span></button></form><div id="announcement-dialog-content"></div></dialog>
      <script>window.announcementData = <?= json_encode(array_column($announcements, null, 'id'), JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) ?>;</script>
    </main>
    <?php require __DIR__ . '/partials/footer.php'; ?>
  </body>
</html>
