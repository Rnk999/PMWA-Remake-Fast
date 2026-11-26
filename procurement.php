<?php
$activePage = 'procurement';
$categories = [
    'invitation' => 'ประกาศร่าง / ประกาศเชิญชวน',
    'award' => 'ประกาศผู้ชนะการเสนอราคา',
    'plan' => 'ประกาศแผนจัดซื้อจัดจ้าง',
    'price' => 'ประกาศราคากลาง',
    'contract' => 'ประกาศสัญญาซื้อ/จ้าง',
    'cancellation' => 'ประกาศยกเลิก',
];
$quickFilters = [
    'bidding' => 'e-Bidding',
    'chemicals' => 'จัดซื้อสารเคมี',
    'pipes' => 'งานปรับปรุงท่อ',
];
// ข้อมูลจำลองสำหรับแสดงผลต้นแบบ เรียงตามวันที่ประกาศล่าสุด
$records = [
    ['2568', '24 ต.ค.', 'invitation', 'DEMO-P01', 'ประกวดราคางานปรับปรุงท่อส่งน้ำประปา (e-Bidding)', 'วิธีจัดหา: ประกวดราคาอิเล็กทรอนิกส์', 'bidding pipes'],
    ['2568', '22 ต.ค.', 'award', 'DEMO-P02', 'ผลการเสนอราคาจัดซื้อสารเคมี PAC สำหรับผลิตน้ำประปา', 'ผลการพิจารณา: ตัวอย่างการประกาศผู้ชนะ', 'chemicals'],
    ['2568', '19 ต.ค.', 'plan', 'DEMO-P03', 'แผนจัดซื้อมาตรวัดน้ำระบบดิจิทัล', 'วงเงินตามแผนจำลอง: 3,200,000 บาท', ''],
    ['2568', '17 ต.ค.', 'price', 'DEMO-P04', 'ราคากลางงานเปลี่ยนวาล์วควบคุมแรงดันน้ำ', 'ราคากลางจำลอง: 940,000 บาท (แบบ บก.01)', ''],
    ['2568', '14 ต.ค.', 'contract', 'DEMO-C01', 'สัญญาติดตั้งระบบตรวจสอบคุณภาพน้ำอัตโนมัติ', 'คู่สัญญา: ผู้รับจ้างตัวอย่าง', ''],
    ['2568', '10 ต.ค.', 'cancellation', 'DEMO-P06', 'ยกเลิกการประกวดราคางานก่อสร้างสถานีเพิ่มแรงดันน้ำ', 'เหตุผลตัวอย่าง: ปรับปรุงเงื่อนไขในร่าง TOR', 'bidding'],
    ['2568', '8 ต.ค.', 'price', 'DEMO-P07', 'ราคากลางจัดซื้อท่อเหล็กและอุปกรณ์ประกอบ', 'ราคากลางจำลอง: 1,650,000 บาท', ''],
    ['2568', '4 ต.ค.', 'award', 'DEMO-P08', 'ผลการเสนอราคาจัดซื้อคลอรีนสำหรับสถานีผลิตน้ำประปา', 'ราคาเสนอจำลอง: 690,000 บาท', 'chemicals'],
    ['2568', '2 ต.ค.', 'invitation', 'DEMO-P09', 'ร่างขอบเขตงาน (TOR) บำรุงรักษาเครื่องสูบน้ำแรงดันสูง', 'สถานะตัวอย่าง: เปิดรับฟังความคิดเห็น', ''],
    ['2568', '1 ต.ค.', 'plan', 'DEMO-P10', 'แผนปรับปรุงแนวท่อจ่ายน้ำประปาในชุมชน', 'กำหนดเผยแพร่โดยประมาณ: พ.ย. 2568', 'pipes'],
    ['2568', '29 ก.ย.', 'contract', 'DEMO-C02', 'สัญญาจัดซื้อวัสดุสำหรับซ่อมบำรุงระบบประปา', 'คู่สัญญา: ผู้จำหน่ายตัวอย่าง', ''],
    ['2568', '25 ก.ย.', 'invitation', 'DEMO-P12', 'เชิญชวนเสนอราคาจัดซื้อสารเคมีบำบัดน้ำ (e-Bidding)', 'วิธีจัดหา: ประกวดราคาอิเล็กทรอนิกส์', 'bidding chemicals'],
    ['2567', '18 ก.ย.', 'plan', 'DEMO-P13', 'แผนบำรุงรักษาเครื่องสูบน้ำประจำปี', 'สถานะตัวอย่าง: เผยแพร่แผน', ''],
    ['2567', '12 ก.ย.', 'price', 'DEMO-P14', 'ราคากลางงานปรับปรุงท่อจ่ายน้ำ', 'ราคากลางจำลอง: 580,000 บาท', 'pipes'],
];
$fiscalYears = array_unique(array_column($records, 0));
$defaultYear = $fiscalYears[0];
$defaultTotal = count(array_filter($records, static fn ($record) => $record[0] === $defaultYear));
$pageSize = 10;
?>
<!doctype html>
<html lang="th">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#173f70">
    <meta name="description" content="ค้นหาและกรองประกาศจัดซื้อจัดจ้างในต้นแบบเว็บไซต์กองการประปา เทศบาลนครพิษณุโลก">
    <title>จัดซื้อจัดจ้าง — กองการประปา เทศบาลนครพิษณุโลก</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Noto+Sans+Thai:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,400,0,0" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/documents.css">
    <link rel="stylesheet" href="css/procurement.css">
    <script src="js/main.js" defer></script>
    <script src="js/procurement.js" defer></script>
  </head>
  <body>
    <a class="skip-link" href="#main-content">ข้ามไปยังเนื้อหาหลัก</a>
    <?php require __DIR__ . '/partials/header.php'; ?>
    <?php require __DIR__ . '/partials/breadcrumb.php'; ?>
    <main id="main-content" class="procurement-page container">
      <header class="documents-intro">
        <div class="documents-intro-row">
          <div>
            <p class="documents-eyebrow"><span class="material-symbols-rounded" aria-hidden="true">assignment_turned_in</span> ความโปร่งใสภาครัฐ</p>
            <h1>จัดซื้อจัดจ้าง</h1>
            <p class="documents-subtitle" lang="en">Procurement</p>
            <p class="documents-lead">ค้นหาประกาศ แผนงาน ราคากลาง ผลการเสนอราคา และสัญญาจัดซื้อจัดจ้างของหน่วยงาน</p>
          </div>
          <aside class="documents-notice" aria-label="สรุปข้อมูลจัดซื้อจัดจ้างตัวอย่าง">
            <span class="material-symbols-rounded" aria-hidden="true">info</span>
            <div>
              <p><strong>ข้อมูลตัวอย่างสำหรับต้นแบบ</strong></p>
              <dl class="procurement-stats">
                <div><dt>ปีงบประมาณ</dt><dd id="procurement-summary-year"><?= $defaultYear ?></dd></div>
                <div><dt>ประกาศตัวอย่าง</dt><dd id="procurement-summary-total"><?= $defaultTotal ?> รายการ</dd></div>
              </dl>
            </div>
          </aside>
        </div>
      </header>

      <section class="card procurement-egp" aria-labelledby="procurement-egp-title">
        <span class="procurement-icon" aria-hidden="true"><span class="material-symbols-rounded">account_balance</span></span>
        <div>
          <div class="procurement-egp-title">
            <h2 id="procurement-egp-title">ประกาศจากระบบ e-GP</h2>
            <span class="procurement-badge">กรมบัญชีกลาง</span>
          </div>
          <p>ระบบการจัดซื้อจัดจ้างภาครัฐสำหรับตรวจสอบประกาศ ข้อมูลโครงการ และสถานะการจัดซื้อจัดจ้าง</p>
          <p id="procurement-sample-note"><strong>ข้อมูลจำลองสำหรับต้นแบบ</strong> · ยังไม่เชื่อมต่อระบบ e-GP และไม่มีไฟล์ PDF แนบ</p>
        </div>
      </section>

      <form class="card procurement-filters" id="procurement-filters" role="search" aria-label="ค้นหาประกาศจัดซื้อจัดจ้าง" data-page-search>
        <div class="procurement-filter-fields">
          <label class="procurement-search">
            <span class="visually-hidden">คำค้นหาประกาศจัดซื้อจัดจ้าง</span>
            <span class="material-symbols-rounded" aria-hidden="true">search</span>
            <input id="procurement-search" type="search" placeholder="ค้นหาชื่อโครงการ รหัสโครงการ หรือเลขที่สัญญา" autocomplete="off">
          </label>
          <label class="filter-select"><span>ประเภทประกาศ</span>
            <select id="procurement-category">
              <option value="">ทั้งหมด</option>
              <?php foreach ($categories as $key => $label): ?>
                <option value="<?= $key ?>"><?= $label ?></option>
              <?php endforeach; ?>
            </select>
          </label>
          <label class="filter-select"><span>ปีงบประมาณ</span>
            <select id="procurement-year">
              <?php foreach ($fiscalYears as $year): ?>
                <option value="<?= $year ?>"><?= $year ?></option>
              <?php endforeach; ?>
              <option value="">ทุกปี</option>
            </select>
          </label>
        </div>
        <div class="procurement-filter-actions">
          <div class="procurement-quick-filters" role="group" aria-label="ตัวกรองด่วน">
            <span>ตัวกรองด่วน</span>
            <?php foreach ($quickFilters as $key => $label): ?>
              <button type="button" data-procurement-quick="<?= $key ?>" aria-pressed="false"><?= $label ?></button>
            <?php endforeach; ?>
          </div>
          <button class="button button-muted" type="reset"><span class="material-symbols-rounded" aria-hidden="true">restart_alt</span> ล้างการค้นหา</button>
          <button class="button button-primary" type="submit"><span class="material-symbols-rounded" aria-hidden="true">search</span> ค้นหา</button>
        </div>
      </form>
      <noscript><p>เปิดใช้งาน JavaScript เพื่อค้นหา กรอง และดูตัวอย่างประกาศทั้งหมด</p></noscript>

      <section class="procurement-results" aria-labelledby="procurement-results-title" aria-describedby="procurement-sample-note">
        <h2 class="visually-hidden" id="procurement-results-title">รายการประกาศจัดซื้อจัดจ้าง</h2>
        <div class="card procurement-table-wrap">
          <table class="procurement-table" aria-labelledby="procurement-results-title">
            <thead>
              <tr><th scope="col">วันที่ประกาศ</th><th scope="col">ประเภทประกาศ</th><th scope="col">เรื่อง / ชื่อโครงการ</th><th scope="col">เอกสารแนบและการดำเนินการ</th></tr>
            </thead>
            <tbody id="procurement-records" data-page-size="<?= $pageSize ?>">
              <?php foreach ($records as $index => [$year, $date, $category, $number, $title, $detail, $tags]): ?>
                <tr data-procurement-record data-category="<?= $category ?>" data-year="<?= $year ?>" data-tags="<?= $tags ?>"<?= $index >= $pageSize ? ' hidden' : '' ?>>
                  <td class="procurement-date"><?= "$date $year" ?></td>
                  <td><span class="procurement-badge" data-category="<?= $category ?>"><?= $categories[$category] ?></span></td>
                  <th scope="row">
                    <span class="procurement-record-title"><?= $title ?></span>
                    <span class="procurement-record-meta"><?= $category === 'contract' ? 'เลขที่สัญญา' : 'รหัสโครงการ' ?> <?= $number ?> · <?= $detail ?></span>
                  </th>
                  <td><div class="procurement-record-actions">
                    <button class="button button-muted" type="button" data-procurement-preview aria-label="พรีวิว <?= $title ?>"><span class="material-symbols-rounded" aria-hidden="true">visibility</span> พรีวิว</button>
                    <button class="button button-muted" type="button" disabled aria-label="PDF ยังไม่มีไฟล์แนบ"><span class="material-symbols-rounded" aria-hidden="true">download</span> PDF</button>
                  </div></td>
                </tr>
              <?php endforeach; ?>
              <tr id="procurement-empty" hidden><td colspan="4">ไม่พบประกาศที่ตรงกับตัวกรอง ลองเปลี่ยนคำค้นหาหรือล้างการค้นหา</td></tr>
            </tbody>
          </table>
        </div>
        <div class="card procurement-pagination">
          <p id="procurement-results-status" role="status">แสดง 1–<?= $pageSize ?> จาก <?= $defaultTotal ?> รายการตัวอย่าง</p>
          <nav id="procurement-pages" aria-label="หน้ารายการประกาศ" hidden>
            <button type="button" data-procurement-step="-1" aria-label="หน้าก่อนหน้า"><span class="material-symbols-rounded" aria-hidden="true">chevron_left</span></button>
            <span id="procurement-page-numbers"></span>
            <button type="button" data-procurement-step="1" aria-label="หน้าถัดไป"><span class="material-symbols-rounded" aria-hidden="true">chevron_right</span></button>
          </nav>
        </div>
      </section>

      <dialog class="card procurement-preview" id="procurement-preview" aria-labelledby="procurement-preview-title">
        <p class="procurement-badge">ข้อมูลจำลอง</p>
        <h2 id="procurement-preview-title"></h2>
        <p id="procurement-preview-category"></p>
        <p id="procurement-preview-meta"></p>
        <p>ตัวอย่างนี้แสดงรายละเอียดประกาศ ยังไม่มีไฟล์เอกสารแนบ</p>
        <form method="dialog"><button class="button button-primary" type="submit" autofocus>ปิดพรีวิว</button></form>
      </dialog>
    </main>
    <?php require __DIR__ . '/partials/footer.php'; ?>
  </body>
</html>
