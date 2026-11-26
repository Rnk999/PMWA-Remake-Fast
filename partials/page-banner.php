<?php
// Page templates supply text and, optionally, a renderer for their existing summary.
$escapeBanner = static fn(string $value): string => htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
$bannerTitleId = $banner['titleId'] ?? 'page-banner-title';
if (!preg_match('/\A[a-z][a-z0-9-]*\z/', $bannerTitleId)) {
    $bannerTitleId = 'page-banner-title';
}
$bannerIcon = $banner['icon'] ?? '';
?>
      <section class="page-banner" aria-labelledby="<?= $escapeBanner($bannerTitleId) ?>">
        <div class="container page-banner-inner">
          <?php require __DIR__ . '/breadcrumb.php'; ?>
          <div class="page-banner-row">
            <div class="page-banner-heading">
              <?php if (preg_match('/\A[a-z][a-z0-9_]*\z/', $bannerIcon)): ?>
                <span class="page-banner-icon" aria-hidden="true"><span class="material-symbols-rounded"><?= $escapeBanner($bannerIcon) ?></span></span>
              <?php endif; ?>
              <div class="page-banner-copy">
                <?php if (isset($banner['eyebrow'])): ?>
                  <p class="section-kicker"><?= $escapeBanner($banner['eyebrow']) ?></p>
                <?php endif; ?>
                <h1 class="subpage-title" id="<?= $escapeBanner($bannerTitleId) ?>"><?= $escapeBanner($banner['title']) ?></h1>
                <?php if (isset($banner['subtitle'])): ?>
                  <p class="subpage-subtitle" lang="en"><?= $escapeBanner($banner['subtitle']) ?></p>
                <?php endif; ?>
                <p class="page-banner-description"><?= $escapeBanner($banner['description']) ?></p>
              </div>
            </div>
            <?php if (isset($banner['details'])): ?>
              <div class="page-banner-details">
                <?php $banner['details'](); ?>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </section>
