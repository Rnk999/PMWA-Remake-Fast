    <!-- ส่วนที่ 1: แถบข้อมูลหน่วยงาน ประกาศ และเมนูนำทาง -->
    <!-- หน้าที่: แสดงช่องทางติดต่อ ข่าวประกาศ โลโก้ และทางลัดไปยังเนื้อหาหลัก -->
    <?php
      // กำหนดหน้าปัจจุบันสำหรับ nav active state ถ้ายังไม่ได้กำหนดจากหน้าที่เรียกใช้
      if (!isset($activePage)) $activePage = 'home';
      $isHome = ($activePage === 'home');
      $homeHref = $isHome ? '#top' : 'index.php';
      $newsHref = 'news.php';
      $navigationGroups = require __DIR__ . '/navigation.php';
      $siteTranslations = json_decode(file_get_contents(__DIR__ . '/../locales/en.json'), true, 512, JSON_THROW_ON_ERROR);
      $aboutCategories ??= require __DIR__ . '/about-categories.php';
      $contactHref = $isHome ? '#contact' : 'index.php#contact';
    ?>
    <header class="site-header">
      <!-- แถบข้อมูลหน่วยงานและหมายเลขโทรศัพท์ -->
      <div class="utility-bar">
        <div class="container utility-inner">
          <!-- แถบเครื่องมือช่วยการเข้าถึงเว็บไซต์ -->
          <div class="accessibility-tools" role="group" aria-label="เครื่องมือช่วยการเข้าถึงเว็บไซต์">
            <button id="font-decrease" type="button" aria-label="ลดขนาดตัวอักษร">A−</button>
            <button id="font-reset" type="button" aria-label="คืนค่าขนาดตัวอักษรปกติ" aria-pressed="true">A</button>
            <button id="font-increase" type="button" aria-label="เพิ่มขนาดตัวอักษร">A+</button>
            <button id="contrast-toggle" type="button" aria-label="เปิดโหมดสีความเปรียบต่างสูง" aria-pressed="false"><span class="material-symbols-rounded" aria-hidden="true">contrast</span></button>
            <div class="language-switch" role="group" aria-label="ภาษาเว็บไซต์" hidden>
              <button type="button" lang="th" data-site-language="th" aria-label="ภาษาไทย" aria-pressed="true">TH</button>
              <button type="button" lang="en" data-site-language="en" aria-label="English" aria-pressed="false">EN</button>
            </div>
          </div>
          <div class="utility-contact">
            <a class="utility-phone" href="tel:055983230"><span class="material-symbols-rounded" aria-hidden="true">call</span> 055-983230</a>
            <!-- ช่องทางสังคมจะแสดงเป็นลิงก์เมื่อมีการกำหนด URL ทางการใน js/main.js -->
            <div class="top-social" role="group" aria-label="ช่องทางสังคม รอยืนยัน URL ทางการ">
              <span class="social-channel" data-social-channel="facebook"><img src="assets/contact/Facebook%20logo.png" alt=""><span>Facebook</span><small>รอ URL ทางการ</small></span>
              <span class="social-channel" data-social-channel="line"><img src="assets/contact/Line%20OA%20logo.png" alt=""><span>LINE Official</span><small>รอ URL ทางการ</small></span>
            </div>
          </div>
        </div>
      </div>
      <!-- แถบประกาศพร้อมทางลัดไปยังข่าวสาร -->
      <div class="announcement-bar">
        <div class="container announcement-inner">
          <p><span class="material-symbols-rounded" aria-hidden="true">campaign</span><strong>ประกาศสำคัญ</strong> ติดตามข่าวสารและประกาศการให้บริการประปาจากกองการประปา</p>
          <a href="<?php echo $newsHref; ?>" aria-label="อ่านประกาศเพิ่มเติม"><span class="announcement-link-long">อ่านข่าวประกาศ</span><span class="announcement-link-short">อ่านต่อ</span><span class="material-symbols-rounded" aria-hidden="true">arrow_forward</span></a>
        </div>
      </div>
      <!-- ส่วนหัวหลักและเมนูนำทาง -->
      <div class="nav-wrap">
        <div class="container nav-inner">
          <a class="brand" href="<?php echo $homeHref; ?>" aria-label="กองการประปา เทศบาลนครพิษณุโลก - หน้าแรก">
            <img src="assets/logos/PMWA.jpg" alt="ตราสัญลักษณ์กองการประปา เทศบาลนครพิษณุโลก">
            <span class="brand-name"><strong>กองการประปา</strong><span>เทศบาลนครพิษณุโลก</span></span>
          </a>
          <!-- ค้นหาจากเนื้อหาบนหน้าเว็บที่มีอยู่เท่านั้น -->
          <form class="header-search" id="site-search" role="search">
            <label class="visually-hidden" for="site-search-input">ค้นหาบริการหรือประกาศ</label>
            <input id="site-search-input" name="q" type="search" placeholder="ค้นหาบริการหรือประกาศ..." autocomplete="off">
            <button type="submit" aria-label="ค้นหาในหน้านี้"><span class="material-symbols-rounded" aria-hidden="true">search</span></button>
          </form>
          <button class="menu-toggle" type="button" aria-expanded="false" aria-controls="primary-navigation" aria-label="เปิดเมนูนำทาง">
            <span class="material-symbols-rounded" aria-hidden="true">menu</span>
          </button>
          <nav class="primary-nav" id="primary-navigation" aria-label="เมนูหลัก">
            <a class="nav-link<?php echo $isHome ? ' is-current' : ''; ?>" href="<?php echo $homeHref; ?>"<?php echo $isHome ? ' aria-current="page"' : ''; ?>>หน้าแรก</a>
            <?php foreach ($navigationGroups as $groupId => ['label' => $label, 'items' => $items]): ?>
              <div class="nav-dropdown" id="<?= $groupId ?>-dropdown">
                <button class="nav-link dropdown-toggle<?= isset($items[$activePage]) ? ' is-current' : '' ?>" id="<?= $groupId ?>-toggle" type="button" aria-expanded="false" aria-controls="<?= $groupId ?>-menu">
                  <?= $label ?> <span class="material-symbols-rounded" aria-hidden="true">arrow_drop_down</span>
                </button>
                <div class="dropdown-menu" id="<?= $groupId ?>-menu" hidden>
                  <?php foreach ($items as $pageId => [$itemLabel, $href, $icon]): ?>
                    <a class="dropdown-item<?= $activePage === $pageId ? ' is-active' : '' ?>" href="<?= $href ?>"<?= $pageId === 'e-service' ? ' target="_blank" rel="noopener noreferrer"' : '' ?><?= $activePage === $pageId ? ' aria-current="page"' : '' ?>>
                      <span class="material-symbols-rounded" aria-hidden="true"><?= $icon ?></span>
                      <span<?= $pageId === 'open-data' ? ' lang="en"' : '' ?>><?= $itemLabel ?></span>
                    </a>
                  <?php endforeach; ?>
                </div>
              </div>
            <?php endforeach; ?>
            <a class="nav-link<?php echo ($activePage === 'procurement') ? ' is-current' : ''; ?>" href="procurement.php"<?php echo ($activePage === 'procurement') ? ' aria-current="page"' : ''; ?>>จัดซื้อจัดจ้าง</a>
            <div class="nav-dropdown" id="about-dropdown">
              <button class="nav-link dropdown-toggle<?= $activePage === 'about' ? ' is-current' : '' ?>" id="about-toggle" type="button" aria-expanded="false" aria-controls="about-menu">
                เกี่ยวกับเรา <span class="material-symbols-rounded" aria-hidden="true">arrow_drop_down</span>
              </button>
              <div class="dropdown-menu" id="about-menu" hidden>
                <?php foreach ($aboutCategories as $aboutNavSection => [$aboutNavLabel, $aboutNavIcon]): ?>
                  <?php $isCurrentCategory = $activePage === 'about' && $aboutCategory === $aboutNavSection; ?>
                  <a class="dropdown-item<?= $isCurrentCategory ? ' is-active' : '' ?>" href="about.php?section=<?= $aboutNavSection ?>"<?= $isCurrentCategory ? ' aria-current="page"' : '' ?>><span class="material-symbols-rounded" aria-hidden="true"><?= $aboutNavIcon ?></span><span><?= $aboutNavLabel ?></span></a>
                <?php endforeach; ?>
              </div>
            </div>
            <a class="nav-link" href="<?php echo $contactHref; ?>">ติดต่อเรา</a>
          </nav>
          <div class="search-results" id="search-results" aria-live="polite" hidden>
            <p id="search-results-status"></p>
            <ul id="search-result-list"></ul>
          </div>
        </div>
      </div>
    </header>
    <!-- สิ้นสุดส่วนหัวเว็บไซต์ -->
