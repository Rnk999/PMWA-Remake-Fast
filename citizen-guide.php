<?php
# ข้อมูลคู่มือประชาชน
# โหลดรายการบริการร่วมกับหน้ารายละเอียดและเตรียมตัวช่วย escape ข้อความ
$guideServices = require __DIR__ . '/data/citizen-guide-data.php';
$escapeGuide = static fn(string $value): string => htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
?>
<!doctype html>
<html lang="th">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#173f70">
    <meta name="description" content="คู่มือประชาชนสำหรับบริการของกองการประปา เทศบาลนครพิษณุโลก รวม 13 หัวข้อบริการที่ประชาชนใช้งานบ่อย">
    <title>คู่มือประชาชน — กองการประปา เทศบาลนครพิษณุโลก</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Noto+Sans+Thai:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,400,0,0" rel="stylesheet">
    <link rel="icon" type="image/png" href="assets/logos/กองการประปา%20logo.PNG">
    <link rel="stylesheet" href="css/styles.css">
    <script src="js/localization.js" defer></script>
    <script src="js/main.js" defer></script>
  </head>
  <body>
    <a class="skip-link" href="#main-content">ข้ามไปยังเนื้อหาหลัก</a>

    <?php
      $activePage = 'citizen-guide';
      require __DIR__ . '/partials/header.php';
    ?>

    <main tabindex="-1" id="main-content">
      <?php
        # ค่าของแบนเนอร์หน้าย่อย
        # ส่งหัวเรื่อง คำอธิบาย และข้อมูลเสริมจากหน้านี้ให้แบนเนอร์ร่วม
        $banner = [
            'title' => 'คู่มือประชาชน',
            'subtitle' => 'Citizen Guide',
            'description' => 'รวมขั้นตอนและเอกสารที่ต้องเตรียมสำหรับบริการของกองการประปา เทศบาลนครพิษณุโลก จำนวน 13 หัวข้อบริการ เพื่อให้ประชาชนสามารถเตรียมตัวและเข้ารับบริการได้อย่างสะดวก รวดเร็ว',
            'eyebrow' => 'บริการประชาชน · คู่มือขั้นตอน',
            'icon' => 'menu_book',
            'breadcrumbParent' => 'services',
            'details' => static function (): void {
            ?>
            <div class="guide-banner-meta">
              <span class="guide-count-pill">
                <span class="material-symbols-rounded" aria-hidden="true">format_list_bulleted</span>
                13 หัวข้อบริการ
              </span>
              <span class="guide-note-pill">
                <span class="material-symbols-rounded" aria-hidden="true">info</span>
                ข้อมูลต้นแบบ รอเนื้อหาทางการจากหน่วยงาน
              </span>
            </div>
            <?php
            },
        ];
        require __DIR__ . '/partials/page-banner.php';
      ?>

      <!-- # รายการคู่มือประชาชน
           แสดงคู่มือแยกตามประเภทบริการและลิงก์ไปยังหน้ารายละเอียด
      -->
      <div class="page-content">
        <section class="section guide-section" aria-labelledby="guide-list-title">
          <div class="container">

            <div class="section-heading guide-section-heading">
              <div>
                <p class="section-kicker">
                  <span class="material-symbols-rounded" aria-hidden="true">checklist</span>
                  ตาม พ.ร.บ. การอำนวยความสะดวกในการพิจารณาอนุญาตของทางราชการ พ.ศ. 2558
                </p>
                <h2 id="guide-list-title">รายการหัวข้อบริการ</h2>
                <p>เลือกหัวข้อบริการเพื่อดูขั้นตอน เอกสาร ระยะเวลา และค่าธรรมเนียมที่เกี่ยวข้อง</p>
              </div>
              <span class="section-aside">
                <span class="status-dot status-dot-red"></span>
                เนื้อหาตัวอย่างสำหรับต้นแบบ
              </span>
            </div>

            <div class="guide-categories">

              <!-- # การขอใช้น้ำและจัดการมาตรวัดน้ำ
                   รวมคู่มือขอใช้น้ำใหม่และงานที่เกี่ยวข้องกับมาตรวัด
              -->
              <section class="guide-category-group" aria-labelledby="cat-1-title">
                <div class="guide-category-header">
                  <div class="guide-category-title-wrap">
                    <span class="guide-category-icon">
                      <span class="material-symbols-rounded" aria-hidden="true">water_drop</span>
                    </span>
                    <div>
                      <h3 class="guide-category-title" id="cat-1-title">การขอใช้น้ำและจัดการมาตรวัดน้ำ</h3>
                      <p class="guide-category-desc">บริการขอติดตั้ง ย้าย เปลี่ยนขนาด โอนกรรมสิทธิ์ ยกเลิกการใช้น้ำ และการต่อท่อประปา</p>
                    </div>
                  </div>
                  <span class="guide-category-count">6 หัวข้อ</span>
                </div>
                <ol class="guide-grid" aria-label="หมวดการขอใช้น้ำและจัดการมาตรวัดน้ำ">

              <li>
                <article class="card guide-card" id="guide-1">
                  <div class="guide-card-header">
                    <span class="guide-number" aria-hidden="true">01</span>
                    <span class="icon-box icon-box-blue-soft">
                      <span class="material-symbols-rounded" aria-hidden="true">add_circle</span>
                    </span>
                  </div>
                  <div class="guide-card-body">
                    <div class="guide-tags">
                      <span class="guide-tag">การขอใช้น้ำ</span>
                    </div>
                    <h3><?= $escapeGuide($guideServices[1]['title']) ?></h3>
                    <p><?= $escapeGuide($guideServices[1]['description']) ?></p>
                    <dl class="guide-meta-row">
                      <div>
                        <dt><span class="material-symbols-rounded" aria-hidden="true">schedule</span> ระยะเวลา</dt>
                        <dd>รอข้อมูลจากหน่วยงาน</dd>
                      </div>
                      <div>
                        <dt><span class="material-symbols-rounded" aria-hidden="true">payments</span> ค่าธรรมเนียม</dt>
                        <dd>รอข้อมูลจากหน่วยงาน</dd>
                      </div>
                    </dl>
                  </div>
                  <div class="guide-card-footer">
                    <a href="citizen-guide-detail.php?id=1" class="guide-link">
                      ดูรายละเอียด
                      <span class="material-symbols-rounded" aria-hidden="true">arrow_forward</span>
                    </a>
                  </div>
                </article>
              </li>

              <li>
                <article class="card guide-card" id="guide-2">
                  <div class="guide-card-header">
                    <span class="guide-number" aria-hidden="true">02</span>
                    <span class="icon-box icon-box-blue-soft">
                      <span class="material-symbols-rounded" aria-hidden="true">swap_horiz</span>
                    </span>
                  </div>
                  <div class="guide-card-body">
                    <div class="guide-tags">
                      <span class="guide-tag">การขอใช้น้ำ</span>
                    </div>
                    <h3><?= $escapeGuide($guideServices[2]['title']) ?></h3>
                    <p><?= $escapeGuide($guideServices[2]['description']) ?></p>
                    <dl class="guide-meta-row">
                      <div>
                        <dt><span class="material-symbols-rounded" aria-hidden="true">schedule</span> ระยะเวลา</dt>
                        <dd>รอข้อมูลจากหน่วยงาน</dd>
                      </div>
                      <div>
                        <dt><span class="material-symbols-rounded" aria-hidden="true">payments</span> ค่าธรรมเนียม</dt>
                        <dd>รอข้อมูลจากหน่วยงาน</dd>
                      </div>
                    </dl>
                  </div>
                  <div class="guide-card-footer">
                    <a href="citizen-guide-detail.php?id=2" class="guide-link">
                      ดูรายละเอียด
                      <span class="material-symbols-rounded" aria-hidden="true">arrow_forward</span>
                    </a>
                  </div>
                </article>
              </li>

              <li>
                <article class="card guide-card" id="guide-3">
                  <div class="guide-card-header">
                    <span class="guide-number" aria-hidden="true">03</span>
                    <span class="icon-box icon-box-blue-soft">
                      <span class="material-symbols-rounded" aria-hidden="true">tune</span>
                    </span>
                  </div>
                  <div class="guide-card-body">
                    <div class="guide-tags">
                      <span class="guide-tag">การขอใช้น้ำ</span>
                    </div>
                    <h3><?= $escapeGuide($guideServices[3]['title']) ?></h3>
                    <p><?= $escapeGuide($guideServices[3]['description']) ?></p>
                    <dl class="guide-meta-row">
                      <div>
                        <dt><span class="material-symbols-rounded" aria-hidden="true">schedule</span> ระยะเวลา</dt>
                        <dd>รอข้อมูลจากหน่วยงาน</dd>
                      </div>
                      <div>
                        <dt><span class="material-symbols-rounded" aria-hidden="true">payments</span> ค่าธรรมเนียม</dt>
                        <dd>รอข้อมูลจากหน่วยงาน</dd>
                      </div>
                    </dl>
                  </div>
                  <div class="guide-card-footer">
                    <a href="citizen-guide-detail.php?id=3" class="guide-link">
                      ดูรายละเอียด
                      <span class="material-symbols-rounded" aria-hidden="true">arrow_forward</span>
                    </a>
                  </div>
                </article>
              </li>

              <li>
                <article class="card guide-card" id="guide-4">
                  <div class="guide-card-header">
                    <span class="guide-number" aria-hidden="true">04</span>
                    <span class="icon-box icon-box-blue-soft">
                      <span class="material-symbols-rounded" aria-hidden="true">transfer_within_a_station</span>
                    </span>
                  </div>
                  <div class="guide-card-body">
                    <div class="guide-tags">
                      <span class="guide-tag">กรรมสิทธิ์</span>
                    </div>
                    <h3><?= $escapeGuide($guideServices[4]['title']) ?></h3>
                    <p><?= $escapeGuide($guideServices[4]['description']) ?></p>
                    <dl class="guide-meta-row">
                      <div>
                        <dt><span class="material-symbols-rounded" aria-hidden="true">schedule</span> ระยะเวลา</dt>
                        <dd>รอข้อมูลจากหน่วยงาน</dd>
                      </div>
                      <div>
                        <dt><span class="material-symbols-rounded" aria-hidden="true">payments</span> ค่าธรรมเนียม</dt>
                        <dd>รอข้อมูลจากหน่วยงาน</dd>
                      </div>
                    </dl>
                  </div>
                  <div class="guide-card-footer">
                    <a href="citizen-guide-detail.php?id=4" class="guide-link">
                      ดูรายละเอียด
                      <span class="material-symbols-rounded" aria-hidden="true">arrow_forward</span>
                    </a>
                  </div>
                </article>
              </li>

              <li>
                <article class="card guide-card" id="guide-5">
                  <div class="guide-card-header">
                    <span class="guide-number" aria-hidden="true">05</span>
                    <span class="icon-box icon-box-blue-soft">
                      <span class="material-symbols-rounded" aria-hidden="true">do_not_disturb_on</span>
                    </span>
                  </div>
                  <div class="guide-card-body">
                    <div class="guide-tags">
                      <span class="guide-tag">การขอใช้น้ำ</span>
                    </div>
                    <h3><?= $escapeGuide($guideServices[5]['title']) ?></h3>
                    <p><?= $escapeGuide($guideServices[5]['description']) ?></p>
                    <dl class="guide-meta-row">
                      <div>
                        <dt><span class="material-symbols-rounded" aria-hidden="true">schedule</span> ระยะเวลา</dt>
                        <dd>รอข้อมูลจากหน่วยงาน</dd>
                      </div>
                      <div>
                        <dt><span class="material-symbols-rounded" aria-hidden="true">payments</span> ค่าธรรมเนียม</dt>
                        <dd>รอข้อมูลจากหน่วยงาน</dd>
                      </div>
                    </dl>
                  </div>
                  <div class="guide-card-footer">
                    <a href="citizen-guide-detail.php?id=5" class="guide-link">
                      ดูรายละเอียด
                      <span class="material-symbols-rounded" aria-hidden="true">arrow_forward</span>
                    </a>
                  </div>
                </article>
              </li>

              <li>
                <article class="card guide-card" id="guide-6">
                  <div class="guide-card-header">
                    <span class="guide-number" aria-hidden="true">06</span>
                    <span class="icon-box icon-box-blue-soft">
                      <span class="material-symbols-rounded" aria-hidden="true">route</span>
                    </span>
                  </div>
                  <div class="guide-card-body">
                    <div class="guide-tags">
                      <span class="guide-tag">ระบบท่อ</span>
                    </div>
                    <h3><?= $escapeGuide($guideServices[6]['title']) ?></h3>
                    <p><?= $escapeGuide($guideServices[6]['description']) ?></p>
                    <dl class="guide-meta-row">
                      <div>
                        <dt><span class="material-symbols-rounded" aria-hidden="true">schedule</span> ระยะเวลา</dt>
                        <dd>รอข้อมูลจากหน่วยงาน</dd>
                      </div>
                      <div>
                        <dt><span class="material-symbols-rounded" aria-hidden="true">payments</span> ค่าธรรมเนียม</dt>
                        <dd>รอข้อมูลจากหน่วยงาน</dd>
                      </div>
                    </dl>
                  </div>
                  <div class="guide-card-footer">
                    <a href="citizen-guide-detail.php?id=6" class="guide-link">
                      ดูรายละเอียด
                      <span class="material-symbols-rounded" aria-hidden="true">arrow_forward</span>
                    </a>
                  </div>
                </article>
              </li>

                </ol>
              </section>

              <!-- # การชำระเงินและค่าบริการ
                   รวมคู่มือด้านการจ่ายค่าน้ำและการขอข้อมูลค่าใช้จ่าย
              -->
              <section class="guide-category-group" aria-labelledby="cat-2-title">
                <div class="guide-category-header">
                  <div class="guide-category-title-wrap">
                    <span class="guide-category-icon">
                      <span class="material-symbols-rounded" aria-hidden="true">payments</span>
                    </span>
                    <div>
                      <h3 class="guide-category-title" id="cat-2-title">การชำระเงินและค่าบริการ</h3>
                      <p class="guide-category-desc">ช่องทางการชำระค่าน้ำประปาและขั้นตอนการขอผ่อนผันการชำระ</p>
                    </div>
                  </div>
                  <span class="guide-category-count">2 หัวข้อ</span>
                </div>
                <ol class="guide-grid" aria-label="หมวดการชำระเงินและค่าบริการ">

              <li>
                <article class="card guide-card" id="guide-7">
                  <div class="guide-card-header">
                    <span class="guide-number" aria-hidden="true">07</span>
                    <span class="icon-box icon-box-blue-soft">
                      <span class="material-symbols-rounded" aria-hidden="true">qr_code</span>
                    </span>
                  </div>
                  <div class="guide-card-body">
                    <div class="guide-tags">
                      <span class="guide-tag">การชำระเงิน</span>
                    </div>
                    <h3><?= $escapeGuide($guideServices[7]['title']) ?></h3>
                    <p><?= $escapeGuide($guideServices[7]['description']) ?></p>
                    <dl class="guide-meta-row">
                      <div>
                        <dt><span class="material-symbols-rounded" aria-hidden="true">schedule</span> ระยะเวลา</dt>
                        <dd>รอข้อมูลจากหน่วยงาน</dd>
                      </div>
                      <div>
                        <dt><span class="material-symbols-rounded" aria-hidden="true">payments</span> ค่าธรรมเนียม</dt>
                        <dd>รอข้อมูลจากหน่วยงาน</dd>
                      </div>
                    </dl>
                  </div>
                  <div class="guide-card-footer">
                    <a href="citizen-guide-detail.php?id=7" class="guide-link">
                      ดูรายละเอียด
                      <span class="material-symbols-rounded" aria-hidden="true">arrow_forward</span>
                    </a>
                  </div>
                </article>
              </li>

              <li>
                <article class="card guide-card" id="guide-8">
                  <div class="guide-card-header">
                    <span class="guide-number" aria-hidden="true">08</span>
                    <span class="icon-box icon-box-blue-soft">
                      <span class="material-symbols-rounded" aria-hidden="true">calendar_month</span>
                    </span>
                  </div>
                  <div class="guide-card-body">
                    <div class="guide-tags">
                      <span class="guide-tag">การชำระเงิน</span>
                    </div>
                    <h3><?= $escapeGuide($guideServices[8]['title']) ?></h3>
                    <p><?= $escapeGuide($guideServices[8]['description']) ?></p>
                    <dl class="guide-meta-row">
                      <div>
                        <dt><span class="material-symbols-rounded" aria-hidden="true">schedule</span> ระยะเวลา</dt>
                        <dd>รอข้อมูลจากหน่วยงาน</dd>
                      </div>
                      <div>
                        <dt><span class="material-symbols-rounded" aria-hidden="true">payments</span> ค่าธรรมเนียม</dt>
                        <dd>รอข้อมูลจากหน่วยงาน</dd>
                      </div>
                    </dl>
                  </div>
                  <div class="guide-card-footer">
                    <a href="citizen-guide-detail.php?id=8" class="guide-link">
                      ดูรายละเอียด
                      <span class="material-symbols-rounded" aria-hidden="true">arrow_forward</span>
                    </a>
                  </div>
                </article>
              </li>

                </ol>
              </section>

              <!-- # การตรวจสอบและแจ้งเหตุซ่อมบำรุง
                   รวมคู่มือตรวจสอบปัญหาและแจ้งเหตุเกี่ยวกับระบบประปา
              -->
              <section class="guide-category-group" aria-labelledby="cat-3-title">
                <div class="guide-category-header">
                  <div class="guide-category-title-wrap">
                    <span class="guide-category-icon">
                      <span class="material-symbols-rounded" aria-hidden="true">build</span>
                    </span>
                    <div>
                      <h3 class="guide-category-title" id="cat-3-title">การตรวจสอบและแจ้งเหตุซ่อมบำรุง</h3>
                      <p class="guide-category-desc">บริการขอตรวจสอบความเที่ยงตรงของมาตรวัดน้ำ และการแจ้งเหตุท่อประปาแตกหรือรั่วซึม</p>
                    </div>
                  </div>
                  <span class="guide-category-count">2 หัวข้อ</span>
                </div>
                <ol class="guide-grid" aria-label="หมวดการตรวจสอบและแจ้งเหตุซ่อมบำรุง">

              <li>
                <article class="card guide-card" id="guide-9">
                  <div class="guide-card-header">
                    <span class="guide-number" aria-hidden="true">09</span>
                    <span class="icon-box icon-box-blue-soft">
                      <span class="material-symbols-rounded" aria-hidden="true">speed</span>
                    </span>
                  </div>
                  <div class="guide-card-body">
                    <div class="guide-tags">
                      <span class="guide-tag">การตรวจสอบ</span>
                    </div>
                    <h3><?= $escapeGuide($guideServices[9]['title']) ?></h3>
                    <p><?= $escapeGuide($guideServices[9]['description']) ?></p>
                    <dl class="guide-meta-row">
                      <div>
                        <dt><span class="material-symbols-rounded" aria-hidden="true">schedule</span> ระยะเวลา</dt>
                        <dd>รอข้อมูลจากหน่วยงาน</dd>
                      </div>
                      <div>
                        <dt><span class="material-symbols-rounded" aria-hidden="true">payments</span> ค่าธรรมเนียม</dt>
                        <dd>รอข้อมูลจากหน่วยงาน</dd>
                      </div>
                    </dl>
                  </div>
                  <div class="guide-card-footer">
                    <a href="citizen-guide-detail.php?id=9" class="guide-link">
                      ดูรายละเอียด
                      <span class="material-symbols-rounded" aria-hidden="true">arrow_forward</span>
                    </a>
                  </div>
                </article>
              </li>

              <li>
                <article class="card guide-card" id="guide-10">
                  <div class="guide-card-header">
                    <span class="guide-number" aria-hidden="true">10</span>
                    <span class="icon-box icon-box-blue-urgent">
                      <span class="material-symbols-rounded" aria-hidden="true">water_pump</span>
                    </span>
                  </div>
                  <div class="guide-card-body">
                    <div class="guide-tags">
                      <span class="guide-tag guide-tag-urgent">เร่งด่วน</span>
                      <span class="guide-tag">การแจ้งซ่อม</span>
                    </div>
                    <h3><?= $escapeGuide($guideServices[10]['title']) ?></h3>
                    <p><?= $escapeGuide($guideServices[10]['description']) ?></p>
                    <dl class="guide-meta-row">
                      <div>
                        <dt><span class="material-symbols-rounded" aria-hidden="true">schedule</span> ระยะเวลา</dt>
                        <dd>รอข้อมูลจากหน่วยงาน</dd>
                      </div>
                      <div>
                        <dt><span class="material-symbols-rounded" aria-hidden="true">payments</span> ค่าธรรมเนียม</dt>
                        <dd>รอข้อมูลจากหน่วยงาน</dd>
                      </div>
                    </dl>
                  </div>
                  <div class="guide-card-footer">
                    <a href="citizen-guide-detail.php?id=10" class="guide-link">
                      ดูรายละเอียด
                      <span class="material-symbols-rounded" aria-hidden="true">arrow_forward</span>
                    </a>
                  </div>
                </article>
              </li>

                </ol>
              </section>

              <!-- # ข้อมูล เอกสาร และเรื่องร้องเรียน
                   รวมช่องทางขอข้อมูล ขอเอกสาร และยื่นเรื่องร้องเรียน
              -->
              <section class="guide-category-group" aria-labelledby="cat-4-title">
                <div class="guide-category-header">
                  <div class="guide-category-title-wrap">
                    <span class="guide-category-icon">
                      <span class="material-symbols-rounded" aria-hidden="true">description</span>
                    </span>
                    <div>
                      <h3 class="guide-category-title" id="cat-4-title">ข้อมูล เอกสาร และเรื่องร้องเรียน</h3>
                      <p class="guide-category-desc">การขอข้อมูลสถิติการใช้น้ำ หนังสือรับรอง และการยื่นเรื่องร้องเรียนหรือข้อเสนอแนะ</p>
                    </div>
                  </div>
                  <span class="guide-category-count">3 หัวข้อ</span>
                </div>
                <ol class="guide-grid" aria-label="หมวดข้อมูล เอกสาร และเรื่องร้องเรียน">

              <li>
                <article class="card guide-card" id="guide-11">
                  <div class="guide-card-header">
                    <span class="guide-number" aria-hidden="true">11</span>
                    <span class="icon-box icon-box-blue-soft">
                      <span class="material-symbols-rounded" aria-hidden="true">bar_chart</span>
                    </span>
                  </div>
                  <div class="guide-card-body">
                    <div class="guide-tags">
                      <span class="guide-tag">ข้อมูลบริการ</span>
                    </div>
                    <h3><?= $escapeGuide($guideServices[11]['title']) ?></h3>
                    <p><?= $escapeGuide($guideServices[11]['description']) ?></p>
                    <dl class="guide-meta-row">
                      <div>
                        <dt><span class="material-symbols-rounded" aria-hidden="true">schedule</span> ระยะเวลา</dt>
                        <dd>รอข้อมูลจากหน่วยงาน</dd>
                      </div>
                      <div>
                        <dt><span class="material-symbols-rounded" aria-hidden="true">payments</span> ค่าธรรมเนียม</dt>
                        <dd>รอข้อมูลจากหน่วยงาน</dd>
                      </div>
                    </dl>
                  </div>
                  <div class="guide-card-footer">
                    <a href="citizen-guide-detail.php?id=11" class="guide-link">
                      ดูรายละเอียด
                      <span class="material-symbols-rounded" aria-hidden="true">arrow_forward</span>
                    </a>
                  </div>
                </article>
              </li>

              <li>
                <article class="card guide-card" id="guide-12">
                  <div class="guide-card-header">
                    <span class="guide-number" aria-hidden="true">12</span>
                    <span class="icon-box icon-box-blue-soft">
                      <span class="material-symbols-rounded" aria-hidden="true">verified</span>
                    </span>
                  </div>
                  <div class="guide-card-body">
                    <div class="guide-tags">
                      <span class="guide-tag">เอกสาร</span>
                    </div>
                    <h3><?= $escapeGuide($guideServices[12]['title']) ?></h3>
                    <p><?= $escapeGuide($guideServices[12]['description']) ?></p>
                    <dl class="guide-meta-row">
                      <div>
                        <dt><span class="material-symbols-rounded" aria-hidden="true">schedule</span> ระยะเวลา</dt>
                        <dd>รอข้อมูลจากหน่วยงาน</dd>
                      </div>
                      <div>
                        <dt><span class="material-symbols-rounded" aria-hidden="true">payments</span> ค่าธรรมเนียม</dt>
                        <dd>รอข้อมูลจากหน่วยงาน</dd>
                      </div>
                    </dl>
                  </div>
                  <div class="guide-card-footer">
                    <a href="citizen-guide-detail.php?id=12" class="guide-link">
                      ดูรายละเอียด
                      <span class="material-symbols-rounded" aria-hidden="true">arrow_forward</span>
                    </a>
                  </div>
                </article>
              </li>

              <li>
                <article class="card guide-card" id="guide-13">
                  <div class="guide-card-header">
                    <span class="guide-number" aria-hidden="true">13</span>
                    <span class="icon-box icon-box-blue-soft">
                      <span class="material-symbols-rounded" aria-hidden="true">forum</span>
                    </span>
                  </div>
                  <div class="guide-card-body">
                    <div class="guide-tags">
                      <span class="guide-tag">ร้องเรียน</span>
                    </div>
                    <h3><?= $escapeGuide($guideServices[13]['title']) ?></h3>
                    <p><?= $escapeGuide($guideServices[13]['description']) ?></p>
                    <dl class="guide-meta-row">
                      <div>
                        <dt><span class="material-symbols-rounded" aria-hidden="true">schedule</span> ระยะเวลา</dt>
                        <dd>รอข้อมูลจากหน่วยงาน</dd>
                      </div>
                      <div>
                        <dt><span class="material-symbols-rounded" aria-hidden="true">payments</span> ค่าธรรมเนียม</dt>
                        <dd>รอข้อมูลจากหน่วยงาน</dd>
                      </div>
                    </dl>
                  </div>
                  <div class="guide-card-footer">
                    <a href="citizen-guide-detail.php?id=13" class="guide-link">
                      ดูรายละเอียด
                      <span class="material-symbols-rounded" aria-hidden="true">arrow_forward</span>
                    </a>
                  </div>
                </article>
              </li>

                </ol>
              </section>

            </div>

            <!-- # การติดต่อเพิ่มเติม
                 แสดงช่องทางสอบถามเกี่ยวกับคู่มือประชาชน
            -->
            <aside class="guide-contact-banner" aria-label="ติดต่อสอบถามเพิ่มเติม">
              <div class="guide-contact-banner-inner">
                <span class="icon-box">
                  <span class="material-symbols-rounded" aria-hidden="true">support_agent</span>
                </span>
                <div>
                  <strong>ต้องการความช่วยเหลือเพิ่มเติม?</strong>
                  <p>ติดต่อเจ้าหน้าที่กองการประปา เพื่อสอบถามข้อมูลเพิ่มเติมเกี่ยวกับขั้นตอนบริการ</p>
                </div>
                <div class="guide-contact-actions">
                  <a class="button button-primary" href="tel:055983230">
                    <span class="material-symbols-rounded" aria-hidden="true">call</span>
                    055-983230
                  </a>
                  <a class="button button-contact-info" href="index.php#contact">
                    <span class="material-symbols-rounded" aria-hidden="true">location_on</span>
                    ข้อมูลติดต่อ
                  </a>
                </div>
              </div>
            </aside>

            <p class="prototype-disclaimer">
              <span class="material-symbols-rounded" aria-hidden="true">info</span>
              คู่มือประชาชนบนหน้านี้เป็นข้อมูลต้นแบบ รอเนื้อหาที่ผ่านการยืนยันจากกองการประปา เทศบาลนครพิษณุโลก
            </p>

          </div>
        </section>
      </div>

    </main>

    <?php require __DIR__ . '/partials/footer.php'; ?>
  </body>
</html>
