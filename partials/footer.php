    <?php
      # ลิงก์กลับหน้าแรก
      # เลือกปลายทางตามหน้าปัจจุบันก่อนสร้างส่วนท้าย
      if (!isset($activePage)) $activePage = 'home';
      $isHome = ($activePage === 'home');
      $footerHomeHref = $isHome ? '#top' : 'index.php';
    ?>
    <!-- # Footer
         แสดงข้อมูลติดต่อ ลิงก์ตามหมวด และข้อมูลลิขสิทธิ์
    -->
    <footer class="site-footer" id="about">
      <div class="container footer-main">
        <div class="footer-about" id="contact">
          <a class="footer-brand" href="<?php echo $footerHomeHref; ?>"><img src="assets/logos/กองการประปา%20logo.PNG" alt="ตราสัญลักษณ์เทศบาลนครพิษณุโลก"><span><strong>กองการประปา</strong><small>เทศบาลนครพิษณุโลก</small></span></a>
          <address>
            <p><span class="material-symbols-rounded" aria-hidden="true">location_on</span> 1299 ถนนบรมไตรโลกนารถ 2 ตำบลในเมือง อำเภอเมือง จังหวัดพิษณุโลก 65000</p>
            <p><span class="material-symbols-rounded" aria-hidden="true">call</span> โทรศัพท์: <a href="tel:055983230">055-983230</a></p>
          </address>
          <!-- # สถานะแผนที่
               แสดงปุ่มและข้อความรอยืนยัน URL ของแผนที่
          -->
          <button class="map-button" id="map-button" type="button" aria-disabled="true" aria-describedby="map-status"><span class="material-symbols-rounded" aria-hidden="true">location_on</span> ดูแผนที่การเดินทาง</button>
          <p class="map-status" id="map-status" role="status" aria-live="polite">รอยืนยัน URL แผนที่จากหน่วยงาน</p>
          <div class="social-links" aria-label="ตัวอย่างช่องทางสื่อสารที่รอการยืนยันลิงก์ทางการ"><span><img src="assets/contact/Facebook%20logo.png" alt=""> Facebook</span><span><img src="assets/contact/Line%20OA%20logo.png" alt=""> LINE Official</span></div>
        </div>
        <!-- # ลิงก์ในส่วนท้าย
             สร้างทางลัดตามหมวดจากรายการเมนูร่วม
        -->
        <?php foreach ($navigationGroups as $groupId => ['label' => $label, 'items' => $items]): ?>
          <nav class="footer-nav" data-footer-group="<?= $groupId ?>" aria-labelledby="footer-<?= $groupId ?>-title">
            <h2 id="footer-<?= $groupId ?>-title"><?= $label ?></h2>
            <?php foreach ($items as $pageId => [$itemLabel, $href, $icon]): ?>
              <a href="<?= $href ?>"<?= $pageId === 'e-service' ? ' target="_blank" rel="noopener noreferrer"' : '' ?><?= $activePage === $pageId ? ' aria-current="page"' : '' ?>>
                <span<?= $pageId === 'open-data' ? ' lang="en"' : '' ?>><?= $itemLabel ?></span><?php if ($pageId === 'e-service'): ?>
                  <span class="material-symbols-rounded" aria-hidden="true"><?= $icon ?></span><?php endif; ?>
              </a>
            <?php endforeach; ?>
          </nav>
        <?php endforeach; ?>
        <nav class="footer-nav policy-nav" aria-label="กฎหมายและนโยบาย"><h2>กฎหมายและนโยบาย</h2><ul><li>PDPA</li><li>นโยบายเว็บไซต์</li><li>นโยบายความเป็นส่วนตัว</li><li>นโยบายคุกกี้</li><li>ข้อกำหนดการใช้งาน</li></ul><p>รอเนื้อหาจากหน่วยงาน</p></nav>
        <nav class="footer-nav" aria-label="หน่วยงานที่เกี่ยวข้อง"><h2>หน่วยงานที่เกี่ยวข้อง</h2><a href="https://www.phsmun.go.th/" target="_blank" rel="noopener noreferrer">เทศบาลนครพิษณุโลก <span class="material-symbols-rounded" aria-hidden="true">open_in_new</span></a></nav>
      </div>
      <div class="footer-bottom"><div class="container footer-bottom-inner"><p>© 2569 กองการประปา เทศบาลนครพิษณุโลก สงวนลิขสิทธิ์ตามกฎหมาย</p><span>เอกสารกฎหมายและนโยบายรอเผยแพร่จากหน่วยงาน</span></div></div>
    </footer>
    <!-- # ข้อมูลแปลภาษา
         ส่งพจนานุกรมในรูป JSON ให้ JavaScript อ่านจากหน้า
    -->
    <script type="application/json" id="site-translations"><?= json_encode($siteTranslations, JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_THROW_ON_ERROR) ?></script>
