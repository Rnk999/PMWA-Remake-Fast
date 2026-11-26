<?php
$activePage = 'about';
$aboutCategories = require __DIR__ . '/partials/about-categories.php';
$requestedSection = $_GET['section'] ?? null;
$aboutCategory = is_string($requestedSection) && isset($aboutCategories[$requestedSection])
    ? $requestedSection : 'vision';
[$aboutTitle, $aboutIcon] = $aboutCategories[$aboutCategory];

$introductions = [
    'vision' => ['วิสัยทัศน์ พันธกิจ และค่านิยมองค์กร', 'Vision, Mission and Values', 'ทิศทางและแนวทางการให้บริการของกองการประปา เทศบาลนครพิษณุโลก'],
    'organization' => ['แผนผังองค์กร', 'Organization Chart', 'ข้อมูลโครงสร้างการบริหารและการแบ่งส่วนงานของกองการประปา เทศบาลนครพิษณุโลก'],
    'operations' => ['ข่าวสารการดำเนินงาน', 'Operational News', 'ติดตามรายงานผลการดำเนินงาน โครงการพัฒนา และกิจกรรมของกองการประปา'],
    'location' => ['ที่ตั้งสำนักงานและช่องทางการติดต่อ', 'Office Location', 'ข้อมูลสำหรับติดต่อกองการประปา เทศบาลนครพิษณุโลก และวางแผนการเดินทาง'],
    'service-areas' => ['พื้นที่ให้บริการน้ำประปา', 'Service Areas', 'ข้อมูลเขตจ่ายน้ำประปาและช่องทางสอบถามพื้นที่ให้บริการ'],
];
[$pageHeading, $pageSubtitle, $pageLead] = $introductions[$aboutCategory];
?>
<!doctype html>
<html lang="th">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $aboutTitle ?> | กองการประปา เทศบาลนครพิษณุโลก</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Noto+Sans+Thai:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,400,0,0" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/about.css">
    <script src="js/localization.js" defer></script>
    <script src="js/main.js" defer></script>
  </head>
  <body>
    <a class="skip-link" href="#main-content">ข้ามไปยังเนื้อหาหลัก</a>
    <?php require __DIR__ . '/partials/header.php'; ?>
    <?php require __DIR__ . '/partials/breadcrumb.php'; ?>

    <main class="about-page" id="main-content" tabindex="-1">
      <!-- หัวข้อและเมนูหมวดเกี่ยวกับเรา -->
      <div class="about-intro">
        <div class="container">
          <p class="subpage-subtitle"><span class="material-symbols-rounded" aria-hidden="true"><?= $aboutIcon ?></span> <span lang="en"><?= $pageSubtitle ?></span></p>
          <h1 class="subpage-title"><?= $pageHeading ?></h1>
          <p><?= $pageLead ?></p>
        </div>
      </div>
      <div class="container about-content">
        <nav class="card about-categories" aria-label="หมวดเกี่ยวกับเรา">
          <?php foreach ($aboutCategories as $section => [$sectionLabel, $sectionIcon]): ?>
            <a href="about.php?section=<?= $section ?>"<?= $section === $aboutCategory ? ' aria-current="page"' : '' ?>><span class="material-symbols-rounded" aria-hidden="true"><?= $sectionIcon ?></span> <?= $sectionLabel ?></a>
          <?php endforeach; ?>
        </nav>

        <?php switch ($aboutCategory):
          case 'vision':
            $mission = [
                ['water_drop', 'การผลิตและจ่ายน้ำประปา', 'ดูแลคุณภาพน้ำตั้งแต่กระบวนการผลิตจนถึงการจ่ายน้ำให้ประชาชน'],
                ['engineering', 'การพัฒนาโครงข่ายท่อ', 'บำรุงรักษาและพัฒนาโครงข่ายให้รองรับความต้องการใช้น้ำของชุมชน'],
                ['devices', 'การบริการดิจิทัล', 'เพิ่มความสะดวกในการเข้าถึงข้อมูลและบริการผ่านช่องทางออนไลน์'],
                ['verified_user', 'การบริหารจัดการอย่างโปร่งใส', 'เปิดเผยข้อมูลที่จำเป็นและรับฟังความคิดเห็นของประชาชน'],
            ];
            $values = ['Wisdom' => 'ความรู้และความเชี่ยวชาญ', 'Accountability' => 'ความรับผิดชอบ', 'Transparency' => 'ความโปร่งใส', 'Excellence' => 'คุณภาพการบริการ', 'Responsiveness' => 'การตอบสนองประชาชน'];
        ?>
          <!-- วิสัยทัศน์และยุทธศาสตร์ฉบับตัวอย่าง -->
          <div class="about-vision card">
            <p class="about-status">ข้อมูลตัวอย่าง · รอวิสัยทัศน์ฉบับทางการ</p>
            <blockquote>“มุ่งพัฒนาการผลิตและจ่ายน้ำประปาที่สะอาดและปลอดภัย ขยายการเข้าถึงบริการ และเพิ่มความสะดวกให้ประชาชนผ่านช่องทางดิจิทัล”</blockquote>
          </div>
          <section class="about-section" aria-labelledby="mission-title">
            <h2 id="mission-title">พันธกิจหลัก 4 ด้าน</h2>
            <div class="about-grid about-grid-two">
              <?php foreach ($mission as [$missionIcon, $title, $description]): ?>
                <article class="card about-card">
                  <span class="about-icon material-symbols-rounded" aria-hidden="true"><?= $missionIcon ?></span>
                  <h3><?= $title ?></h3>
                  <p><?= $description ?></p>
                </article>
              <?php endforeach; ?>
            </div>
          </section>
          <section class="about-section" aria-labelledby="strategy-title">
            <h2 id="strategy-title">เป้าหมายและยุทธศาสตร์การดำเนินงาน</h2>
            <ul class="card about-strategy">
              <li>เพิ่มการเข้าถึงน้ำประปาที่สะอาด</li>
              <li>พัฒนาคุณภาพบริการและการรับแจ้งเหตุ</li>
              <li>เพิ่มเสถียรภาพของระบบผลิตและโครงข่ายจ่ายน้ำ</li>
            </ul>
          </section>
          <section class="about-section" aria-labelledby="values-title">
            <h2 id="values-title">ค่านิยมองค์กร “<span lang="en">WATER</span>”</h2>
            <div class="about-grid about-grid-five">
              <?php foreach ($values as $value => $meaning): ?>
                <article class="card about-card about-value">
                  <span class="about-icon" aria-hidden="true"><?= $value[0] ?></span>
                  <h3 lang="en"><?= $value ?></h3>
                  <p><?= $meaning ?></p>
                </article>
              <?php endforeach; ?>
            </div>
            <p class="about-note">พันธกิจ เป้าหมาย และค่านิยมในหน้านี้เป็นข้อมูลตัวอย่างสำหรับต้นแบบ</p>
          </section>
        <?php break; case 'organization': ?>
          <!-- พื้นที่สำหรับผังและข้อมูลบุคลากรที่รอการยืนยัน -->
          <section class="card about-card" aria-labelledby="chart-title">
            <h2 id="chart-title">ผังโครงสร้างการบริหาร</h2>
            <div class="about-placeholder about-placeholder-large">
              <span class="material-symbols-rounded" aria-hidden="true">account_tree</span>
              <strong>พื้นที่แสดงแผนผังองค์กร</strong>
              <p>รอแผนผังและเอกสารโครงสร้างฉบับทางการจากหน่วยงาน</p>
            </div>
          </section>
          <div class="about-grid about-grid-two about-section">
            <section class="card about-card" aria-labelledby="personnel-title">
              <h2 id="personnel-title">ข้อมูลบุคลากร</h2>
              <div class="about-placeholder about-placeholder-inline">
                <span class="material-symbols-rounded" aria-hidden="true">badge</span>
                <p>รอรายชื่อ ตำแหน่ง และภาพบุคลากรสำหรับเผยแพร่</p>
              </div>
            </section>
            <section class="card about-card" aria-labelledby="organization-contact-title">
              <h2 id="organization-contact-title">ติดต่อประสานงาน</h2>
              <p>สอบถามช่องทางติดต่อส่วนงานผ่านหมายเลขกองการประปา</p>
              <a class="button button-primary" href="tel:055983230">โทร 055-983230</a>
            </section>
          </div>
        <?php break; case 'operations':
            // รายการตัวอย่างสำหรับแสดงรูปแบบข่าวและทดสอบตัวกรอง
            $newsGroups = [
                'reports' => ['รายงานผลการดำเนินงาน', 'ตัวอย่างรายงานการติดตามระบบจ่ายน้ำ', 'สรุปหัวข้อสำหรับรายงานการตรวจติดตามระบบจ่ายน้ำและการบำรุงรักษา', 'รายงานฉบับจริงสามารถแนบรายละเอียดจุดตรวจ ผลการติดตาม และแผนดำเนินงานรอบถัดไปได้'],
                'projects' => ['โครงการพัฒนา', 'ตัวอย่างรายงานความคืบหน้าโครงการปรับปรุงท่อประปา', 'แสดงรูปแบบการสรุปแผนงานและขั้นตอนการปรับปรุงโครงข่าย', 'เมื่อมีรายงานอย่างเป็นทางการ จะสามารถเผยแพร่ขอบเขตงานและผลกระทบต่อผู้ใช้น้ำได้'],
                'community' => ['กิจกรรมชุมชน', 'ตัวอย่างกิจกรรมให้ความรู้เรื่องการใช้น้ำ', 'แสดงรูปแบบข่าวกิจกรรมสื่อสารกับประชาชนเรื่องการใช้น้ำอย่างประหยัด', 'รายละเอียดจริงจะเพิ่มเติมหลังได้รับข้อมูลกิจกรรมและภาพที่ได้รับอนุญาตให้เผยแพร่'],
                'water-quality' => ['การตรวจสอบคุณภาพน้ำ', 'ตัวอย่างสรุปผลการตรวจคุณภาพน้ำ', 'แสดงรูปแบบการนำเสนอรายงานคุณภาพน้ำเพื่อให้ประชาชนอ่านได้ง่าย', 'รอผลตรวจและรายงานที่ได้รับการรับรองจากหน่วยงาน'],
            ];
            $query = is_string($_GET['q'] ?? null) ? trim($_GET['q']) : '';
            $group = is_string($_GET['group'] ?? null) && isset($newsGroups[$_GET['group']]) ? $_GET['group'] : '';
            $visibleNews = array_filter($newsGroups, static fn ($item, $key) =>
                ($group === '' || $group === $key)
                    && (stripos(implode(' ', $item), $query) !== false
                        || stripos(implode(' ', array_map(
                            static fn ($phrase) => $siteTranslations[$phrase] ?? $phrase, $item
                        )), $query) !== false),
                ARRAY_FILTER_USE_BOTH
            );
        ?>
          <p class="about-note">ข้อมูลตัวอย่างสำหรับต้นแบบ · รอข่าวและภาพจากหน่วยงาน</p>
          <form class="card about-filters" action="about.php" method="get" data-page-search>
            <input type="hidden" name="section" value="operations">
            <label>ค้นหาข่าว <input type="search" name="q" value="<?= htmlspecialchars($query, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?>"></label>
            <label>หมวดข่าว
              <select name="group">
                <option value="">ทุกหมวด</option>
                <?php foreach ($newsGroups as $key => [$groupLabel]): ?>
                  <option value="<?= $key ?>"<?= $key === $group ? ' selected' : '' ?>><?= $groupLabel ?></option>
                <?php endforeach; ?>
              </select>
            </label>
            <button class="button button-primary" type="submit">ค้นหา</button>
            <a href="about.php?section=operations">ล้างตัวกรอง</a>
          </form>
          <section class="about-section" aria-labelledby="operations-title">
            <div class="about-results-heading">
              <h2 id="operations-title">รายการข่าวและผลการดำเนินงาน</h2>
              <p data-about-result-count="<?= count($visibleNews) ?>">พบ <?= count($visibleNews) ?> รายการ</p>
            </div>
            <?php if ($visibleNews): ?>
              <div class="about-grid about-grid-three">
                <?php foreach ($visibleNews as [$groupLabel, $title, $summary, $details]): ?>
                  <article class="card about-news">
                    <div class="about-placeholder about-news-image">
                      <span class="material-symbols-rounded" aria-hidden="true">image</span>
                      <small>พื้นที่ภาพประกอบข่าว</small>
                    </div>
                    <div class="about-card">
                      <p class="about-status"><?= $groupLabel ?></p>
                      <h3><?= $title ?></h3>
                      <p><?= $summary ?></p>
                      <details><summary>อ่านรายละเอียด</summary><p><?= $details ?></p></details>
                    </div>
                  </article>
                <?php endforeach; ?>
              </div>
            <?php else: ?>
              <p class="card about-card">ไม่พบข่าวที่ตรงกับตัวกรอง ลองเปลี่ยนคำค้นหาหรือหมวดข่าว</p>
            <?php endif; ?>
          </section>
        <?php break; case 'location': ?>
          <!-- ข้อมูลที่อยู่และโทรศัพท์อ้างอิงจากส่วนท้ายของเว็บไซต์ -->
          <div class="about-grid about-grid-map">
            <section class="card about-card" aria-labelledby="office-map-title">
              <h2 id="office-map-title">แผนที่การเดินทาง</h2>
              <div class="about-placeholder about-placeholder-large">
                <span class="material-symbols-rounded" aria-hidden="true">location_on</span>
                <strong>พื้นที่แสดงแผนที่สำนักงาน</strong>
                <p>รอพิกัดและลิงก์แผนที่ที่ยืนยันจากหน่วยงาน</p>
              </div>
            </section>
            <div class="about-stack">
              <section class="card about-card about-accent" aria-labelledby="office-address-title">
                <h2 id="office-address-title">ที่อยู่สำนักงาน</h2>
                <address><strong>กองการประปา เทศบาลนครพิษณุโลก</strong><br>1299 ถนนบรมไตรโลกนารถ 2 ตำบลในเมือง อำเภอเมือง จังหวัดพิษณุโลก 65000</address>
              </section>
              <section class="card about-card about-accent" aria-labelledby="office-hours-title">
                <h2 id="office-hours-title">วันและเวลาเปิดให้บริการ</h2>
                <p>รอยืนยันเวลาทำการจากหน่วยงาน กรุณาโทรสอบถามก่อนเดินทาง</p>
              </section>
              <section class="card about-card about-accent" aria-labelledby="office-contact-title">
                <h2 id="office-contact-title">ช่องทางติดต่อ</h2>
                <a class="button button-primary" href="tel:055983230">โทร 055-983230</a>
              </section>
            </div>
          </div>
        <?php break; case 'service-areas': ?>
          <!-- แผนที่และขอบเขตยังรอข้อมูลจากหน่วยงาน -->
          <div class="about-grid about-grid-map">
            <section class="card about-card" aria-labelledby="coverage-map-title">
              <h2 id="coverage-map-title">แผนที่ขอบเขตพื้นที่ให้บริการ</h2>
              <div class="about-placeholder about-placeholder-large">
                <span class="material-symbols-rounded" aria-hidden="true">map</span>
                <strong>พื้นที่แสดงแผนที่เขตจ่ายน้ำ</strong>
                <p>รอข้อมูลแผนที่และขอบเขตที่ยืนยันจากหน่วยงาน</p>
              </div>
            </section>
            <div class="about-stack">
              <section class="card about-card about-accent" aria-labelledby="coverage-title">
                <h2 id="coverage-title">ชุมชนและถนนในเขตบริการ</h2>
                <p>รอรายการชุมชน ถนน และข้อมูลพื้นที่รอยต่อจากหน่วยงาน</p>
              </section>
              <section class="card about-card about-accent" aria-labelledby="coverage-inquiry-title">
                <h2 id="coverage-inquiry-title">สอบถามพื้นที่ให้บริการ</h2>
                <p>แจ้งชื่อถนน ชุมชน หรือที่ตั้งอาคารแก่เจ้าหน้าที่เพื่อสอบถามเขตบริการตามที่อยู่</p>
                <a class="button button-primary" href="tel:055983230">โทร 055-983230</a>
              </section>
            </div>
          </div>
          <section class="card about-card about-section" aria-labelledby="coverage-guide-title">
            <h2 id="coverage-guide-title">การขอใช้น้ำประปา</h2>
            <p>ดูรายละเอียดขั้นตอนและเอกสารประกอบในคู่มือประชาชน</p>
            <a class="button button-muted" href="citizen-guide.php">ดูคู่มือประชาชน</a>
          </section>
        <?php break; endswitch; ?>
      </div>
    </main>

    <?php require __DIR__ . '/partials/footer.php'; ?>
  </body>
</html>
