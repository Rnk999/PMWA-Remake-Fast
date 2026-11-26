<?php
$activePage = 'open-data';
$topics = [
    'service' => 'บริการประชาชน',
    'quality' => 'คุณภาพน้ำประปา',
    'production' => 'การผลิตและจ่ายน้ำ',
];

// ข้อมูลเมตาและค่าทั้งหมดใช้สำหรับสาธิตต้นแบบเท่านั้น
$datasets = [
    'complaints' => [
        'service', 'support_agent', 'ข้อมูลสถิติการรับเรื่องร้องทุกข์',
        'สถิติการรับแจ้งปัญหาและการดำเนินการแก้ไขเรื่องร้องทุกข์เกี่ยวกับระบบน้ำประปาและบริการประชาชน',
        15, 'จำนวนเรื่องที่รับแจ้ง (เรื่อง)', '24',
    ],
    'rates' => [
        'service', 'payments', 'ข้อมูลอัตราค่าบริการน้ำประปา',
        'รายละเอียดอัตราค่าน้ำประปาตามประเภทผู้ใช้น้ำ ค่าบริการรายเดือน และค่าธรรมเนียมที่เกี่ยวข้อง',
        1, 'อัตราค่าน้ำสำหรับที่อยู่อาศัย (บาท/ลบ.ม.)', '10.00',
    ],
    'customers' => [
        'service', 'group', 'ข้อมูลปริมาณผู้ใช้น้ำประปา',
        'จำนวนผู้ใช้น้ำประปาในเขตเทศบาลนครพิษณุโลก จำแนกตามประเภทผู้ใช้และพื้นที่ให้บริการ',
        10, 'ผู้ใช้น้ำประเภทที่อยู่อาศัย (ราย)', '18,450',
    ],
    'quality' => [
        'quality', 'science', 'ข้อมูลตรวจวัดคุณภาพน้ำประปา',
        'ผลตรวจวิเคราะห์คุณภาพน้ำประปาทางกายภาพ เคมี และแบคทีเรีย',
        18, 'ความขุ่น (NTU)', '0.42',
    ],
    'distribution' => [
        'production', 'water_drop', 'ข้อมูลปริมาณน้ำผลิตจ่าย',
        'สถิติปริมาณน้ำประปาที่ส่งจ่ายเข้าสู่ระบบท่อในเขตพื้นที่ให้บริการรายเดือน',
        12, 'ปริมาณน้ำส่งจ่าย (ลบ.ม.)', '880,000',
    ],
    'production' => [
        'production', 'factory', 'ข้อมูลปริมาณน้ำผลิต',
        'ข้อมูลปริมาณน้ำดิบและปริมาณน้ำประปาที่ผลิตได้จากสถานีผลิตน้ำของกองการประปา',
        12, 'ปริมาณน้ำที่ผลิตได้ (ลบ.ม.)', '925,000',
    ],
];
$datasetCount = count($datasets);
?>
<!doctype html>
<html lang="th">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#173f70">
    <meta name="description" content="แค็ตตาล็อกชุดข้อมูลเปิดตัวอย่างของกองการประปา เทศบาลนครพิษณุโลก">
    <title>ข้อมูลเปิด (Open Data) — กองการประปา เทศบาลนครพิษณุโลก</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Noto+Sans+Thai:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,400,0,0" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/open-data.css">
    <script src="js/main.js" defer></script>
    <script src="js/open-data.js" defer></script>
  </head>
  <body>
    <a class="skip-link" href="#main-content">ข้ามไปยังเนื้อหาหลัก</a>
    <?php require __DIR__ . '/partials/header.php'; ?>
    <?php require __DIR__ . '/partials/breadcrumb.php'; ?>
    <main class="open-data" id="main-content">
      <header class="open-data-intro">
        <div class="container">
          <div class="open-data-intro-row">
            <div>
              <p class="section-kicker"><span class="material-symbols-rounded" aria-hidden="true">database</span> แค็ตตาล็อกชุดข้อมูลเปิด</p>
              <h1>ข้อมูลเปิด</h1>
              <p class="subpage-subtitle" lang="en">Open Data</p>
              <p class="open-data-lead">ศูนย์รวมชุดข้อมูลเปิดของกองการประปา เทศบาลนครพิษณุโลก เพื่อส่งเสริมการเข้าถึงข้อมูลและความโปร่งใสในการให้บริการประชาชน</p>
            </div>
            <div class="card open-data-summary">
              <span class="open-data-icon material-symbols-rounded" aria-hidden="true">folder_open</span>
              <div><span>ข้อมูลจำลองสำหรับต้นแบบ</span><strong>ทั้งหมด <?= $datasetCount ?> ชุดข้อมูล</strong></div>
            </div>
          </div>
        </div>
      </header>

      <section class="container open-data-catalog" aria-label="แค็ตตาล็อกชุดข้อมูล">
        <form class="card open-data-filters" role="search" aria-label="ค้นหาชุดข้อมูลเปิด">
          <div class="open-data-search">
            <span class="material-symbols-rounded" aria-hidden="true">search</span>
            <label class="visually-hidden" for="dataset-search">ค้นหาชุดข้อมูล</label>
            <input id="dataset-search" type="search" placeholder="ค้นหาชุดข้อมูล" autocomplete="off">
          </div>
          <label class="filter-select">
            <span>หมวดหมู่</span>
            <select id="dataset-topic">
              <option value="">ทุกหมวดหมู่</option>
              <?php foreach ($topics as $key => $label): ?>
                <option value="<?= $key ?>"><?= $label ?></option>
              <?php endforeach; ?>
            </select>
          </label>
          <button class="button open-data-reset" type="reset">ล้างตัวกรอง</button>
          <p class="open-data-count" role="status"><span class="material-symbols-rounded" aria-hidden="true">info</span><span id="dataset-count">แสดงทั้งหมด <?= $datasetCount ?> ชุดข้อมูล</span></p>
        </form>

        <div class="open-data-grid">
          <?php foreach ($datasets as $id => [$topic, $icon, $title, $description, $day, $field, $value]): ?>
            <article class="card open-data-card" data-topic="<?= $topic ?>">
              <div class="open-data-card-top">
                <span class="open-data-icon material-symbols-rounded" aria-hidden="true"><?= $icon ?></span>
                <div class="open-data-formats" aria-label="รูปแบบไฟล์ตัวอย่าง"><span>CSV</span><span>XLSX</span></div>
              </div>
              <h2 id="dataset-<?= $id ?>"><?= $title ?></h2>
              <p class="open-data-description"><?= $description ?></p>
              <p class="open-data-date">
                <span class="material-symbols-rounded" aria-hidden="true">schedule</span>
                วันที่อัปเดตตัวอย่าง <time datetime="2025-02-<?= sprintf('%02d', $day) ?>"><?= $day ?> กุมภาพันธ์ 2568</time>
              </p>
              <button class="button button-primary open-data-preview" type="button" aria-haspopup="dialog"
                aria-labelledby="preview-<?= $id ?> dataset-<?= $id ?>" data-preview="<?= $id ?>">
                <span id="preview-<?= $id ?>">ดูชุดข้อมูล</span><span class="material-symbols-rounded" aria-hidden="true">arrow_forward</span>
              </button>
              <template id="sample-<?= $id ?>">
                <h2 id="dataset-dialog-title"><?= $title ?></h2>
                <p><?= $description ?></p>
                <dl class="open-data-metadata">
                  <div><dt>หมวดหมู่</dt><dd><?= $topics[$topic] ?></dd></div>
                  <div><dt>วันที่อัปเดตตัวอย่าง</dt><dd><?= $day ?> กุมภาพันธ์ 2568</dd></div>
                  <div><dt>รูปแบบไฟล์ตัวอย่าง</dt><dd>CSV, XLSX</dd></div>
                </dl>
                <table>
                  <caption>ตัวอย่างข้อมูลจำลอง</caption>
                  <thead><tr><th scope="col">ช่วงข้อมูล</th><th scope="col"><?= $field ?></th></tr></thead>
                  <tbody><tr><td>มกราคม 2568</td><td><?= $value ?></td></tr></tbody>
                </table>
              </template>
            </article>
          <?php endforeach; ?>
        </div>

        <div class="open-data-empty" id="dataset-empty" hidden>
          <h2>ไม่พบชุดข้อมูล</h2>
          <p>ลองเปลี่ยนคำค้นหาหรือล้างตัวกรองเพื่อดูชุดข้อมูลทั้งหมด</p>
          <button class="button open-data-reset" type="button" id="dataset-empty-reset">ล้างตัวกรอง</button>
        </div>
        <p class="open-data-note"><span class="material-symbols-rounded" aria-hidden="true">info</span> ข้อมูลและวันที่อัปเดตทั้งหมดเป็นข้อมูลจำลองสำหรับต้นแบบ</p>
      </section>

      <dialog class="open-data-dialog" id="dataset-dialog" aria-labelledby="dataset-dialog-title">
        <div id="dataset-dialog-content"></div>
        <form method="dialog">
          <button class="button open-data-reset" autofocus>ปิดตัวอย่าง</button>
        </form>
      </dialog>
    </main>
    <?php require __DIR__ . '/partials/footer.php'; ?>
  </body>
</html>
