<?php
# การตรวจสอบข้อมูล
# ตรวจรูปแบบรหัสบริการ ค้นในข้อมูลคู่มือ และคืน HTTP 404 เมื่อไม่พบ
$guideServices = require __DIR__ . '/data/citizen-guide-data.php';
$requestedId = $_GET['id'] ?? null;
$service = is_string($requestedId) && preg_match('/\A[1-9][0-9]*\z/', $requestedId)
    ? ($guideServices[$requestedId] ?? null)
    : null;

if ($service === null) {
    http_response_code(404);
}

# ข้อมูลสำหรับแสดงผล
# เตรียมชื่อ คำอธิบาย ลิงก์ย้อนกลับ และข้อมูลสรุปของบริการ
$escapeGuide = static fn(string $value): string => htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
$guideTitle = $service['title'] ?? 'ไม่พบหัวข้อบริการ';
$guideDescription = $service['description'] ?? 'เลือกรายการบริการอีกครั้งจากหน้าคู่มือประชาชน';
$guideHref = 'citizen-guide.php';
$returnHref = $service === null ? $guideHref : $guideHref . '#guide-' . $requestedId;
$pending = 'รอข้อมูลจากหน่วยงาน';
$summary = [
    ['schedule', 'ระยะเวลาดำเนินการ', $pending],
    ['payments', 'ค่าธรรมเนียม', $pending],
    ['support_agent', 'ช่องทางติดต่อ', 'ติดต่อกองการประปา'],
    ['fact_check', 'เงื่อนไขและคุณสมบัติ', $pending],
];
?>
<!doctype html>
<html lang="th">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#173f70">
    <meta name="description" content="<?= $escapeGuide($guideDescription) ?>">
    <title><?= $escapeGuide($guideTitle) ?> — คู่มือประชาชน — กองการประปา เทศบาลนครพิษณุโลก</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Noto+Sans+Thai:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,400,0,0" rel="stylesheet">
    <link rel="icon" type="image/png" href="assets/logos/กองการประปา%20logo.PNG">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/citizen-guide-detail.css">
    <script src="js/localization.js" defer></script>
    <script src="js/main.js" defer></script>
  </head>
  <body>
    <a class="skip-link" href="#main-content">ข้ามไปยังเนื้อหาหลัก</a>
    <?php
      $activePage = 'citizen-guide';
      require __DIR__ . '/partials/header.php';
      $eServiceHref = $navigationGroups['services']['items']['e-service'][1];
    ?>

    <main class="page-content guide-detail" id="main-content" tabindex="-1">
      <div class="container">
        <!-- # เส้นทางนำทาง
             แสดงตำแหน่งในหมวดคู่มือและทางกลับไปยังรายการ
        -->
        <div class="guide-detail-toolbar">
          <nav aria-label="เส้นทางนำทาง">
            <ol class="breadcrumb">
              <li><a href="index.php"><span class="material-symbols-rounded" aria-hidden="true">home</span> หน้าแรก</a></li>
              <li><a href="index.php#services">บริการ</a></li>
              <li><a href="<?= $escapeGuide($guideHref) ?>">คู่มือประชาชน</a></li>
              <li><span aria-current="page"><?= $escapeGuide($guideTitle) ?></span></li>
            </ol>
          </nav>
          <a class="button guide-detail-back" href="<?= $escapeGuide($returnHref) ?>">
            <span class="material-symbols-rounded" aria-hidden="true">arrow_back</span> กลับไปยังคู่มือประชาชน
          </a>
        </div>

        <?php if ($service === null): ?>
          <!-- # ไม่พบหัวข้อบริการ
               แจ้งสถานะและให้กลับไปเลือกคู่มืออีกครั้ง
          -->
          <section class="guide-detail-panel guide-detail-hero" aria-labelledby="guide-detail-title">
            <span class="icon-box" aria-hidden="true"><span class="material-symbols-rounded">search_off</span></span>
            <h1 id="guide-detail-title"><?= $escapeGuide($guideTitle) ?></h1>
            <p><?= $escapeGuide($guideDescription) ?></p>
          </section>
        <?php else: ?>
          <!-- # ข้อมูลบริการ
               แสดงชื่อ คำอธิบาย และป้ายกำกับของคู่มือ
          -->
          <section class="guide-detail-panel guide-detail-hero guide-detail-hero-layout" aria-labelledby="guide-detail-title">
            <div>
              <div class="guide-detail-badges">
                <span>
                  <span class="material-symbols-rounded" aria-hidden="true"><?= $escapeGuide($service['icon']) ?></span>
                  <?= $escapeGuide($service['category']) ?>
                </span>
                <span><span class="material-symbols-rounded" aria-hidden="true">info</span> ข้อมูลต้นแบบ รอเนื้อหาทางการจากหน่วยงาน</span>
              </div>
              <h1 id="guide-detail-title"><?= $escapeGuide($guideTitle) ?></h1>
              <p><?= $escapeGuide($guideDescription) ?></p>
            </div>
            <!-- # บริการออนไลน์
                 แสดงลิงก์เข้า E-Service ของเทศบาล
            -->
            <div class="guide-detail-online">
              <h2><span class="material-symbols-rounded" aria-hidden="true">devices</span> บริการออนไลน์</h2>
              <p>เข้าสู่ระบบ E-Service ของเทศบาลเพื่อดูบริการออนไลน์ที่เปิดให้ใช้งาน</p>
              <a class="button button-light" href="<?= $escapeGuide($eServiceHref) ?>" target="_blank" rel="noopener noreferrer">
                เข้าสู่ระบบ E-Service <span class="material-symbols-rounded" aria-hidden="true">open_in_new</span>
              </a>
            </div>
          </section>

          <!-- # สรุปข้อมูลบริการ
               แสดงระยะเวลา ค่าใช้จ่าย ช่องทาง และข้อมูลติดต่อ
          -->
          <dl class="guide-detail-summary" aria-label="สรุปข้อมูลบริการ">
            <?php foreach ($summary as [$icon, $label, $value]): ?>
              <div class="guide-detail-panel">
                <dt>
                  <?= $escapeGuide($label) ?>
                  <span class="icon-box" aria-hidden="true"><span class="material-symbols-rounded"><?= $escapeGuide($icon) ?></span></span>
                </dt>
                <dd>
                  <?php if ($icon === 'support_agent'): ?>
                    <a href="#guide-detail-contact"><?= $escapeGuide($value) ?></a>
                  <?php else: ?>
                    <?= $escapeGuide($value) ?>
                  <?php endif; ?>
                </dd>
              </div>
            <?php endforeach; ?>
          </dl>

          <div class="guide-detail-layout">
            <div class="guide-detail-stack">
              <!-- # ขั้นตอนการขอรับบริการ
                   แสดงลำดับขั้นตามข้อมูลของบริการที่เลือก
              -->
              <section class="guide-detail-panel" aria-labelledby="guide-steps-title">
                <h2 class="guide-detail-heading" id="guide-steps-title">ขั้นตอนและการเตรียมตัว</h2>
                <p class="guide-detail-note">
                  <span class="material-symbols-rounded" aria-hidden="true">info</span>
                  ตัวอย่างการเตรียมตัว ขั้นตอนอย่างเป็นทางการรอการยืนยันจากหน่วยงาน
                </p>
                <ol class="guide-detail-steps">
                  <?php foreach ($service['steps'] as [$stepTitle, $stepDescription]): ?>
                    <li>
                      <div>
                        <h3><?= $escapeGuide($stepTitle) ?></h3>
                        <p><?= $escapeGuide($stepDescription) ?></p>
                      </div>
                    </li>
                  <?php endforeach; ?>
                </ol>
              </section>

              <?php if (isset($service['documents'])): ?>
                <!-- # เอกสารประกอบ
                     แสดงรายการเอกสารเมื่อชุดข้อมูลระบุไว้
                -->
                <section class="guide-detail-panel" aria-labelledby="guide-documents-title">
                  <h2 class="guide-detail-heading" id="guide-documents-title">เอกสารและหลักฐานประกอบ</h2>
                  <p class="guide-detail-note">
                    <span class="material-symbols-rounded" aria-hidden="true">description</span>
                    รายการเอกสารที่ต้องใช้รอการยืนยันจากหน่วยงาน
                  </p>
                  <p><?= $escapeGuide($service['documents']) ?></p>
                </section>
              <?php endif; ?>
            </div>

            <div class="guide-detail-stack">
              <?php if (isset($service['documents'])): ?>
                <!-- # แบบฟอร์ม
                     แสดงพื้นที่สำหรับแบบฟอร์มเมื่อบริการมีข้อมูลเอกสาร
                -->
                <section class="guide-detail-panel guide-detail-side" aria-labelledby="guide-forms-title">
                  <h2 id="guide-forms-title"><span class="material-symbols-rounded" aria-hidden="true">download</span> แบบฟอร์มดาวน์โหลด</h2>
                  <p class="guide-detail-note">รอแบบฟอร์มทางการจากหน่วยงาน</p>
                </section>
              <?php endif; ?>

              <!-- # การติดต่อ
                   แสดงเบอร์โทรศัพท์และช่องทาง LINE สำหรับสอบถาม
              -->
              <section class="guide-detail-panel guide-detail-side" aria-labelledby="guide-detail-contact">
                <h2 id="guide-detail-contact" tabindex="-1"><span class="material-symbols-rounded" aria-hidden="true">support_agent</span> หน่วยงานที่ติดต่อ</h2>
                <p><strong>กองการประปา</strong><br>เทศบาลนครพิษณุโลก</p>
                <p class="guide-detail-contact-row"><span class="material-symbols-rounded" aria-hidden="true">location_on</span> 1299 ถนนบรมไตรโลกนารถ 2 ตำบลในเมือง อำเภอเมือง จังหวัดพิษณุโลก 65000</p>
                <p class="guide-detail-contact-row"><span class="material-symbols-rounded" aria-hidden="true">call</span> <a href="tel:055983230">055-983230</a></p>
                <div class="guide-detail-line">
                  <span class="social-channel" data-social-channel="line"><img src="assets/contact/Line%20OA%20logo.png" alt=""><span>LINE Official</span><small>รอ URL ทางการ</small></span>
                </div>
              </section>

              <!-- # คู่มือที่เกี่ยวข้อง
                   เชื่อมไปยังบริการที่อ้างอิงจากข้อมูลของคู่มือปัจจุบัน
              -->
              <nav class="guide-detail-panel guide-detail-side" aria-labelledby="guide-related-title">
                <h2 id="guide-related-title"><span class="material-symbols-rounded" aria-hidden="true">menu_book</span> คู่มือประชาชนที่เกี่ยวข้อง</h2>
                <ul class="guide-detail-related">
                  <?php foreach ($service['related'] as $relatedId): ?>
                    <li>
                      <a href="citizen-guide-detail.php?id=<?= $escapeGuide((string) $relatedId) ?>">
                        <span><?= $escapeGuide($guideServices[$relatedId]['title']) ?></span>
                        <span class="material-symbols-rounded" aria-hidden="true">arrow_forward</span>
                      </a>
                    </li>
                  <?php endforeach; ?>
                </ul>
              </nav>
            </div>
          </div>

          <!-- # ความช่วยเหลือเพิ่มเติม
               รวมทางลัดไปยังช่องทางติดต่อและหน้าคู่มือ
          -->
          <section class="guide-detail-help" aria-labelledby="guide-help-title">
            <span class="icon-box" aria-hidden="true"><span class="material-symbols-rounded">contact_support</span></span>
            <div>
              <h2 id="guide-help-title">ต้องการความช่วยเหลือเพิ่มเติม?</h2>
              <p>ติดต่อเจ้าหน้าที่กองการประปา เพื่อสอบถามข้อมูลเพิ่มเติมเกี่ยวกับขั้นตอนบริการ</p>
            </div>
            <div class="guide-detail-actions">
              <a class="button guide-detail-back" href="<?= $escapeGuide($returnHref) ?>">
                <span class="material-symbols-rounded" aria-hidden="true">arrow_back</span> กลับไปยังคู่มือประชาชน
              </a>
              <a class="button button-light" href="index.php#contact">
                ข้อมูลติดต่อ <span class="material-symbols-rounded" aria-hidden="true">arrow_forward</span>
              </a>
            </div>
          </section>
        <?php endif; ?>
      </div>
    </main>

    <?php require __DIR__ . '/partials/footer.php'; ?>
  </body>
</html>
