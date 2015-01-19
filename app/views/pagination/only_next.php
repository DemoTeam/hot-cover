<?php if ($paginator->getCurrentPage() < $paginator->getLastPage()): ?>
    <ul class="nav">
        <li><a class="btn btn-info" href="<?= $paginator->getUrl($paginator->getCurrentPage() + 1) ?>">View more</a></li>
    </ul>
<?php endif; ?>
